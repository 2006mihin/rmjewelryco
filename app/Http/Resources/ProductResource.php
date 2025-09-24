<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->id,
            'product_name'=> $this->product_name,
            'description' => $this->description,
            'price'       => $this->price,
            'quantity'    => $this->quantity,
            'image'       => $this->image,
            'category'    => new CategoryResource($this->whenLoaded('category')),
            'admin'       => new AdminResource($this->whenLoaded('admin')),
        ];
    }
}
