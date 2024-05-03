<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $table = 'events';
    protected $fillable = ['title','status','date','image','time','available_slots','slug','venue','venue_location','venue_phone','content','category_id','meta_description','meta_tags'];

    public function category(){
        return $this->hasOne('App\EventsCategory','id','category_id');
    }
}
