<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramPaymentLogs extends Model
{
    protected $table = 'program_payment_logs';
    protected $fillable = ['email','name','program_name','program_cost','program_gateway','registration_id','package_gateway','status','transaction_id','track'];
    public function registration_logs(){
        return $this->belongsTo('App\ProgramAttendance','registration_id');
    }
}
