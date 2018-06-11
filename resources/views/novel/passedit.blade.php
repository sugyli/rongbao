@extends('novel.layouts.user')
@section('webdashubaotitle')修改密码@endsection
@section('content_member')
<div class="case_right">
  <div class="case_title">密码修改</div>
  <form name="formtable" action="{{ route('web.dashubaopassedit',[],false) }}" method="post">
    {{ csrf_field() }}
    <div class="msg_left">原密码：</div>
    <div class="msg_right">
      <input type="password" class="input" name="pass" value="{{old('pass')}}">
    </div>
    {!! $errors->first('pass', '<div class="msg_left"></div><div class="msg_right" style="color:red;"> :message</div>') !!}

    <div class="msg_left">新密码：</div>
    <div class="msg_right">
      <input type="password" class="input" name="newpass">
    </div>
    {!! $errors->first('newpass', '<div class="msg_left"></div><div class="msg_right" style="color:red;"> :message</div>') !!}

    <div class="msg_left">重复新密码：</div>
    <div class="msg_right">
      <input type="password" class="input" name="newpass_confirmation">
    </div>
    {!! $errors->first('newpass_confirmation', '<div class="msg_left"></div><div class="msg_right" style="color:red;"> :message</div>') !!}

    <div class="msg_left"></div>
    <div class="msg_right">
      <input type="submit" onclick="javascript:{this.disabled=true;this.value='提交中...';document.formtable.submit();}" class="button" value="保 存">
    </div>
  </form>
</div>

@endsection
