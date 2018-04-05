@extends('novel.layouts.default')
@section('webdashubaotitle')用户登录@endsection
@section('content')

<div class="register">
  <div class="lf">
    <h2>用户登陆</h2>
    <dl>
      <form name="formtable" method="post" action="{{ route('web.dashubaologin') }}{{ !empty($redirect_url)  ? '?redirect_url='.$redirect_url : '' }}">
        {{ csrf_field() }}
        <dd>
          <span class="l">用户名:</span>
          <span class="c">
            <input type="text" value="{{ old('uname') }}" autocomplete="off" name="uname" onkeypress="javascript: if (event.keyCode==32) return false;">
          </span>
        </dd>
        {!! $errors->first('uname', '<p style="color:red;padding-left:125px;" class="oneline"> :message</p>') !!}
        <dd>
          <span class="l">密码：</span>
          <span class="c">
            <input type="password" name="password">
          </span>
        </dd>
        {!! $errors->first('password', '<p style="color:red;padding-left:125px;" class="oneline"> :message</p>') !!}
        <dd>
          <span class="l"></span>
          <span>
            <input type="submit" class="button" onclick="javascript:{this.disabled=true;this.value='提交中...';document.formtable.submit();}" value="立即登陆">
          </span>
          <span class="r">
            <a href="javascript:alert('开发中')" title="找回密码">忘记了密码？点此取回密码！</a>
          </span>
        </dd>
      </form>
    </dl>
  </div>

  <div class="rt">
    <dl>
      <dt>用户注册</dt>
      <dd>还没有账号了？</dd>
      <dd>
        <a href="{{ route('web.dashubaoregister') }}{{ !empty($redirect_url)  ? '?redirect_url='.$redirect_url : '' }}" title="注册">立即注册</a>
      </dd>
    </dl>
    <div class="regad"></div>
  </div>
</div>

@endsection
