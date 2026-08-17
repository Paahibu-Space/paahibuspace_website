<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $guarded = ['id'];

    public function logoEntry()
    {
        return $this->belongsTo(MediaUpload::class, 'logo');
    }

    public function category()
    {
        return $this->belongsTo(PartnerCategory::class, 'partner_category_id');
    }
}
