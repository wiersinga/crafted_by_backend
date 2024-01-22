<?php

namespace App\Http\Resources;

use App\Models\Speciality;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArtistResource extends JsonResource
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
            'siret'=> $this->siret,
            'history'=> $this->history,
            'craftingDescription'=> $this->craftingDescription,
            'speciality'=> SpecialityResource::collection($this->speciality),
            'user'=> UserResource::collection($this->user),
            'theme'=> ThemeResource::collection($this->theme),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];

    }
}
