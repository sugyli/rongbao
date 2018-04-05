<?php
namespace App\Models;

trait PublicArticle
{


  public function updatetime($lastupdate)
  {
    return formatTime($lastupdate);
  }
  public function wapdashubaoinfolink($articleid)
  {
    return route('wap.dashubaoinfo', ['bid' => $articleid]);

  }

  public function webdashubaoinfolink($articleid)
  {
    $id = floor($articleid / 1000);
    return route('web.dashubaoinfo', ['id'=>$id , 'bid' => $articleid]) . '/';

  }

  public function webdashubaocontentlink($articleid , $chapterid)
  {
    $id = floor($this->articleid / 1000);
    return route('web.dashubaocontent', ['id'=>$id,'bid' => $articleid ,'cid'=>$chapterid]);


  }

  public function wapdashubaocontentlink($articleid , $chapterid)
  {
    return route('wap.dashubaocontent', ['bid' => $this->articleid ,'cid'=>$this->chapterid]);

  }

}
