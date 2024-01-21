<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// CRUD Product
Route::get('/products', [ProductController::class, 'getProducts']);
Route::get('/product/{id}',[ProductController::class, 'getProduct']);
Route::post('/product/post', [ProductController::class, 'storeProduct']);
Route::put('/product/update/{id}',[ProductController::class, 'updateProduct']);
Route::delete('/product/delete/{id}', [ProductController::class, 'deleteProduct']);

// CRUD Address

Route::get('/addresses', [AddressController::class, 'getAddresses']);
Route::get('/address/{id}',[AddressController::class, 'getAddress']);
Route::post('/address/post', [AddressController::class, 'storeAddress']);
Route::put('/address/update/{id}',[AddressController::class, 'updateAddress']);
Route::delete('/address/delete/{id}', [AddressController::class, 'deleteAddress']);

// CRUD Category

Route::get('/categories', [CategoryController::class, 'getCategories']);
Route::get('/category/{id}',[CategoryController::class, 'getCategory']);
Route::post('/category/post', [CategoryController::class, 'storeCategory']);
Route::put('/category/update/{id}',[CategoryController::class, 'updateCategory']);
Route::delete('/category/delete/{id}', [CategoryController::class, 'deleteCategory']);
