<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventsCategory extends Model
{
    protected $table = 'upcoming_programs_categories';
    protected $fillable = ['title','status'];
}
