<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class TeamMemberResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $imagePath = $this->image;
        if ($this->profileEntry) {
            $imagePath = $this->profileEntry->path;
        }

        $imageUrl = null;
        if ($imagePath) {
            $imageUrl = asset('assets/uploads/media-uploader/' . $imagePath);
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'role' => $this->role,
            'image_url' => $imageUrl,
            'category' => $this->whenLoaded('category', function () {
                return $this->category->name;
            }),
            'linkedin_url' => $this->linkedin_url,
            'email' => $this->email,
            'order' => $this->order,
        ];
    }
}
