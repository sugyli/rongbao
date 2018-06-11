@extends('novel.layouts.mdefault')
@section('wapdashubaotitle'){{$sortname}}-{{config('app.wapdashubaotitle')}}-{{config('app.wapdashubaourl')}}@endsection
@section('wapdashubaokeywords'){{$sortname}}@endsection
@section('wapdashubaodescription'){{$sortname}}@endsection
@section('header')
@include('novel.layouts.header',[$request,'title'=>$sortname])
@endsection

@section('content')
@include('novel.layouts.msort',[$sid])
@if ($sortDatas->count() > 0)
<div class="cover">
	@foreach ($sortDatas as $sortData)
	<div class="block">
		<a href="{{ $sortData->wapdashubaoinfolink }}">
			<div class="block_img">
				<img src="{{$sortData->imgflag}}" alt="{{ $sortData->articlename }}" onerror="this.src='{{config('app.dfxsfmdir')}}'">
			</div>
			<div class="block_txt">
				<h2 class="oneline">{{ $sortData->articlename }}</h2>
				<p class="oneline">
					作者：{{ $sortData->author }}
				</p>
				<p class="oneline">
					时间：{{ $sortData->updatetime }}
				</p>
				<p class="bestmoreline" style="-webkit-line-clamp: 2;">
					    {{ $sortData->intro }}
				</p>
			</div>
		</a>
	</div>
	@endforeach

	<div class="page">
		@if($sortDatas->currentPage() == 1 && $sortDatas->currentPage() == $sortDatas->lastPage())

		@elseif($sortDatas->currentPage() == 1)
		<a href="javascript:">到头了</a>
		<a href="{{route('wap.dashubaosort',['sid'=>$sid ,'page'=>($sortDatas->currentPage()+1) ],false)}}">下一页</a>
		<a href="{{route('wap.dashubaosort',['sid'=>$sid ,'page'=>$sortDatas->lastPage()],false)}}">尾页</a>
		@elseif($sortDatas->currentPage() > 1 && $sortDatas->currentPage() < $sortDatas->lastPage())
		<a href="{{route('wap.dashubaosort',['sid'=>$sid ,'page'=>($sortDatas->currentPage()-1) ],false)}}">上一页</a>
		<a href="{{route('wap.dashubaosort',['sid'=>$sid ,'page'=>($sortDatas->currentPage()+1) ],false)}}">下一页</a>
		<a href="{{route('wap.dashubaosort',['sid'=>$sid ,'page'=>$sortDatas->lastPage()],false)}}">尾页</a>
		@elseif($sortDatas->currentPage() >= $sortDatas->lastPage())
		<a href="{{route('wap.dashubaosort',['sid'=>$sid ,'page'=>1 ],false)}}">首页</a>
		<a href="{{route('wap.dashubaosort',['sid'=>$sid ,'page'=>($sortDatas->currentPage()+1) ],false)}}">下一页</a>
		<a href="javascript:">到尾了</a>
		@endif
	</div>
	@if($sortDatas->currentPage() == 1 && $sortDatas->currentPage() == $sortDatas->lastPage())

	@else
	<div class="page">
		输入页数<input id="pageinput" size="4"><a href="javascript:page();" id="st" class="input">跳转</a>
		<p>
			第{{$sortDatas->currentPage()}}/{{$sortDatas->lastPage()}}页
		</p>
	</div>
	@endif
</div>
<script>
function page(){
	var p = document.getElementById("pageinput").value;
	if(isPositiveNum(p))
	{
		if(p > {{$sortDatas->lastPage()}}){
			 p = {{$sortDatas->lastPage()}};
		}

		if(isPositiveNum(p)){window.open("/wapsort/"+"{{$sid}}"+"/"+p,"_self");}

	}
	function isPositiveNum(s){
    var re = /^[1-9]\d*/ ;
	  return re.test(s)
	}
}
</script>
@endif
@endsection
