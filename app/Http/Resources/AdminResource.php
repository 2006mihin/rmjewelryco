<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdminResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'        => $this->id,
            'user_name' => $this->user_name,
            'email'     => $this->email,
            'products'  => ProductResource::collection($this->whenLoaded('products')),
        ];
    }
}
