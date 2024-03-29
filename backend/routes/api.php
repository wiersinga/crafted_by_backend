<?php


use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\Api\ArtistController;
use App\Http\Controllers\Api\LoginRegisterController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ReviewController;
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

//// CRUD Product
Route::get('/products/category/{categoryName}', [ProductController::class, 'getProductsByCategory']);
Route::get('/products/search/{searchTerm}',[ProductController::class, 'getProductsBySearch']);
Route::get('/products/material/{materialName}',[ProductController::class, 'getProductsByMaterial']);
Route::get('/products/artist/{artistName}',[ProductController::class, 'getProductsByArtist']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}',[ProductController::class, 'show']);
Route::post('/products/post', [ProductController::class, 'store']);
Route::put('/products/update/{id}',[ProductController::class, 'update']);
Route::delete('/products/delete/{id}', [ProductController::class, 'destroy']);
//Route::apiResource('/products',ProductController::class);

//// CRUD Address

Route::get('/addresses', [AddressController::class, 'index']);
Route::get('/addresses/{id}',[AddressController::class, 'show']);
Route::post('/addresses/post', [AddressController::class, 'store']);
Route::put('/addresses/update/{id}',[AddressController::class, 'update']);
Route::delete('/addresses/delete/{id}', [AddressController::class, 'destroy']);

// CRUD Artist

Route::get('/artists', [ArtistController::class, 'index']);
Route::get('/artists/{id}',[ArtistController::class, 'show']);
Route::post('/artists/post', [ArtistController::class, 'store']);
Route::put('/artists/update/{id}',[ArtistController::class, 'update']);
Route::delete('/artists/delete/{id}', [ArtistController::class, 'destroy']);

// CRUD Order

Route::get('/orders', [OrderController::class, 'index']);
Route::get('/orders/{id}',[OrderController::class, 'show']);
Route::post('/orders/post', [OrderController::class, 'store']);
Route::put('/orders/update/{id}',[OrderController::class, 'update']);
Route::delete('/orders/delete/{id}', [OrderController::class, 'destroy']);

// CRUD Review

Route::get('/reviews', [ReviewController::class, 'index']);
Route::get('/reviews/{id}',[ReviewController::class, 'show']);
Route::post('/reviews/post', [ReviewController::class, 'store']);
Route::put('/reviews/update/{id}',[ReviewController::class, 'update']);
Route::delete('/reviews/delete/{id}', [ReviewController::class, 'destroy']);

//// CRUD User

Route::middleware('auth:sanctum')->get('/users', [UserController::class, 'index']);
Route::middleware('auth:sanctum')->get('/users/{id}',[UserController::class, 'show']);
//Route::post('/users/post', [UserController::class, 'store']);
Route::middleware('auth:sanctum')->put('/users/update/{id}',[UserController::class, 'update']);
Route::middleware('auth:sanctum')->delete('/users/delete/{id}', [UserController::class, 'destroy']);

