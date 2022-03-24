<?php

use App\Http\Controllers\AdvisorySourceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrgStructureController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UseCaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

# login & register & logout & approval
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::put('/approve/user', [AuthController::class, 'approve_user_by_email']);

# Org
Route::resource('/orgs', OrgStructureController::class);
Route::put('/orgs', [OrgStructureController::class, 'update']);

# Uses Cases
Route::resource('/usecases', UseCaseController::class);
Route::resource('/advisorysource', AdvisorySourceController::class);



//Route::resource('/products', ProductController::class);
//Route::get('/products', [ProductController::class, 'index']);
//Route::get('/products/{id}', [ProductController::class, 'show']);
//Route::get('/products/search/{name}', [ProductController::class, 'search']);
//Route::put('/approve/userbyid/{id}', [AuthController::class, 'approve_user_by_id']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});
