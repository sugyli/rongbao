<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('wapdashubaotitle',config('app.wapdashubaotitle').'-'.config('app.wapdashubaourl'))</title>
    <meta name="keywords" content="@yield('wapdashubaokeywords',config('app.wapdashubaokeywords'))"/>
    <meta name="description" content="@yield('wapdashubaodescription',config('app.wapdashubaodescription'))"/>
    <meta name="MobileOptimized" content="240"/>
    <meta name="applicable-device" content="mobile"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <meta http-equiv="Cache-Control" content="no-siteapp">
    <meta http-equiv="Cache-Control" content="no-cache"/>
    <meta http-equiv="Cache-Control" content="no-transform"/>
    <link rel="stylesheet" type="text/css" href="/css/mindex.min.css"/>
    <script src="/js/iconfont.js"></script>
    <script src="/js/jquery.min.js"></script>
    <script src="/public_js/layer_mobile/layer.js"></script>
    <script src="{{ config('app.default_js') }}"></script>
  </head>
  <body>
    <script>
          var currentHref=location.href;
          if(/baiducontent.com/gi.test(currentHref)){
            location.href= "{{ edithttps(request()->url()) }}";
          }
        var Config = {
          bookshelfdata_url: '{{route('bookshelfdata',[],false)}}',
          bookshelfdestroy_url: '{{route('bookshelfdestroy',[],false)}}',
          inboxdestroy_url: '{{route('inboxdestroy',[],false)}}',
          outboxdestroy_url: '{{route('outboxdestroy' ,[],false )}}',
          sendmessage_url: '{{route('sendmessage' ,[],false )}}',
          outboxindex_url: '{{route('wap.dashubaooutboxindex',[],false)}}',
          addbookcase_url: '{{route('addbookcase' ,[],false)}}',
          recommend_url: '{{route('recommend' ,[],false)}}',
        };

    </script>
    @yield('header')

    @yield('content')


<div class="footer">
<p>本站所有小说由网友上传，如有侵犯版权，请来信告知，本站立即予以处理。</p>
<p><a href="{{config('app.webdashubaourl')}}">电脑版</a> | <a href="javascript:scroll(0,0)">返回顶部</a></p>
</div>

  </body>
</html>
