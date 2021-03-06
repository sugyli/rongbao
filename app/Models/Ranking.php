<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

use Watson\Rememberable\Rememberable;

class Ranking extends Model
{
    protected $guarded = ['id'];
    use Rememberable;
    public function relationArticles()
    {

        return $this->hasOne(Article::class ,'articleid' ,'articleid')->getBasicsBook();
    }
}
