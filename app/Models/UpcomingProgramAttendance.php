<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UpcomingProgramAttendance extends Model
{
    protected $table = 'upcoming_program_attendances';
    protected $fillable = ['status','payment_status','quantity','event_id','event_name','checkout_type','user_id','event_cost','custom_fields','attachment'];

    public function upcomingProgram(){
        return $this->belongsTo('App\UpcomingPrograms','event_id');
    }

}
