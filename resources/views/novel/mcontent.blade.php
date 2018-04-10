@extends('novel.layouts.mdefault')
@section('wapdashubaotitle'){{$chapter['chaptername']}}_小说{{$bookData['articlename']}}-{{$bookData['author']}}-{{config('app.wapdashubaotitle')}}-{{route('wap.dashubaoindex')}}@endsection
@section('wapdashubaokeywords'){{$chapter['chaptername']}},{{ $bookData['articlename'] }},{{$bookData['author']}}@endsection
@section('wapdashubaodescription'){{$bookData['articlename']}}是由{{$bookData['author']}}所写的{{$bookData['sort']}}类小说， {{$chapter['chaptername']}}是小说{{$bookData['articlename']}}的最新章节。@endsection
@section('header')
@include('novel.layouts.header',[$request,'title'=>$chapter['articlename'] , 'url' => $chapter['wapdashubaoinfolink'] ])
@endsection

@section('content')
<div class="nr_set">
		<a id="waperr" class="set1" href="{{route('wap.dashubaosendadminmessage')}}?from={{ $chapter['articlename'] }}_{{$chapter['chaptername']}}_{{request()->url()}}&redirect_url={{request()->url()}}">
			报错
		</a>
		<div id="lightdiv" class="set1" onclick="nr_setbg('light')">开灯</div>
		<div id="huyandiv" class="set1" onclick="nr_setbg('huyan')">
			护眼
		</div>
		<div id="lightdiv" class="set1" onclick="tuijian({{$chapter['articleid']}})">推荐</div>
		<div class="set2">
			<div id="fontbig2" onclick="nr_setbg('big2')">
				巨
			</div>
			<div id="fontbig" onclick="nr_setbg('big')">
				大
			</div>
			<div id="fontmiddle" onclick="nr_setbg('middle')">
				中
			</div>
			<div id="fontsmall" onclick="nr_setbg('small')">
				小
			</div>
		</div>
		<div class="clear">
		</div>
</div>

<div class="nr_title" id="nr_title">
	{{$chapter['chaptername']}}
</div>

<div class="nr_page">
	<a href="javascript:void(0)" id="pt_shuq" onclick="addbookcase( {{ $chapter['articleid'] }} , {{ $chapter['chapterid'] }})">书签</a>
	@if($previousChapter)
	<a id="pt_prev" href="{{ $previousChapter['wapdashubaocontentlink']}}">上一章</a>
	@else
	<a id="pt_prev" href="javascript:">到头了</a>
	@endif
	<a id="pt_mulu" href="{{ route('wap.dashubaomulu',['bid'=>$chapter['articleid'] ,'id'=>$page ] ) }}">目录</a>
	@if($nextChapter)
	<a id="pt_next" href="{{ $nextChapter['wapdashubaocontentlink']}}">下一章</a>
	@else
	<a id="pt_next" href="javascript:">到尾了</a>
	@endif
	<a id="pt_shuj" href="{{ route('wap.dashubaobookshelfindex') }}?redirect_url={{request()->url()}}">书架</a>
</div>

<div id="nr" class="nr_nr">
		<div id="nr1">
			<font color="red">
				{!!config('app.wapwangzhangonggao')!!}
			</font>
			{!!$content!!}
		</div>
	</div>
<div class="nr_ad"></div>
<div class="nr_page">
	<a href="javascript:void(0)" id="pt_shuq1" onclick="addbookcase( {{ $chapter['articleid'] }} , {{ $chapter['chapterid'] }})">书签</a>
	@if($previousChapter)
	<a id="pt_prev1" href="{{ $previousChapter['wapdashubaocontentlink']}}">上一章</a>
	@else
	<a id="pt_prev1" href="javascript:">到头了</a>
	@endif
	<a id="pt_mulu1" href="{{ route('wap.dashubaomulu',['bid'=>$chapter['articleid'] ,'id'=>$page ] ) }}">目录</a>
	@if($nextChapter)
	<a id="pt_next1" href="{{ $nextChapter['wapdashubaocontentlink']}}">下一章</a>
	@else
	<a id="pt_next1" href="javascript:">到尾了</a>
	@endif
	<a id="pt_shuj1" href="{{ route('wap.dashubaobookshelfindex') }}?redirect_url={{request()->url()}}">书架</a>
</div>
<div class="nr_ad">
<script>read_ad_1()</script>
</div>
<script>
$('body').attr("id", 'nr_body');
getset();
</script>
@endsection
