<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>站内搜索</title>
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />
<meta name="format-detection" content="telephone=no" />
<meta name="keywords" content="站内搜索" />
<meta name="description" content="站内搜索" />
<meta http-equiv="Cache-Control" content="no-siteapp">
<meta http-equiv="Cache-Control" content="no-transform">
<link rel="stylesheet" href="/css/index.min.css">
<script src="/js/jquery.min.js"></script>
<script src="/public_js/layer_mobile/layer.js"></script>
<script>
		var currentHref=location.href;
		if(/baiducontent.com/gi.test(currentHref)){
			location.href= "{{ edithttps(request()->url()) }}";
		}
		var Config = {
			alisearch_url: '{{route('search',[],false)}}',
		};
</script>
<script src="{{getJsfile()}}"></script>
</head>
<body>
<div class="ops_header">
	<div class="ops_top">
		<div class="ops_back">
			<a href="javascript:history.go(-1);">«</a>
			<a href="/">首页</a>
		</div>
		<div class="ops_one">
				<input id="searchBox" autocomplete="off" name="keyWord" type="text" value="{{ $query ?? '' }}" placeholder="书名/作者/关键词" class="ops_input_1">
				<input id="search_bnt" type="button" value="☌" class="ops_input_2">
		</div>
	</div>
</div>
<div class="so_ad">
</div>
<div class="ops_cover" id='sousuo'>
	<div class="ops_no" id="" style="line-height:300px;height:300px;text-align: center;">搜索时宁可少字也不要错字。</div>
</div>

<div class="so_ad">
</div>
@include('novel.layouts.foot')
<script>
$(".ops_top").width(windowWidth);
$(".ops_one").width(windowWidth-100);
$("#footer").width(windowWidth);


$('#searchBox').keydown(function(event){
	if(event.keyCode=='13'){
		$('#search_bnt').click();
	}
});
$(document).ready(function(){
	if( $.trim($('#searchBox').val())){
		$('#search_bnt').click();
	}
});

$('#search_bnt').bind('click',function(){
		var searchText =  $.trim($('#searchBox').val());
		if(searchText){
			layer.open({
							type: 2,
							content: '拼命的加载中',
							shadeClose: true
						});

			ajax_all_Filed("true", "false", "POST", Config.alisearch_url , "json",{'query':searchText}, function(data) {
					layer.closeAll();
					if(data.error == 1){
							var data = data.bakdata;
							var html = '';
							for (var i = 0; i < data.length; i++) {
									html += '<a href="'+ data[i]['fields']['bookurl'] +'" {!! Agent::isMobile() ? '' : 'target="_blank"' !!}><div class="block">';
									html += '<div class="block_img">';
									html += '<img src="'+ data[i]['fields']['price'] +'">';
									html += '</div>';
									html += '<div class="block_txt">';
									html += '<h2>'+data[i]['fields']['title']+'</h2>';
									html += '<p>作者：'+data[i]['fields']['author']+'</p>';
									html += '<p>内容简介请见阅读详细页面</p></div></div></a>';

							}
							$("#sousuo").html(html);
					}
			});
		}
});

</script>
</body>
</html>
