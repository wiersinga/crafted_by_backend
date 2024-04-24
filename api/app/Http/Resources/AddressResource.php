<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public static $wrap = 'address';
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->resource->id,
            'street'=> $this->resource->street,
            'ZIPCode'=> $this->resource->ZIPCode,
            'city'=> $this->resource->city,
            'countryCode'=> $this->resource->countryCode
        ];
    }
}
