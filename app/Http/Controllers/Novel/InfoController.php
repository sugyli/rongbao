<?php

namespace App\Http\Controllers\Novel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Article;
class InfoController extends Controller
{

    public function webdashubaolaoinfo()
    {
      $id = request()->id;
      $bid = request()->bid;
      return redirect(route('web.dashubaoinfo', ['id'=>$id,'bid' => $bid]), 301);
    }


    public function webdashubaoinfo(Article $article)
    {
      $any = request()->any;
      $bid = (int)request()->bid;
      $id = (int)request()->id;

      $a = floor($bid / 1000);

      if($id != $a){
          return redirect(route('web.dashubaoinfo', ['id'=>$a,'bid' => $bid]) , 301);
      }

      if(!empty($any)){
          return redirect(route('web.dashubaoinfo', ['id'=>$a,'bid' => $bid]) , 301);
      }

      if($bookData = $article->getBidBookData($bid)){
          return view('novel.info', compact('bookData'));
      }
      return redirect('/');

    }


    public function wapdashubaolaoinfo(){

      $bid = request()->bid;
      return redirect(route('wap.dashubaoinfo', ['bid' => $bid]), 301);

    }

    public function wapdashubaoinfo(Request $request,Article $article)
    {
      $any = request()->any;
      $bid = (int)request()->bid;
      if(!empty($any)){
          return redirect(route('wap.dashubaoinfo', ['bid' => $bid]) , 301);
      }
      if($bookData = $article->getBidBookData($bid)){

          return view('novel.minfo', compact('request','bookData'));
      }
      return redirect('/');

    }

    public function wapdashubaomulu(Request $request,Article $article)
    {
        /*
        return response()
                ->view('mnovels.newmulu',compact('pageset','chapters','bid','title' ,'pageset' ,'sort' ,'nextpage','pevpage','infoUrl'))
                ->header('Cache-Control', 'private');

        */

        $bid = (int)request()->bid;
        $page = (int)request()->page;
        $sort  = request()->zid ? 'desc' : null ; //false正序
        $bookData = $article->getBidBookData($bid);
        if(!$bookData){
            return redirect('/');
        }
        $total = count($bookData['relation_chapters']);
        $infoUrl = route('wap.dashubaoinfo', ['bid' => $bid]);
        if($total <= 0){
            return redirect($infoUrl);
        }
        $pageSize = (int)config('app.wapmululiebiao');
        //计算总页数
        $pagenum = (int)ceil($total / $pageSize);//当没有数据的时候 计算出来为0
        if($page > $pagenum){
          $page = $pagenum;
        }

        if ($page <= $pagenum && $page > 0){
            //开始的索引
            $offset = ($page - 1) * $pageSize;
            if ($sort == 'desc') {
                //翻转
                $bookData['relation_chapters'] = collect($bookData['relation_chapters'])
                                                        ->reverse()
                                                        ->all();
            }
            $bookData['relation_chapters'] = collect($bookData['relation_chapters'])->slice($offset, $pageSize)->values();

            return view('novel.minfomulu', compact('request','bookData','sort','page','pagenum'));


        }

        return redirect(route('wap.dashubaoinfo', ['bid' => $bid]));

    }

}
