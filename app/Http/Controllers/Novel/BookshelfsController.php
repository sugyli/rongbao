<?php

namespace App\Http\Controllers\Novel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Article;
use App\Models\Chapter;
use App\Models\Bookcase;
class BookshelfsController extends Controller
{
    public function webdashubaobookshelfindex()
    {
      $user = \Auth::user();
      return view('novel.bookshelf',compact('user'));
    }
    public function wapdashubaobookshelfindex(Request $request)
    {
      $user = \Auth::user();
      return view('novel.mbookshelf',compact('request','user'));
    }

    public function readbookshelf(Request $request)
    {
        $user = $request->user();
        $bid = $request->bid + 0;
        $cid = $request->cid + 0;
        if($user){
          if($bid > 0){
            $user->relationBookcases()
                         ->where('articleid', $bid)
                         ->update(['lastvisit' => time()]);
          }

        }

        $url = request()->url();
        $url1=str_replace(array("https://","http://"),"",config('app.wap_dashubao_url'));

        if(str_contains($url, $url1 )){

          if($cid > 0){

            return redirect( route('wap.dashubaocontent',['bid'=>$bid , 'cid' =>$cid], false));

            //return redirect()->route('wap.dashubaocontent',['bid'=>$bid , 'cid' =>$cid], false);
          }

          return redirect( route('wap.dashubaoinfo',['bid'=>$bid], false));
          //return redirect()->route('wap.dashubaoinfo',['bid'=>$bid], false);
        }


        $id = floor($bid / 1000);
        if($cid > 0){
          return redirect( route('web.dashubaocontent',['id'=>$id , 'bid'=>$bid , 'cid' =>$cid], false));
          //return redirect()->route('web.dashubaocontent',['id'=>$id , 'bid'=>$bid , 'cid' =>$cid], false);
        }
        return redirect( route('web.dashubaoinfo',['id'=>$id,'bid'=>$bid], false));

        /*
        if(\Agent::isMobile()){
          if($cid > 0){
            return redirect()->route('wap.dashubaocontent',['bid'=>$bid , 'cid' =>$cid]);
          }

          return redirect()->route('wap.dashubaoinfo',['bid'=>$bid]);

        }else {
          $id = floor($bid / 1000);
          if($cid > 0){
            return redirect()->route('web.dashubaocontent',['id'=>$id , 'bid'=>$bid , 'cid' =>$cid]);
          }
          return redirect( route('web.dashubaoinfo',['id'=>$id,'bid'=>$bid]) . '/' );
          //return redirect()->route('web.dashubaoinfo',['id'=>$id,'bid'=>$bid]);
        }
        */

    }

    public function bookshelfdata()
    {
       $user = \Auth::user();
       $result = ['error'=>0,'message'=>'未知错误','bakdata'=>[]];
       if($user){
         $bookcases = $user->relationBookcases()
                           ->with('relationArticles')->get();

          if(!$bookcases->isEmpty()){
            $bookcases = $bookcases->sortByDesc('relationArticles.lastupdate');
            $bookcases = $bookcases->values();
            //return $bookcases->toJson();

          $bookcases =$bookcases->each(function ($item, $key) {
                $item['new_gif'] = isset($item->relationArticles->lastupdate) && ($item->relationArticles->lastupdate > $item->lastvisit) ? true : false;
                $item['book_url'] = isset($item->relationArticles->articleid) ? route('readbookshelf',['bid'=>$item->relationArticles->articleid], false) : false;
                $item['book_name'] = $item['book_url'] ? $item->relationArticles->articlename : false;
                $item['book_author'] = $item['book_url']  ? $item->relationArticles->author : false;
                $item['book_lastchapter_url'] = isset($item->relationArticles->lastchapterid) &&
                                $item->relationArticles->lastchapterid > 0 ?
                                route('readbookshelf',['bid'=>$item->relationArticles->articleid ,'cid'=>$item->relationArticles->lastchapterid], false):
                                false;
                $item['book_lastchapter_name'] = $item['book_lastchapter_url'] ? $item->relationArticles->lastchapter : false;

                $item['book_shuqian_url'] = $item->chapterid > 0 ?
                                              route('readbookshelf',['bid'=>$item->articleid ,'cid'=>$item->chapterid], false) :
                                              false;

                $item['book_shuqian_name'] =  $item['book_shuqian_url'] ? $item->chaptername : false;


            });
            $result['error'] = 1;
            $result['message'] = "请求成功";
            $result['bakdata'] = $bookcases;

            return response()->json($result);

          }

          $result['message'] = '没有书架数据请添加';
          return response()->json($result);

       }
      $result['message'] = '还没有登录';
      return response()->json($result);

    }


