<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class CheckClientLogged
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param string|null  $guard
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = 'web')
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax()) {
                return response()->json(['redirect' => route('clients.login')]);
            }
            return redirect()->route('clients.login');
        } else {
            return $next($request);
        }
    }
}
