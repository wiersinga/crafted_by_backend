<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    public function getProducts()
    {
        return  Product::all();
    }

    public function getProduct($id){

        $product = Product::find($id);

        if (!$product){
            return response('Product not Found',404);
        }
        return $product;
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' =>'required|string',
            'description' => 'required|string',
            'price' => 'required|decimal:2',
            'material_id'=> 'required|exists:App\Models\Material,id',
            'category_id'=> 'required|exists:App\Models\Category,id',
            'artist_id'=> 'required|exists:App\Models\Artist,id',
        ]);

        Product::create($request->all());

       // return response()->json(['success' => true, 'message' => 'Product created successfully']);
        return response('Product created successfully');
    }

    public function updateProduct(Request $request, $id)
    {
        $request->validate([
            'name' =>'sometimes|required|string',
            'description' => 'sometimes|required|string',
            'price' => 'sometimes|required|decimal:2',
            'material_id'=> 'sometimes|required|exists:App\Models\Material,id',
            'category_id'=> 'sometimes|required|exists:App\Models\Category,id',
            'artist_id'=> 'sometimes|required|exists:App\Models\Artist,id',
        ]);

        $product = Product::find($id);

        if (!$product){
              return response('Product not Found',404);
        }
        $product->update($request->all());
        return response('Product updated successfully');
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);

        if($product){
            $product->delete();
            return response('Product deleted successfully');
        }

        return response('Product not Found',404);
    }
}
