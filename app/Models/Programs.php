<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Programs extends Model
{
    protected $table = 'programs';
    protected $fillable = ['title','status','date','image','time', 'cost', 'available_registrations','slug','venue','venue_location','content','meta_description','meta_tags'];

}

