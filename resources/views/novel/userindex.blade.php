@extends('novel.layouts.user')
@section('webdashubaotitle')用户中心@endsection
@section('content_member')
<div class="case_right">
  <div class="case_title">用户信息</div>
  <div class="case_avatar"><img src="/images/noavatar.jpg" alt="头像"><a href="javascript:alert('开发中');" title="设置头像">[快速设置头像]</a></div>
  <ul class="yonghu">
  <li>通行证： {{$user->uname}}</li>
  <li>级别： {{$user->caption}}</li>
  <li>经验：{{$user->score}}</li>
  <li>书架总容量：{{$user->bookcasecount}} 本</li>
  <li>书架已使用：{{$user->relationBookcases()->count()}} 本</li>
  <li>收发信箱容量：{{$user->massagemaxcount}} 封</li>
  <li>日推荐总数：{{$user->dayrecommendcount}} 次</li>
  <li>日推荐今日剩余：{{$user->shenyudayrecommendcount}} 次</li>
  <li>注册日期：{{$user->regdate}}</li>
  </ul>
</div>
@endsection
