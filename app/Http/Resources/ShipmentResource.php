<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShipmentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'address_line1' => $this->address_line1,
            'address_line2' => $this->address_line2,
            'city'          => $this->city,
            'district'      => $this->district,
            'country'       => $this->country,
            'shipment_date' => $this->shipment_date,
            'order'         => new OrderResource($this->whenLoaded('order')),
        ];
    }
}
