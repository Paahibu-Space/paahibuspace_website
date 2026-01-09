<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Story extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'story_type_id',
        'program_id',
        'year',
        'image',
        'quote',
        'short_story',
        'full_story_heading',
        'full_story_content',
        'is_published',
        'role',
        'order',
    ];

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

    public function mediaEntry()
    {
        return $this->belongsTo(MediaUpload::class, 'image');
    }

    public function getImageUrlAttribute()
    {
        if ($this->mediaEntry) {
            return asset('assets/uploads/media-uploader/' . $this->mediaEntry->path);
        }
        if ($this->image) {
             return asset('assets/uploads/media-uploader/' . $this->image);
        }
        return null;
    }
}
