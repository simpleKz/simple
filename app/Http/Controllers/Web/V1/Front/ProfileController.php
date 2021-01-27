<?php


namespace App\Http\Controllers\Web\V1\Front;


use App\Http\Controllers\Web\WebBaseController;
use App\Http\Requests\Web\V1\ProfileUpdateWebRequest;
use App\Models\Entities\Core\User;
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

    public function profileUpdate(ProfileUpdateWebRequest $request){

        $user = auth()->user();
        if($request->new_password){
            $user->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'password' => Hash::make($request->new_password)
            ]);
        }else{
            $user->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
            ]);
        }
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
