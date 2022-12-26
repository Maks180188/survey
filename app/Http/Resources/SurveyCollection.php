<?php

namespace App\Http\Resources;

use App\Models\Survey;
use Illuminate\Http\Resources\Json\JsonResource;

class SurveyCollection extends JsonResource
{
    public $collects = Survey::class;

    public function toArray($request): array
    {
        $count = $this->collection->count();
        return [
            'count' => $count,
            'data' => $this->collection
        ];
    }
}
