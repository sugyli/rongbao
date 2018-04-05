@extends('novel.layouts.mdefault')
@section('webdashubaotitle')用户中心@endsection
@section('header')
@include('novel.layouts.header',[$request,'title'=>'用户中心'])
@endsection

@section('content')

<style>
.yonghulist{
   border-bottom: 1px solid #efefef;
   height: 55px;
   line-height: 55px;
   color: #999;
   display: list-item;
   padding: 0 15px;
   font-size: 15px;
}
.yonghulist a {
    display: block;
    border-radius: 4px;
    overflow: hidden;
}
.yonghulist a p{
  line-height: 55px;
  float: left;
  color: #7D26CD;

}
.yonghulist a b {
    width: 7px;
    height: 14px;
    background: url(/images/arrow_right_b.png) 100% no-repeat;
    float: right;
    margin-top: 22px;
}
.yonghulist span {
   color: #ff6a66;
   font-size: 15px;
}
.yonghulist msg {
    width: 8px;
    height: 8px;
    margin: 25px 5px 0 0;
    float: right;
    background-color: #ff433f;
    border-radius: 50%;
    -webkit-border-radius: 50%;
}

.clearfix:after {
    content: " ";
    display: block;
    height: 0;
    clear: both;
    visibility: hidden;
}
.fengexian {
    height: 6px;
    background-color: #f5f5f5;
}
</style>
  <div class="yonghulist">
    通行证号: <span>{{$user->uname}}</span>
  </div>
  <div class="yonghulist">
    等级: <span>{{$user->caption}}</span>
  </div>
  <div class="yonghulist">
    经验: <span>{{$user->score}}</span>
  </div>
  <div class="yonghulist">
    书架总容量: <span>{{$user->bookcasecount}} 本</span>
  </div>
  <div class="yonghulist">
    书架已使用: <span>{{$user->relationBookcases()->count()}} 本</span>
  </div>
  <div class="yonghulist">
    收发信箱容量: <span>{{$user->massagemaxcount}} 封</span>
  </div>
  <div class="yonghulist">
    日推荐总数: <span>{{$user->dayrecommendcount}} 次</span>
  </div>
  <div class="yonghulist">
    日推荐今日剩余: <span>{{$user->shenyudayrecommendcount}} 次</span>
  </div>
  <div class="yonghulist">
    注册日期: <span>{{$user->regdate}}</span>
  </div>
<div class="fengexian"></div>
<div class="yonghulist clearfix">
  <a href="{{ route('wap.dashubaobookshelfindex') }}">
    <p>
      &diams; 我的书架
    </p>
    <b></b>
  </a>
</div>
<div class="yonghulist clearfix">
  <a href="{{ route('wap.dashubaoinboxindex') }}">
    <p>
      &diams; 收件箱
    </p>
    <b></b>
    @if($user->adminemail > 0)
    <msg></msg>
    @endif
  </a>
</div>
<div class="yonghulist clearfix">
  <a href="{{ route('wap.dashubaooutboxindex') }}">
    <p>
      &diams; 发件箱
    </p>
    <b></b>
  </a>
</div>
<div class="yonghulist clearfix">
  <a href="{{ route('wap.dashubaopassedit') }}">
    <p>
      &diams; 修改密码
    </p>
    <b></b>
  </a>
</div>
<div class="fengexian"></div>
<div class="yonghulist">
  <a href="{{ route('logout') }}">
  <span>退出登录</span>
 </a>
</div>
@endsection
