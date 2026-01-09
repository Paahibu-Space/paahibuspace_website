<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\AnnualReportResource;
use App\Models\AnnualReport;
use Illuminate\Http\Request;

class AnnualReportController extends Controller
{
    public function index()
    {
        $reports = AnnualReport::where('status', true)
            ->orderBy('year', 'desc')
            ->get();

        return AnnualReportResource::collection($reports);
    }
}
