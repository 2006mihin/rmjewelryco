<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'payment_method'=> $this->payment_method,
            'amount'        => $this->amount,
            'payment_date'  => $this->payment_date,
            'order'         => new OrderResource($this->whenLoaded('order')),
        ];
    }
}
