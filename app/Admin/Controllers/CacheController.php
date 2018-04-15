<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Illuminate\Http\Request;

use Encore\Admin\Layout\Content;
use Encore\Admin\Widgets\Box;
use Encore\Admin\Layout\Column;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Row;
use App\Admin\Traits\PublicTrait;

use App\Models\Article;
use App\Models\Chapter;
class CacheController extends Controller
{
    use ModelForm ,PublicTrait;


    public function index()
    {
        return Admin::content(function (Content $content) {
              $content->row(function (Row $row) {
                  $row->column(12, function (Column $column){
                      $form = new \Encore\Admin\Widgets\Form();
                      $form->action(admin_url('delcache/delonebook'));
                      //$form->method('GET');
                      $form->textarea('content','内容')->attribute(['rows' => 30]);
                      $column->append((new Box('采集单本清理', $form))->collapsable()->style('success'));
                  });
              });
        });

    }

    public function delonebook(Request $request ,Article $article)
    {
      $validator = \Validator::make($request->all(), [
          'content' => 'required',
      ]);

      if ($validator->fails()) {
          return back()->withErrors($validator)
                      ->withInput();
      }

        $content = $request->content;
        $array_a = explode("\r\n",$content);
        $array_b = explode("|",$array_a[1]);

        $bid = $array_b[2] ?? 0;
        if($bid <= 0 ){
          $msg = $this->error('获取提交数据失败了');
          return back()->with($msg);
        }

        $key = config('app.info_key').$bid;
        \Cache::forget($key);
        $curl = new \Curl\Curl();
        $curl->setOpt(CURLOPT_TIMEOUT, 3);

        $a = floor($bid / 1000);
        $web_url = route('web.dashubaoinfo',['id'=>$a , 'bid'=>$bid]);
        $houzui = parse_url($web_url);
        $web_url = config('app.web_dashubao_url') .'/purge'.$houzui['path'];


        $wap_url = route('wap.dashubaoinfo',['bid'=>$bid]);
        $houzui1 = parse_url($wap_url);
        $wap_url = config('app.wap_dashubao_url') .'/purge'.$houzui1['path'];

        $curl->get($web_url);

        $curl->get($wap_url);


        $lastChapter = Chapter::where('chaptertype','<=' ,0)
                                ->where('display', '<=', '0')
                                ->where('articleid',$bid)
                                ->where('chapterorder','<',$item->chapters)
                                ->orderBy('chapterorder', 'desc')
                                ->first();




      if($lastChapter){
          $cid = $lastChapter->chapterid;

          $web_lastpage_url = route('web.dashubaocontent',['id'=>$a , 'bid'=>$bid ,'cid'=>$cid]);
          $houzui_1 = parse_url($web_lastpage_url);
          $web_lastpage_url = config('app.web_dashubao_url') .'/purge'.$houzui_1['path'];
          $curl->get($web_lastpage_url);

          $wap_lastpage_url = route('wap.dashubaocontent',['bid'=>$bid ,'cid'=>$cid]);
          $houzui1_1 = parse_url($wap_lastpage_url);
          $wap_lastpage_url = config('app.wap_dashubao_url') .'/purge'.$houzui1_1['path'];
          $curl->get($wap_lastpage_url);

      }
      $curl->close();
      /*
        if($bookData = $article->getBidBookData($bid)){

          $curl = new \Curl\Curl();
          $curl->setOpt(CURLOPT_TIMEOUT, 3);
          $url = '';
          collect($bookData['relation_chapters'])->each(function ($item, $key) use ($curl ,&$url){
                $houzui = parse_url($item['webdashubaocontentlink']);
                $web_nr_url = config('app.web_dashubao_url') .'/purge'.$houzui['path'];

                $houzui = parse_url($item['wapdashubaocontentlink']);
                $wap_nr_url = config('app.wap_dashubao_url') .'/purge'.$houzui['path'];

                $curl->get($web_nr_url);
                $curl->get($wap_nr_url);

                if($key == 0){
                  $houzui = parse_url($item['webdashubaoinfolink']);
                  $web_if_url = config('app.web_dashubao_url') .'/purge'.$houzui['path'];

                  $houzui = parse_url($item['wapdashubaoinfolink']);
                  $wap_if_url = config('app.wap_dashubao_url') .'/purge'.$houzui['path'];

                  $curl->get($web_if_url);
                  $curl->get($wap_if_url);
                  $url = $item['webdashubaoinfolink'];

                }

              //  usleep(10000);
            });

            //手机目录

            $total = count($bookData['relation_chapters']);
            $pageSize = (int)config('app.wapmululiebiao');
            //计算总页数
            $pagenum = (int)ceil($total / $pageSize);//当没有数据的时候 计算出来为0
            for ($i=1; $i <= $pagenum ; $i++) {
              $houzui = parse_url( route('wap.dashubaomulu',['bid'=>$bid ,'page'=>$i]) );
              $wap_ml_url = config('app.wap_dashubao_url') .'/purge'.$houzui['path'];

              $houzui = parse_url( route('wap.dashubaomulu1',['bid'=>$bid ,'page'=>$i ,'zid'=>1]) );
              $wap_ml_url_1 = config('app.wap_dashubao_url') .'/purge'.$houzui['path'];
              $curl->get($wap_ml_url);
              $curl->get($wap_ml_url_1);
            }
            //Article::getBidBookDataByGet($bid);
            //$key = config('app.info_key').$bid;
            //\Cache::forget($key);
            $curl->close();
            $msg = $this->success( "<a href='{$url}' target='_blank'>{$bid}</a>的书清理NGINX 和本地缓存完成,请检查");
            return back()->with($msg);

        }else{
          $msg = $this->error($bid.'的书不存在或生产出错了');
          return back()->with($msg);
        }
        */

    }

}
