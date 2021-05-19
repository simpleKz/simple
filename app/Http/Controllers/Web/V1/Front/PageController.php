<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 12.07.2020
 * Time: 19:30
 */

namespace App\Http\Controllers\Web\V1\Front;


use App\Exceptions\WebServiceErroredException;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Requests\Web\V1\EmailSendWebRequest;
use App\Models\Entities\Core\BulkMailing;
use App\Models\Entities\Core\Order;
use App\Models\Entities\Course\Course;
use App\Models\Entities\Course\CourseAuthor;
use App\Models\Entities\Course\CourseCategory;
use App\Models\Entities\Course\CourseLessonPassing;
use App\Models\Entities\Course\CoursePassing;
use App\Models\Entities\Course\Packet;
use App\Models\Entities\Course\PacketPrice;
use App\Models\Entities\Course\UserPacket;
use App\Models\Entities\Setting\Slider;
use App\Models\Enums\Currency;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Facades\Session;


class PageController extends WebBaseController
{
    public function welcome()
    {
        $course_types = CourseCategory::all();
        $authors = CourseAuthor::all();
        $sliders = Slider::all();
        return $this->frontView('pages.index', compact('course_types', 'authors', 'sliders'));
    }

    public function home()
    {
        return $this->adminView('pages.home');
    }

    public function courses(Request $request, $slug = null)
    {
        Session::put('prevPage', url()->current());

        $sort = null;
        $course_type_name = null;
        if ($request->sort) {
            $sort = $request->sort;
        }
        $courses = Course::where('is_visible',true)->orderBy('rating', 'desc')->paginate(2);
        if ($sort) {
            if ($sort == 'price') {
                $courses = Course::where('is_visible',true)->orderBy('price', 'desc')->paginate(2);
            } else if ($sort == 'created_at') {
                $courses = Course::where('is_visible',true)->orderBy('created_at', 'desc')->paginate(2);
            }
        }
        if ($slug) {
            $course_type = CourseCategory::where('slug', $slug)->firstOrFail();
            $courses = Course::where('is_visible',true)->where('category_id', $course_type->id);
            $course_type_name = $course_type->name;
            if ($sort) {
                if ($sort == 'price') {
                    $courses = $courses->orderBy('price', 'desc')->paginate(2);
                } else if ($sort == 'created_at') {
                    $courses = $courses->orderBy('created_at', 'desc')->paginate(2);
                }
            } else {
                $courses = $courses->orderBy('rating', 'desc')->paginate(2);
            }
        }
        $course_types = CourseCategory::all();

        foreach ($courses as $course) {
            $duration = $course->lessons->sum('duration_in_minutes');
            $course->duration = (int)ceil(CarbonInterval::minutes($duration)->totalHours);
        }
        return $this->frontView('pages.courses', compact('course_types', 'courses',
            'slug', 'course_type_name'));
    }

    public function course($slug)
    {
        Session::put('prevPage', url()->current());
        $course = Course::with(['lessons', 'author'])->where('slug', $slug)->first();
        return $this->frontView('pages.course', compact('course'));
    }

    public function legal()
    {
        return response()->file(public_path('p_o.pdf'));
    }

    public function myCourse($slug)
    {
        $user = auth()->user();
        $course = Course::where('slug', $slug)->with(['lessons.docs', 'author'])->first();
        if(!$course) {
            throw new WebServiceErroredException('Курс не найден!');

        }
        $course_passing = CoursePassing::where('user_id',$user->id)->where('course_id',$course->id)->first();
        if (!$course_passing) {
            throw new WebServiceErroredException('Нет доступа');
        }
        $i = 1;
        $overall_minutes = 0;
        $lesson_passings = CourseLessonPassing::where('user_id',$user->id)->get();

        $last_lesson = null;

        foreach ($course->lessons as $lesson) {
            $lesson->order = $i.' занятие';
            $lesson->passed = $lesson_passings->contains('lesson_id', $lesson->id);
            $overall_minutes += $lesson->duration_in_minutes;
            $i++;
            if($lesson->passed != true && !$last_lesson) {
                $last_lesson = $lesson;
            }
        }
        return $this->frontView('pages.my-course', compact('course',
            'overall_minutes', 'last_lesson'));
    }

