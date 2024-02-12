<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Material;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

/**
// * @throws \Illuminate\Auth\Access\AuthorizationException
 */
class ProductController extends Controller
{
    public function index()
    {
        //$this->authorize('viewAny', Product::class);

        return ProductResource::collection(Product::all());
    }

    public function store(StoreProductRequest $request, Product $product)
    {
            $this->authorize('create', $product);

            $product = Product::create($request->validated());
            $material= Material::find($request->get('material_id'));
            $product->materials()->attach($material);
            return new ProductResource($product);

    }
    public function show($id, Product $product)
    {
        return new ProductResource(Product::findOrFail($id));
    }

    public function update(UpdateProductRequest $request, product $product)
    {
        $this->authorize('update', $product);

        $product->update($request->all());
        return new ProductResource($product);
    }

    public function destroy(Product $product)
    {
        $this->authorize('delete', $product);

        $product->delete();
        return ('deleted');
    }

    // queries builders
    // browse categories
    public function getProductsByCategory( $categoryName, Product $product): JsonResponse
    {
        $this->authorize('view', $product);
        $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->where('categories.name', '=',$categoryName)
            ->select('products.name','products.description','products.price')
            ->get();

        return response()->json(['products'=>$products]);
    }
    // get Products by material
    public function getProductsByMaterial($materialName){
        //$this->authorize('view', $product);

        $products= DB::table('products')
            ->join('material_product','material_product.product_id','=','products.id')
            ->join('materials','material_product.material_id','=','materials.id')
            ->where('materials.name','=',$materialName)
            ->select('products.name','products.description','products.price')
            ->get();
        return $products;
    }

    // get Products by artist
    public function getProductsByArtist($artistName, Product $product)
    {
       // $this->authorize('view', $product);

        $products = DB::table('products')
            ->join('artists','artists.id','=','products.artist_id')
            ->join('users','users.id','=','artists.user_id')
            ->where('users.firstName','=',$artistName)
            ->orWhere('users.lastName','=',$artistName)
            ->select('products.name','products.description','products.price')
            ->get();
        return $products;
    }


    // get Products by searchTerm
    public function getProductsBySearch($searchTerm, Product $product)
    {
      //  $this->authorize('view', $product);

        $products = DB::table('products')
            ->where('products.name','LIKE','%'.$searchTerm.'%')
            ->select('products.name')
            ->get();

        return $products;
    }

}
