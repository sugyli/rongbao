<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('webdashubaotitle',config('app.webdashubaotitle').'-'.config('app.webdashubaourl'))</title>
    <meta name="keywords" content="@yield('webdashubaokeywords',config('app.webdashubaokeywords'))">
    <meta name="description" content="@yield('webdashubaodescription',config('app.webdashubaodescription'))">
    <meta http-equiv="Cache-Control" content="no-siteapp">
    <meta http-equiv="Cache-Control" content="no-transform">
    <meta http-equiv="mobile-agent" content="format=html5; url={{config('app.webdashubaourl')}}">
    <meta http-equiv="mobile-agent" content="format=xhtml; url={{config('app.wapdashubaourl')}}">
    <link rel="stylesheet" href="/css/index.min.css">
    <script src="/js/jquery.min.js"></script>
    <script src="/public_js/layer_mobile/layer.js"></script>
  </head>
  <body>
    <script>

        var currentHref=location.href;
        if(/baiducontent.com/gi.test(currentHref)){
          location.href= "{{ edithttps(request()->url()) }}";
        }
        var Config = {
          verifylogin_url: '{{route('verifylogin',[],false)}}',
          login_url: '{{route('web.dashubaologin',[],false)}}',
          bookshelfdata_url: '{{route('bookshelfdata',[],false)}}',
          bookshelfdestroy_url: '{{route('bookshelfdestroy',[],false)}}',
          inboxdestroy_url: '{{route('inboxdestroy',[],false)}}',
          outboxdestroy_url: '{{route('outboxdestroy',[],false)}}',
          sendmessage_url: '{{route('sendmessage',[],false)}}',
          outboxindex_url: '{{route('web.dashubaooutboxindex',[],false)}}',
          addbookcase_url: '{{route('addbookcase',[],false)}}',
          recommend_url: '{{route('recommend',[],false)}}',
          bookshelfindex_url: '{{route('web.dashubaobookshelfindex',[],false)}}',
          logout_url: '{{route('logout',[],false)}}',
          inboxindex_url: '{{route('web.dashubaoinboxindex',[],false)}}',
          thiurl: '{{ edithttps(request()->url()) }}',
        };

    </script>
    <script src="{{ config('app.default_js') }}"></script>

    <div class="top">
      <div class="main">

        <div class="lf" id="ajax_login">
              <input type="text" class="inp" value="请输入帐号" onfocus="this.style.color = '#000000';this.focus();if(this.value=='请输入帐号'){this.value='';}" onblur="this.style.color = '#d5d5d5';if(this.value==''){this.value='请输入帐号';}" ondblclick="javascript:this.value=''" name="uname" id="uname">
              <input type="password" class="inp" value="请输入密码" onfocus="this.style.color = '#000000';this.focus();if(this.value=='请输入密码'){this.value='';}" onblur="this.style.color = '#d5d5d5';if(this.value==''){this.value='请输入密码';}" ondblclick="javascript:this.value=''" name="password" id="password">
              <input class="int" type="button" onclick="javascript:inpulogin()"  value="登陆">
              <a href="javascript:alert('开发中');" title="忘记密码">忘记密码</a> | <a href="{{ route('web.dashubaoregister',[],false) }}?redirect_url={{ edithttps(request()->url()) }}" title="用户注册">用户注册</a>
        </div>

        <div class="rt">
          <a href="javascript:st();void 0;" id="st" rel="nofollow">繁體中文</a> | <a href="{{ config('app.wap_dashubao_url') }}" target="_blank">手机版</a> | <a href="javascript:alert('开发中');">积分规则</a> | <a href="javascript:void(0);" onclick="AddFavorite('{{config('app.webdashubaotitle')}}',location.href)" target="_self" rel="nofollow">收藏本站</a>
        </div>
      </div>
    </div>


  <div class="wrapper">
    <div class="logo">
      <a href="/">{{config('app.webdashubaotitle')}}</a>
    </div>
    <div class="seach">
      <form action="{{ route('search' ,[],false) }}" accept-charset="utf-8" onsubmit="document.charset='utf-8';">
  		    <input type="text" autocomplete="off" name="query" class="searchinput" placeholder="请输入小说名和作者名来搜索，千万别输错字了！">
  		    <input type="submit" value="搜 索" class="searchgo">
  		</form>
    </div>
  </div>

  <div class="nav">
    <div class="main">
      <ul class="nav_l">
        <li><a href="/">首页</a></li>
        @foreach (config('app.fenlei') as $key => $value)
        <li><a href="{{ route('web.dashubaosort' ,['sid'=>$key+1 ,'id'=>0 ,'page' =>1] ,false ) }}">{{$value}}</a></li>
        @endforeach
      </ul>
      <ul class="nav_r">
        <li><a href="{{ route('web.dashubaotop' ,['any'=>'shouchangbang' ,'id'=>0 ,'page' =>1] ,false ) }}">收藏</a></li>
        <li><a href="{{ route('web.dashubaotop' ,['any'=>'alltuijian' ,'id'=>0 ,'page' =>1] ,false) }}">推荐</a></li>
        <li><a href="{{ route('web.dashubaotop' ,['any'=>'wanben' ,'id'=>0 ,'page' =>1] ,false) }}">完本</a></li>
        <li><a href="{{ route('web.dashubaotop' ,['any'=>'xinshu' ,'id'=>0 ,'page' =>1] ,false) }}">新书</a></li>
      </ul>
    </div>
  </div>

  <div class="index_ad">
    <script>web_topad();</script>
  </div>
  @yield('content')
  <div class="index_ad">
    <script>web_footad();</script>
  </div>
  @yield('youqing')
  @include('novel.layouts.foot')
  </body>
</html>
