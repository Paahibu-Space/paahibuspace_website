<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WalansiProgramFellow extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function imageEntry()
    {
        return $this->belongsTo(MediaUpload::class, 'image');
    }

    public function getImageUrlAttribute()
    {
        if ($this->imageEntry) {
            return asset('assets/uploads/media-uploader/' . $this->imageEntry->path);
        }
        if ($this->image) {
            return asset('assets/uploads/media-uploader/' . $this->image);
        }
        return null;
    }
}
