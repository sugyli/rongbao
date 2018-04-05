<?php

namespace App\Http\Controllers\Novel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Article;
class TopController extends Controller
{
    public function webdashubaotop(Article $article){

      $any = request()->any;
      $page = request()->page;

      $bookDatas = $article->getArticlesWithFilter($any,25);

      if($bookDatas->count() <= 0){
          return redirect('/');
      }
      $zuixinDatas = $article->getArticlesWithFilter('zuixin',6);
      $id = (int)floor($page / 1000);
      if($any == 'shouchangbang'){
        $leixing = '收藏榜';
      }elseif ($any == 'weektuijian') {
        $leixing = '周推荐榜';
      }elseif ($any == 'wanben') {
        $leixing = '完本小说';
      }elseif ($any == 'monthtuijian') {
        $leixing = '月推荐榜';
      }elseif ($any == 'alltuijian') {//这个特殊在模板有特别写法
        $leixing = '总推荐榜';
      }else{
        $leixing = '最新入库';
      }
      return view('novel.top' ,compact('bookDatas','zuixinDatas','any' , 'leixing','id'));

    }



    public function wapdashubaotop(Request $request , Article $article){

      $any = request()->any ?: 'zuixinruku';
      $page = request()->spage ?: 1;

      $bookDatas = $article->getArticlesWithFilter($any,25);
      //dd($bookDatas);

      if($bookDatas->count() <= 0){
          return redirect('/');
      }
      if($any == 'shouchangbang'){
        $leixing = '收藏榜';
      }elseif ($any == 'weektuijian') {
        $leixing = '周推荐榜';
      }elseif ($any == 'wanben') {
        $leixing = '完本小说';
      }elseif ($any == 'monthtuijian') {
        $leixing = '月推荐榜';
      }elseif ($any == 'alltuijian') {//这个特殊在模板有特别写法
        $leixing = '总推荐榜';
      }else{
        $leixing = '最新入库';
      }
      return view('novel.mtop',compact('request','leixing','bookDatas','any','page'));

    }
}
