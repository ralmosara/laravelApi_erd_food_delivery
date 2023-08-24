<?php

namespace App\Http\Resources\Order_menu_item;

use Illuminate\Http\Resources\Json\JsonResource;

class Order_menu_itemResource extends JsonResource
{
    public function toArray($request): array
    {
        return parent::toArray($request);
    }
}
