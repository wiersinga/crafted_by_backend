<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public static $wrap = 'reviews';

    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->resource->id,
            'rating'=>$this->resource->rating,
            'comment'=>$this->resource->comment,
            'product' => new ProductResource($this->resource->product),
            'user' => new UserResource($this->resource->user),
        ];
    }
}
