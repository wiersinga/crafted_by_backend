<?php

namespace App\Http\Controllers\Api;


use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;



class ProductController extends Controller
{
    public function index()
    {
        return ProductResource::collection(Product::all());
    }

    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->all());
        return new ProductResource($product);
    }

    public function show($id)
    {
        return new ProductResource(Product::findOrFail($id));
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
