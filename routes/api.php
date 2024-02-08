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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/user/{id}/cart/quantity',[CartController::class,'getCartQauntity']);
Route::middleware('auth:api')->get('/user', [UserController::class,"getUserInfo"]);

Route::get('/products',[ApiController::class, 'getAllProducts']);
// Route::get('/product/{productName}',[ApiController::class, 'getProductbyName']);
Route::get('/product/{productId}',[ApiController::class, 'getProductbyId']);
Route::get('/category/{categoryName}',[ApiController::class, "findByCategory"]);
Route::get('/categories',[ApiController::class,'getAllCategory']);
Route::get('/user/{id}/cart/product',[UserController::class,"findUserProduct"]);

Route::post('/register',[UserController::class,"InsertUser"]);
Route::post('/login',[UserController::class,"LoginUser"]);

Route::post('/product',[ProductController::class, "InsertProduct"]);
Route::put('/product/{id}',[ProductController::class,'updateProduct']);
Route::delete('/product/{id}',[ProductController::class,'deleteProduct']);

Route::post('/cart',[CartController::class, "InsertCart"]);
Route::delete('/cart/{userId}/{productId}',[CartController::class,'deleteProductCart']);

Route::post('/upload-image', [ApiController::class, 'upload']);

Route::get('/images/{category}/{filename}', function ($category,$filename) {
    $path = storage_path('app/public/images/' . $category . '/' . $filename);
    
    if (!file_exists($path)) {
        abort(404);
    }
    
    return response()->file($path);
})->name('image.show');