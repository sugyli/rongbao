<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        return parent::render($request, $exception);
        /*
        if(\Agent::isMobile()){
          $url = $request->redirect_url ?
                      route('wap.dashubaologin') .'?redirect_url=' .$request->redirect_url
                      : route('wap.dashubaologin');


          return redirect()->guest($url);

        }else {
          $url = $request->redirect_url ?
                      route('web.dashubaologin') .'?redirect_url=' .$request->redirect_url
                      : route('web.dashubaologin');


          return redirect()->guest($url);
        }
        */
    }
    //如果点击需要登录的地址 用户没有登录会跳转这
   protected function unauthenticated($request, AuthenticationException $exception)
   {
       if ($request->expectsJson()) {
           return response()->json(['error' => 'Unauthenticated. 没有登录'], 401);
       }
       $redirect_url = $request->redirect_url;
       if(\Agent::isMobile()){
         $url = $request->redirect_url ?
                     route('wap.dashubaologin') .'?redirect_url=' .$request->redirect_url
                     : route('wap.dashubaologin');

       }else {
         $url = $request->redirect_url ?
                     route('web.dashubaologin') .'?redirect_url=' .$request->redirect_url
                     : route('web.dashubaologin');
       }

       return redirect()->guest($url);
   }
}
