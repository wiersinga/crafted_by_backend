<?php

namespace App\Http\Controllers\Api;


use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Material;
use App\Models\Product;
use Illuminate\Routing\Controller;


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
