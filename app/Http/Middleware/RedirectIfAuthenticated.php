<?php

namespace App\Http\Middleware;

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
            //return redirect('/home');

            /*
            if(\Agent::isMobile()){
              return redirect( route('wap.dashubaouserindex') );

            }else {
              return redirect( route('web.dashubaouserindex') );
            }
            */
            $url = request()->url();
            $jump_url = '/';

            $url1=str_replace(array("https://","http://"),"",config('app.web_dashubao_url'));

            if(str_contains($url, $url1)){
              $jump_url = route('web.dashubaouserindex',[], false);
            }

            $url2=str_replace(array("https://","http://"),"",config('app.wap_dashubao_url'));

            if(str_contains($url, $url2)){
              $jump_url = route('wap.dashubaouserindex',[], false);
            }

            return redirect($jump_url);

        }

        return $next($request);
    }
}
