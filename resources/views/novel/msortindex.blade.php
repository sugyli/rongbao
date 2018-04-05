@extends('novel.layouts.mdefault')
@section('wapdashubaotitle')作品类型-{{config('app.wapdashubaotitle')}}-{{route('wap.dashubaoindex')}}@endsection
@section('wapdashubaokeywords')作品类型@endsection
@section('wapdashubaodescription')作品类型@endsection
@section('header')
@include('novel.layouts.header',[$request,'title'=>'分类'])
@endsection

@section('content')
@include('novel.layouts.msort')
@endsection
