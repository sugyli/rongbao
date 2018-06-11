@extends('novel.layouts.default')
@section('webdashubaotitle')用户注册@endsection
@section('content')
<div class="register">
  <div class="lf">
      <h2>用户注册</h2>
    <dl>
      <dt></dt>
      <form name="formtable" action="{{ route('web.dashubaoregister',[],false) }}{{ !empty($redirect_url)  ? '?redirect_url='.$redirect_url : '' }}" method="post">
        <dd>
          <span class="l">用户名:</span>
          <span class="c">
            <input maxlength="30" autocomplete="off" type="text" name="uname" value="{{ old('uname') }}">
          </span>
          {!! $errors->first('uname', '<span class="r"> :message</span>') !!}
        </dd>
        <dd>
          <span class="l">密码：</span>
          <span class="c">
            <input type="password" name="pass" maxlength="20">
          </span>
          {!! $errors->first('pass', '<span class="r"> :message</span>') !!}
        </dd>
        <dd>
          <span class="l">重复密码：</span>
          <span class="c">
            <input type="password" name="pass_confirmation" >
          </span>
          {!! $errors->first('pass_confirmation', '<span class="r"> :message</span>') !!}
        </dd>
        <dd>
          <span class="l">
            {{ csrf_field() }}
          </span>
          <input type="submit" class="button" onclick="javascript:{this.disabled=true;this.value='提交中...';document.formtable.submit();}" value="立即注册">
        </dd>
      </form>
    </dl>
  </div>

  <div class="rt">
    <dl>
      <dt>用户登陆</dt>
      <dd>已经有账号了？</dd>
      <dd><a href="{{ route('web.dashubaologin',[],false) }}{{ !empty($redirect_url)  ? '?redirect_url='.$redirect_url : '' }}" title="登陆">立即登陆</a></dd>
    </dl>
    <div class="regad">

    </div>
  </div>

</div>

@endsection
