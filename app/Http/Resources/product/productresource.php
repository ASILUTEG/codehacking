<?php

namespace App\Http\Resources\product;

use Illuminate\Http\Resources\Json\JsonResource;

class productresource extends JsonResource
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
            'code' => $this->id,
            'Name' => $this->name,
            'Describtion' => $this->detail,
            'tprice' => $this->price,
            'MyStoc' => $this->stock,
            'DiscountPrecent' => $this->discount,
            'price After diss' => round((1 - ($this->discount / 100)) * $this->price),
            'Rateing' => $this->reviews->count() > 0 ? $this->reviews->sum('star') / $this->reviews->count() : 'Not Rating yet',
            'href' => [
                'reviews' => route('reviews.index', $this->id)
            ],
        ];
    }
}
