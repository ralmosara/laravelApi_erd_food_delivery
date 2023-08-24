<?php

namespace App\Http\Resources\Food_order;

use Illuminate\Http\Resources\Json\JsonResource;

class Food_orderResource extends JsonResource
{
    public function toArray($request): array
    {
        return parent::toArray($request);
    }
}
