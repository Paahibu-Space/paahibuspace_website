<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class BlogPostResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $imageUrl = $this->featured_image;
        if ($this->featuredEntry) {
            $imageUrl = $this->featuredEntry->path;
        }

        $featuredImageUrl = null;
        if ($imageUrl) {
            $featuredImageUrl = asset('assets/uploads/media-uploader/' . $imageUrl);
        }

        // Handle author - can be either a string (admin name) or a relationship (team member)
        $authorData = null;
        if ($this->author) {
            // If author is a string (admin name), use it directly
            $authorData = $this->author;
        } elseif ($this->whenLoaded('author') && $this->author_id) {
            // If author relationship is loaded, use TeamMemberResource
            $authorData = new TeamMemberResource($this->author);
        }

        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'title' => $this->title,
            'excerpt' => $this->excerpt,
            'featured_image_url' => $featuredImageUrl,
            'content' => $this->content,
            'author' => $authorData,
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
