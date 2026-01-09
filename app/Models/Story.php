<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Story extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    public function storyType()
    {
        return $this->belongsTo(StoryType::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function features()
    {
        return $this->hasMany(StoryFeature::class)->orderBy('order');
    }

    public function timeline()
    {
        return $this->hasMany(StoryTimeline::class)->orderBy('order');
    }

    public function getImageUrlAttribute()
    {
        return Storage::url($this->image);
    }
}