    public function buyCourse($slug)
    {
        $user = auth()->user();
        $course = Course::with(['packets.attributes', 'packets.prices', 'packets.packetCourses'])
            ->where('slug', $slug)
            ->firstOrFail();
        $duration = $course->lessons->sum('duration_in_minutes');
        $course->duration = (int)ceil(CarbonInterval::minutes($duration)->totalHours);
        foreach ($course->packets as $packet){
            $user_course = UserPacket::where('user_id',$user->id)->where('packet_id',$packet->id)->first();
            if ($user_course) {
                throw new WebServiceErroredException('Вы уже купили этот курс');
            }
        }


        return $this->frontView('pages.buy-course', compact('course'));
    }

    public function pay(Request $request)
    {
        #ToDo Check course or packet

        $position = Location::get(request()->ip());

        $currency = "KZT";
        if($position->countryName == "Russia"){
            $currency = "RUB";
        }
        $course = Course::where('id', $request->course_id)->first();
        $packet_price = PacketPrice::where('packet_id', $request->packet_id)
            ->where('currency', $currency)
            ->first();
        if (!$packet_price) {
            throw new WebServiceErroredException('Не существует');
        }


        $order = Order::create([
            'packet_price_id' => $packet_price->id,
            'user_id' => auth()->user()->id,
            'sum' => $packet_price->price,
            'currency' => $packet_price->currency
        ]);

        $request = [
            'pg_merchant_id' => 536680,
            'pg_amount' => $order->sum,
            'pg_salt' => 'Order',
            'pg_success_url' => 'https://simple-study.com',
            'pg_success_url_method' => 'AUTOGET',
            'pg_order_id' => $order->id,
            'pg_description' => 'Описание заказа',
            'pg_currency' => $order->currency,
            'pg_user_id' => auth()->user()->id,
//            'pg_testing_mode' => 1,
            'pg_result_url' => 'https://simple-study.com/api/V1/accept/order',
        ];

//generate a signature and add it to the array
        ksort($request); //sort alphabetically
        array_unshift($request, 'payment.php');
        array_push($request, 'pdajm24PW84OgxbP'); //add your secret key (you can take it in your personal cabinet on paybox system)

        $request['pg_sig'] = md5(implode(';', $request));

        unset($request[0], $request[1]);

        $query = http_build_query($request);
//redirect a customer to payment page
        return redirect('https://api.paybox.money/payment.php?' . $query);

    }


    public function payCard(Request $request)
    {
        #ToDo Check course or packet
//        $price = 0;
//        if($course_id){
//            $course = Course::where('id',$request->course_id)->first();
//            $price = $course->price;
//        }else{
//            $price = 0;
//        }
//        $order = Order::create([
//            'course_id' => $request->course_id,
//            'user_id' => auth()->user()->id,
//            'sum' => $price,
//        ]);
        $request = [
            'pg_merchant_id' => 536680,
            'pg_amount' => 25,
            'pg_salt' => 'CARD',
            'pg_user_id' => auth()->user()->id,
            'pg_success_url' => 'https://simple-study.com',
            'pg_success_url_method' => 'AUTOGET',
            'pg_order_id' => 10001012,
            'pg_description' => 'Описание заказа',
            'pg_result_url' => 'https://simple-study.com/api/V1/accept/order',
        ];

//generate a signature and add it to the array
        ksort($request); //sort alphabetically
        array_unshift($request, 'payment.php');
        array_push($request, 'pdajm24PW84OgxbP'); //add your secret key (you can take it in your personal cabinet on paybox system)

        $request['pg_sig'] = md5(implode(';', $request));

        unset($request[0], $request[1]);

        $query = http_build_query($request);

//redirect a customer to payment page
        return redirect('https://api.paybox.money/v1/merchant/536680/cardstorage/add' . $query);

    }

//    public function acceptOrder(Request $request){
//        Storage::disk('local')->put('order.txt', $request);
//
//        return $this->frontView('pages.course');
//    }


    public function profile()
    {
        return $this->frontView('pages.profile');
    }

    public function saveEmailForBulkMailing(EmailSendWebRequest $request)
    {
        BulkMailing::create([
            'email' => $request->email
        ]);
        $this->sent();
        return redirect()->back();
    }

    public function ref()
    {
        $link = request()->link;
        $redirect = redirect()->route('index');
        if ($link) {
            $redirect = $redirect->withCookie('ref_link', $link);
        }
        return $redirect;
    }
//    public function files($relative_path)
//    {
//        if (Storage::cloud()->exists($relative_path)) {
//            return Storage::cloud()->response($relative_path);
//        }
//        abort(404);
//    }
//
//    public function privacy() {
//        return view('modules.privacy');
//    }
}
