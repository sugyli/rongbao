@extends('novel.layouts.mdefault')
@section('webdashubaotitle')密码修改@endsection
@section('header')
@include('novel.layouts.header',[$request,'title'=>'密码修改'])
@endsection

@section('content')
<form name="frmregister" action="{{ route('wap.dashubaopassedit') }}" method="post">
    {{ csrf_field() }}
    <div class="login">
      <p>原密码：<input maxlength="30" name="pass" value="{{old('pass')}}" autocomplete="off" onkeypress="javascript: if (event.keyCode==32) return false;" type="password" class="login_name"></p>
      {!! $errors->first('pass', '<p style="color:red;"> :message</p>') !!}
      <p>新密码：<input maxlength="30" type="password" name="newpass" class="login_name"></p>
      {!! $errors->first('newpass', '<p style="color:red;"> :message</p>') !!}
      <p>重复新密码：<input maxlength="30" type="password" name="newpass_confirmation" class="login_name"></p>
      {!! $errors->first('newpass_confirmation', '<p style="color:red;"> :message</p>') !!}
      <input type="submit" class="login_btn" value="保存修改" onclick="javascript:{this.disabled=true;this.value='提交中...';document.frmregister.submit();}">
    </div>
  </form>
@endsection
