<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMemberCategory extends Model
{
    protected $table = 'team_members_categories';
    protected $fillable = ['name'];
}
