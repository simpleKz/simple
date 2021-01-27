<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if(strpos($request->route()->getName(), 'admin') !== false) {
                return redirect('/admin/home');
            } else {
                return redirect('/personal-account');
            }
            return redirect('/personal-account');
        }




        return $next($request);
    }
}
