<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
      $curl->setUserAgent("Mozilla/5.0 (compatible; Baiduspider/2.0; +http://www.baidu.com/search/spider.html)");
      $curl->get($url);
      $curl->close();

      if ($curl->http_status_code == '200') {
          echo $curl->response;
      }else{
          die('caiji_err_zhuangtaima_'.$curl->http_status_code);
      }
    }
}
