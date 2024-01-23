<?php

namespace App\Http\Controllers\Api;

use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{

    public function index()
    {
       // return Artist::with('speciality','user','theme')->get();
    }

    public function store(Request $request)
    {
        Artist::create($request->all());
    }

    public function show(Artist $artist)
    {
        return $artist;
    }

    public function update(Request $request, Artist $artist)
    {
        $artist->update($request->all());
    }

    public function destroy(Artist $artist)
    {
        $artist->delete();
    }



//        $request->validate([
//            'siret' =>'required|string',
//            'history' => 'required|string',
//            'craftingDescription' => 'required|string',
//            'speciality_id'=> 'required|exists:App\Models\Speciality,id',
//            'user_id'=> 'required|exists:App\Models\User,id',
//            'theme_id'=> 'exists:App\Models\Theme,id',
//        ]);
//
//
//
//
//        $request->validate([
//            'siret' =>'sometimes|required|string',
//            'history' => 'sometimes|required|string',
//            'craftingDescription' => 'sometimes|required|string',
//            'speciality_id'=> 'sometimes|required|exists:App\Models\Speciality,id',
//            'user_id'=> 'sometimes|required|exists:App\Models\User,id',
//            'theme_id'=> 'sometimes|exists:App\Models\Theme,id',
//        ]);


}
