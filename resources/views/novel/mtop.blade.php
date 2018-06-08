@extends('novel.layouts.mdefault')
@section('wapdashubaotitle'){{$leixing}}-{{config('app.wapdashubaotitle')}}-{{route('wap.dashubaoindex')}}@endsection
@section('wapdashubaokeywords'){{$leixing}}@endsection
@section('wapdashubaodescription'){{$leixing}}@endsection
@section('header')
@include('novel.layouts.header',[$request,'title'=>$leixing])
@endsection

@section('content')

@if ($bookDatas->count() > 0)
<div class="cover">
	@if($any == 'alltuijian' || $any == 'weektuijian' || $any == 'monthtuijian' )
		@foreach ($bookDatas as $bookData)
	<div class="block">
		<a href="{{ $bookData->relationArticles->wapdashubaoinfolink }}">
			<div class="block_img">
				<img src="{{$bookData->relationArticles->imgflag}}" alt="{{ $bookData->relationArticles->articlename }}" onerror="this.src='{{config('app.dfxsfmdir')}}'">
			</div>
			<div class="block_txt">
				<h2 class="oneline">{{ $bookData->relationArticles->articlename }}</h2>
				<p class="oneline">
					作者：{{ $bookData->relationArticles->author }}
				</p>
				<p class="oneline">
					时间：{{ $bookData->relationArticles->updatetime }}
				</p>
				<p class="bestmoreline" style="-webkit-line-clamp: 2;">
					    {{ $bookData->relationArticles->intro }}
				</p>
			</div>
		</a>
	</div>
	@endforeach
@else
	@if($bookDatas->count() > 0)
		@foreach ($bookDatas as $bookData)
		<div class="block">
			<a href="{{ $bookData->wapdashubaoinfolink }}">
				<div class="block_img">
					<img src="{{$bookData->imgflag}}" alt="{{ $bookData->articlename }}" onerror="this.src='{{config('app.dfxsfmdir')}}'">
				</div>
				<div class="block_txt">
					<h2 class="oneline">{{ $bookData->articlename }}</h2>
					<p class="oneline">
						作者：{{ $bookData->author }}
					</p>
					<p class="oneline">
						时间：{{ $bookData->updatetime }}
					</p>
					<p class="bestmoreline" style="-webkit-line-clamp: 2;">
						    {{ $bookData->intro }}
					</p>
				</div>
			</a>
		</div>
		@endforeach
	@endif
@endif

	<div class="page">
		@if($page == 1 && $page == $bookDatas->lastPage())

		@elseif($page == 1)
		<a href="javascript:">到头了</a>
		<a href="{{route('wap.dashubaotop',['any'=>$any ,'page'=>($page+1) ])}}">下一页</a>
		<a href="{{route('wap.dashubaotop',['any'=>$any ,'page'=>$bookDatas->lastPage()])}}">尾页</a>
		@elseif($page > 1 && $page < $bookDatas->lastPage())
		<a href="{{route('wap.dashubaotop',['any'=>$any ,'page'=>($page-1) ])}}">上一页</a>
		<a href="{{route('wap.dashubaotop',['any'=>$any ,'page'=>($page+1) ])}}">下一页</a>
		<a href="{{route('wap.dashubaotop',['any'=>$any ,'page'=>$bookDatas->lastPage()])}}">尾页</a>
		@elseif($page >= $bookDatas->lastPage())
		<a href="{{route('wap.dashubaotop',['any'=>$any ,'page'=>1 ])}}">首页</a>
		<a href="{{route('wap.dashubaotop',['any'=>$any ,'page'=>($page+1) ])}}">下一页</a>
		<a href="javascript:">到尾了</a>
		@endif
	</div>
	@if($page == 1 && $page == $bookDatas->lastPage())

	@else
		<div class="page">
			输入页数<input id="pageinput" size="4"><a href="javascript:page();" id="st" class="input">跳转</a>
			<p>
				第{{$page}}/{{$bookDatas->lastPage()}}页
			</p>
		</div>
	@endif

</div>
<script>
function page(){
	var p = document.getElementById("pageinput").value;
	if(isPositiveNum(p))
	{
		if(p > {{$bookDatas->lastPage()}}){
			 p = {{$bookDatas->lastPage()}};
		}

		if(isPositiveNum(p)){window.open("/waptop/"+"{{$any}}"+"/"+p,"_self");}

	}
	function isPositiveNum(s){
    var re = /^[1-9]\d*/ ;
	  return re.test(s)
	}
}
</script>
@endif
@endsection
