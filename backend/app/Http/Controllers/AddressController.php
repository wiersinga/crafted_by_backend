<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function getAddresses()
    {
        return  Address::all();
    }

    public function getAddress($id){
        // $product= DB::table('products')->find($id);
        $address = Address::find($id);

        if (!$address){
            return response('Address not Found',404);
        }
        return $address;
    }

    public function storeAddress(Request $request)
    {
        $request->validate([
            'street' =>'required|string',
            'ZIPCode' => 'required|string',
            'city' => 'required|string',
            'countryCode'=> 'required|string',
        ]);

        Address::create($request->all());

        // return response()->json(['success' => true, 'message' => 'Product created successfully']);
        return response('Address created successfully');
    }

    public function updateAddress(Request $request, $id)
    {
        $request->validate([
            'street' =>'sometimes|required|string',
            'ZIPCode' => 'sometimes|required|string',
            'city' => 'sometimes|required|string',
            'countryCode'=> 'sometimes|required|string',
        ]);

        $address = Address::find($id);

        if (!$address){
            return response('Address not Found',404);
        }
        $address->update($request->all());
        return response('Address updated successfully');
    }

    public function deleteAddress($id)
    {
        $address = Address::find($id);

        if($address){
            $address->delete();
            return response('Address deleted successfully');
        }

        return response('Address not Found',404);
    }
}
