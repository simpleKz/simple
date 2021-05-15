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
use App\Models\Entities\Course\CoursePassing;
use App\Models\Entities\Course\Packet;
use App\Models\Entities\Course\PacketPrice;
use App\Models\Entities\Setting\Slider;
use App\Models\Enums\Currency;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;


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
        $sort = null;

        if ($request->sort) {
            $sort = $request->sort;
        }
        $courses = Course::orderBy('rating', 'desc')->paginate(2);
        if ($sort) {
            if ($sort == 'price') {
                $courses = Course::orderBy('price', 'desc')->paginate(2);
            } else if ($sort == 'created_at') {
                $courses = Course::orderBy('created_at', 'desc')->paginate(2);
            }
        }
        if ($slug) {
            $course_type = CourseCategory::where('slug', $slug)->firstOrFail();
            $courses = Course::where('category_id', $course_type->id);

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
        return $this->frontView('pages.courses', compact('course_types', 'courses', 'slug'));
    }

    public function course()
    {
        return $this->frontView('pages.course');
    }

    public function legal()
    {
        return response()->file(public_path('p_o.pdf'));
    }

    public function myCourse($slug)
    {
        $user = auth()->user();
        $course = Course::where('slug', $slug)->firstOrFail();
        $course = Course::where('slug', $slug)->with('lessons')->get();
        #ToDo Проверить купил ли этот чел курс или нет!

        return $this->frontView('pages.my-course', compact('course'));
    }

    public function buyCourse($slug)
    {
        $user = auth()->user();
        $course = Course::where('slug', $slug)->firstOrFail();
        $duration = $course->lessons->sum('duration_in_minutes');
        $course->duration = (int)ceil(CarbonInterval::minutes($duration)->totalHours);
        $user_course = CoursePassing::where('course_id', $course->id)->where('user_id', $user->id)->first();
        if ($user_course) {
            throw new WebServiceErroredException('Вы уже купили этот курс');
        }

        return $this->frontView('pages.buy-course', compact('course'));
    }

    public function pay(Request $request)
    {
        #ToDo Check course or packet

        $course = Course::where('id', $request->course_id)->first();
        $packet_price = PacketPrice::where('packet_id',$request->packet_id)
                                ->where('currency',$request->currency)
                                ->first();



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



    public function payCard(Request $request,$course_id = null)
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
            'pg_amount' => $price,
            'pg_salt' => 'Order',
            'pg_success_url' => 'https://simple-study.com',
            'pg_success_url_method' => 'AUTOGET',
            'pg_order_id' => $order->id,
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
        return redirect('https://api.paybox.money/payment.php?' . $query);

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
