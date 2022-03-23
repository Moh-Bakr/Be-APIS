<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::resource('/products', ProductController::class);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
//Route::get('/products', [ProductController::class, 'index']);
//Route::get('/products/{id}', [ProductController::class, 'show']);
//Route::get('/products/search/{name}', [ProductController::class, 'search']);
//Route::put('/approve/userbyid/{id}', [AuthController::class, 'approve_user_by_id']);
Route::put('/approve/user', [AuthController::class, 'approve_user_by_email']);

Route::group(['middleware' => ['auth:sanctum']], function () {
//    Route::post('/products', [ProductController::class, 'store']);
//    Route::put('/products/{id}', [ProductController::class, 'update']);
//    Route::delete('/products/{id}', [ProductController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);

});
