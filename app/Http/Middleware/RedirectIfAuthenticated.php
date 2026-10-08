<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        // foreach ($guards as $guard) {
        // if (Auth::guard($guard)->check()) {
        //     if (Auth::guard('admin')->check()) {
        //         return redirect('/admin');
        //     }
        //         return redirect(RouteServiceProvider::HOME);
        //     }
        // }
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if ($guard === 'admin') {
                    return redirect('/admin/'); // admin already logged in
                } elseif ($guard === 'web') {
                    return redirect(RouteServiceProvider::HOME); // normal user logged in
                }
            }
        }

        return $next($request);
    
    }
}