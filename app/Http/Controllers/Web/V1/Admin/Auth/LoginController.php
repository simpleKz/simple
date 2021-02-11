<?php

namespace App\Http\Controllers\Web\V1\Admin\Auth;


use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\WebBaseController;
use App\Http\Forms\Web\V1\Auth\LoginWebForm;
use App\Providers\RouteServiceProvider;
use App\Rules\IsAdmin;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LoginController extends WebBaseController
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::ADMIN_HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function validateLogin(Request $request)
    {

        $request->validate([
//            $this->username() => ['required','string'],
            'email' => ['required', 'string', new IsAdmin()],
            'password' => ['required','string'],
        ]);

    }

    public function showLoginForm()
    {
        $loginInputs = LoginWebForm::inputGroups(null);
        return $this->adminView('core.auth.login', compact('loginInputs'));
    }



//    public function logout(Request $request)
//    {
//        $this->guard()->logout();
//
//        $request->session()->invalidate();
//
//        $request->session()->regenerateToken();
//
//        if ($response = $this->loggedOut($request)) {
//            return $response;
//        }
//
//        return $request->wantsJson()
//            ? new JsonResponse([], 204)
//            : redirect()->route('course.index');
//    }
}
