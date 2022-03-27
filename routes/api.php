<?php

use App\Http\Controllers\AdvisorySourceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DailyHealthCheckController;
use App\Http\Controllers\OrgStructureController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceCatelogeController;
use App\Http\Controllers\SystemHealthIssueController;
use App\Http\Controllers\UseCaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\LaravelIgnition\Http\Controllers\HealthCheckController;

//header("Cache-Control: no-cache, must-revalidate");
//header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
//header('Access-Control-Allow-Origin:  *');
//header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
//header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');


# login & register & logout & approval
//Route::options('{any?}', function (){
//    return response('',200);
//})->where('any', '.*');


# Org
//Route::resource('/orgs', OrgStructureController::class);

Route::middleware(['cors'])->group(function () {

    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    Route::put('/approve/user', [AuthController::class, 'approve_user_by_email']);
    Route::get('/users', [AuthController::class, 'users']);

    Route::get('/orgs', [OrgStructureController::class, 'index']);
    Route::post('/orgs', [OrgStructureController::class, 'store']);
    Route::put('/orgs', [OrgStructureController::class, 'update']);

    Route::resource('/usecases', UseCaseController::class);
    Route::resource('/advisorysource', AdvisorySourceController::class);
    Route::resource('/servicecateloge', ServiceCatelogeController::class);

    Route::resource('/healthcheck', DailyHealthCheckController::class);
    Route::resource('/healthissue', SystemHealthIssueController::class);

    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::post('/logout', [AuthController::class, 'logout']);
    });

});

# Forums

//Route::group(['middleware' => ['cors']], function () {
//    Route::resource('/orgs', OrgStructureController::class);
//
//});
//Route::resource('/products', ProductController::class);
//Route::get('/products', [ProductController::class, 'index']);
//Route::get('/products/{id}', [ProductController::class, 'show']);
//Route::get('/products/search/{name}', [ProductController::class, 'search']);
//Route::put('/approve/userbyid/{id}', [AuthController::class, 'approve_user_by_id']);

