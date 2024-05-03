<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UpcomingProgramsCategory extends Model
{
    protected $table = 'upcoming_programs_categories';
    protected $fillable = ['title','status'];
}
