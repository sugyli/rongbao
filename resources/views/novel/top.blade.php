@extends('novel.layouts.default')
@section('webdashubaotitle'){{$leixing}}-{{config('app.webdashubaotitle')}}-{{route('web.dashubaoindex')}}@endsection
@section('webdashubaokeywords'){{$leixing}}@endsection
@section('webdashubaodescription'){{$leixing}}@endsection
@section('content')
<div class="place">当前位置：<a href="/">{{config('app.webdashubaotitle')}}</a> &gt; <h2>{{$leixing}}</h2></div>
@if ($zuixinDatas->count() > 0)
<div class="fengtui">
  @foreach ($zuixinDatas as $zuixinData)
    <dl>
      <a href="{{$zuixinData->webdashubaoinfolink}}">
        <dt>
          <img src="{{$zuixinData->imgflag}}" alt="{{ $zuixinData->articlename }}" onerror="this.src='{{config('app.dfxsfmdir')}}'">
        </dt>
        <dd>
          <h3>{{ $zuixinData->articlename }}</h3>
          <span>{{ $zuixinData->author }}</span>
          <p class="moreline">{{ $zuixinData->intro }}</p>
        </dd>
     </a>
    </dl>
  @endforeach
</div>
@endif

@if ($bookDatas->count() > 0)
<div class="booklist">
  <h1>{{$leixing}}</h1>
  <ul>
     <li class="t">
      <span class="sm">小说名称</span>
      <span class="zj">最新章节</span>
      <span class="zz">作者</span>
      <span class="zs">总推荐</span>
      <span class="sj">更新</span>
      <span class="zt">状态</span>
      <span class="fs">关注</span>
    </li>
    @if($any == 'alltuijian'|| $any == 'weektuijian' || $any == 'monthtuijian')
      @foreach ($bookDatas as $bookData)
      <li>
        <span class="sm"><a href="{{$bookData->relationArticles->webdashubaoinfolink}}"><b>{{ $bookData->relationArticles->articlename }}</b></a></span>
        <span class="zj"><a href="{{ $bookData->relationArticles->webdashubaocontentlink }}">{{ $bookData->relationArticles->lastchapter }}</a></span>
        <span class="zz">{{ $bookData->relationArticles->author }}</span>
        <span class="zs">{{ $bookData->relationArticles->allltuijiancount }}</span>
        <span class="sj">{{ $bookData->relationArticles->updatetime }}</span><span class="zt">{{ $bookData->relationArticles->fullflag }}</span>
        <span class="fs">{{ $bookData->relationArticles->goodnum }}人</span>
      </li>
      @endforeach
   @else
      @foreach ($bookDatas as $bookData)
      <li>
        <span class="sm"><a href="{{$bookData->webdashubaoinfolink}}"><b>{{ $bookData->articlename }}</b></a></span>
        <span class="zj"><a href="{{ $bookData->webdashubaocontentlink }}">{{ $bookData->lastchapter }}</a></span>
        <span class="zz">{{ $bookData->author }}</span>
        <span class="zs">{{ $bookData->allltuijiancount }}</span>
        <span class="sj">{{ $bookData->updatetime }}</span><span class="zt">{{ $bookData->fullflag }}</span>
        <span class="fs">{{ $bookData->goodnum }}人</span>
      </li>
      @endforeach
   @endif
 </ul>
 {{ $bookDatas->links('vendor.pagination.webdashubaopage_top',['any' => $any ,'id'=>$id]) }}
</div>
@endif
<script>webdashubaotongji();</script>
@endsection
