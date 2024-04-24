<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->id,
            'firstName'=> $this->firstName,
            'lastName'=> $this->lastName,
            'birthdate'=>$this->birthdate,
            'email'=> $this->email,
            'password' =>$this->password, // fix the permission after
            'address'=> new AddressResource($this->resource->address),
            'role' => new RoleResource($this->resource->role),
        ];
    }
}
