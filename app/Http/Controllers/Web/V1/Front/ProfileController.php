<?php


namespace App\Http\Controllers\Web\V1\Front;


use App\Exceptions\WebServiceErroredException;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Requests\Web\V1\ProfileUpdateWebRequest;
use App\Models\Entities\Core\User;
use App\Models\Entities\Course\Course;
use App\Models\Entities\Course\CoursePassing;
use App\Models\Entities\Course\UserPacket;
use App\Models\Entities\UserCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends WebBaseController
{
    public function profile() {
        $user = auth()->user();
        $card = UserCard::where('user_id',$user->id)->first();
        $withdrawal_card = null;
        if($user->withdrawal_card_id){
            $withdrawal_card = UserCard::where('id',$user->withdrawal_card_id)->select(['type','last_four','id'])->first();
        }
        $user->card = $card;
        $user->withdrawal_card = $withdrawal_card;
        return json_encode(['user' => $user]);
    }

    public function myCourses(){
        $user = auth()->user();
        $user_packets  = UserPacket::with(['packet.course','packet.packetCourses'])->where('user_id',$user->id)->get();

        $active = [];
        $completed =[];
        foreach ($user_packets as $us){
            foreach ($us->packet->packetCourses as $course){
                $course_passing_active = CoursePassing::where('user_id',$user->id)
                    ->where('course_id',$course->course_id)
                    ->where('is_passed', false)
                    ->with('course')->first();
                if($course_passing_active){
                    $course_passing_active->main_course_name = $us->packet->course->name;
                    array_push($active,$course_passing_active);
                }
                $course_passing_completed = CoursePassing::where('user_id',$user->id)
                    ->where('course_id',$course->course_id)
                    ->where('is_passed', true)
                    ->with('course')->first();
                if($course_passing_completed){
                    $course_passing_completed->main_course_name = $us->packet->course->name;
                    array_push($completed,$course_passing_completed);
                }
            }

        }
//        $active = CoursePassing::where('user_id',$user->id)->where('is_passed', false)->with('course')->get();
//        $completed = CoursePassing::where('user_id',$user->id)->where('is_passed', true)->with('course')->get();
        return json_encode(['active_courses' => $active ,'completed_courses' => $completed ]);
    }

    public function profileUpdate(ProfileUpdateWebRequest $request){

        $user = auth()->user();
        if($request->email){
            $unknown_user = User::where('email',$request->email)->first();
            if ($unknown_user){
                if($unknown_user->id != $user->id){
                    return json_encode(['success' => false]);
                }

            }
            $user->email = $request->email;
        }
        if($request->new_password) {
            $user->password = Hash::make($request->new_password);
        }

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->save();

        return json_encode(['success' => true]);

    }

    public function makeCardWithdrawal(Request $request){
        $user = auth()->user();
        $card = UserCard::findorFail($request->id);
        if($card->user_id == $user->id){
            $user->update(['withdrawal_card_id' => $card->id]);
        }
        return json_encode(['success' => true]);
    }

    public function createRefLink(Request $request){
        $user = auth()->user();
        $link = "Simple.com/ref?".$request->link;
        $user->update(['ref_link' => $link]);

        return json_encode(['success' => true]);
    }

}
