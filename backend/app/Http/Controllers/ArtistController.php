<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Product;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function getArtists()
    {
        return  Artist::all();
    }

    public function getArtist($id){

        $artist = Artist::find($id);

        if (!$artist){
            return response('Artist not Found',404);
        }
        return $artist;
    }

    public function storeArtist(Request $request)
    {
        $request->validate([
            'siret' =>'required|string',
            'history' => 'required|string',
            'craftingDescription' => 'required|string',
            'speciality_id'=> 'required|exists:App\Models\Speciality,id',
            'user_id'=> 'required|exists:App\Models\User,id',
            'theme_id'=> 'exists:App\Models\Theme,id',
        ]);

        Artist::create($request->all());

        return response('Artist created successfully');
    }

    public function updateArtist(Request $request, $id)
    {
        $request->validate([
            'siret' =>'sometimes|required|string',
            'history' => 'sometimes|required|string',
            'craftingDescription' => 'sometimes|required|string',
            'speciality_id'=> 'sometimes|required|exists:App\Models\Speciality,id',
            'user_id'=> 'sometimes|required|exists:App\Models\User,id',
            'theme_id'=> 'sometimes|exists:App\Models\Theme,id',
        ]);

        $artist = Artist::find($id);

        if (!$artist){
            return response('Artist not Found',404);
        }
        $artist->update($request->all());
        return response('Artist updated successfully');
    }

    public function deleteArtist($id)
    {
        $artist = Artist::find($id);

        if($artist){

            $artist->delete();
            return response('Artist deleted successfully');
        }

        return response('Artist not Found',404);
    }
}
