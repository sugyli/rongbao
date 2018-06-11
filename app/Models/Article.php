<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Watson\Rememberable\Rememberable;
use Carbon\Carbon;
class Article extends Model
{
    use Rememberable , PublicArticle;
    protected $guarded = ['articleid'];
    protected $table = 'jieqi_article_article';
    protected $primaryKey = 'articleid';

    protected $appends = [
                          'updatetime',//更新时间
                          'adddatetime',//添加时间
                          'webdashubaocontentlink',
                          'wapdashubaocontentlink',
                          'webdashubaoinfolink',
                          'wapdashubaoinfolink',
                          'minfomululink',
                          'allltuijiancount',
                          'zhuangtai',
                          'sortkey',
                          'sort',
                          'sortlink'
                        ];

    public function getArticlesWithFilter($filter = 'default', $limit = 20 ,$id='')
    {
          $query = $this->getBasicsBook();

          switch ($filter) {
            case 'sort':
                return $query
                          ->where('sortid',$id)
                          ->orderBy('lastupdate', 'desc')
                          ->remember(config('app.cacheTime_d'))
                          ->paginate($limit);
                break;
            /*
            case 'newbook':
                return $query ->orderBy('postdate', 'desc')->remember(config('app.cacheTime_d'))->paginate($limit);
                break;
            */
            case 'shouchangbang':
                return $query->orderBy('goodnum', 'desc')->remember(config('app.cacheTime_d'))->paginate($limit);
                break;

            case 'wanben':
                return $query->where('fullflag','>=',1)->orderBy('lastupdate', 'desc')->remember(config('app.cacheTime_d'))->paginate($limit);
                break;

            case 'alltuijian':

                return
                        Ranking::select(\DB::raw('sum(hits) as h,articleid'))
                                ->groupBy('articleid')
                                ->orderBy('h', 'desc')
                                ->with(['relationArticles'=> function ($q) { $q->remember(config('app.cacheTime_d'));}])
                                ->remember(config('app.cacheTime_d'))->paginate($limit);
                break;


            case 'monthtuijian':
                $dt = Carbon::now();
                return Ranking::select(\DB::raw('sum(hits) as h,articleid'))
                                ->whereYear('created_at', $dt->year)
                                ->whereMonth('created_at', $dt->month)
                                ->groupBy('articleid')
                                ->orderBy('h', 'desc')
                                ->with(['relationArticles'=> function ($q) { $q->remember(config('app.cacheTime_d'));}])
                                ->remember(config('app.cacheTime_d'))->paginate($limit);
                break;


            case 'weektuijian':
                //$week_begin = mktime(0, 0, 0,date("m"),date("d")-date("w")+1,date("Y"));

                //$week_end = mktime(23,59,59,date("m"),date("d")-date("w")+7,date("Y"));
                $week_begin = strtotime('last Monday');
                $week_end = strtotime('next Sunday');
                /*
                echo $week_begin;
                echo '<br />';
                echo $week_end;
                echo '<br />';
                echo strtotime('last Monday');
                echo '<br />';
                echo strtotime('next Sunday');
                exit;
                */
                return
                        Ranking::select(\DB::raw('sum(hits) as h,articleid'))
                                //->whereYear('created_at', '2016')
                                //->whereMonth('created_at', '9')
                                ->whereBetween('ranking_date', [$week_begin, $week_end])
                                ->groupBy('articleid')
                                ->orderBy('h', 'desc')
                                ->with(['relationArticles'=> function ($q) { $q->remember(config('app.cacheTime_d'));}])
                                ->remember(config('app.cacheTime_d'))->paginate($limit);
                break;
            case 'zuixin':
                return $query->orderBy('lastupdate', 'desc')->remember(config('app.cacheTime_d'))->paginate($limit);
                break;
            default:
                return $query ->orderBy('postdate', 'desc')->remember(config('app.cacheTime_d'))->paginate($limit);
                //return $query->orderBy('lastupdate', 'desc')->remember(config('app.cacheTime_d'))->paginate($limit);
                break;

          }


    }

    public function getAllltuijiancountAttribute()
    {
      $obj =
              Ranking::select(\DB::raw('sum(hits) as h,articleid'))
                      ->where('articleid',$this->articleid)
                      ->groupBy('articleid')
                      ->remember(config('app.cacheTime_z'))
                      ->first();
      //$a = $var ?? $temp 的意思是 $a = isset($var) ? $var : $temp
       return $obj->h ?? 0;
    }

