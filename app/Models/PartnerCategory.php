<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnerCategory extends Model
{
    protected $guarded = ['id'];

    public function partners()
    {
        return $this->hasMany(Partner::class, 'partner_category_id');
    }
}
