@extends('novel.layouts.default')

@section('content')
<div class="case_main">
  <div class="case_left">
    <dl>
    <dt>会员中心</dt>
    <dd><a href="{{ route('web.dashubaouserindex' ,[],false) }}" title="会员资料">会员资料</a></dd>
    <dd><a href="{{ route('web.dashubaobookshelfindex' ,[],false) }}" title="我的书架">我的书架</a></dd>
    <dd><a href="{{ route('web.dashubaopassedit' ,[],false) }}" title="修改密码">修改密码</a></dd>
    <dd><a href="{{ route('logout' ,[] ,false) }}" title="退出登录">退出登录</a></dd></dl>
    <dl>
    <dt>消息中心</dt>
    <dd><a href="{{route('web.dashubaoinboxindex' , [] ,false)}}" title="收件箱">收件箱</a></dd>
    <dd><a href="{{route('web.dashubaooutboxindex' ,[],false)}}" title="发件箱">发件箱</a></dd>
    <dd><a href="{{route('web.dashubaosendadminmessage' ,[],false)}}" title="发送给管理员">发送给管理员</a></dd>
    </dl>
  </div>

  @yield('content_member')
</div>


@endsection