    public function getImgflagAttribute($value)
    {
      return
              $value > 0 ?
                          config('app.xsfmdir')
                          . floor($this->articleid / 1000)
                          . '/' . $this->articleid . '/'
                          . $this->articleid . 's.jpg'
                        :
                          config('app.dfxsfmdir');

    }
    public function getFullflagAttribute($value)
    {
        return $value > 0 ? '完本' : '连载';
    }
    public function getZhuangtaiAttribute()
    {
        return $this->attributes['fullflag'];
    }
    public function setZhuangtaiAttribute($value)
    {
        $this->attributes['fullflag'] = $value;
    }
    public function getWebdashubaocontentlinkAttribute()
    {
       return $this->webdashubaocontentlink($this->articleid,$this->lastchapterid);

    }
    public function getWapdashubaocontentlinkAttribute()
    {
       return $this->wapdashubaocontentlink($this->articleid,$this->chapterid);

    }
    public function getMinfomululinkAttribute()
    {
      return route('wap.dashubaomulu',['bid'=>$this->articleid ,'page'=>1],false);

    }

    public function getWebdashubaoinfolinkAttribute()
    {
      return $this->webdashubaoinfolink($this->articleid);

    }

    public function getWapdashubaoinfolinkAttribute()
    {

      return $this->wapdashubaoinfolink($this->articleid);
    }

    public function getUpdatetimeAttribute()
    {
      return $this->datetime($this->attributes['lastupdate']);
    }

    public function getAdddatetimeAttribute()
    {
      return $this->datetime($this->attributes['postdate']);
    }
    public function getSortAttribute()
    {
        $key = (int)($this->sortid - 1);
        return config('app.fenlei')[$key] ?? '未知分类';
    }
    public function getSortkeyAttribute()
    {
        return ($this->sortid - 1);
    }

    public function setSortkeyAttribute($value)
    {
        $this->attributes['sortid'] = ($value+1);
    }

    public function getSortlinkAttribute()
    {

        return route('web.dashubaosort', ['sid' => $this->sortid , 'id'=>0 , 'page'=>1],false);
    }

    public function getBidBookData($bid)
    {

        $key = config('app.info_key').$bid;
        return
                \Cache::remember($key, config('app.cacheTime_z'), function () use ($bid){
                    $bookData  =   $this->getBasicsBook()->where('articleid', $bid)->first();
                    if($bookData){
                      $bookData->load('relationChapters');
                      return $bookData->toArray();

                    }

                 });

    }


    //关联
    public function relationChapters()
    {
      //第2个参数是 chapter类的外键   第3个是 本类中articleid
        return $this->hasMany(Chapter::class ,'articleid' ,'articleid')
                    ->where('chaptertype','<=' ,0)
                    ->where('display', '<=', '0')
                    ->orderBy('chapterorder', 'asc')
                    ->limit(config('app.maxchapter'));
    }




    //前台使用
    public function scopeGetBasicsBook($query)
    {
        return $query->where('lastchapterid', '>', 0)
                    ->where('display', '<=', '0');
    }

    public function relationBookcases($uid)
    {
        return $this->hasOne(Bookcase::class ,'articleid' ,'articleid')
                    ->where('userid',$uid)->first();
    }




    public static function getBidBookDataByGet($bid)
    {

      try {

        $isuse = Mulu::where('articleid',$bid)
                                      ->where('is_use',1)
                                      ->count();
        if ($isuse <= 0) {
            $key = config('app.info_key').$bid;
            $mulu =   Mulu::where('articleid',$bid)->first();
            if($mulu){
                Mulu::where('articleid',$bid)->update(['is_use'=>1]);
            }else{
                Mulu::create(['articleid' =>$bid,'is_use' => 1]);
            }

            $bookData  = self::getBasicsBook()->where('articleid', $bid)->first();
            if($bookData){
              $bookData->load('relationChapters');
              \Cache::put($key, $bookData->toArray(), config('app.cacheTime_z'));
            }

            Mulu::where('articleid',$bid)->update(['is_use'=>0]);
        }

      } catch (\Exception $e) {
          \Log::error('更新书的缓存失败',['bookid'=>$bid ,'errno' => $e->getMessage()]);
           Mulu::where('articleid',$bid)->update(['is_use'=>0]);
      }
    }



