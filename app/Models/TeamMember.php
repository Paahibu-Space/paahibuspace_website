<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(TeamCategory::class, 'team_category_id');
    }
}
