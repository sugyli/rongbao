
@if(isset($request) && $request->route()->named('wap.dashubaoindex'))
<div class="header">
  <div class="logo">
    <a href="/">{{config('app.webdashubaotitle')}}</a>
  </div>
  <a class="header-right" href="{{route('wap.dashubaologin',[],false)}}">
		<svg class="icon" aria-hidden="true">
	    <use xlink:href="#icon-huiyuan"></use>
		</svg>
  </a>
</div>
@else
<div class="header">
	<div class="back">
		<a href="javascript:history.go(-1);">返回</a>
	</div>
	<h1><a href="{{isset($url) ? $url : '/' }}">{{$title}}</a></h1>
  @if(isset($request) && ($request->route()->named('wap.dashubaologin') || $request->route()->named('wap.dashubaoregister') ))
	<a class="header-right" href="{{route('wap.dashubaologin' ,[] ,false)}}">
  @else
  <a class="header-right" href="{{route('wap.dashubaologin' ,[] ,false)}}?redirect_url={{ edithttps(request()->url()) }}">
  @endif

  	<svg class="icon" aria-hidden="true">
			<use xlink:href="#icon-huiyuan"></use>
		</svg>
	</a>
</div>
@endif

<div class="nav">
	<ul>
    <li><a href="/">首页</a></li>
		<li><a href="{{route('wap.dashubaosortindex' , [] ,false)}}">分类</a></li>
		<li><a href="{{ route('wap.dashubaotop' ,['any'=>'alltuijian','spage'=>1] ,false) }}">推荐</a></li>
		<li><a href="{{ route('wap.dashubaotop' ,['any'=>'wanben','spage'=>1] ,false) }}">全本</a></li>
		<li><a href="{{ route('wap.dashubaotop' ,['any'=>'xinshu','spage'=>1] ,false) }}">新书</a></li>
	</ul>
</div>
<form class="search" action="{{ route('search' ,[],false) }}" accept-charset="utf-8" onsubmit="document.charset='utf-8';">
	<input type="text" autocomplete="off" name="query" class="searchinput" placeholder="输入书名/作者">
	<input type="submit" value="搜索" class="go">
</form>
