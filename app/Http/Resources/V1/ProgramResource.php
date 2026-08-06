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
            'fellows' => WalansiProgramFellowResource::collection($this->whenLoaded('fellows')),
            'partners' => $this->whenLoaded('partners', function () {
                return $this->partners->map(function ($partner) {
                    return [
                        'id' => $partner->id,
                        'name' => $partner->name,
                        'logo_url' => $partner->logo
                            ? asset('assets/uploads/media-uploader/' . ($partner->logoEntry->path ?? $partner->logo))
                            : null,
                        'website_url' => $partner->website_url,
                        'role_label' => $partner->pivot->role_label,
                        'description' => $partner->pivot->description,
                        'order' => $partner->pivot->order,
                    ];
                });
            }),
        ];
    }
}
