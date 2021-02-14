<?php

namespace App\Http\Controllers\Web\V1\Front\Auth;

use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\Auth\UserLoginWebForm;
use App\Models\Entities\Core\Role;
use App\Providers\RouteServiceProvider;
use App\Rules\IsUser;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class LoginController extends WebBaseController
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::PROFILE;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        session(['url.intended' => url()->previous()]);
        $this->redirectTo = session()->get('url.intended');

        $this->middleware('guest')->except('logout');
    }

    protected function credentials(Request $request)
    {
        return $request->only('phone', 'password');
    }

    protected function validateLogin(Request $request)
    {


            $request->validate([
                'phone' => ['required',  new IsUser()],
                'password' => 'required|string',
            ]);

    }

    protected function attemptLogin(Request $request)
    {
        $value = preg_replace('/\D/', '', $request['phone']);

        if ( Auth::attempt([
                'phone' => $value,
                'password' => $request['password']
            ], $request->has('remember'))) {
            return true;
        }
        return false;

    }


    protected function sendFailedLoginResponse(Request $request)
    {
        if (!($request->phone)) {
            throw ValidationException::withMessages([
                'phone' => [trans('auth.failed')],
            ]);
        } else {
            throw ValidationException::withMessages([
                'phone' => [trans('auth.failed')],
            ]);
        }


    }

    protected function sendLoginResponse(Request $request)
    {

        $request->session()->regenerate();

        $this->clearLoginAttempts($request);


        return ($this->guard()->user()->role_id == Role::ADMIN_ID)
            ? redirect('/admin/home') : redirect('/personal-account');

    }


    public function login(Request $request)
    {

        $this->validateLogin($request);

        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {

            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }


        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    public function showLoginForm()
    {
        $loginInputs = UserLoginWebForm::inputGroups(null);
        if (!session()->has('url.intended')) {

            redirect()->setIntendedUrl(session()->previousUrl());
        }

        return $this->frontView('core.auth.login', compact('loginInputs'));
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect()->route('login');
    }


}
