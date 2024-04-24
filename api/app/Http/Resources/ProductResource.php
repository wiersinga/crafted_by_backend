<?php

namespace App\Http\Resources;

use App\Models\Review;
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
            'category'=> new CategoryResource($this->resource->category),
            'artist'=> new ArtistResource($this->resource->artist),
            'materials' =>  MaterialResource::collection($this->resource->materials),
            //'reviews' =>  ReviewResource::collection($this->resource->reviews),
        ];
    }
}
