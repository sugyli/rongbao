<?php

namespace App\Http\Controllers\Novel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Article;
class SortController extends Controller
{
    public function webdashubaosort(Article $article){
      $sid = request()->sid;
      $page = request()->page;
      if(!isset(config('app.fenlei')[$sid-1])){
        $sid = 1;
      }
      $sortname = config('app.fenlei')[$sid-1];
      $sortDatas = $article->getArticlesWithFilter('sort',20,$sid);
      if($sortDatas->count() <= 0){
          return redirect('/');
      }

      $zuixinDatas = $article->getArticlesWithFilter('zuixin',6);
      $id = (int)floor($page / 1000);
      return view('novel.sort' ,compact('sortname','sortDatas','zuixinDatas','sid','id'));

    }

    public function wapdashubaosort(Request $request , Article $article){

      $sid = request()->sid;
      $page = request()->page;
      if(!isset(config('app.fenlei')[$sid-1])){
        $sid = 1;
      }
      $sortname = config('app.fenlei')[$sid-1];
      $sortDatas = $article->getArticlesWithFilter('sort',20,$sid);
      if($sortDatas->count() <= 0){
          return redirect('/');
      }

      return view('novel.msort',compact('request','sortname','sortDatas','sid'));
    }

    public function wapdashubaosortindex(Request $request){

        return view('novel.msortindex',compact('request'));

    }
}
