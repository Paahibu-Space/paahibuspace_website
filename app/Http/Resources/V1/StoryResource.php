<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StoryResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'type' => $this->whenLoaded('storyType', function () {
                return $this->storyType->name;
            }),
            'name' => $this->name,
            'role' => $this->role,
            'program' => $this->whenLoaded('program', function () {
                return $this->program->name;
            }),
            'image_url' => $this->image_url,
            'quote' => $this->quote,
            'short_story' => $this->short_story,
            'full_story_heading' => $this->full_story_heading,
            'full_story_content' => $this->full_story_content,
            'features' => StoryFeatureResource::collection($this->whenLoaded('features')),
            'timeline' => StoryTimelineResource::collection($this->whenLoaded('timeline')),
            'is_published' => (bool) $this->is_published,
            'created_at' => $this->created_at->toISOString(),
        ];
    }
}
