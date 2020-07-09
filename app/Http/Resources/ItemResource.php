<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=> $this->id,
            'price'=> $this->price,
            'quantity'=> $this->quantity,
            'in_stock'=> $this->in_stock,
            'description'=> $this->description,
            'image'=> $this->image,
        ];
    }
}
