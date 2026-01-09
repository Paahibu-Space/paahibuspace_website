<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamCategory extends Model
{
    protected $guarded = ['id'];

    public function members()
    {
        return $this->hasMany(TeamMember::class, 'team_category_id');
    }
}
