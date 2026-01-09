<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoryTimeline extends Model
{
    protected $guarded = ['id'];

    public function story()
    {
        return $this->belongsTo(Story::class);
    }
}
