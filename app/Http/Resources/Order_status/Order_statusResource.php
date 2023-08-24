<?php

namespace App\Http\Resources\Order_status;

use Illuminate\Http\Resources\Json\JsonResource;

class Order_statusResource extends JsonResource
{
    public function toArray($request): array
    {
        return parent::toArray($request);
    }
}
