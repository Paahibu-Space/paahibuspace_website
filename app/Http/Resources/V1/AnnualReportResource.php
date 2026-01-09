<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AnnualReportResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $url = null;
        if($this->file_url){
             $url = asset($this->file_url);
        }

        return [
            'id' => $this->id,
            'title' => $this->title,
            'year' => $this->year,
            'description' => $this->description,
            'file_url' => $url,
        ];
    }
}
