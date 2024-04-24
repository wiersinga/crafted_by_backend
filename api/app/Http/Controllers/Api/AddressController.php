<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\AddressResource;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    public function index()
    {
        return AddressResource::collection(Address::all());
    }

    public function store(Request $request)
    {
        Address::create($request->all());
    }

    public function show(Address $address)
    {
        return $address;
    }

    public function update(Request $request, Address $address)
    {
        $address->update($request->all());
    }

    public function destroy(Address $address)
    {
        $address->delete();
    }

    public function getAddressArtist($artistId){

        $address = DB::table('addresses')
            ->join('users','users.address_id','=','addresses.id')
            ->join('artists','artists.user_id','=','users.id')
            ->where('artists.id','=',$artistId)
            ->select('addresses.*')
            ->first(); // Use first() instead of get() as we expect only one address
        return $address;
    }
}

