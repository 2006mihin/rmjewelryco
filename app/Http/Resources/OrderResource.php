<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'        => $this->id,
            'order_date'=> $this->order_date,
            'status'    => $this->status,
            'user'      => new UserResource($this->whenLoaded('user')),
            'products'  => ProductResource::collection($this->whenLoaded('products')),
            'payment'   => new PaymentResource($this->whenLoaded('payment')),
            'shipment'  => new ShipmentResource($this->whenLoaded('shipment')),
        ];
    }
}
