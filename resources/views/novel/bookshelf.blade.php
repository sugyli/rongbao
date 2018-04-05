@extends('novel.layouts.user')
@section('webdashubaotitle')我的书架@endsection
@section('content_member')
<div class="case_right">
<div class="case_title">您的书架可收藏 {{$user->bookcasecount}} 本，已收藏 {{$user->relationBookcases()->count()}} 本</div>
<ul id='liebiao'>
  <li class="top">
    <span class="fk">
      <input class="input" type="checkbox" name="checkall" onclick="javascript:checkall();">
    </span>
    <span class="wz">文章名称</span>
    <span class="zx">最新章节</span>
    <span class="zx">书签</span>
    <span class="gx">更新</span>
    <span class="cz">操作</span>
  </li>
  <div id="jiazai" style="height:300px;">
    <div class="loading"></div>
  </div>
</ul>
</div>
<script>
ajax_all_Filed("true", "false", "POST", Config.bookshelfdata_url, "json", "", function(data) {

    $("#jiazai").removeAttr("style");
    if(data.error && data.error == 1){
      var html = '';
      for(i = 0; i < data.bakdata.length; i++) {
            html += '<li>';
            html +=  '<span class="fk">';
            html +=  '<input class="input" type="checkbox" name="checkid[]" value="'+ data.bakdata[i].caseid +'">';
            html +=  '</span>';
            html +=  '<span class="wz">';
            if(data.bakdata[i].new_gif){
              html +=  '<img src="/images/new.gif"> <a href="'+ data.bakdata[i].book_url + '" target="_blank" title="《'+ data.bakdata[i].book_name +'》作者：'+ data.bakdata[i].book_author +'">'+data.bakdata[i].book_name+'</a>';
            }else if (data.bakdata[i].book_url) {
              html +=  '<a href="'+ data.bakdata[i].book_url + '" target="_blank" title="《'+ data.bakdata[i].book_name +'》作者：'+ data.bakdata[i].book_author +'">'+data.bakdata[i].book_name+'</a>';
            }else{
              html +=  '<a href="javascript:">'+data.bakdata[i].articlename+'(丢失)</a>';
            }
            html += '</span>';

            html +=  '<span class="zx">';
            if(data.bakdata[i].book_lastchapter_name){
                html += '<a href="'+ data.bakdata[i].book_lastchapter_url +'" target="_blank" title="' + data.bakdata[i].book_lastchapter_name + '">'+ data.bakdata[i].book_lastchapter_name +'</a>';

            }else{
              html += '<a href="javascript:">无最新章节</a>';
            }
            html += '</span>';

            html +=  '<span class="zx">';

            if(data.bakdata[i].book_shuqian_name && data.bakdata[i].book_url){
              html += '<a href="'+ data.bakdata[i].book_shuqian_url +'" target="_blank" title="'+ data.bakdata[i].book_shuqian_name +'">'+data.bakdata[i].book_shuqian_name+'</a>';
            }else{
              html += '<a href="javascript:">无书签</a>';
            }
            html += '</span>';

            html +=  '<span class="gx">';
            if(data.bakdata[i].relation_articles){
              html += data.bakdata[i].relation_articles.updatetime;
            }else{
              html += '无';
            }
            html += '</span>';

            html +=  '<span class="cz">';

            html += '<a href="javascript:" onclick="javascript:deloneshujia('+  data.bakdata[i].caseid +');" >移除</a>';
            html += '</span>';


            html +=  '</li>';
      }

      var foot = '<li class="bottom" style="text-align:left;">';
          foot += '<input type="button" value="批量删除" class="button"  onclick="javascript:delshujia();" id="bookcasebnt"></li>';

      $("#liebiao").after(foot);

      $("#jiazai").html(html);
    }

});


</script>
@endsection
