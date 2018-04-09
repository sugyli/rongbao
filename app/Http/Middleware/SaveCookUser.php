<?php

namespace App\Http\Middleware;

use Closure;

class SaveCookUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if(\Auth::check()){
          \Cookie::queue('islogin', 1, config('app.usercooktime'), $path = null, $domain = null, $secure = false, $httpOnly = false);
        }
        return $next($request);
    }
}
