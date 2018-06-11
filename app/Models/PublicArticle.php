<?php
namespace App\Models;

trait PublicArticle
{


  public function datetime($lastupdate)
  {
    return formatTime($lastupdate);
  }
  public function wapdashubaoinfolink($articleid)
  {
    return route('wap.dashubaoinfo', ['bid' => $articleid],false);

  }

  public function webdashubaoinfolink($articleid)
  {
    $id = floor($articleid / 1000);
    return route('web.dashubaoinfo', ['id'=>$id , 'bid' => $articleid],false);

  }

  public function webdashubaocontentlink($articleid , $chapterid)
  {
    $id = floor($this->articleid / 1000);
    return route('web.dashubaocontent', ['id'=>$id,'bid' => $articleid ,'cid'=>$chapterid],false);


  }

  public function wapdashubaocontentlink($articleid , $chapterid)
  {
    return route('wap.dashubaocontent', ['bid' => $this->articleid ,'cid'=>$this->chapterid],false);

  }

}
