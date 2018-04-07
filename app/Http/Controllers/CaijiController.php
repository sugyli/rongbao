<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
class CaijiController extends Controller
{
    public function caijibaba()
    {
      header('Content-type:text/html;charset=gbk');
      $url = trim(request()->url);
      if(!$url){
        die('meiyou_url');
      }
      $curl = new \Curl\Curl();
      $curl->setOpt(CURLOPT_COOKIE, config('app.cookie_baba'));
      $curl->setOpt(CURLOPT_TIMEOUT, 15);
      $curl->setUserAgent("Mozilla/5.0 (compatible; Baiduspider/2.0; +http://www.baidu.com/search/spider.html)");
      $curl->get($url);
      $curl->close();

      if ($curl->http_status_code == '200') {
          echo $curl->response;
      }else{
          die('caiji_err_zhuangtaima_'.$curl->http_status_code);
      }
    }


    public function update(Article $article)
    {
        $startdate = time();
        $path = storage_path()."/update.txt";
        if(is_file($path) && $lastdate = file_get_contents($path)){
            $startdate = (int)$lastdate;
        }
        $items =
              $article->getBasicsBook()
                        ->where('postdate', '>', $startdate)
                        ->orderBy('postdate', 'asc')
                        ->paginate(20);


        if($items->count()>0){
            $curl = new \Curl\Curl();
            $curl->setOpt(CURLOPT_TIMEOUT, 3);
            $items->each(function ($item, $key) use ($curl ,&$startdate) {
                $bid = $item->articleid;
                $a = floor($bid / 1000);
                $web_url = route('web.dashubaoinfo',['id'=>$a , 'bid'=>$bid]);
                $houzui = parse_url($web_url);
                $web_url = config('app.web_dashubao_url') .'/purge'.$houzui['path'];

                $wap_url = route('wap.dashubaoinfo',['bid'=>$bid]);
                $houzui1 = parse_url($wap_url);
                $wap_url = config('app.wap_dashubao_url') .'/purge'.$houzui1['path'];
                $curl->get($web_url);
                $curl->get($wap_url);
                $key = config('app.info_key').$bid;
                \Cache::forget($key);
                $startdate = $item->postdate;
            });
            $curl->close();
            file_put_contents($path, $startdate);
         }

    }
}
