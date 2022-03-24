<?php

use App\Http\Controllers\AdvisorySourceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrgStructureController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceCatelogeController;
use App\Http\Controllers\UseCaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, PATCH, DELETE');
header('Access-Control-Allow-Headers: Accept, Content-Type, X-Auth-Token, Origin, Authorization');

# login & register & logout & approval

Route::get('/hello', function () {
    return "hello heroku";
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::put('/approve/user', [AuthController::class, 'approve_user_by_email']);

# Org
Route::resource('/orgs', OrgStructureController::class);
Route::put('/orgs', [OrgStructureController::class, 'update']);

# Forums
Route::resource('/usecases', UseCaseController::class);
Route::resource('/advisorysource', AdvisorySourceController::class);
Route::resource('/servicecateloge', ServiceCatelogeController::class);


//Route::resource('/products', ProductController::class);
//Route::get('/products', [ProductController::class, 'index']);
//Route::get('/products/{id}', [ProductController::class, 'show']);
//Route::get('/products/search/{name}', [ProductController::class, 'search']);
//Route::put('/approve/userbyid/{id}', [AuthController::class, 'approve_user_by_id']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});
