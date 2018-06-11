@extends('novel.layouts.user')
@section('webdashubaotitle')发件箱@endsection
@section('content_member')
<div class="case_right">
<div class="case_title">发件箱（收/发件箱共允许消息数：{{$user->massagemaxcount}}，现有消息数：{{$user->relationInboxs->count()}} 条) </div>
<ul id='liebiao'>
  <li class="top">
      <span class="fk">
        <input class="input" type="checkbox" name="checkall" onclick="javascript:checkall();"></span>
      </span>
      <span class="wz">发件人</span>
      <span class="bt">标题</span>
      <span class="wz">日期</span>
      <span class="sc">状态</span></li>
    @if($user->relationInboxs->count() > 0)
      @foreach($user->relationInboxs as $message)
      <li>
        <span class="fk">
          <input class="input" type="checkbox" name="checkid[]" value="{{$message->messageid}}">
        </span>
        <span class="wz">
          <font color="#FF0000">{{ $message->fromname }}</font>
        </span>
        <span class="bt">
          <a href="{{route('web.dashubaoinboxshow',['id'=>$message->messageid],false)}}" title="{{$message->title}}">{{$message->title}}</a>
        </span>
        <span class="wz">{{ $message->postdate }}</span>
        <span class="sc">
          @if($message->isread <= 0)
              <font color="red">未读</font>
          @else
              已读
          @endif
        </span>
      </li>
      @endforeach
    @endif
    <li class="bottom" style="text-align:left;">
      <input type="button" value="批量删除" class="button"  onclick="javascript:delmsg(Config.inboxdestroy_url);" id="bnt">
    </li>
</ul>


</div>
@endsection
