<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'application_start_date' => 'datetime',
        'application_end_date' => 'datetime',
    ];

    public function getApplicationStatusAttribute()
    {
        $now = now();

        if ($this->application_start_date && $now->lt($this->application_start_date)) {
            return 'Upcoming';
        }

        // If end date is passed
        if ($this->application_end_date && $now->gt($this->application_end_date)) {
            return 'Closed';
        }

        // If start date exists and we are past it (and not past end date), or if no start date but no end date passed
        return 'Open';
    }

    public function getIsApplicationOpenAttribute()
    {
        return $this->application_status === 'Open';
    }
}
