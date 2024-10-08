<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Http\Resources\AddressResource;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    public function index()
    {
        $this->athorize('view',Address::class);
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

    public function update(Request $request, $id)
    {
        $address = Address::findOrFail($id);
        $this->authorize('update', $address);
        $address->update($request->all());
    }

    public function destroy($id)
    {
        $address = Address::findOrFail($id);
        $this->authorize('delete', $address);

        $address->delete();
        return ('The address is deleted !');

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

