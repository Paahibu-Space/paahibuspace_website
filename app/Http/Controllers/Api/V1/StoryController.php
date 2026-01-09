<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\StoryResource;
use App\Models\Story;
use App\Models\StoryType;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function index()
    {
        $stories = Story::with(['storyType', 'program'])
            ->where('is_published', true)
            ->orderBy('order')
            ->orderByDesc('created_at')
            ->paginate(15);

        return StoryResource::collection($stories);
    }

    public function show($slug)
    {
        $story = Story::with(['storyType', 'program', 'features', 'timeline'])
            ->where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        return new StoryResource($story);
    }

    public function byType($typeSlug)
    {
        $type = StoryType::where('slug', $typeSlug)->firstOrFail();

        $stories = Story::with(['storyType', 'program'])
            ->where('story_type_id', $type->id)
            ->where('is_published', true)
            ->orderBy('order')
            ->orderByDesc('created_at')
            ->paginate(15);

        return StoryResource::collection($stories);
    }
}
