<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use PublicArticle;
    protected $guarded = ['chapterid'];
    protected $table = 'jieqi_article_chapter';
    protected $primaryKey = 'chapterid';
    protected $appends = [
                          'updatetime',
                          'webdashubaocontentlink',
                          'wapdashubaocontentlink',
                          'webdashubaoinfolink',
                          'wapdashubaoinfolink'
                        ];

    public function getUpdatetimeAttribute()
    {
      return $this->updatetime($this->attributes['lastupdate']);
    }

    public function getWapdashubaoinfolinkAttribute()
    {

      return $this->wapdashubaoinfolink($this->articleid);
    }



    public function getWebdashubaocontentlinkAttribute()
    {
        return $this->webdashubaocontentlink($this->articleid,$this->chapterid);
    }

    public function getWapdashubaocontentlinkAttribute()
    {
      return $this->wapdashubaocontentlink($this->articleid,$this->chapterid);

    }

    public function getWebdashubaoinfolinkAttribute()
    {
      return $this->webdashubaoinfolink($this->articleid);

    }



    //前台使用
    public function scopeGetBasicsChapter($query)
    {
      return $query->where('chaptertype','<=' ,0)
                    ->where('display', '<=', '0')
                    ->orderBy('chapterorder', 'asc')
                    ->limit(config('app.maxchapter'));
    }
}
