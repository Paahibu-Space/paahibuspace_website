<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $guarded = ['id'];


    public function profileEntry()
    {
        return $this->belongsTo(MediaUpload::class, 'image');
    }

    public function category()
    {
        return $this->belongsTo(TeamCategory::class, 'team_category_id');
    }
}
