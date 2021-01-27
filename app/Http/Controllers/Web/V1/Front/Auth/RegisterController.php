<?php

namespace App\Http\Controllers\Web\V1\Front\Auth;

use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\Auth\RegisterWebForm;
use App\Models\Entities\Core\Role;
use App\Models\Entities\Core\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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


    public function __construct()
    {
        $this->middleware('guest');
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
}
