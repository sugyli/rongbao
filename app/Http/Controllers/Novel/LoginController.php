<?php

namespace App\Http\Controllers\Novel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Traits\AuthenticatesUsers;
class LoginController extends Controller
{
    use ThrottlesLogins , AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest', [
            'only' => ['webdashubaovlogin','wapdashubaovlogin']
        ]);
    }

    public function verifylogin()
    {

        if($user = Auth::user()){
          return $user->toJson();
          //return response()->cookie('islogin', $user->toJson() , config('app.usercooktime'))->json($user);
        }
        return response()->json('');

    }

    public function webdashubaovlogin(Request $request)
    {
      $redirect_url = $request->redirect_url;
      return view('novel.login',compact('redirect_url'));

    }


    public function webdashubaologin(LoginRequest $request)
    {


      //爆破保护
      if ($this->hasTooManyLoginAttempts($request)) {
          $this->fireLockoutEvent($request);

          return $this->sendLockoutResponse($request);
      }
      /*
      $credentials = [
          'uname'    => $request->only($this->username(), 'password'),
          'password' => $request->input('pass'),//千万注意验证一定要起这个名字
      ];
      */

      // 通过 Auth::attempt() 传入 true 值来开启 '记住我' 功能
      if (Auth::attempt($request->only($this->username(), 'password'),true)) {

          $request->session()->regenerate();

          $this->clearLoginAttempts($request);

        //return $this->authenticated($request, $this->guard()->user())
          //      ?: redirect()->intended(route('users.show', [Auth::user()]));

        //成功后跳转到哪
        if($request->action == 'ajax'){

            return response()->json('ok');
        }

        return $this->authenticated('web.dashubaouserindex');
      }
      if($request->action == 'ajax'){
          return response()->json('');
      }
      //失败后 //登录失败了，就会增加一次登录失败的次数
      $this->incrementLoginAttempts($request);

      return $this->sendFailedLoginResponse($request);
    }


    public function wapdashubaovlogin(Request $request)
    {
      $redirect_url = $request->redirect_url;
      return view('novel.mlogin',compact('request','redirect_url'));

    }


    public function wapdashubaologin(LoginRequest $request)
    {

      //爆破保护
      if ($this->hasTooManyLoginAttempts($request)) {
          $this->fireLockoutEvent($request);

          return $this->sendLockoutResponse($request);
      }
      /*
      $credentials = [
          'uname'    => $request->only($this->username(), 'password'),
          'password' => $request->input('pass'),//千万注意验证一定要起这个名字
      ];
      */

      // 通过 Auth::attempt() 传入 true 值来开启 '记住我' 功能
      if (Auth::attempt($request->only($this->username(), 'password'),true)) {

          $request->session()->regenerate();

          $this->clearLoginAttempts($request);

        //return $this->authenticated($request, $this->guard()->user())
          //      ?: redirect()->intended(route('users.show', [Auth::user()]));

        //成功后跳转到哪
        return $this->authenticated('wap.dashubaouserindex');
      }

      //失败后 //登录失败了，就会增加一次登录失败的次数
      $this->incrementLoginAttempts($request);


      return $this->sendFailedLoginResponse($request);
    }




    public function destroy()
    {
        $redirect_url = request()->redirect_url ?: '/';
        Auth::logout();
        //session()->flash('success', '您已成功退出！');
        return redirect($redirect_url);
    }


}
