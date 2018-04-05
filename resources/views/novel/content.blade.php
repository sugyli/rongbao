@extends('novel.layouts.default')
@section('webdashubaotitle'){{$chapter['chaptername']}}_小说{{$bookData['articlename']}}-{{$bookData['author']}}-{{config('app.webdashubaotitle')}}-{{route('web.dashubaoindex')}}@endsection
@section('webdashubaokeywords'){{$chapter['chaptername']}},{{ $bookData['articlename'] }},{{$bookData['author']}}@endsection
@section('webdashubaodescription'){{$bookData['articlename']}}是由{{$bookData['author']}}所写的{{$bookData['sort']}}类小说， {{$chapter['chaptername']}}是小说{{$bookData['articlename']}}的最新章节。@endsection
@section('content')
<div class="nr_ad">

</div>
<div class="read_t">
    当前位置：<a href="/">{{config('app.webdashubaotitle')}}</a> &gt; <a href="{{$bookData['sortlink']}}">{{$bookData['sort']}}</a> &gt; <a href="{{$bookData['webdashubaoinfolink']}}">{{$bookData['articlename']}}</a> &gt;  {{$chapter['chaptername']}}
</div>

<div class="read_b">
  <div class="shuqian">
    <a href="{{ route('web.dashubaobookshelfindex') }}" rel="nofollow">打开书架</a>
		<a href="javascript:addbookcase( {{ $chapter['articleid'] }} , {{ $chapter['chapterid'] }})" rel="nofollow">添加书签</a>
		<a href="{{route('web.dashubaosendadminmessage')}}?from={{ $bookData['articlename'] }}_{{$chapter['chaptername']}}_{{request()->url()}}&redirect_url={{request()->url()}}" target="_blank" rel="nofollow">错误举报</a>投推荐票：
  </div>
  <input type="text" class="input" name="uservote_num" id="uservote_num" value="1" maxlength="4" onchange="if(/\D/.test(this.value)){alert('只能输入数字');this.value=1;}">
  <div class="vote">
    <a href="javascript:;" onclick="javascript:tuijian({{$bookData['articleid']}})" rel="nofollow">确定</a>
  </div>
  <div class="bgs">
    <ul>
      <li>
        <input type="text" class="textm" id="screen" value="滚屏">
        <input type="hidden" class="textm" id="screen2" value="滚屏">
        <span class="btn" id="screen1"></span>
      </li>
      <li class="select">
        <p>0</p>
        <p>1慢</p>
        <p>2</p>
        <p>3</p>
        <p>4</p>
      </li>
    </ul>

    <ul>
      <li>
        <input type="text" class="textm" id="background" value="背景"  />
        <input type="hidden" id="background2" value="#000" />
        <span class="btn" id="background1"></span>
      </li>

      <li class="select">
        <p class="bg_huang">明黄</p>
        <p class="bg_lan">淡蓝</p>
        <p class="bg_lv">淡绿</p>
        <p class="bg_fen">红粉</p>
        <p class="bg_bai">白色</p>
        <p class="bg_hui">灰色</p>
        <p class="bg_hei">漆黑</p>
        <p class="bg_cao">草绿</p>
        <p class="bg_cha">茶色</p>
        <p class="bg_yin">银色</p>
        <p class="bg_mi">米色</p>
      </li>
    </ul>

    <ul>
      <li>
        <input type="text" class="textm" id="fontSize" value="字号" />
        <input type="hidden" id="fontSize2" value="16px" />
        <span class="btn" id="fontSize1"></span>
      </li>
      <li class="select">
        <p class="fon_12">12px</p>
        <p class="fon_14">14px</p>
        <p class="fon_16">16px</p>
        <p class="fon_18">18px</p>
        <p class="fon_20">20px</p>
        <p class="fon_24">24px</p>
        <p class="fon_30">30px</p>
      </li>
    </ul>

    <ul>
      <li>
        <input type="text" class="textm" id="fontColor" value="字色" />
        <input type="hidden" id="fontColor2" value="z_mo" />
        <span class="btn" id="fontColor1"></span>
      </li>
      <li class="select">
        <p class="z_hei">黑色</p>
        <p class="z_red">红色</p>
        <p class="z_lan">蓝色</p>
        <p class="z_lv">绿色</p>
        <p class="z_hui">灰色</p>
        <p class="z_li">栗色</p>
        <p class="z_wu">雾白</p>
        <p class="z_zi">暗紫</p>
        <p class="z_he">玫褐</p>
      </li>
    </ul>

    <ul>
      <li>
        <input type="text" class="textm" id="fontFamily" value="字体" />
        <input type="hidden" id="fontFamily2" value="fam_song" />
        <span class="btn" id="fontFamily1"></span>
      </li>
      <li class="select">
        <p class="fam_song">宋体</p>
        <p class="fam_hei">黑体</p>
        <p class="fam_kai">楷体</p>
        <p class="fam_qi">启体</p>
        <p class="fam_ya">雅黑</p>
      </li>
    </ul>
    <input type="button" class="ud_but2" onmousemove="this.className='ud_but22'" onmouseout="this.className='ud_but2'" value="保存" id="saveButton" />
    <input type="button" class="ud_but1" onmousemove="this.className='ud_but11'" onmouseout="this.className='ud_but1'"  value="恢复" id="recoveryButton" />
  </div>

</div>


<div class="novel">
  <h1 class="oneline">{{$chapter['chaptername']}}</h1>
  <div class="pereview">
    @if($previousChapter)
    <a href="{{ $previousChapter['webdashubaocontentlink']}}" target="_top">← 上一章</a>
    @else
    <a href="javascript:" target="_top">←到头了 →</a>
    @endif
		<a class="back" href="{{ $chapter['webdashubaoinfolink']}}" target="_top">返回目录</a>
    @if($nextChapter)
    <a href="{{ $nextChapter['webdashubaocontentlink']}}" target="_top">下一章 →</a>
    @else
    <a href="javascript:" target="_top"> 到尾了→</a>
    @endif
  </div>
  <div class="aside">
    {!!config('app.wangzhangonggao')!!}
  </div>
  <div class="nr_ad2">
  	<span></span>
  	<span></span>
  	<span></span>
  </div>
  <div class="yd_text2">
    {!!$content!!}
  </div>
  <div class="nr_ad3">
  </div>
  <div class="pereview">
    @if($previousChapter)
    <a href="{{ $previousChapter['webdashubaocontentlink']}}" target="_top">← 上一章</a>
    @else
    <a href="javascript:" target="_top">←到头了 →</a>
    @endif
		<a class="back" href="{{ $chapter['webdashubaoinfolink']}}" target="_top">返回目录</a>
    @if($nextChapter)
    <a href="{{ $nextChapter['webdashubaocontentlink']}}" target="_top">下一章 →</a>
    @else
    <a href="javascript:" target="_top"> 到尾了→</a>
    @endif
  </div>
  <div class="readacbtn">
    <a class="recommend" onclick="javascript:tuijian({{$bookData['articleid']}})" rel="nofollow">推荐小说</a>
		<a class="favorite" href="javascript:addbookcase( {{ $chapter['articleid'] }} , {{ $chapter['chapterid'] }})" rel="nofollow">添加书签</a>
		<a class="bookshelf" href="{{ route('web.dashubaobookshelfindex') }}" rel="nofollow">书架</a>
  </div>
</div>
<div class="nr_ad4"></div>
<script>
baobaoni.content();

</script>


@endsection
