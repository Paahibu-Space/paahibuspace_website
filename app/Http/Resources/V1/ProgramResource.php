<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProgramResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'application_status' => $this->application_status, // Open, Closed, Upcoming
            'is_application_open' => $this->is_application_open,
            'application_link' => $this->application_link,
            'application_start_date' => $this->application_start_date ? $this->application_start_date->toISOString() : null,
            'application_end_date' => $this->application_end_date ? $this->application_end_date->toISOString() : null,
        ];
    }
}
