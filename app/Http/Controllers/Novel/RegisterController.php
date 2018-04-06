<?php

namespace App\Http\Controllers\Novel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Http\Controllers\Traits\AuthenticatesUsers;
use Auth;

class RegisterController extends Controller
{

    use  AuthenticatesUsers;

    public function __construct()
    {
        //需要验证  如果没有验证 输入此地址会跳转到 用户中心
        $this->middleware('guest', [
            'only' => ['webdashubaovregister','wapdashubaovregister']
        ]);
    }
    public function webdashubaovregister(Request $request){

      $redirect_url = $request->redirect_url;
      return view('novel.register',compact('redirect_url'));
    }



    public function webdashubaoregister(RegisterRequest $request)
    {
      $email = User::createEmail();
      $t = time();
      $user = User::create([
          'uname' => $request->uname,
          'pass' => md5($request->pass),
          'groupid' => 3,
          'regdate' => $t,
          'lastlogin'=> $t,
          'viewemail'=> 1,
          'adminemail'=> 0,
          'email' => $email,
      ]);
      if (!$user) {
          return $this->sendFailedLoginResponse($request,'auth.rfailed');
      }

      Auth::login($user, true); //免登陆
      return $this->authenticated('web.dashubaouserindex');
      //跳转
      //return redirect()->intended(route('web.users', [Auth::user()]));

    }


    public function wapdashubaovregister(Request $request){
      $redirect_url = $request->redirect_url;
      return view('novel.mregister',compact('request','redirect_url'));
    }


    public function wapdashubaoregister(RegisterRequest $request)
    {
      $email = User::createEmail();
      $t = time();
      $user = User::create([
          'uname' => $request->uname,
          'pass' => md5($request->pass),
          'groupid' => 3,
          'regdate' => $t,
          'lastlogin'=> $t,
          'viewemail'=> 1,
          'adminemail'=> 0,
          'email' => $email,
      ]);
      if (!$user) {
          return $this->sendFailedLoginResponse($request,'auth.rfailed');
      }

      Auth::login($user, true); //免登陆
      return $this->authenticated('wap.dashubaouserindex');
      //跳转
      //return redirect()->intended(route('web.users', [Auth::user()]));

    }

}