    public function addbookcase(Request $request)
    {
        $user = $request->user();
        $result = ['message'=>'未知错误'];
        if (empty($user)) {
            $result['message'] = '您还没有登录,请登录！';
            return response()->json($result);
        }
        $bid = (int)($request->bid+0);
        $cid = (int)($request->cid+0);
        $time = time();
        if($bid <= 0){
          $result['message'] = '操作非法';
          return response()->json($result);
        }
        $article = Article::where('articleid', $bid)->getBasicsBook()->first();
        if (empty($article)) {
            $result['message'] = '本书已经不存在了';
            return response()->json($result);
        }
        if($cid > 0){
          $chapter = Chapter::where('display', '<=', '0')->find($cid);
          if (empty($chapter)) {
              $result['message'] = '本章节已经不存在了';
              return response()->json($result);
          }
        }
        $bookcase = $article->relationBookcases($user->uid);
        if (empty($bookcase)) {//看看这本书 用户书架有没有
            //用户拥有的书架
            $userBookshelfCount = (int)$user->bookcasecount;
            //已经使用的书架
            $userUseBookCount = $user->relationBookcases()->count();

            if($userUseBookCount > $userBookshelfCount){
                $z = $userUseBookCount - $userBookshelfCount;
                $result['message'] = "您的书架已经越界 {$z} 本,请删除才能添加";
                return response()->json($result);
            }elseif ($userUseBookCount == $userBookshelfCount) {
              $result['message'] = "您的书架已经满了,不能添加了";
              return response()->json($result);

            }

            $data=[
                  'articleid' => $article->articleid,
                  'articlename' => $article->articlename,
                  'userid' => $user->uid,
                  'username' => $user->uname,
                  'classid' => 0,
                  'chapterid'=> 0,
                  'chaptername' => '',
                  'chapterorder' => 0,
                  'joindate' => $time,
                  'lastvisit' => $time,
                  'flag' => 0,
              ];

            $result['message'] = '添加书架成功了';

            if ($cid > 0) {
                $data['chapterid'] = $cid;
                $data['chaptername'] = $chapter->chaptername;
                $data['chapterorder'] = $chapter->chapterorder;
                $result['message'] = '添加书签成功了';
            }
            try {
              Bookcase::create($data);
              return response()->json($result);
            } catch (\Exception $e) {
              $result['message'] = '添加书架失败了';
              return response()->json($result);
            }
       }

        if($cid<=0){
          $result['message'] = '本书已经在书架了,无需操作';
          return response()->json($result);
        }

        if (
          $bookcase->chapterid == $chapter->chapterid &&
          $bookcase->chaptername == $chapter->chaptername &&
          $bookcase->chapterorder == $chapter->chapterorder

        ) {
          $result['message'] = '章节已经在书架了,无需操作';
          return response()->json($result);
        }

        $bookcase->chapterid = $chapter->chapterid;
        $bookcase->chaptername = $chapter->chaptername;
        $bookcase->chapterorder = $chapter->chapterorder;

        try {
          $bookcase->save();
          $result['message'] = '更新书签成功了';
          return response()->json($result);
        } catch (\Exception $e) {
          $result['message'] = '更新书签失败了';
          return response()->json($result);
        }

    }

    public function destroy(Request $request)
    {

        $user = $request->user();
        $result = ['error'=>0,'message'=>'未知错误','bakdata'=>[]];
        if (empty($user)) {
          $result['message'] = '还没有登录';
          return response()->json($result);
        }

        $caseids  =  $request->caseids;
        if (is_array($caseids) && !empty($caseids)) {
            $msg =  $user->relationBookcases()
                         ->whereIn('caseid', $caseids)
                         ->delete();
           if ($msg) {
             $result['error'] = 1;
             $result['message'] = '删除成功';
             return response()->json($result);
           }

        }
        $result['message'] = '删除失败';
        return response()->json($result);

    }
}
