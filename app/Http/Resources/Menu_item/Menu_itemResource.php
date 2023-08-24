<?php

namespace App\Http\Resources\Menu_item;

use Illuminate\Http\Resources\Json\JsonResource;

class Menu_itemResource extends JsonResource
{
    public function toArray($request): array
    {
        return parent::toArray($request);
    }
}
