@extends('novel.layouts.mdefault')
@section('header')
@include('novel.layouts.header',[$request])
@endsection

@section('content')
<div class="article">
  <h2><span><a href="{{ route('wap.dashubaotop' ,['any'=>'xinshu','spage'=>1]) }}">新书</a></span><a href="{{ route('wap.dashubaotop' ,['any'=>'xinshu','spage'=>1]) }}">更多...</a></h2>
    @if ($newDatas->count() > 0)
      <div class="block">
        @foreach ($newDatas as $newData)
        <a href="{{ $newData->wapdashubaoinfolink }}">
          <div class="block_img">
              <img src="{{$newData->imgflag}}" alt="{{ $newData->articlename }}" onerror="this.src='{{config('app.dfxsfmdir')}}'">
          </div>
          <div class="block_txt">
            <h3 class="oneline">{{ $newData->articlename }}</h3>
            <p class="oneline">作者：{{ $newData->author }}</p>
            <p class="bestmoreline" style="-webkit-line-clamp: 3;">{{ $newData->intro }}</p>
          </div>
        </a>
        @break($loop->iteration >= 1)
        @endforeach
        <div class="clear"></div>
           <ul>
             @foreach ($newDatas as $newData)
               @continue($loop->iteration <=1)
               <li class="oneline">
                 [{{ $newData->sort }}]
                 <a href="{{ $newData->wapdashubaoinfolink }}" class="blue">{{ $newData->articlename }}</a> / {{ $newData->author }}
               </li>
             @endforeach
            </ul>
       </div>
    @endif
</div>

<div class="article">
  <h2><span><a href="{{ route('wap.dashubaotop' ,['any'=>'weektuijian','spage'=>1]) }}">周荐榜</a></span><a href="{{ route('wap.dashubaotop' ,['any'=>'weektuijian','spage'=>1]) }}">更多...</a></h2>
    @if ($weekDatas->count() > 0)
      <div class="block">
        @foreach ($weekDatas as $weekData)
        <a href="{{ $newData->wapdashubaoinfolink }}">
          <div class="block_img">
              <img src="{{$weekData->relationArticles->imgflag}}" alt="{{ $weekData->relationArticles->articlename }}" onerror="this.src='{{config('app.dfxsfmdir')}}'">
          </div>
          <div class="block_txt">
            <h3 class="oneline">{{ $weekData->relationArticles->articlename }}</h3>
            <p class="oneline">作者：{{ $weekData->relationArticles->author }}</p>
            <p class="bestmoreline" style="-webkit-line-clamp: 3;">{{ $weekData->relationArticles->intro }}</p>
          </div>
        </a>
        @break($loop->iteration >= 1)
        @endforeach
        <div class="clear"></div>
           <ul>
             @foreach ($weekDatas as $weekData)
               @continue($loop->iteration <=1)
               <li class="oneline">
                 [{{ $weekData->relationArticles->sort }}]
                 <a href="{{ $weekData->wapdashubaoinfolink }}" class="blue">{{ $weekData->relationArticles->articlename }}</a> / {{ $weekData->relationArticles->author }}
               </li>
             @endforeach
            </ul>
       </div>
    @endif
</div>

<div class="article">
  <h2><span><a href="{{ route('wap.dashubaotop' ,['any'=>'monthtuijian','spage'=>1]) }}">月荐榜</a></span><a href="{{ route('wap.dashubaotop' ,['any'=>'monthtuijian','spage'=>1]) }}">更多...</a></h2>
    @if ($monthDatas->count() > 0)
      <div class="block">
        @foreach ($monthDatas as $monthData)
        <a href="{{ $newData->wapdashubaoinfolink }}">
          <div class="block_img">
              <img src="{{$monthData->relationArticles->imgflag}}" alt="{{ $monthData->relationArticles->articlename }}" onerror="this.src='{{config('app.dfxsfmdir')}}'">
          </div>
          <div class="block_txt">
            <h3 class="oneline">{{ $monthData->relationArticles->articlename }}</h3>
            <p class="oneline">作者：{{ $monthData->relationArticles->author }}</p>
            <p class="bestmoreline" style="-webkit-line-clamp: 3;">{{ $monthData->relationArticles->intro }}</p>
          </div>
        </a>
        @break($loop->iteration >= 1)
        @endforeach
        <div class="clear"></div>
           <ul>
             @foreach ($monthDatas as $monthData)
               @continue($loop->iteration <=1)
               <li class="oneline">
                 [{{ $monthData->relationArticles->sort }}]
                 <a href="{{ $monthData->wapdashubaoinfolink }}" class="blue">{{ $monthData->relationArticles->articlename }}</a> / {{ $monthData->relationArticles->author }}
               </li>
             @endforeach
            </ul>
       </div>
    @endif
