<?php

namespace App\Http\Controllers\Novel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Article;
class IndexController extends Controller
{

    public function webdashubaoindex(Article $article)
    {
      //$article = app(Article::class);
      $weekDatas = $article->getArticlesWithFilter('weektuijian',6);
      $allDatas = $article->getArticlesWithFilter('alltuijian',7);
      $monthDatas = $article->getArticlesWithFilter('monthtuijian',7);
      $shouchangDatas = $article->getArticlesWithFilter('shouchangbang',7);
      $wanbenDatas = $article->getArticlesWithFilter('wanben',7);
      $zuixinDatas = $article->getArticlesWithFilter('zuixin',20);
      $newDatas = $article->getArticlesWithFilter('newbook',21);
      return view('novel.index',compact('article','weekDatas','allDatas','monthDatas','shouchangDatas','wanbenDatas','zuixinDatas','newDatas'));

    }

    public function wapdashubaoindex(Request $request,Article $article)
    {
      //$article = app(Article::class);
      $weekDatas = $article->getArticlesWithFilter('weektuijian',6);
      $monthDatas = $article->getArticlesWithFilter('monthtuijian',7);
      $allDatas = $article->getArticlesWithFilter('alltuijian',7);
      $shouchangDatas = $article->getArticlesWithFilter('shouchangbang',7);
      $wanbenDatas = $article->getArticlesWithFilter('wanben',7);
      $newDatas = $article->getArticlesWithFilter('newbook',6);

      return view('novel.mindex',compact('request','weekDatas','monthDatas','allDatas','shouchangDatas','wanbenDatas','newDatas'));

    }
}