    //txt
    public function saveOrGetTxtData($bid,$cid,$lastupdate,$attachment)
    {
      $outData = ['state'=>false ,'content'=>''];
      //判断是不是在本地硬盘上
      if (!config('app.benditxt')) {
          $path = intval($bid/1000) . '/' .$bid . "/{$cid}.txt";
          $txtDir = config('app.txtdir') . $path;
          $key = config('app.txt_key') . $path;
          $cacheDataArry = \Cache::get($key);
          if ( !$cacheDataArry ) {//不存在
              $outData = $this->saveTxt($txtDir,$outData,$key,$lastupdate,$attachment);
          }elseif ($cacheDataArry && $lastupdate != $cacheDataArry['lastupdate']) {//虽然有缓存 但是内容被编辑过
              $outData = $this->saveTxt($txtDir,$outData,$key,$lastupdate,$attachment);
          }elseif ($cacheDataArry) {
              $outData = $cacheDataArry;
          }
      }else{
          $path = "\\" .intval($bid/1000) . "\\" .$bid . "\\{$cid}.txt";
          $txtDir = config('app.benditxtdir') . $path;
          if(file_exists($txtDir)){
             $txtData = file_get_contents($txtDir);
             $txtData = trim($txtData);
             if (!empty($txtData)) {
                 $txtData = mb_convert_encoding($txtData, 'utf-8', 'GBK,UTF-8,ASCII');
                 $outData['state'] = true;
                 $txtData = @str_replace("\n\n","\n",$txtData);
                 $txtData = @str_replace("\n","\n\n",$txtData);
                 $txtData = @str_replace("&nbsp;"," ",$txtData);
                 $txtData = @str_replace("<","&lt;",$txtData);
                 $txtData = @str_replace(">","&gt;",$txtData);
                 $outData['content'] = $txtData;
             }else{
                $this->txtLog($txtDir,'本地路径',$attachment);
             }

          }else{
            \Log::error('文件不存在',['路径'=>$txtDir]);

          }
      }
      return $outData;

    }

    public function saveTxt($txtDir,$outData,$key,$lastupdate,$attachment)
    {

      try {
        $curl = new \Curl\Curl();
        $curl->setOpt(CURLOPT_TIMEOUT, 5);
        $curl->get($txtDir);
        $curl->close();
        if ($curl->http_status_code == '200') {
            $txt = $curl->response;
            $txt = trim($txt);
            if (!empty($txt)) {
                $txt = mb_convert_encoding($txt, 'utf-8', 'GBK,UTF-8,ASCII');
                $txt = @str_replace("\n\n","\n",$txt);
                $txt = @str_replace("\n","\n\n",$txt);
                $txt = @str_replace("&nbsp;"," ",$txt);
                $txt = @str_replace("<","&lt;",$txt);
                $txt = @str_replace(">","&gt;",$txt);
            }else {
                $this->txtLog($txtDir,$curl->http_status_code,$attachment);
            }
        }elseif ($curl->http_status_code == '404') {
          \Log::error('章节可能丢失',['路径'=>$txtDir,'状态码'=>$curl->http_status_code]);
        }else{
              //记录获取错误的TXT 因为历史原因 可记录
            $this->txtLog($txtDir,$curl->http_status_code,$attachment);
          }
      }catch (Exception $e) {
        \Log::error('采集异常报错了',['路径'=>$txtDir]);
      }
      if (!empty($txt)) {
          $outData = ['state'=>true , 'content'=>$txt , 'lastupdate' =>$lastupdate];
          \Cache::put($key, $outData, config('app.cacheTime_g'));
      }

      return $outData;

    }


    function txtLog($txtDir,$http_status_code,$attachment)
    {

      //记录获取错误的TXT 因为历史原因 可记录
      if (config('app.isopentxtlog')) {

          if (!empty($attachment)) {
            $ms = 'txt内容获取失败 有附件提示可能是图片';
          }else{
            $ms = 'txt内容获取失败 无附件提示,可能内容丢失';
          }

          \Log::error($ms,['路径'=>$txtDir ,'状态码'=>$http_status_code]);
      }

    }
}
