@extends('novel.layouts.default')
@section('webdashubaotitle'){{ $bookData['articlename'] }}全文阅读_{{ $bookData['articlename'] }}最新章节-{{config('app.webdashubaotitle')}}-{{config('app.webdashubaourl')}}@endsection
@section('webdashubaokeywords'){{ $bookData['articlename'] }},小说{{ $bookData['articlename'] }},{{ $bookData['articlename'] }}最新章节,{{ $bookData['articlename'] }}全文阅读@endsection
@section('webdashubaodescription'){{ $bookData['articlename'] }}是由{{ $bookData['author'] }}所写的{{ $bookData['sort']}}类小说，本站提供{{ $bookData['articlename'] }}最新章节观看,{{ $bookData['articlename'] }}全文阅读等服务，如果您发现{{ $bookData['articlename'] }}更新慢了,请第一时间联系{{config('app.webdashubaotitle')}}。@endsection
@section('content')
<script>
try
{
 if(typeof(eval(webjumpwap))=="function")
 {
   var url = "https://{{ str_replace(array('https://','http://'),"",config('app.wap_dashubao_url'))}}{{ route('wap.dashubaoinfo', ['bid' => $bookData['articleid']],false) }}" ;
   webjumpwap(url);
 }
}catch(e)
{
//alert("not function");
}
</script>
<div class="place oneline">
  当前位置：<a href="/">{{config('app.webdashubaotitle')}}</a> &gt; <a href="{{$bookData['sortlink']}}">{{$bookData['sort']}}</a> &gt; {{$bookData['articlename']}}
</div>

<div class="jieshao">
  <div class="lf">
    <img src="{{$bookData['imgflag']}}" alt="{{$bookData['articlename']}}" onerror="this.src='{{config('app.dfxsfmdir')}}'">
  </div>
  <div class="rt">
    <h1 class="oneline">{{$bookData['articlename']}}</h1>
    <div class="msg oneline">
      <em>作者：{{$bookData['author']}} </em>
      <em>状态：{{$bookData['fullflag']}} </em>
      <em>更新时间：{{$bookData['updatetime']}}</em>
      <em>最新章节：<a href="{{ $bookData['webdashubaocontentlink']}}">{{ $bookData['lastchapter']}}</a></em>
    </div>
    <div class="info">
      <a href="#footer" rel="nofollow">直达底部</a>
      <a href="javascript:addbookcase( {{ $bookData['articleid'] }} , 0)" rel="nofollow">加入书架</a>
      <a href="{{route('web.dashubaosendadminmessage',[],false)}}?title={{ $bookData['articlename'] }}_{{ edithttps(request()->url()) }}" target="_blank" rel="nofollow">错误举报</a>投推荐票：
    </div>
    <input type="text" name="uservote_num" id="uservote_num" value="1" maxlength="4" onchange="if(/\D/.test(this.value)){alert('只能输入数字');this.value=1;}">
    <div class="vote">
        <a href="javascript:;" onclick="javascript:tuijian({{$bookData['articleid']}})" rel="nofollow">确定</a>
    </div>
    <div class="intro bestline" style="-webkit-line-clamp: 4;">
      &nbsp;&nbsp;&nbsp;&nbsp;{{$bookData['intro']}}
    </div>
  </div>
  <div class="aside">
    {!!config('app.wangzhangonggao')!!}
  </div>
</div>

<div class="info_ad">

</div>
@if (count($bookData['relation_chapters']) > 0)
<div class="mulu">
  <ul>
    @foreach ($bookData['relation_chapters'] as $chapter)
    <li><a href="{{$chapter['webdashubaocontentlink']}}">{{$chapter['chaptername']}}</a></li>
    @endforeach
  </ul>
</div>
@endif
<script>webdashubaotongji();webdashubaotuisong();</script>
@endsection
