<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoryType extends Model
{
    protected $guarded = ['id'];

    public function stories()
    {
        return $this->hasMany(Story::class);
    }
}
