@extends('novel.layouts.mdefault')
@section('webdashubaotitle')用户登录@endsection
@section('header')
@include('novel.layouts.header',[$request,'title'=>'用户登录'])
@endsection

@section('content')


<form name="frmlogin" action="{{ route('wap.dashubaologin',[],false) }}{{ !empty($redirect_url)  ? '?redirect_url='.$redirect_url : '' }}" method="post" id="frmlogin">
  {{ csrf_field() }}
  <div class="login">
		<p>帐号：<input value="{{ old('uname') }}" name="uname" autocomplete="off" onkeypress="javascript: if (event.keyCode==32) return false;" type="text" class="login_name"></p>
    {!! $errors->first('uname', '<p style="color:red;"> :message</p>') !!}
    <p>密码：<input type="password" name="password" class="login_name"></p>
    {!! $errors->first('password', '<p style="color:red;"> :message</p>') !!}
    <input type="submit" class="login_btn" value="立即登陆" onclick="javascript:{this.disabled=true;this.value='提交中...';document.frmlogin.submit();}">
    <a class="login_btn" href="{{ route('wap.dashubaoregister',[],false) }}{{ !empty($redirect_url)  ? '?redirect_url='.$redirect_url : '' }}">没有账号？点击注册</a>
	</div>
</form>


@endsection
