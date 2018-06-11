@extends('novel.layouts.mdefault')
@section('webdashubaotitle')发件箱@endsection
@section('header')
@include('novel.layouts.header',[$request,'title'=>'发件箱'])
@endsection

@section('content')
<div class="shujia">
		<h2>收/发件箱共允许消息数：{{$user->massagemaxcount}}，现有消息数：{{$user->relationOutboxs->count()}} 条</h2>
		@if($user->relationOutboxs->count() > 0)
    <ul>
      @foreach($user->relationOutboxs as $message)
      <li>
        <div class="lf">
          <input type="checkbox" id="checkid[]" name="checkid[]" value="{{$message->messageid}}">
        </div>
        <a href="{{route('wap.dashubaooutboxshow',['id'=>$message->messageid],false)}}">
          <div class="rt">
               <h3>{{$message->title}}</h3>
               <p>收件人：{{ $message->toname }}</p>
               <p>日期: {{ $message->postdate }}</p>
          </div>
        </a>
      </li>
      @endforeach
      <li>
        <div class="lf"><input class="input" type="checkbox" name="checkall" onclick="javascript:checkall();"> 全选</div>
        <input type="button" value="批量删除" class="button" onclick="javascript:delmsg(Config.outboxdestroy_url);" id="bnt">
      </li>
    </ul>

    @endif
</div>

@endsection
