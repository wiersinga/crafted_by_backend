<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Material;
use App\Models\Product;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

use OpenApi\Attributes as OA;


#[
    OA\Info(version: "1.0.0", description: "CraftedBy api", title: "CraftedBy-api Documentation"),
    OA\Server(url: 'http://localhost:8000', description: "local server"),
//    OA\Server(url: 'http://staging.example.com', description: "staging server"),
//    OA\Server(url: 'http://example.com', description: "production server"),
    OA\SecurityScheme( securityScheme: 'bearerAuth', type: "http", name: "Authorization", in: "header", scheme: "bearer"),
]

/**
 * // * @throws \Illuminate\Auth\Access\AuthorizationException
 */
class ProductController extends Controller
{
    #[OA\Get(
        path: "/api/products",
        summary: "List all products",
        security: [

        ],
        tags: ["Products"],
        responses: [
            new OA\Response(response: Response::HTTP_CREATED, description: "Status Ok"),
            new OA\Response(response: Response::HTTP_INTERNAL_SERVER_ERROR, description: "Server Error")
        ]
    )]

    public function index()
    {
        return ProductResource::collection(Product::all());
    }

    #[OA\Post(
        path: "/api/products/create",
        summary: "Create a new Product",
        security: [
            'bearerAuth' => []
        ],
        requestBody: new OA\RequestBody(required: true,
            content: new OA\MediaType(mediaType: "application/x-www-form-urlencoded",
                schema: new OA\Schema(required: ["name", "price", "description", "material", "category","artist"],
                    properties: [
                        new OA\Property(property: 'name', description: "Product name", type: "string"),
                        new OA\Property(property: 'description', description: "Product description", type: "text"),
                        new OA\Property(property: 'price', description: "Product price", type: "decimal"),
                        new OA\Property(property: 'material', description: "Product Material", type: "string"),
                        new OA\Property(property: 'category', description: "Product Category", type: "string"),
                        new OA\Property(property: 'artist', description: "Artist who create the product", type: "string"),
                ]))),
        tags: ["Products"],
        responses: [
            new OA\Response(response: Response::HTTP_UNAUTHORIZED, description: "Unauthorized"),
            new OA\Response(response: Response::HTTP_CREATED, description: "Register Successfully"),
            new OA\Response(response: Response::HTTP_UNPROCESSABLE_ENTITY, description: "Unprocessable entity"),
            new OA\Response(response: Response::HTTP_INTERNAL_SERVER_ERROR, description: "Server Error")
        ]
    )]
    public function create(StoreProductRequest $request)
    {
        $this->authorize('create', Product::class);

            $product = Product::create($request->validated());
            $material= Material::find($request->get('material_id'));
            $product->materials()->attach($material);
            return new ProductResource($product);
    }

    public function update(UpdateProductRequest $request, product $product, $id)
    {

        $product = Product::findOrFail($id);

        $this->authorize('update', $product);

        $product->update($request->all());

        return new ProductResource($product);
    }


//    public function store(StoreProductRequest $request)
//    {
//        $validatedData = $request->validated();
////        $materialId = $request->get('material_id');
////
////        $material = Material::find($materialId);
//
////        if (!$material) {
////            return response()->json(['error' => 'Material not found'], 404);
////        }
//
//        $product = Product::create($validatedData);
////        $product->materials()->attach($material);
//
//        return new ProductResource($product);
//    }


    public function show($id)
    {
        return new ProductResource(Product::findOrFail($id));
    }



    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $this->authorize('delete', $product);

        $product->delete();
        return ('The product is deleted !');
    }

    public function getProductsRandom(){
        $products= DB::table('products')
            ->inRandomOrder()
            ->limit(12)
            ->get();

        return response()->json(['data'=>$products]);
    }
    public function getNewestProducts(Product $product){
        $newestProducts = DB::table('products')
            ->orderBy('id', 'desc') // Order by ID in descending order (assuming ID is auto-incrementing)
            ->limit(12) // Adjust the limit as needed
            ->get();

        return $newestProducts;
    }
    // queries builders
    // browse categories
    public function getProductsByCategory( $categoryName): JsonResponse
    {
      //  $this->authorize('view', $product);
        $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->where('categories.name', '=',$categoryName)
            ->select('products.id','products.name','products.description','products.price', 'products.product_image')
            ->get();

        return response()->json(['data'=>$products]);
    }

    public function getProductsByCategories($selectedCategories)
    {
        $categoriesArray = explode(',', $selectedCategories);

        $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->whereIn('categories.name', $categoriesArray)
            ->select('products.id','products.name','products.description','products.price', 'products.product_image')
            ->get();

        return $products;
    }
   //  get Products by material/*
    public function getProductsByMaterial($materialName){

        $products= DB::table('products')
            ->join('material_product','material_product.product_id','=','products.id')
            ->join('materials','material_product.material_id','=','materials.id')
            ->where('materials.name','=',$materialName)
            ->select('products.name','products.description','products.price')
            ->get();
        return $products;
    }
    public function getProductsByMaterials(array $selectedMaterials)
    {
        $products = DB::table('products')
            ->join('material_product', 'material_product.product_id', '=', 'products.id')
            ->join('materials', 'material_product.material_id', '=', 'materials.id')
            ->whereIn('materials.name', $selectedMaterials)
            ->select('products.name', 'products.description', 'products.price')
            ->get();

        return $products;
    }

    // get Products by artist
    public function getProductsByArtist($artistName)
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
    public function getArtistProducts($artistId) {
        $products = DB::table('products')
            ->join('artists', 'artists.id','=','products.artist_id' )
            ->where('artists.id', '=', $artistId)
            ->select('products.*')
            ->get();
        return $products;
    }

//    public function getAllProductsArtist($artistId){
//
////       $products= DB::table('products')
////            ->join('artists','products.artist_id','=','artists.id')
////            ->where('artists.id', '=', $artistId)
////            ->select('products.name')
////            ->get();
////        return $products ;
//
//        $products = Product::whereHas('artist', function ($query) use ($artistId) {
//            $query->where('id', $artistId);
//        })->get();
//
//        return $products;
//    }

//        $artist = Artist::find($artistId);
//        $products = $artist->products;
//        return $products;



}
