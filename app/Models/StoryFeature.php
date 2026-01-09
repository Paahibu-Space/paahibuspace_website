<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoryFeature extends Model
{
    protected $guarded = ['id'];

    public function story()
    {
        return $this->belongsTo(Story::class);
    }
}
