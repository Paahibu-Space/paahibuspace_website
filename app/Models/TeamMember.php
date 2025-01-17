<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $table = 'team_members';
    protected $fillable = ['name','description', 'team_category_id', 'designation','image','icon_one','icon_two','icon_three','icon_one_url','icon_two_url','icon_three_url'];

    public function category(){
        return $this->belongsTo('App\Models\TeamMemberCategory','team_category_id');
    }
}
