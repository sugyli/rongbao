<?php

namespace App\Http\Controllers\Traits;
use Illuminate\Http\Request;
trait AuthenticatesUsers
{

  public function username()
  {
      return 'uname';
  }

  /**
   * The user has been authenticated.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  mixed  $user
   * @return mixed
   */
  public function authenticated($d)
  {
    //$backUrl = route('member.show', [Auth::user()]);
    //$redirect_url = \Request::query('redirect_url');
    $redirect_url = request()->redirect_url ?: route($d,[],false);
    SaveCookUser();
    //$redirect_url = request()->input('redirect_url',$backUrl);
    return redirect($redirect_url);
  }

  public function getSubmitAddress()
  {
    //$redirect_url = request()->input('redirect_url');
    //$redirect_url = \Request::query('redirect_url');
    $loginUrl = route('mnovels.login',[],false);
    $registerUrl = route('mnovels.register',[],false);
    //$passwordUrl = route('novel.password');
    $redirect_url = request()->redirect_url;

    $loginUrl1=str_replace(array("https://","http://"),"",$loginUrl);
    $registerUrl1=str_replace(array("https://","http://"),"",$registerUrl);
    if (str_contains( $redirect_url , $loginUrl1 ) || str_contains($redirect_url ,$registerUrl1) ) {
        $redirect_url = null;
    }

    $loginSubmitAddress = $redirect_url ? $loginUrl.'?redirect_url='.$redirect_url : $loginUrl;
    $registerSubmitAddress = $redirect_url ? $registerUrl.'?redirect_url='.$redirect_url : $registerUrl;
    //$passwordSubmitAddress = $redirect_url ? $passwordUrl.'?redirect_url='.$redirect_url : $passwordUrl;

    return compact('loginSubmitAddress','registerSubmitAddress' ,'redirect_url');
  }

  /**
   * Get the failed login response instance.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\RedirectResponse
   */
  public function sendFailedLoginResponse(Request $request ,$msg = 'auth.failed')
  {
      $errors = [$this->username() => trans($msg)];

      if ($request->expectsJson()) {
          return response()->json($errors, 422);
      }

      return redirect()->back()
                      ->withInput($request->only($this->username(), 'remember'))
                      ->withErrors($errors);
  }


}
