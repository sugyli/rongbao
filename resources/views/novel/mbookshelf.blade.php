@extends('novel.layouts.mdefault')
@section('wapdashubaotitle')我的书架@endsection
@section('header')
@include('novel.layouts.header',[$request,'title'=>'我的书架'])
@endsection

@section('content')

<div class="shujia">
		<h2>书架可收藏 {{$user->bookcasecount}} 本，已收藏 {{$user->relationBookcases()->count()}} 本, 越界请删除不要的收藏</h2>
		<ul id="jiazai">
		</ul>
</div>
<script>

layer.open({
        type: 2,
        content: '玩命的请求中，点击可关闭',
        shadeClose: true
      });

ajax_all_Filed("true", "false", "POST", Config.bookshelfdata_url, "json", "", function(data) {
  layer.closeAll();
  if(data.error && data.error == 1){
      var html = '';
      for(i = 0; i < data.bakdata.length; i++) {
          html += '<li>';
          html +=  '<div class="lf">';
          html +=  '<input type="checkbox" id="checkid[]" name="checkid[]" value="'+ data.bakdata[i].caseid +'">';
          html +=  '</div>';
          html +=  '<div class="rt">';
          if(data.bakdata[i].new_gif){
            html +=  '<img src="/images/new.gif"> <h3><a href="'+ data.bakdata[i].book_url + '">'+data.bakdata[i].book_name+'</a></h3>';
            html +=  '<p>作者：'+data.bakdata[i].book_author+'</p>';
          }else if (data.bakdata[i].book_url) {
            html +=  '<h3><a href="'+ data.bakdata[i].book_url + '">'+data.bakdata[i].book_name+'</a></h3>';
            html +=  '<p>作者：'+data.bakdata[i].book_author+'</p>';
          }else{
            html +=  '<h3><a href="javascript:">'+data.bakdata[i].articlename+'(丢失)</a></h3>';
            html +=  '<p>作者：未知</p>';
          }
          if(data.bakdata[i].book_lastchapter_name){
              html += '<p>最新章节：<a href="'+ data.bakdata[i].book_lastchapter_url +'">'+ data.bakdata[i].book_lastchapter_name +'</a></p>';

          }else{
            html += '<p>最新章节：<a href="javascript:">无最新章节</a></p>';
          }
          if(data.bakdata[i].book_shuqian_name && data.bakdata[i].book_url){
            html += '<p>书签：<a href="'+ data.bakdata[i].book_shuqian_url +'">'+data.bakdata[i].book_shuqian_name+'</a></p>';
          }else{
            html += '<p><a href="javascript:">无书签</a></p>';
          }
          if(data.bakdata[i].relation_articles){
            html += '<p>更新日期：'+ data.bakdata[i].relation_articles.updatetime +'</p>';
          }else{
            html += '<p>更新日期：无</p>';
          }

          html += '<h4><a href="javascript:" onclick="javascript:deloneshujia('+  data.bakdata[i].caseid +');" >移除本书</a></h4>';

          html += '</div></li>';

      }
      var foot = '<li><div class="lf"><input class="input" type="checkbox" name="checkall" onclick="javascript:checkall();"> 全选</div>';
          foot += '<input type="button" value="批量删除" class="button" onclick="javascript:delshujia();" id="bookcasebnt"></li>'
      $("#jiazai").html(html);
      $("#jiazai").append(foot);

  }

});

</script>
@endsection
