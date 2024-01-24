<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreArtistRequest;
use App\Http\Requests\UpdateArtistRequest;
use App\Http\Resources\ArtistResource;
use App\Models\Artist;

use Illuminate\Routing\Controller;

class ArtistController extends Controller
{

    public function index()
    {
        return ArtistResource::collection(Artist::all());
    }

    public function store(StoreArtistRequest $request)
    {
        $artist = Artist::create($request->validated());
        return new ArtistResource($artist);
    }

    public function show($id)
    {
        return new ArtistResource(Artist::findOrFail($id));
    }

    public function update(UpdateArtistRequest $request, Artist $artist)
    {
        $artist->update($request->validated());
        return new ArtistResource($artist);
    }

    public function destroy(Artist $artist)
    {
        $artist->delete();
    }

}
