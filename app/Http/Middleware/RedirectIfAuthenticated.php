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
        if(Auth::guard('administrator')->check()){
            return redirect('/administrator');
        }else if(Auth::guard('teacher')->check()){
            return redirect('/teacher');
        }else if(Auth::guard('student')->check()){
            return redirect('/student');
        }

        return $next($request);
    }
}
