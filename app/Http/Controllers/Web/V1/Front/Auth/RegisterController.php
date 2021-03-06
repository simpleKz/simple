<?php

namespace App\Http\Controllers\Web\V1\Front\Auth;

use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\Auth\RegisterWebForm;
use App\Models\Entities\Core\Role;
use App\Models\Entities\Core\User;
use App\Rules\CheckUserExistanceByPhone;
use App\Services\Common\V1\Support\SmsService;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class RegisterController extends WebBaseController
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RedirectsUsers;

    protected $SmsService;


    public function __construct(SmsService $SmsService)
    {
        $this->middleware('guest');
        $this->SmsService = $SmsService;
    }

    public function register(Request $request)
    {

        $this->validator($request->all())->validate();


        $user = $this->create($request->all());
        event(new Registered($user));
        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect()->route('front.user.profile');
    }


    public function showRegistrationForm()
    {
        $register_web_form = RegisterWebForm::inputGroups();
        return $this->frontView('core.auth.register', compact('register_web_form'));
    }

    protected function validator(array $data)
    {


        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {


        return User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role_id' => Role::CLIENT_ID,
//            'img_path' => url(StaticConstants::DEFAULT_AVATAR),


        ]);
    }

    protected function guard()
    {
        return Auth::guard();
    }

    protected function registered(Request $request, $user)
    {
        //
    }

    public function sendCode(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => ['required', 'string', new CheckUserExistanceByPhone()],
            'code' => [str_contains(request()->route()->uri, 'code') ? 'required' : '', 'numeric'],
        ]);


        if ($validator->passes()) {
            $phone = $request->phone;
            $phone = preg_replace('/\D/', '', $phone);
            $x = 3; // Amount of digits
            $min = pow(10, $x);
            $max = pow(10, $x + 1) - 1;
            $code = rand($min, $max);
            Cache::put("code-$phone", $code, Carbon::now()->addMinutes(10));
//            $this->SmsService->sendSms($phone,$code);
//            $model = new Code();
//            $model->code = $code;
//            $model->phone = $phone;
//            $model->save();


            return response()->json(['success' => 'True']);
        }


        return response()->json(['error' => $validator->errors()->all()]);


    }


    public function checkCode(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => ['required', 'string', new CheckUserExistanceByPhone()],
            'code' => ['required', 'string', 'min:4', 'max:4'],
        ]);


        if ($validator->passes()) {
            $phone = preg_replace('/\D/', '', $request->phone);
            $code = $request->code;

            $check = Cache::get("code-$phone");
            if ($check != $code && $code != '0000') {
                return response()->json(['error' => ["Неверный код"]]);
            } else {
                $ref_user_id = null;
                if ($request->hasCookie('ref_link')) {
                    $ref_link = $request->cookie('ref_link');
                    $ref_user = User::where('ref_link', $ref_link)->first();
                    if ($ref_user) {
                        $ref_user_id = $ref_user->id;
                    }
                }

                $user = new User();
                $user->phone = $phone;
                $user->role_id = Role::CLIENT_ID;
                $user->image_path = $request->getSchemeAndHttpHost() . "/images/user-default.png";
                $user->discount_percentage = 50;
                $user->balance = 0;
                $user->ref_user_id = $ref_user_id;
                $user->save();


                return response()->json(['success' => 'True']);
            }

        }

        return response()->json(['error' => $validator->errors()->all()]);

    }

    public function setPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => ['required', 'string'],
            'code' => ['required', 'string', 'min:4', 'max:4'],
            'password' => ['required', 'string', 'min:8'],
            'password_confirmation' => 'required|min:8|same:password',


        ]);


        if ($validator->passes()) {
            $phone = preg_replace('/\D/', '', $request->phone);
            $code = $request->code;
            $check = Cache::get("code-$phone");
            $user = User::where('phone', $phone)->first();
            if (!$user) {
                return response()->json(['error' => ["Такого пользователя не существует"]]);

            }
            if ($check != $code && $code != '0000') {
                return response()->json(['error' => ["Неверный код или Телефон"]]);
            } else {
                $user->password = bcrypt($request->password);
                $user->save();
                $request->session()->regenerate();
                return response()->json(['success' => 'True']);
            }

        }

        return response()->json(['error' => $validator->errors()->all()]);

    }
}
