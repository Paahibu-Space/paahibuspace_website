<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Knowledgebase extends Model
{
    protected $table = 'knowledgebases';
    protected $fillable = ['title','status','topic_id','content','views','slug','meta_tags','meta_description'];

    public function topic(){
        return $this->hasOne('App\KnowledgebaseTopic','id','topic_id');
    }
}
