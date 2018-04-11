@extends('novel.layouts.mdefault')
@section('wapdashubaotitle')消息内容@endsection
@section('header')
@include('novel.layouts.header',[$request,'title'=>'我的消息'])
@endsection

@section('content')
<style>

.input {
    height: 25px;
    line-height: 25px;
    margin-top: 8px;
    width: 300px;
    border: #dee1e6 1px solid;
    padding-left: 5px;
}
.textarea {
    margin-top: 8px;
    width: 450px;
    height: 120px;
    border: #dee1e6 1px solid;
    padding-left: 5px;
    line-height: 20px;
}

</style>
<div class="shujia">
	@if(isset($messageData))
	<h3>{{$messageData->title}}</h3>
	<p>
		发件人：{{$messageData->fromname}}
	</p>
	<p>
		收件人：{{$messageData->toname}}
	</p>
	<p>
		时间：{{ $messageData->postdate }}
	</p>
	<p>
		&nbsp;&nbsp;&nbsp;&nbsp;{!! $messageData->content !!}
	</p>
	 @endif
	 @if($isfajian >0 )
	<h2 style="border-top: 1px dashed #ddd;">{{ isset($messageData->fromname) ? '快速回复' :'举报错误'}} </h2>
	<p>
		<input type="text" class="input" name="title" id="title" value="@if( isset($messageData->title) ){{'Re:'.$messageData->title}}@else{{ $title ?? ''}}@endif">
	</p>
	<p>
		<textarea class="textarea" name="content" id="content"></textarea>
	</p>
	<input type="button" class="button" id="bnt" value="回复消息" onclick="javascript:sendmsg('{{$redirect_url ?? '' }}');">
	@endif
</div>



@endsection
