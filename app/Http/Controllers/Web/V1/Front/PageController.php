<?php
/**
 * Created by PhpStorm.
 * User: air
 * Date: 12.07.2020
 * Time: 19:30
 */

namespace App\Http\Controllers\Web\V1\Front;


use App\Http\Controllers\Web\WebBaseController;
use App\Http\Requests\Web\V1\EmailSendWebRequest;
use App\Jobs\SendEmailJob;
use App\Models\Entities\Core\BulkMailing;
use App\Models\Entities\Course\Course;
use App\Models\Entities\Course\CourseAuthor;
use App\Models\Entities\Course\CourseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class PageController extends WebBaseController
{
    public function welcome()
    {
        $course_types = CourseCategory::all();
        $authors = CourseAuthor::all()->take(6);
        return $this->frontView('pages.index',compact('course_types','authors'));
    }

    public function home()
    {
        return $this->adminView('pages.home');
    }

    public function courses(Request $request,$slug = null)
    {
        $sort = null;

        if($request->sort){
            $sort = $request->sort;
        }
        $courses = Course::orderBy('rating','desc')->paginate(2);
        if($sort){
            if($sort == 'price'){
                $courses = Course::orderBy('price', 'desc')->paginate(2);
            }
            else if($sort == 'created_at'){
                $courses = Course::orderBy('created_at', 'desc')->paginate(2);
            }
        }
        if($slug){
            $course_type = CourseCategory::where('slug',$slug)->firstOrFail();
            $courses = Course::where('category_id',$course_type->id);

            if($sort){
                if($sort == 'price'){
                    $courses = $courses->orderBy('price','desc')->paginate(2);
                }
                else if($sort == 'created_at'){
                    $courses = $courses->orderBy('created_at','desc')->paginate(2);
                }
            }else{
                $courses = $courses->orderBy('rating','desc')->paginate(2);
            }
        }
        $course_types = CourseCategory::all();

        return $this->frontView('pages.courses',compact('course_types','courses','slug'));
    }
    public function course()
    {
        return $this->frontView('pages.course');
    }
    public function myCourse($slug)
    {
        $user = auth()->user();
        $course = Course::where('slug',$slug)->firstOrFail();
        $course = Course::where('slug',$slug)->with('lessons')->get();
        #ToDo Проверить купил ли этот чел курс или нет!

        return $this->frontView('pages.my-course',compact('course'));
    }
    public function profile()
    {
        return $this->frontView('pages.profile');
    }

    public function saveEmailForBulkMailing(EmailSendWebRequest $request){
        BulkMailing::create([
            'email'=> $request->email
        ]);
        $this->sent();
        return redirect()->back();
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
