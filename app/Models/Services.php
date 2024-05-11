<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $table = 'services';

    protected $fillable = ['title','meta_tag','icon_type','img_icon','meta_description','status','slug','icon','image','description','categories_id','excerpt'];

    public function category(){
        return $this->belongsTo('App\Models\ServiceCategory','categories_id');
    }
}
