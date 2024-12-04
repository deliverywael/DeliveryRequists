<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoresController;
use Database\Factories\ProductFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::controller(AuthController::class)->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
    Route::get('me', 'me');

});



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::controller(StoresController::class)->group(function () {
    Route::get('stores',  'index');
    Route::get('stores/{id}', 'show');
    Route::post('stores', 'store');
    Route::put('stores/{id}', 'update');
    Route::delete('stores/{id}', 'delete');
    Route::get('search-stores', 'search');
});



Route::controller(ProductController::class)->group(function () {
    Route::get('products', 'index');
    Route::get('product/{id}', 'show');
    Route::post('products',  'store');
    Route::put('products/{id}',  'update');
    Route::delete('products/{id}', 'delete');
    Route::get('stores/{storeId}/search-products','searchProductsInStore');
});








