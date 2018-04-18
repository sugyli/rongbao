@extends('novel.layouts.default')
@section('webdashubaotitle'){{$sortname}}-{{config('app.webdashubaotitle')}}-{{route('web.dashubaoindex')}}@endsection
@section('webdashubaokeywords'){{$sortname}}@endsection
@section('webdashubaodescription'){{$sortname}}@endsection
@section('content')
<div class="place">当前位置：<a href="/">{{config('app.webdashubaotitle')}}</a> &gt; <h2>{{$sortname}}</h2></div>
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

@if ($sortDatas->count() > 0)
<div class="booklist">
  <h1>{{$sortname}}</h1>
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
    @foreach ($sortDatas as $sortData)
    <li>
      <span class="sm"><a href="{{$sortData->webdashubaoinfolink}}"><b>{{ $sortData->articlename }}</b></a></span>
      <span class="zj"><a href="{{ $sortData->webdashubaocontentlink }}">{{ $sortData->lastchapter }}</a></span>
      <span class="zz">{{ $sortData->author }}</span>
      <span class="zs">{{ $sortData->allltuijiancount }}</span>
      <span class="sj">{{ $sortData->updatetime }}</span><span class="zt">{{ $sortData->fullflag }}</span>
      <span class="fs">{{ $sortData->goodnum }}人</span>
    </li>
    @endforeach
 </ul>
 {{ $sortDatas->links('vendor.pagination.webdashubaopage',['sid' => $sid ,'id'=>$id]) }}
</div>
@endif
<script>webdashubaotongji();</script>
@endsection
