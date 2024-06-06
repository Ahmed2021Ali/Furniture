<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'offer' => $this->offer,
            'price_after_offer' => $this->price_after_offer,
            'size' => isset($this->colors)? SizeResource::collection($this->colors) : null,
            'images' => ImagesResource::collection($this->getMedia('productImages')),
            'comments' => isset($this->comments)? CommentResource::collection($this->comments) : null,
            //'review' => $this->calcReview($this->id),

        ];
    }
}
