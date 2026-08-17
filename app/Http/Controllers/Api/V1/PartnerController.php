<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\PartnerCategoryResource;
use App\Http\Resources\V1\PartnerResource;
use App\Models\Partner;
use App\Models\PartnerCategory;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::with('category')
            ->where('is_active', true)
            ->orderBy('order')
            ->get();

        return PartnerResource::collection($partners);
    }

    public function categories()
    {
        $categories = PartnerCategory::with(['partners' => function ($query) {
            $query->where('is_active', true)->orderBy('order');
        }])->orderBy('id')->get();

        return PartnerCategoryResource::collection($categories);
    }
}
