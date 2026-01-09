<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class BlogPostResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'title' => $this->title,
            'excerpt' => $this->excerpt,
            'featured_image_url' => Storage::url($this->featured_image),
            'content' => $this->content,
            'author' => new TeamMemberResource($this->whenLoaded('author')),
            'category' => $this->whenLoaded('category', function () {
                return $this->category->name;
            }),
            'tags' => BlogTagResource::collection($this->whenLoaded('tags')),
            'published_at' => $this->published_at ? $this->published_at->toISOString() : null,
            'seo_title' => $this->seo_title,
            'seo_description' => $this->seo_description,
        ];
    }
}
