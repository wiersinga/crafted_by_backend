<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->resource->id,
            'name'=>$this->resource->name,
            'description'=>$this->resource->description,
            'price'=>$this->resource->price,
            'category_id'=> $this->resource->category,
            'artist_id'=> new ArtistResource($this->resource->arist),
        ];
    }
}
