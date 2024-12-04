<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
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
Route::controller(ProductController::class)->group(function () {
    Route::get('search', 'serach');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
