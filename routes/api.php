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
Route::post('users/store', [\App\Http\Controllers\UsersController::class, 'Store_user']);
Route::get('users/{User:id}/show', [\App\Http\Controllers\UsersController::class, 'show_user']);
Route::get('users/list', [\App\Http\Controllers\UsersController::class, 'show_users_list']);
Route::put('users/{User:id}/update', [\App\Http\Controllers\UsersController::class, 'update_user']);
Route::delete('users/{User:id}/delete', [\App\Http\Controllers\UsersController::class, 'delete_user']);
Route::post('users/login', [\App\Http\Controllers\UsersController::class, 'login_user']);
Route::post('users/check_otp', [\App\Http\Controllers\UsersController::class, 'check_otp']);

Route::post('products/store', [\App\Http\Controllers\ProductsController::class, 'Store_products']);
Route::get('products/{Product:id}/show', [\App\Http\Controllers\ProductsController::class, 'show_product']);
Route::get('products/list', [\App\Http\Controllers\ProductsController::class, 'show_products_list']);
Route::put('products/{Product:id}/update', [\App\Http\Controllers\ProductsController::class, 'update_product']);
Route::delete('products/{Product:id}/delete', [\App\Http\Controllers\ProductsController::class, 'delete_product']);

Route::post('blogs/store', [\App\Http\Controllers\BlogsController::class, 'Store_blogs']);
Route::get('blogs/{blogs:id}/show', [\App\Http\Controllers\BlogsController::class, 'show_blog']);
Route::get('blogs/list', [\App\Http\Controllers\BlogsController::class, 'show_blogs_list']);
Route::put('blogs/{blogs:id}/update', [\App\Http\Controllers\BlogsController::class, 'update_blog']);
Route::delete('blogs/{blogs:id}/delete', [\App\Http\Controllers\BlogsController::class, 'delete_blog']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
