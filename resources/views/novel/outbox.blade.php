@extends('novel.layouts.user')
@section('webdashubaotitle')发件箱@endsection
@section('content_member')
<div class="case_right">
<div class="case_title">发件箱（收/发件箱共允许消息数：{{$user->massagemaxcount}}，现有消息数：{{$user->relationOutboxs->count()}} 条) </div>
<ul id='liebiao'>
  <li class="top">
    <span class="fk">
      <input class="input" type="checkbox" name="checkall" onclick="javascript:checkall();"></span>
    </span>
    <span class="wz">收件人</span>
    <span class="bt2">标题</span>
    <span class="wz2">日期</span></li>
    @if($user->relationOutboxs->count() > 0)
      @foreach($user->relationOutboxs as $message)
      <li>
        <span class="fk">
          <input class="input" type="checkbox" name="checkid[]" value="{{$message->messageid}}">
        </span>
        <span class="wz">
          <font color="#FF0000">{{ $message->toname }}</font>
        </span>
        <span class="bt2">
          <a href="{{route('web.dashubaooutboxshow',['id'=>$message->messageid])}}" title="{{$message->title}}">{{$message->title}}</a>
        </span>
        <span class="wz2">{{ $message->postdate }}</span>
      </li>
      @endforeach
    @endif
    <li class="bottom" style="text-align:left;">
      <input type="button" value="批量删除" class="button"  onclick="javascript:delmsg(Config.outboxdestroy_url);" id="bnt">
    </li>
</ul>

</div>

@endsection
