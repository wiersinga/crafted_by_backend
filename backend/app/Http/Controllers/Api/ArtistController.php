<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreArtistRequest;
use App\Http\Requests\UpdateArtistRequest;
use App\Http\Resources\ArtistResource;
use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{

    public function index()
    {
        return ArtistResource::collection(Artist::all());
    }

    public function store(StoreArtistRequest $request)
    {
        $artist = Artist::create($request->all());
        return new ArtistResource($artist);
    }

    public function show($id)
    {
        return new ArtistResource(Artist::findOrFail($id));
    }

    public function update(UpdateArtistRequest $request, Artist $artist)
    {
        $artist->update($request->all());
        return new ArtistResource($artist);
    }

    public function destroy(Artist $artist)
    {
        $artist->delete();
    }

}
