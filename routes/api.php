<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\FlareClient\Api;

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
Route::middleware('auth:api')->get('/userInfo', [UserController::class, 'getUserData']);

Route::get('/products',[ApiController::class, 'getAllProducts']);
Route::get('/product/{productName}',[ApiController::class, 'getProduct']);
Route::get('/user/{id}/cart/product',[UserController::class,"findUserProduct"]);
Route::get('/category/{categoryName}',[ApiController::class, "findByCategory"]);

Route::post('/register',[UserController::class,"InsertUser"]);
Route::post('/login',[UserController::class,"LoginUser"]);

Route::post('/product',[ProductController::class, "InsertProduct"]);
Route::post('/cart',[CartController::class, "InsertCart"]);