<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\BlogCategoryResource;
use App\Http\Resources\V1\ProgramResource;
use App\Http\Resources\V1\StoryTypeResource;
use App\Models\BlogCategory;
use App\Models\Program;
use App\Models\StoryType;
use Illuminate\Http\Request;

class MetaController extends Controller
{
    public function storyTypes()
    {
        $types = StoryType::where('is_active', true)->get();
        return StoryTypeResource::collection($types);
    }

    public function programs()
    {
        $programs = Program::where('is_active', true)->get();
        return ProgramResource::collection($programs);
    }

    public function blogCategories()
    {
        $categories = BlogCategory::where('is_active', true)->get();
        return BlogCategoryResource::collection($categories);
    }
}
