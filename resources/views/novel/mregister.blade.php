@extends('novel.layouts.mdefault')
@section('webdashubaotitle')用户注册@endsection
@section('header')
@include('novel.layouts.header',[$request,'title'=>'用户注册'])
@endsection

@section('content')
<form name="frmregister" action="{{ route('wap.dashubaoregister',[],false) }}{{ !empty($redirect_url)  ? '?redirect_url='.$redirect_url : '' }}" method="post">
    {{ csrf_field() }}
    <div class="login">
      <p>帐号：<input maxlength="30" value="" name="uname" autocomplete="off" onkeypress="javascript: if (event.keyCode==32) return false;" type="text" class="login_name"></p>
      {!! $errors->first('uname', '<p style="color:red;"> :message</p>') !!}
      <p>密码：<input maxlength="20" type="password" name="pass" class="login_name"></p>
      {!! $errors->first('pass', '<p style="color:red;"> :message</p>') !!}
      <p>确认密码：<input maxlength="20" type="password" name="pass_confirmation" class="login_name"></p>
      {!! $errors->first('pass_confirmation', '<p style="color:red;"> :message</p>') !!}
      <input type="submit" class="login_btn" value="注册用户" onclick="javascript:{this.disabled=true;this.value='提交中...';document.frmregister.submit();}">
      <a class="login_btn" href="{{ route('wap.dashubaologin',[],false) }}{{ !empty($redirect_url)  ? '?redirect_url='.$redirect_url : '' }}">已有账号？点击登录</a>
    </div>
  </form>
@endsection
