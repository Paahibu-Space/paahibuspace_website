<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class PartnerResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $logoPath = $this->logo;
        if ($this->logoEntry) {
            $logoPath = $this->logoEntry->path;
        }

        $logoUrl = null;
        if ($logoPath) {
             $logoUrl = asset('assets/uploads/media-uploader/' . $logoPath);
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'logo_url' => $logoUrl,
            'website_url' => $this->website_url,
            'order' => $this->order,
            'category' => $this->whenLoaded('category', fn () => $this->category ? new PartnerCategoryResource($this->category) : null),
            'relationship' => $this->relationship,
            'programme_initiative' => $this->programme_initiative,
            'period' => $this->period,
            'contribution' => $this->contribution,
            'attribution_requirements' => $this->attribution_requirements,
        ];
    }
}
