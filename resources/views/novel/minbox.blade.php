@extends('novel.layouts.mdefault')
@section('webdashubaotitle')收件箱@endsection
@section('header')
@include('novel.layouts.header',[$request,'title'=>'收件箱'])
@endsection

@section('content')
<div class="shujia">
		<h2>收/发件箱共允许消息数：{{$user->massagemaxcount}}，现有消息数：{{$user->relationInboxs->count()}} 条</h2>
		@if($user->relationInboxs->count() > 0)
    <ul>
      @foreach($user->relationInboxs as $message)
      <li>
        <div class="lf">
          <input type="checkbox" id="checkid[]" name="checkid[]" value="{{$message->messageid}}">
        </div>
        <a href="{{route('wap.dashubaoinboxshow',['id'=>$message->messageid])}}">
          <div class="rt">
              @if($message->isread <= 0)
                <img src="/images/new.gif">
              @endif
               <h3>{{$message->title}}</h3>
               <p>发件人：{{ $message->fromname }}</p>
               <p>日期: {{ $message->postdate }}</p>
               <p>状态:
                  @if($message->isread <= 0)
              <font color="red">未读</font>
                @else
                  已读
                @endif
              </p>
          </div>
        </a>
      </li>
      @endforeach
      <li>
        <div class="lf"><input class="input" type="checkbox" name="checkall" onclick="javascript:checkall();"> 全选</div>
        <input type="button" value="批量删除" class="button" onclick="javascript:delmsg(Config.inboxdestroy_url);" id="bnt">
      </li>
    </ul>

    @endif
</div>

@endsection
