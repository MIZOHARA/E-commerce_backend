<?php

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
Route::post('/users/store', [\App\Http\Controllers\UsersController::class, 'Store_user']);
Route::get('/users/{User:id}/show', [\App\Http\Controllers\UsersController::class, 'show_user']);
Route::get('/users/list', [\App\Http\Controllers\UsersController::class, 'show_users_list']);

Route::post('/products/store', [\App\Http\Controllers\ProductsController::class, 'Store_products']);
Route::get('products/{Product:id}/show', [\App\Http\Controllers\ProductsController::class, 'show_product']);
Route::get('/products/list', [\App\Http\Controllers\ProductsController::class, 'show_products_list']);

Route::post('/blogs/store', [\App\Http\Controllers\BlogsController::class, 'Store_blogs']);
Route::get('/blogs/{blogs:id}/show', [\App\Http\Controllers\BlogsController::class, 'show_blog']);
Route::get('/blogs/list', [\App\Http\Controllers\BlogsController::class, 'show_blogs_list']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
