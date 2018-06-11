<?php

namespace App\Http\Controllers\Novel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Article;
class ContentController extends Controller
{
    public function webdashubaocontent(Article $article){

      $bid = (int)request()->bid;
      $cid = (int)request()->cid;
      $content  = config('app.dfnr');
      $id = floor($bid / 1000);
      $infoUrl = route('web.dashubaoinfo', ['id'=>$id,'bid' => $bid], false);
      $isimg = 0;//判断是否图片
      $bookData = $article->getBidBookData($bid);
      if(!$bookData){
          return redirect('/');
      }

      $chapter = collect($bookData['relation_chapters'])->first(function ($value, $key) use($cid){
                      if($value['chapterid'] == $cid){
                        //$pKey = $key + 1;
                        return true;
                      }
                  });
      if(!$chapter){
          return redirect($infoUrl);
      }
      //获取上下页对象 要以chapterorder排序获取
      $chapterorder = $chapter['chapterorder'];
      $previousChapter =
                        collect($bookData['relation_chapters'])->last(function ($item, $key) use($chapterorder) {
                                              return ($item['chapterorder'] < $chapterorder && $item['chaptertype'] <= 0);
                                        });
                                        //下一页
      $nextChapter  =
                        collect($bookData['relation_chapters'])->first(function ($item, $key) use($chapterorder) {
                                    return ($item['chapterorder'] > $chapterorder && $item['chaptertype'] <= 0);
                                });

      //下面是获取TXT的部分
      $txtObj = $article->saveOrGetTxtData($bid , $cid, $chapter['lastupdate'] ,$chapter['attachment']);

      if ($txtObj['state']) {
          //判断附件 如果替换了文字就不会走这个
          if (!empty($chapter['attachment']) && getstrlength($txtObj['content']) <= config('app.minnrlength')){
                $imgobj = unserialize($chapter['attachment']);
                $imghtml = '';
                foreach ($imgobj as  $item) {
                    $img = config('app.imagedir') . intval($bid/1000) .'/'.$bid ."/". $cid . "/" .$item['name'];
                    $imghtml .= '<div class="divimage"><img src="'. $img .'" /></div>';
                }
                $content = $imghtml;
                $isimg = 1;
          }else {
            //$content = $txtObj['content'];
            $content = \Purifier::clean($txtObj['content'],'xiaoshuo_body');

          }
      }else{
          //防止有图片但是txt丢失的问题
          if (!empty($chapter['attachment'])){
                $imgobj = unserialize($chapter['attachment']);
                $imghtml = '';
                foreach ($imgobj as  $item) {
                    $img = config('app.imagedir') . intval($bid/1000) .'/'.$bid ."/". $cid . "/" .$item['name'];
                    $imghtml .= '<div class="divimage"><img src="'. $img .'" /></div>';
                }
                $content = $imghtml;
                $isimg = 1;
          }
      }

      return view('novel.content',compact('bookData','chapter','previousChapter','nextChapter','content','isimg'));

    }


    public function wapdashubaocontent(Request $request,Article $article){

      $bid = (int)request()->bid;
      $cid = (int)request()->cid;
      $content  = config('app.dfnr');
      $infoUrl = route('wap.dashubaoinfo', ['bid' => $bid], false);
      $isimg = 0;//判断是否图片
      $bookData = app(Article::class)->getBidBookData($bid);

      if(!$bookData){
          return redirect('/');
      }
      $pKey;
      $chapter = collect($bookData['relation_chapters'])->first(function ($value, $key) use($cid , &$pKey){
                      if($value['chapterid'] == $cid){
                        $pKey = $key + 1;
                        return true;
                      }
                  });
      //$chapter = $bookData->relationChapters->where('chapterid', $cid)->first();
      if(!$chapter){
          return redirect($infoUrl);
      }
      $any = request()->any;
      if (!empty($any)) {
          return redirect($chapter['wapdashubaocontentlink'], 301);
      }
      //获取章节所在的分页数
      $pageSize = (int)config('app.wapmululiebiao');
      $page = (int)ceil($pKey/$pageSize);
      //$weizhi = ((int)($pKey % $pageSize)) * 40 - 80;
      //$weizhi = $weizhi < 0 ? 0 : $weizhi;
      //获取上下页对象 要以chapterorder排序获取
      $chapterorder = $chapter['chapterorder'];

      $previousChapter =
                        collect($bookData['relation_chapters'])->last(function ($item, $key) use($chapterorder) {
                                              return ($item['chapterorder'] < $chapterorder && $item['chaptertype'] <= 0);
                                        });
                                        //下一页
      $nextChapter  =
                        collect($bookData['relation_chapters'])->first(function ($item, $key) use($chapterorder) {
                                    return ($item['chapterorder'] > $chapterorder && $item['chaptertype'] <= 0);
                                });



      //下面是获取TXT的部分
      $txtObj = $article->saveOrGetTxtData($bid , $cid, $chapter['lastupdate'] ,$chapter['attachment']);

      if ($txtObj['state']) {
          //判断附件 如果替换了文字就不会走这个
          if (!empty($chapter['attachment']) && getstrlength($txtObj['content']) <= config('app.minnrlength')){
                $imgobj = unserialize($chapter['attachment']);
                $imghtml = '';
                foreach ($imgobj as  $item) {
                    $img = config('app.imagedir') . intval($bid/1000) .'/'.$bid ."/". $cid . "/" .$item['name'];
                    $imghtml .= '<div class="divimage"><img src="'. $img .'" /></div>';
                }
                $content = $imghtml;
                $isimg = 1;
          }else {
            //$content = $txtObj['content'];
            $content = \Purifier::clean($txtObj['content'],'xiaoshuo_body');

          }
      }else{
          //防止有图片但是txt丢失的问题
          if (!empty($chapter['attachment'])){
                $imgobj = unserialize($chapter['attachment']);
                $imghtml = '';
                foreach ($imgobj as  $item) {
                    $img = config('app.imagedir') . intval($bid/1000) .'/'.$bid ."/". $cid . "/" .$item['name'];
                    $imghtml .= '<div class="divimage"><img src="'. $img .'" /></div>';
                }
                $content = $imghtml;
                $isimg = 1;
          }
      }

      return view('novel.mcontent',compact('request','bookData','chapter','previousChapter','nextChapter','content','isimg','page'));

    }

    public function checkupnextchapter(Article $article){
        //$infoUrl = route('web.dashubaoinfo', ['id'=>$id,'bid' => $bid]);
        $bid = (int)request()->bid;
        $chapterorder = (int)request()->chapterorder;


        $bookData = $article->getBidBookData($bid);
        if(!$bookData){
            return redirect('/');
        }

        $nextChapter  =
                          collect($bookData['relation_chapters'])->first(function ($item, $key) use($chapterorder) {
                                      return ($item['chapterorder'] > $chapterorder && $item['chaptertype'] <= 0);
                                  });

        $url = request()->url();
        $url1=str_replace(array("https://","http://"),"",config('app.wap_dashubao_url'));
        if(str_contains($url, $url1)){
            if($nextChapter){

              return redirect( $nextChapter['wapdashubaocontentlink'] );

            }

            $infoUrl = route('wap.dashubaoinfo', ['bid' => $bid], false);
            return redirect($infoUrl);
        }


      if($nextChapter){
        return redirect( $nextChapter['webdashubaocontentlink'] );
      }
      $id = floor($bid / 1000);
      $infoUrl = route('web.dashubaoinfo', ['id'=>$id,'bid' => $bid], false);
      return redirect($infoUrl);
    }


}
