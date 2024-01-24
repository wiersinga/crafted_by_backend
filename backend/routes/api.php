<?php


use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\Api\ArtistController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('users',UserController::class);  // route //api/users/

Route::apiResource('addresses',AddressController::class);

Route::apiResource('artists',ArtistController::class);

Route::apiResource('products',ProductController::class);

Route::apiResource('orders',OrderController::class);

Route::apiResource('reviews', ReviewController::class);
