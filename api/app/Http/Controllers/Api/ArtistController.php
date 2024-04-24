<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreArtistRequest;
use App\Http\Requests\UpdateArtistRequest;
use App\Http\Resources\ArtistResource;
use App\Models\Artist;


use App\Models\Product;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;


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


    public function getArtistByProduct($productId){
        $artist = DB::Table('artists')
            ->join('products', 'products.artist_id','=','artists.id')
            ->where('products.id','=', $productId)
            ->select('artists.*')
            ->get();
        return $artist;
    }


}
