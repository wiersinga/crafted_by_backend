<?php


use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\Api\ArtistController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CodeCheckController;
use App\Http\Controllers\Api\ForgotPasswordController;
use App\Http\Controllers\Api\LoginRegisterController;
use App\Http\Controllers\Api\MaterialController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ResetPasswordController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});


// Auth
Route::post('/register', [LoginRegisterController::class, 'register']);
Route::post('/login', [LoginRegisterController::class, 'login']);

// logout
Route::middleware('auth:sanctum')->post('/logout',[LoginRegisterController::class, 'logout']);
// Password forgot and rest
Route::post('password/email',  ForgotPasswordController::class);
Route::post('password/code/check', CodeCheckController::class);
Route::post('password/reset', ResetPasswordController::class);


Route::middleware('auth:sanctum')->group(function () {
    Route::post('/products/create', [ProductController::class, 'create']);
    Route::put('/products/update/{id}',[ProductController::class, 'update']);
    Route::delete('/products/delete/{id}', [ProductController::class, 'destroy']);

});
Route::get('/phpinfo', function () {
    return phpinfo();
});
//// CRUD Product
Route::get('/products/category/{categoryName}', [ProductController::class, 'getProductsByCategory']);
Route::get('/products/categories/filter/{selectedCategories}', [ProductController::class, 'getProductsByCategories']);

Route::get('/products/search/{searchTerm}',[ProductController::class, 'getProductsBySearch']);
Route::get('/products/material/{materialName}',[ProductController::class, 'getProductsByMaterial']);
Route::get('/products/artist/{artistName}',[ProductController::class, 'getProductsByArtist']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/artist/{artistId}', [ProductController::class, 'getArtistProducts']);

Route::get('/products/rand', [ProductController::class, 'getProductsRandom']);
Route::get('/products/news', [ProductController::class, 'getNewestProducts']);

Route::get('/products/{id}',[ProductController::class, 'show']);
//Route::apiResource('/products',ProductController::class);
// CRUD Category

Route::get('/categories', [CategoryController::class, 'index']);

// CRUD Material
Route::get('/materials', [MaterialController::class, 'index']);
// CRUD artist


// CRUD Address

Route::get('/addresses', [AddressController::class, 'index']);
Route::get('/addresses/{id}',[AddressController::class, 'show']);
Route::get('/addresses/artist/{artistId}',[AddressController::class, 'getAddressArtist']);
Route::post('/addresses/post', [AddressController::class, 'store']);
Route::put('/addresses/update/{id}',[AddressController::class, 'update']);
Route::delete('/addresses/delete/{id}', [AddressController::class, 'destroy']);

// CRUD Artist

Route::get('/artists', [ArtistController::class, 'index']);
Route::get('/artists/{id}',[ArtistController::class, 'show']);
Route::post('/artists/post', [ArtistController::class, 'store']);
Route::get('/artists/{productId}/profile', [ArtistController::class, 'getArtistByProduct']);
Route::put('/artists/update/{id}',[ArtistController::class, 'update']);
Route::delete('/artists/delete/{id}', [ArtistController::class, 'destroy']);

// CRUD Order

Route::get('/orders', [OrderController::class, 'index']);
Route::get('/orders/{id}',[OrderController::class, 'show']);
Route::post('/orders/post', [OrderController::class, 'store']);
Route::put('/orders/update/{id}',[OrderController::class, 'update']);
Route::delete('/orders/delete/{id}', [OrderController::class, 'destroy']);

//// CRUD User

Route::middleware('auth:sanctum')->get('/users', [UserController::class, 'index']);
Route::middleware('auth:sanctum')->get('/users/{id}',[UserController::class, 'show']);
Route::middleware('auth:sanctum')->put('/users/update/{id}',[UserController::class, 'update']);
Route::middleware('auth:sanctum')->delete('/users/delete/{id}', [UserController::class, 'destroy']);

