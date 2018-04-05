@extends('novel.layouts.mdefault')
@section('wapdashubaotitle'){{ $bookData['articlename'] }}全文阅读_{{ $bookData['articlename'] }}最新章节-{{config('app.wapdashubaotitle')}}-{{route('wap.dashubaoindex')}}@endsection
@section('wapdashubaokeywords'){{ $bookData['articlename'] }},小说{{ $bookData['articlename'] }},{{ $bookData['articlename'] }}最新章节,{{ $bookData['articlename'] }}全文阅读@endsection
@section('wapdashubaodescription'){{ $bookData['articlename'] }}是由{{ $bookData['author'] }}所写的{{ $bookData['sort']}}类小说，本站提供{{ $bookData['articlename'] }}最新章节观看,{{ $bookData['articlename'] }}全文阅读等服务，如果您发现{{ $bookData['articlename'] }}更新慢了,请第一时间联系{{config('app.wapdashubaotitle')}}。@endsection
@section('header')
@include('novel.layouts.header',[$request,'title'=>$bookData['articlename']])
@endsection

@section('content')
<div class="cover">
	<div class="block">
		<div class="block_img">
			<img src="{{$bookData['imgflag']}}" alt="{{$bookData['articlename']}}" onerror="this.src='{{config('app.dfxsfmdir')}}'">
		</div>
		<div class="block_txt">
      <h2 id="bookname" class="oneline"><a href="/info/68936/">{{$bookData['articlename']}}</a></h2>
			<p class="oneline">
				作者：{{$bookData['author']}}
			</p>
			<p class="oneline">
				分类：{{$bookData['sort']}}
			</p>
			<p class="oneline">
				状态：{{$bookData['fullflag']}}
			</p>
			<p class="oneline">
				更新：{{$bookData['updatetime']}}
			</p>
			<p class="oneline">
				最新：<a href="{{ $bookData['wapdashubaocontentlink']}}">{{ $bookData['lastchapter']}}</a>
			</p>
		</div>
	</div>
	<div class="clear"></div>
  <div id="notice">
      <input type="button" onclick="location.href= '{{ $bookData['minfomululink']}}'" value="开始阅读">
      <input type="button" onclick="shujia(68936)" value="加入书架">
	</div>
	<div class="ablum_read" style="display:none">
		<span class="left"><a href="{{ $bookData['minfomululink']}}">开始阅读</a></span>
		<span><a href="javascript:void(0)" id="shujia" onclick="addbookcase( {{ $bookData['articleid'] }} , 0)">加入书架</a></span>
	</div>
	<div class="ablum_read" style="display:none">
		<span class="left"><a href="javascript:" onclick="tuijian({{$bookData['articleid']}})">推荐本书</a></span>
	</div>

	<div class="intro">
		小说简介
	</div>
	<div class="intro_info">
		&nbsp;&nbsp;&nbsp;&nbsp;{{$bookData['intro']}}
	</div>
	<div class="my-ad"></div>
</div>
	<div class="intro">
		最新章节预览
	</div>
	@if (count($bookData['relation_chapters']) > 0)
	<ul class="chapter" id="chapterlist2" style="display:none">
		@foreach (array_reverse($bookData['relation_chapters']) as $chapter)
		 <li class="oneline"><a href="{{ $chapter['wapdashubaocontentlink']}}">{{$chapter['chaptername']}}<span>{{$chapter['updatetime']}}</span></a></li>
		 @break($loop->iteration >= 9)
		 @endforeach
	</ul>
	@endif
</div>
<script>
$("#notice").hide();
$(".ablum_read").show();
$("#chapterlist2").show();


</script>
@endsection
