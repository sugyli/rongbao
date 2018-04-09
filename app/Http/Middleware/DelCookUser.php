<?php

namespace App\Http\Middleware;

use Closure;

class DelCookUser
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

        \Cookie::queue('islogin', 0, config('app.usercooktime'), $path = null, $domain = null, $secure = false, $httpOnly = false);

        return $next($request);
    }
}
