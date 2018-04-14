<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Chapter;
class CaijiController extends Controller
{

    public function caiji($url, $ishttps = false,$cookie='')
    {
        $curl = new \Curl\Curl();
        $curl->setOpt(CURLOPT_TIMEOUT, 30);
        if($cookie){
           $curl->setOpt(CURLOPT_COOKIE, $cookie);
        }
        $curl->setOpt(CURLOPT_RETURNTRANSFER, 1);
        $curl->setOpt(CURLOPT_REFERER, "http://www.baidu.com");
        $curl->setOpt(CURLOPT_USERAGENT, "Baiduspider+(+http://www.baidu.com/search/spider.htm)");
        if($ishttps){
            $curl->setOpt(CURLOPT_SSL_VERIFYPEER,false);//这个是重点。
        }
        $curl->get($url);
        $curl->close();
        if ($curl->http_status_code == '200') {
          return $curl->response;

        }
        die("meiyoucaijidaoshuju  zhuangtaima {$curl->http_status_code}");
    }



    public function caijibaba()
    {
      header('Content-type:text/html;charset=gbk');
      $url = trim(request()->url);
      if(!$url){
        die('meiyou_url');
      }
      $curl = new \Curl\Curl();
      $curl->setOpt(CURLOPT_COOKIE, config('app.cookie_baba'));
      $curl->setOpt(CURLOPT_TIMEOUT, 4);
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

        $startdate = 1523083333;
        $path = storage_path()."/update.txt";
        if(is_file($path) && $lastdate = file_get_contents($path)){
            $startdate = (int)$lastdate;
        }
        $items =
              $article->getBasicsBook()
                        ->where('lastupdate', '>', $startdate)
                        ->orderBy('lastupdate', 'asc')
                        ->paginate(50);

        if($items->count()>0){
            $curl = new \Curl\Curl();
            $curl->setOpt(CURLOPT_TIMEOUT, 3);
            $items->each(function ($item, $key) use ($curl ,&$startdate) {
                $bid = $item->articleid;

                Article::getBidBookDataByGet($bid);

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

                //$key = config('app.info_key').$bid;
                //\Cache::forget($key);
                $startdate = $item->lastupdate;
            });
            $curl->close();
            file_put_contents($path, $startdate);
         }

    }


    public function caiji93shu()
    {
      header('Content-type:text/plain;charset=gbk');
      ini_set('pcre.backtrack_limit', 999999999);
      $url = request()->url;
      $bookid = (int)request()->bookid;
      if (empty($url) || $bookid <= 0){
          die("dizhiweikong or bookid<0");
      }

      $txt = $this->caiji($url , false, config('app.cookie_93shu'));
      preg_match("{<div class=\"pages\">(.+?)<\/div>}", $txt,$results);
      if (isset($results[1])) {
          preg_match_all("{<a href=\/chapter\/\d+\/\d+\/>(\d+)</a>}", $results[1],$outArry);
          $counts = count($outArry[1]);
          if ($counts > 0) {
              for ($i=0; $i < $counts; $i++) {
                $t = $this->caiji($url.$outArry[1][$i].'/' ,true);
                if (empty($t)){
                    die("caijifenyeshibai");
                }

                $txt = $txt . $t;
              }
          }else{
            die('fenyeguizcuowu');
          }
      }

      $a = ["{javascript:content\(\'(\d+)\'\);}","{javascript:content\(\'(\d+)\',\'(\d+)\'\);}"];
      foreach ($a as $key => $value) {
        if (preg_match($value, $txt)) {
            preg_match_all($value, $txt, $results);
            $index = count($results[0]);
            if(isset($results[2]) && is_array($results[2])){
              echo"规则1";
              for ($i = 0; $i < $index; $i++) {
                $txt = str_replace($results[0][$i], "/chapter/{$results[2][$i]}/{$bookid}/" . $results[1][$i] . ".html", $txt);
              }
              $this->zuhe($txt,zuhe);
              exit;

            }else{
              echo "规则2";

              for ($i = 0; $i < $index; $i++) {
                $txt = str_replace($results[0][$i], "/chapter/{$bookid}/" . ($results[1][$i] - 100) . ".html", $txt);
              }
              //echo $urldata;
              $this->zuhe($txt,$bookid);
              exit ;

            }
        }

      }
      $this->zuhe($txt,$bookid);
    }

