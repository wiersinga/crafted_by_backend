<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public static $wrap = 'orders';
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->resource->id,
            'orderNum'=>$this->resource->orderNum,
            'paymentStatus'=>$this->resource->paymentStatus,
            'totalPrice'=>$this->resource->totalPrice,

        ];
    }
}
