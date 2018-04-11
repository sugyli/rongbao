<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'jieqi_system_message';
    protected $primaryKey = 'messageid';
    public $timestamps = false;
    protected $guarded = ['messageid'];

    protected $appends = ['adminpostdate'];
    public function getFromnameAttribute($value)
    {
        return empty($value) ? '管理员' : $value;
    }
    public function getTonameAttribute($value)
    {
        return empty($value) ? '管理员' : $value;
    }

    public function getPostdateAttribute($value)
    {
        return formatTime($value);
    }

    public function getAdminpostdateAttribute()
    {

        return date("Y-m-d",$this->attributes['postdate']);
    }

    public function markAsRead()
    {
        if($this->isread <= 0) {
            $this->forceFill(['isread' => 1])->save();
        }
    }


    
      /*
    public function collectImages()
    {

        $links = get_images_from_html($this->content);

        if (count($links)) {
          foreach ($links as $key => $value) {
            $value = trim($value);
            Trash::where('body',$value)
                  ->delete();
            //Image::updateOrCreate($data, $data);
          }
          //  $link = array_shift($links);
        }
    }



    public function images()
    {
        return $this->hasMany(Image::class ,'relation_id' ,'messageid');
    }

    public function getContentAttribute($value)
    {
        return \Purifier::clean($value,'default');
    }

    public function getTitleAttribute($value)
    {
        return t($value);
    }
    */
}
