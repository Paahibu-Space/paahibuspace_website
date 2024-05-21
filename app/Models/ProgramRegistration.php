<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramRegistration extends Model
{
    protected $table = 'program_registration';
    protected $fillable = ['status','program_id','program_name','user_id','custom_fields','attachment'];

    public function program(){
        return $this->belongsTo('App\Models\Programs','program_id');
    }

}
