<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ImpactStatResource;
use App\Models\ImpactStat;
use Illuminate\Http\Request;

class ImpactStatController extends Controller
{
    public function index()
    {
        $stats = ImpactStat::where('is_active', true)
            ->orderBy('order')
            ->get();

        return ImpactStatResource::collection($stats);
    }
}
