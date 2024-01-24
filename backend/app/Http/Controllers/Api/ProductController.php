<?php

namespace App\Http\Controllers\Api;


use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Material;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    public function index()
    {
        return ProductResource::collection(Product::all());
    }

    public function store(StoreProductRequest $request)
    {
            $product = Product::create($request->validated());
            $material= Material::find($request->get('material_id'));
            $product->materials()->attach($material);
            return new ProductResource($product);

    }

    public function show($id)
    {
        return new ProductResource(Product::findOrFail($id));
    }

    public function getProductsByCategory($categoryName): JsonResponse
    {


        $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->where('categories.name', '=',$categoryName)
            ->select('products.name','products.description','products.price')
            ->get();

        dd($products);

       // return $products;

        return response()->json(['products'=>$products]);
    }

    public function update(UpdateProductRequest $request, product $product)
    {
        $product->update($request->all());
        return new ProductResource($product);
    }

    public function destroy(Product $product)
    {
        $product->delete();
    }
}
