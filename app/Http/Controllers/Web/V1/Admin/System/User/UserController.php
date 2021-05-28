<?php


namespace App\Http\Controllers\Web\V1\Admin\System\User;


use App\Exceptions\Web\WebServiceExplainedException;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\CourseAuthorWebForm;
use App\Http\Forms\Web\V1\UserWebForm;
use App\Http\Requests\Web\V1\CourseAuthorWebRequest;
use App\Http\Requests\Web\V1\UserWebRequest;
use App\Models\Entities\Core\Role;
use App\Models\Entities\Core\User;
use App\Models\Entities\Course\Course;
use App\Models\Entities\Course\CourseAuthor;
use App\Models\Entities\Course\CoursePassing;
use App\Models\Entities\Course\Packet;
use App\Models\Entities\Course\PacketCourse;
use App\Models\Entities\Course\UserPacket;
use App\Services\Common\V1\Support\FileService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends WebBaseController
{

    protected $fileService;

    function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function index() {
        $users = User::orderBy('id', 'desc')->paginate(10);
        $user_web_form = UserWebForm::inputGroups();

        return $this->adminView('pages.users.index', compact('users','user_web_form'));
    }

    public function search(Request $request){
        $search = $request->input('search');
        $user_web_form = UserWebForm::inputGroups();
        $users = User::query()
            ->where('first_name', 'LIKE', "%{$search}%")
            ->orWhere('last_name', 'LIKE', "%{$search}%")
            ->orWhere('phone', 'LIKE', "%{$search}%")
            ->orWhere('email', 'LIKE', "%{$search}%")
            ->orWhere('id', 'LIKE', "%{$search}%")
            ->orderBy('id', 'desc')
            ->paginate(10);

        return $this->adminView('pages.users.index', compact('users','user_web_form'));

    }

    public function edit(Request $request) {
        $user = null;
        if($request->user_id) {
            $user = $this->getUser($request->user_id);
        }
        $user_web_form = UserWebForm::inputGroups($user);
        return $this->adminView('pages.users.update', compact('user', 'user_web_form'));

    }

    public function update(UserWebRequest $request) {
        if($request->id){
            $user= $this->getUser($request->id);
            $unknown_user = User::where('email',$request->email)->first();
            if ($unknown_user) {
                if ($unknown_user->id != $user->id) {
                    throw new WebServiceExplainedException('Пользователь с таким email  существует!');
                }
            }

            $user->last_name = $request->last_name;
            $user->first_name = $request->first_name;
            $user->email = $request->email;
            $user->save();

        }else {
            $request->phone = preg_replace('/[^0-9]/', '', $request->phone);
            $user = new User();
            $user->last_name = $request->last_name;
            $user->first_name = $request->first_name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->role_id = Role::CLIENT_ID;
            $user->image_path = $request->getSchemeAndHttpHost() . "/images/user-default.png";
            $user->discount_percentage = 50;
            $user->balance = 0;
            $user->ref_user_id = null;
            $user->ref_link = md5($request->phone);
            $user->password = bcrypt("123456");
            $user->save();
            $user_packet = new UserPacket();
            $user_packet->packet_id = $request->packet_id;
            $user_packet->user_id = $user->id;
            $packet = Packet::where('id', $request->packet_id)->first();
            if ($packet->expiration_month != 0) {
                $user_packet->due_date = Carbon::now()->addMonths($packet->expiration_month);
            }

            $user_packet->save();

            $packet_courses = PacketCourse::where('packet_id', $request->packet_id)->get();
            foreach ($packet_courses as $pc) {
                $course = Course::where('id', $pc->course_id)->first();
                CoursePassing::create([
                    'course_id' => $pc->course->id,
                    'user_id' => $user->id,
                    'overall_lessons_count' => $course->lessons()->count(),
                    'passed_lessons_count' => 0,
                    'is_passed' => false
                ]);
            }
        }
        $this->edited();

        return redirect()->route('user.index');
    }

//
//    public function delete($id) {
//        $author = $this->getAuthor($id);
//        $this->fileService->remove($author->image_path);
//        $author->delete();
//        $this->deleted();
//        return redirect()->route('author.index');
//    }





    private function getUser($id) {
        $user = User::find($id);
        if(!$user) {
            throw new WebServiceExplainedException('Такого пользователя не существует!');


        }
        return $user;
    }

    public function resetPassword(Request $request){
        $user = $this->getUser($request->user_id);
        $user->password = bcrypt("123456");
        $user->save();
        $this->successOperation();

        return redirect()->route('user.index');

    }




}

