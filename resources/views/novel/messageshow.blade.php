@extends('novel.layouts.user')
@section('wapdashubaotitle')我的消息@endsection
@section('content_member')

<div class="case_right">
  @if(isset($messageData))
  <div class="case_title oneline">标题：{{$messageData->title}}</div>
  <div class="msg_left">发送人：</div>
  <div class="msg_right"><font color="#FF0000">{{$messageData->fromname}}</font></div>
  <div class="msg_left">接收人：</div>
  <div class="msg_right">{{$messageData->toname}}</div>
  <div class="msg_left">时间：</div>
  <div class="msg_right">{{ $messageData->postdate }}</div>
  <div class="msg_left">内容：</div>
  <div class="msg_right3">{!! $messageData->content !!}</div>
  @endif

  @if($isfajian >0 )
  <div class="msg_left">收件人：</div>
  <div class="msg_right">
    <font color="#FF0000">{{ $messageData->fromname ?? '网站管理员'}}</font>
  </div>
  <div class="msg_left">标题：</div>
  <div class="msg_right">
    <input type="text" class="input" name="title" id="title" value="@if( isset($messageData->title) ){{'Re:'.$messageData->title}}@else{{ $from ?? ''}}@endif">
  </div>
  <div class="msg_left">内容：</div>
  <div class="msg_right2">
    <textarea class="textarea" name="content" id="content"></textarea>
    <input type="button" class="button" id="bnt" value="回复消息" onclick="javascript:sendmsg('{{$from ?? '' }}','{{$redirect_url ?? '' }}');">
  </div>
  @endif
</div>
@endsection
