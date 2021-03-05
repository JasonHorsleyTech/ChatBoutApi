<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Location extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'location_key' => $this->location_key,
            'traveler_count' => $this->travelers->count(),
            'mark_count' => $this->marks->count(),
        ];
    }
}
