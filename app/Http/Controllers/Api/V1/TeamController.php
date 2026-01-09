<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\TeamMemberResource;
use App\Models\TeamCategory;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $members = TeamMember::with('category')
            ->where('is_active', true)
            ->orderBy('order')
            ->get();

        return TeamMemberResource::collection($members);
    }

    public function byCategory($categorySlug)
    {
        $category = TeamCategory::where('slug', $categorySlug)->firstOrFail();

        $members = TeamMember::with('category')
            ->where('team_category_id', $category->id)
            ->where('is_active', true)
            ->orderBy('order')
            ->get();

        return TeamMemberResource::collection($members);
    }
}
