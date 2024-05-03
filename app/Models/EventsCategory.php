<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventsCategory extends Model
{
    protected $table = 'events_categories';
    protected $fillable = ['title','status'];
}