</div>

<div class="article">
  <h2><span><a href="{{ route('wap.dashubaotop' ,['any'=>'alltuijian','spage'=>1]) }}">总荐榜</a></span><a href="{{ route('wap.dashubaotop' ,['any'=>'alltuijian','spage'=>1]) }}">更多...</a></h2>
    @if ($allDatas->count() > 0)
      <div class="block">
        @foreach ($allDatas as $allData)
        <a href="{{ $newData->wapdashubaoinfolink }}">
          <div class="block_img">
              <img src="{{$allData->relationArticles->imgflag}}" alt="{{ $allData->relationArticles->articlename }}" onerror="this.src='{{config('app.dfxsfmdir')}}'">
          </div>
          <div class="block_txt">
            <h3 class="oneline">{{ $allData->relationArticles->articlename }}</h3>
            <p class="oneline">作者：{{ $allData->relationArticles->author }}</p>
            <p class="bestmoreline" style="-webkit-line-clamp: 3;">{{ $allData->relationArticles->intro }}</p>
          </div>
        </a>
        @break($loop->iteration >= 1)
        @endforeach
        <div class="clear"></div>
           <ul>
             @foreach ($allDatas as $allData)
               @continue($loop->iteration <=1)
               <li class="oneline">
                 [{{ $allData->relationArticles->sort }}]
                 <a href="{{ $allData->wapdashubaoinfolink }}" class="blue">{{ $allData->relationArticles->articlename }}</a> / {{ $allData->relationArticles->author }}
               </li>
             @endforeach
            </ul>
       </div>
    @endif
</div>

<div class="article">
  <h2><span><a href="{{ route('wap.dashubaotop' ,['any'=>'shouchangbang','spage'=>1]) }}">收藏榜</a></span><a href="{{ route('wap.dashubaotop' ,['any'=>'shouchangbang','spage'=>1]) }}">更多...</a></h2>
    @if ($shouchangDatas->count() > 0)
      <div class="block">
        @foreach ($shouchangDatas as $shouchangData)
        <a href="{{ $newData->wapdashubaoinfolink }}">
          <div class="block_img">
              <img src="{{$shouchangData->imgflag}}" alt="{{ $shouchangData->articlename }}" onerror="this.src='{{config('app.dfxsfmdir')}}'">
          </div>
          <div class="block_txt">
            <h3 class="oneline">{{ $shouchangData->articlename }}</h3>
            <p class="oneline">作者：{{ $shouchangData->author }}</p>
            <p class="bestmoreline" style="-webkit-line-clamp: 3;">{{ $shouchangData->intro }}</p>
          </div>
        </a>
        @break($loop->iteration >= 1)
        @endforeach
        <div class="clear"></div>
           <ul>
             @foreach ($shouchangDatas as $shouchangData)
               @continue($loop->iteration <=1)
               <li class="oneline">
                 [{{ $shouchangData->sort }}]
                 <a href="{{ $shouchangData->wapdashubaoinfolink }}" class="blue">{{ $shouchangData->articlename }}</a> / {{ $shouchangData->author }}
               </li>
             @endforeach
            </ul>
       </div>
    @endif
</div>

<div class="article">
  <h2><span><a href="{{ route('wap.dashubaotop' ,['any'=>'wanben','spage'=>1]) }}">完本</a></span><a href="{{ route('wap.dashubaotop' ,['any'=>'wanben','spage'=>1]) }}">更多...</a></h2>
    @if ($wanbenDatas->count() > 0)
      <div class="block">
        @foreach ($wanbenDatas as $wanbenData)
        <a href="{{ $newData->wapdashubaoinfolink }}">
          <div class="block_img">
              <img src="{{$wanbenData->imgflag}}" alt="{{ $wanbenData->articlename }}" onerror="this.src='{{config('app.dfxsfmdir')}}'">
          </div>
          <div class="block_txt">
            <h3 class="oneline">{{ $wanbenData->articlename }}</h3>
            <p class="oneline">作者：{{ $wanbenData->author }}</p>
            <p class="bestmoreline" style="-webkit-line-clamp: 3;">{{ $wanbenData->intro }}</p>
          </div>
        </a>
        @break($loop->iteration >= 1)
        @endforeach
        <div class="clear"></div>
           <ul>
             @foreach ($wanbenDatas as $wanbenData)
               @continue($loop->iteration <=1)
               <li class="oneline">
                 [{{ $wanbenData->sort }}]
                 <a href="{{ $wanbenData->wapdashubaoinfolink }}" class="blue">{{ $wanbenData->articlename }}</a> / {{ $wanbenData->author }}
               </li>
             @endforeach
            </ul>
       </div>
    @endif
</div>
<script>wapdashubaotongji();</script>
@endsection
