@extends('novel.layouts.mdefault')
@section('wapdashubaotitle'){{ $bookData['articlename'] }}全文阅读_{{ $bookData['articlename'] }}最新章节-{{config('app.wapdashubaotitle')}}-{{config('app.wapdashubaourl')}}@endsection
@section('wapdashubaokeywords'){{ $bookData['articlename'] }},小说{{ $bookData['articlename'] }},{{ $bookData['articlename'] }}最新章节,{{ $bookData['articlename'] }}全文阅读@endsection
@section('wapdashubaodescription'){{ $bookData['articlename'] }}是由{{ $bookData['author'] }}所写的{{ $bookData['sort']}}类小说，本站提供{{ $bookData['articlename'] }}最新章节观看,{{ $bookData['articlename'] }}全文阅读等服务，如果您发现{{ $bookData['articlename'] }}更新慢了,请第一时间联系{{config('app.wapdashubaotitle')}}。@endsection
@section('header')
@include('novel.layouts.header',[$request,'title'=>$bookData['articlename'], 'url' => $bookData['wapdashubaoinfolink'] ])
@endsection

@section('content')
<div class="cover">
	<div class="read">
		<h3 class="oneline">{{$bookData['articlename']}}</h3>
		<span>
			<a href="{{ $bookData['minfomululink']}}">[正序]</a>
		</span>
		<span>
			<a href="{{ $bookData['minfomululink']}}_1">[倒序]</a>
	  </span>
	</div>
	<ul class="chapter">
		@foreach ($bookData['relation_chapters'] as $chapter)
		<li class="oneline">
			<a href="{{$chapter['wapdashubaocontentlink']}}">{{$chapter['chaptername']}}<span></span></a>
		</li>
		@endforeach
	</ul>
</div>

<div class="page">


	@if($page == 1 && $page == $pagenum)

	@elseif(empty($sort) && $page == 1)
		<a href="javascript:">到头了</a>
		<a href="{{route('wap.dashubaomulu',['bid'=>$bookData['articleid'] ,'page'=>($page+1)],false)}}">下一页</a>
		<a href="{{route('wap.dashubaomulu',['bid'=>$bookData['articleid'] ,'page'=>$pagenum],false)}}">尾页</a>
	@elseif(empty($sort) && $page > 1 && $page < $pagenum)
		<a href="{{ $bookData['minfomululink']}} ">首页</a>
		<a href="{{route('wap.dashubaomulu',['bid'=>$bookData['articleid'] ,'page'=>($page-1)] ,false)}}">上一页</a>
		<a href="{{route('wap.dashubaomulu',['bid'=>$bookData['articleid'] ,'page'=>($page+1)] ,false)}}">下一页</a>
		<a href="{{route('wap.dashubaomulu',['bid'=>$bookData['articleid'] ,'page'=>$pagenum] ,false)}}">尾页</a>
  @elseif(empty($sort) && $page >= $pagenum)
	  <a href="{{ $bookData['minfomululink']}} ">首页</a>
    <a href="{{route('wap.dashubaomulu',['bid'=>$bookData['articleid'] ,'page'=>($page-1)],false)}}">上一页</a>
		<a href="javascript:">到尾了</a>
	@elseif($sort && $page == 1)
		<a href="javascript:">到头了</a>
		<a href="{{route('wap.dashubaomulu1',['bid'=>$bookData['articleid'] ,'page'=>($page+1) , 'zid'=>1 ] ,false)}}">下一页</a>
		<a href="{{route('wap.dashubaomulu1',['bid'=>$bookData['articleid'] ,'page'=>$pagenum , 'zid'=>1 ] ,false)}}">尾页</a>
	@elseif($sort && $page > 1 && $page < $pagenum)
		<a href="{{route('wap.dashubaomulu1',['bid'=>$bookData['articleid'] ,'page'=>1 , 'zid'=>1 ] ,false)}}">首页</a>
		<a href="{{route('wap.dashubaomulu1',['bid'=>$bookData['articleid'] ,'page'=>($page-1) , 'zid'=>1 ] ,false)}}">上一页</a>
		<a href="{{route('wap.dashubaomulu1',['bid'=>$bookData['articleid'] ,'page'=>($page+1) , 'zid'=>1 ] ,false)}}">下一页</a>
		<a href="{{route('wap.dashubaomulu1',['bid'=>$bookData['articleid'] ,'page'=>$pagenum, 'zid'=>1  ] ,false)}}">尾页</a>
	@elseif($sort && $page >= $pagenum)
		<a href="{{route('wap.dashubaomulu1',['bid'=>$bookData['articleid'] ,'page'=>1 , 'zid'=>1 ],false)}}">首页</a>
		<a href="{{route('wap.dashubaomulu1',['bid'=>$bookData['articleid'] ,'page'=>($page-1) , 'zid'=>1 ] ,false)}}">上一页</a>
		<a href="javascript:">到尾了</a>
	@endif
</div>

@if($page == 1 && $page == $pagenum)

@else
	<div class="page">
		输入页数<input id="pageinput" size="4"><a href="javascript:page();" id="st" class="input">跳转</a>
		<p>
			(第{{$page}}/{{$pagenum}}页)当前{{config('app.wapmululiebiao')}}条/页
		</p>
	</div>
@endif

<script>
function page(){
	var p = document.getElementById("pageinput").value;
	var isdx ='';
	@if($sort)
		isdx = "{{$sort}}";
	@endif
	if(isPositiveNum(p))
	{
		if(p > {{$pagenum}}){
			 p = {{$pagenum}};
		}
		if (isdx) {
			  if(isPositiveNum(p)){window.open("/bookmulu-{{$bookData['articleid']}}_"+p+"_1","_self");}
		}else{
				if(isPositiveNum(p)){window.open("/bookmulu-"+{{$bookData['articleid']}}+"_"+p,"_self");}
		}

	}
	function isPositiveNum(s){
    var re = /^[1-9]\d*/ ;
	  return re.test(s)
	}
}
wapdashubaotongji();
webdashubaotuisong();
</script>

@endsection
