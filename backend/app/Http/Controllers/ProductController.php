<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    public function getProducts()
    {
        $products = DB::table('products')->get();
        return $products;
    }

    public function getProduct($id){
       // $product= DB::table('products')->find($id);
        $product = Product::find($id);

        if (!$product){
            return response('Product not Found',404);
        }
        return $product;
    }
}
