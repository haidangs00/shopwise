<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class CheckAdminLogged
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = 'admin')
    {
        if (Auth::guard($guard)->guest()) {
            return redirect()->route('admins.login');
        } else {
//            $adminLogged = Auth::guard($guard)->user();
//            $request->merge(['adminLogged' => $adminLogged]);
            return $next($request);
        }
    }
}
