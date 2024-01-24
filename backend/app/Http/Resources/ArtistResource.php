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

    public static $wrap = 'artist';
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->resource->id,
            'siret'=> $this->resource->siret,
            'history'=> $this->resource->history,
            'craftingDescription'=> $this->resource->craftingDescription,
            'speciality'=> new SpecialityResource($this->resource->speciality),
            'user'=> new UserResource($this->resource->user),
            'theme'=> new ThemeResource($this->resource->theme),
        ];

    }
}
