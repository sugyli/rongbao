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
        if($bookData = $article->getBidBookData($bid)){

          $curl = new \Curl\Curl();
          $curl->setOpt(CURLOPT_TIMEOUT, 3);

          collect($bookData['relation_chapters'])->each(function ($item, $key) use ($curl){
                $houzui = parse_url($item['webdashubaocontentlink']);
                $web_nr_url = config('app.web_dashubao_url') .'/purge'.$houzui['path'];



                $houzui = parse_url($item['wapdashubaocontentlink']);
                $wap_nr_url = config('app.wap_dashubao_url') .'/purge'.$houzui['path'];

                $curl->get($web_nr_url);
                $curl->get($wap_nr_url);

                if($key == 0){
                  $houzui = parse_url($item['webdashubaoinfolink']);
                  $web_ml_url = config('app.web_dashubao_url') .'/purge'.$houzui['path'];

                  $houzui = parse_url($item['wapdashubaoinfolink']);
                  $wap_ml_url = config('app.wap_dashubao_url') .'/purge'.$houzui['path'];

                  $curl->get($web_ml_url);
                  $curl->get($wap_ml_url);

                }
            });

            $curl->close();
            $msg = $this->success($bid.'的书清理NGINX 和本地缓存完成,请检查');
            return back()->with($msg);

        }else{
          $msg = $this->error($bid.'的书不存在或生产出错了');
          return back()->with($msg);
        }

    }

}