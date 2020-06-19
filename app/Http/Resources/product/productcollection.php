<?php

namespace App\Http\Resources\product;

use Illuminate\Http\Resources\Json\JsonResource;

class productcollection extends JsonResource
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
            'Name' => $this->name,
            'tprice' => $this->price,
            'Rateing' => $this->reviews->count() > 0 ? $this->reviews->sum('star') / $this->reviews->count() : 'Not Rating yet',
            'href' => [
                'reviews' => route('products.show', $this->id)
            ],
        ];
    }
}
