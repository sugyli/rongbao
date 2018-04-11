<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'jieqi_system_users';
    protected $primaryKey = 'uid';
    protected $guarded = [];

    protected $hidden = [
        'pass', 'remember_token','api_token',
    ];


    protected $appends = [
                          'caption'
                        ];


    public function getPasswordAttribute()
    {
        return $this->attributes['pass'];
    }


    public static function createEmail()
    {
        $email = str_random(30);
        $emails = self::byEmail($email)->count();
        if ($emails) {
            return self::createEmail();
        }
        return $email;
    }

    public function scopeByEmail($query ,$email)
    {
        return $query->where('email', $email);
    }

    //等级
    public function getCaptionAttribute()
    {
      $honor = Honor::getUserHonor($this);
      return $honor->caption;
    }

    public function getRegdateAttribute($value)
    {
      return date("Y-m-d",$value);
    }

    //书架数
    public function getBookcasecountAttribute()
    {
      $honor = Honor::getUserHonor($this);

      return isset($honor->setting['bookcasecount']) ? $honor->setting['bookcasecount'] : config('app.bookcasemaxcount');

    }

    //消息容量
    public function getMassagemaxcountAttribute()
    {
      $honor = Honor::getUserHonor($this);
      return isset($honor->setting['maxmessage']) ? $honor->setting['maxmessage'] : config('app.massagemaxcount');
    }

    //推荐数
    public function getDayrecommendcountAttribute()
    {
      $honor = Honor::getUserHonor($this);
      return isset($honor->setting['dayrecommendcount']) ? $honor->setting['dayrecommendcount'] : config('app.dayrecommendmaxcount');
    }

    public function getShenyudayrecommendcountAttribute()
    {
        //用户拥有的今日推荐次数
        $userRecommendCount = (int)$this->dayrecommendcount;
        //用户今天使用了多少票
        $userHits = (int)$this->relationRankingsUseHits();
        return  $userRecommendCount - $userHits;
    }

    //设置收件箱已读
    public function markAdminemailAsRead()
    {
        if($this->adminemail >= 1) {
            $this->forceFill(['adminemail' => 0])->save();
        }
    }

    public function markAdminemailAsNoRead()
    {
        if($this->adminemail < 9 ) {
            $this->increment('adminemail');
        }
    }

    //用户今天使用了多少票
  public function relationRankingsUseHits()
  {
    $date = date("Y-m-d",time());
    $date = strtotime($date);
    //第2个参数是 关联类的外键   第3个是 本类中
      return $this->hasMany(Ranking::class ,'uid' ,'uid')
                  ->where('ranking_date',$date)
                  ->sum('hits');
  }



  public function relationBookcases()
  {
      //第2个参数是 关联类的外键   第3个是 本类中
      return $this->hasMany(Bookcase::class ,'userid' ,'uid');
  }


  //第2个参数是 关联类的外键   第3个是 本类中
  public function relationOutboxs()
  {
      return $this->hasMany(Message::class ,'fromid' ,'uid');
  }
  //关联收件箱  如果当属性用就是不加（）就是对象 加了是个关联的关系
  public function relationInboxs()
  {
      return $this->hasMany(Message::class ,'toid' ,'uid');
  }

  //第三个参数为中间模型的外键名称 而第四个参数为最终模型的外键名称，第五个参数则为本地键。
  public function relationRankingsTodyBookHits($articleid)
  {
    $date = date("Y-m-d",time());
    $date = strtotime($date);
      return $this->hasMany(Ranking::class ,'uid' ,'uid')
                    ->where('articleid',$articleid)
                    ->where('ranking_date',$date)
                    ->first();
  }

}
