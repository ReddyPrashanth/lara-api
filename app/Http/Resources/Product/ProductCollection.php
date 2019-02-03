<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;

class ProductCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "name" => $this->name,
            "discount" => $this->discount,
            "totalPrice" => (1 - ($this->discount/100)) * $this->price,
            "rating" => $this->reviews->count() > 0 ? round($this->reviews->sum("rating")/$this->reviews->count(), 2) : "No Rating Available",
            "href" => [
                "reviews" => route('products.show', $this->id)
            ]
            ];
    }
}
