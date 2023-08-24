<?php

namespace App\Http\Resources\Customer_address;

use Illuminate\Http\Resources\Json\JsonResource;

class Customer_addressResource extends JsonResource
{
    public function toArray($request): array
    {
        return parent::toArray($request);
    }
}