    public function zuhe($text , $bookid){
      if (preg_match("{<div id=\"readerlist[\s\S]+?<div class=\"clearfix\"></div>}", $text)) {
      		preg_match_all("{<div id=\"readerlist[\s\S]+?<div class=\"clearfix\"></div>}", $text,$results);

      		if(is_array($results[0])){
      			$results[0]= implode('',$results[0]);

      			$results[0] = preg_replace("{<ul>\s*<li class=\"hidden\">[\s\S]+?</ul>}", "", $results[0]);
      			//$results[0] = preg_replace("{<ul>\s*<h3>正文</h3>\s*<div class=\"border-line\"></div>章节不存在时显示\s*</ul>}", "", $results[0]);
      			$results[0] = preg_replace("{<a href=\"/chapter/{$bookid}/\d*\.html\" title=\"\" target=\"_blank\"></a>}", "<a href=\"/chapter/{$bookid}/1.html\" title=\"标题不见了\" target=\"_blank\">标题不见了</a>", $results[0]);
      			$results[0] = preg_replace("{<ul>\s*<h3>.+?<\/h3>\s*<div class=\"border-line\"><\/div>章节不存在时显示\s*<\/ul>}", "", $results[0]);

      			//daying($results[0]);
      			if(preg_match("{<ul>[\s\S]+?</ul>}", $results[0])){
      				preg_match_all("{<ul>[\s\S]+?</ul>}", $results[0],$res);
      				$counts = count($res[0]);
      				if($counts >1){

      					$html = "";
      					$text ="";
      					for($i=0;$i< $counts;$i++){

      						$text = $this->suanfa($res[0][$i],$bookid);

      						$html .= $text;

      					}

      					//$aa['state'] = $text['state'];

      					//$aa['data'] = $html;
      					$this->shuchu($html,$bookid);
                exit;

      				}else{

      					$text = $this->suanfa($results[0],$bookid);
      					$this->shuchu($text,$bookid);
                exit;
      				}


      			}else{
      				die("panduanyouwuduanluoguiz_BUG");
      			}
      		}
      	}
      	die("huoqumuluneirongguizechucuo");
    }


    function suanfa($text ,$bookid){
        $isok=false;
        if(preg_match("{<li><a.*?href=\"(\d+)\.html\".*?>.+?</a>}", $text)){
          $text = preg_replace("{<li><a.*?href=\"}","<li><a href=\"/chapter/{$bookid}/",$text);
        }
        if(preg_match("{<li><a.*?href=\".+?\/(\d+)\.html\".*?>.+?</a>}", $text)){

          preg_match_all("{<li><a.*?href=\".+?\/(\d+)\.html\".*?>.+?</a>}", $text, $results);

          $isok =true;
        }


        if($isok){

            $state = 2;
            $index = (count($results[0]) -1);
            $inarrys = array("15160");

            if (in_array($bookid,$inarrys)){
              //$state = 2;

            }else{

              if($index <8  && $index >2){
                if($results[1][0]>$results[1][2]){//对方用CSS排序

                  $state = 1;
                }else{

                  $state = 2;
                }

              }elseif($index == 2){

                if($results[1][0]>$results[1][2]){//对方用CSS排序

                  $state = 1;
                }else{

                  $state = 2;
                }

              }elseif($index == 1){
                if($results[1][0]>$results[1][1]){//对方用CSS排序

                  $state = 1;
                }else{

                  $state = 2;
                }

              }

              if($index>=8){


                if($results[1][0]>$results[1][2] && $results[1][1]>$results[1][2]){//对方用CSS排序
                  if($results[1][3]>$results[1][5] && $results[1][4]>$results[1][5]){
                    $state = 1;
                  }

                }else{
                  $state = 2;
                }

              }
            }

            $jilu = $results[0];

            //daying($jilu);
            if($state == 1){
              for($i=0;$i<=$index;$i++){


                if($i % 3 == 0){

                  $results[0][$i+2] = $jilu[$i];

                }elseif($i % 3 == 1){

                }elseif($i % 3 == 2){

                  $results[0][$i-2] = $jilu[$i];
                }else{
                  die("suanfa_BUG");
                }

              }

              if($index % 3 == 1){
                unset($results[0][($index-1)]);

              }elseif($index % 3 == 0){

                unset($results[0][($index +2)]);
              }

              $v =  implode($results[0]);
              //$data['state']=1;
              //$data['data'] =$v;
              return $v;
              exit;

            }else{
              //$data['state']=2;
              //$data['data'] =$text;
              return $text;
              exit;
            }
        }else{
          return '';
          //die("suanfa_bug_1");
        }

    }
    function shuchu($text,$bookid){
      preg_match_all("{<li>(?:<a.*?href=\"(.+?)\".*?>(.+?)</a>|(.+?)).*?</li>}", $text, $results);

      if (is_array($results) && is_array($results[0]) && is_array($results[1])) {
        for ($i=0; $i <count($results[0]) ; $i++) {
          if ($i>0) {
            if(preg_match("{<li><a.*?href=\".+?\"}",$results[0][$i])){
              $results[0][$i] = preg_replace("{<li><a.*?href=\".+?\"}","<li><a href=\"{$results[1][$i]}&lasturl=http://www.93shu.com{$results[1][$i-1]}\"",$results[0][$i]);
            }else{
              $newword = str_ireplace("<li>","",$results[0][$i]);
              $newword = str_ireplace("</li>","",$newword);
              $newword = substr($newword,0, -5);
              $results[0][$i] = "<li><a href=\"/chapter/{$bookid}/&lasturl=http://www.93shu.com{$results[1][$i-1]}\" target=\"_blank\">{$newword}</a> 09-26</li>";
            }

          }

        }
        echo '<pre>';
        print_r($results[0]);
        echo '</pre>';
      }else{

        die("shuchu_err");
      }

    }
}
