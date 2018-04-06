@extends('novel.layouts.default')
@section('content')
@if ($weekDatas->count() > 0)
<div class="fengtui">
  @foreach ($weekDatas as $weekData)
    <dl>
      <a href="{{$weekData->relationArticles->webdashubaoinfolink}}">
        <dt>
          <img src="{{$weekData->relationArticles->imgflag}}" alt="{{ $weekData->relationArticles->articlename }}" onerror="this.src='{{config('app.dfxsfmdir')}}'">
        </dt>
        <dd>
          <h3>{{ $weekData->relationArticles->articlename }}</h3>
          <span>{{ $weekData->relationArticles->author }}</span>
          <p class="moreline">{{ $weekData->relationArticles->intro }}</p>
        </dd>
     </a>
    </dl>
  @endforeach
</div>
@endif
<div class="tuijian">
  @if ($allDatas->count() > 0)
  <ul class="l">
    <li class="t">
      <h2><a href="{{ route('web.dashubaotop' ,['any'=>'alltuijian' ,'id'=>0 ,'page' =>1] ) }}">总推荐</a></h2>
    </li>
      @foreach ($allDatas as $allData)
      <li class="oneline"><a href="{{$allData->relationArticles->webdashubaoinfolink}}">{{ $allData->relationArticles->articlename }}</a>/{{ $allData->relationArticles->author }}</li>
      @endforeach
  </ul>
  @endif

  @if ($monthDatas->count() > 0)
  <ul>
    <li class="t">
    <h2><a href="{{ route('web.dashubaotop' ,['any'=>'monthtuijian' ,'id'=>0 ,'page' =>1] ) }}">月推荐</a></h2>
    </li>
    @foreach ($monthDatas as $monthData)
    <li><a href="{{$monthData->relationArticles->webdashubaoinfolink}}">{{ $monthData->relationArticles->articlename }}</a>/{{ $monthData->relationArticles->author }}</li>
    @endforeach
  </ul>
  @endif

  @if ($shouchangDatas->count() > 0)
  <ul>
    <li class="t">
    <h2><a href="{{ route('web.dashubaotop' ,['any'=>'shouchangbang' ,'id'=>0 ,'page' =>1] ) }}">收藏榜</a></h2>
    </li>
    @foreach ($shouchangDatas as $shouchangData)
    <li><a href="{{$shouchangData->webdashubaoinfolink}}">{{ $shouchangData->articlename }}</a>/{{ $shouchangData->author }}</li>
    @endforeach
  </ul>
  @endif

  @if ($wanbenDatas->count() > 0)
  <ul>
    <li class="t">
    <h2><a href="{{ route('web.dashubaotop' ,['any'=>'wanben' ,'id'=>0 ,'page' =>1] ) }}">完本</a></h2>
    </li>
    @foreach ($wanbenDatas as $wanbenData)
    <li><a href="{{$wanbenData->webdashubaoinfolink}}">{{ $wanbenData->articlename }}</a>/{{ $wanbenData->author }}</li>
    @endforeach
  </ul>
  @endif
 </div>

 <div class="main">
     <div class="lastupdate">
       <h2>最新更新</h2>
       <ul>
         <li class="t">
           <span class="lx">类型</span>
           <span class="sm">书名</span>
           <span class="zj">最新章节</span>
           <span class="zz">作者</span>
           <span class="sj">时间</span>
         </li>
         @if ($wanbenDatas->count() > 0)
           @foreach ($zuixinDatas as $zuixinData)
           <li class="oneline">
             <span class="lx">[{{ $zuixinData->sort }}]</span>
             <span class="sm">
               <a href="{{$zuixinData->webdashubaoinfolink}}">{{ $zuixinData->articlename }}</a>
             </span>
             <span class="zj">
               <a href="{{$zuixinData->webdashubaocontentlink}}">{{ $zuixinData->lastchapter }}</a>
             </span>
             <span class="zz">{{ $zuixinData->author }}</span>
             <span class="sj">{{ $zuixinData->updatetime }}</span>
           </li>
           @endforeach
         @endif
       </ul>
     </div>
     <div class="postdate">
       <h2><a href="{{ route('web.dashubaotop' ,['any'=>'xinshu' ,'id'=>0 ,'page' =>1] ) }}">新书入库</a></h2>
       @if ($wanbenDatas->count() > 0)
         <ul>
          @foreach ($newDatas as $newData)
          <li class="oneline">
            <span class="lx">[{{ $newData->sort }}]</span>
            <span class="sm"><a href="{{$newData->webdashubaoinfolink}}">{{ $newData->articlename }}</a></span>
            <span class="zz">{{ $newData->author }}</span>
          </li>
          @endforeach
        </ul>
        @endif
      </div>

   </div>







@endsection