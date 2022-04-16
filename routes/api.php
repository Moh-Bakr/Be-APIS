<?php

use App\Http\Controllers\AdvisorySourceController;
use App\Http\Controllers\ALertsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommunicationController;
use App\Http\Controllers\DailyHealthCheckController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IncidentGController;
use App\Http\Controllers\IncidentsController;
use App\Http\Controllers\OrgStructureController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\PendingIssuesController;
use App\Http\Controllers\PlayBookController;
use App\Http\Controllers\PoliciesPDFController;
use App\Http\Controllers\ProceduresPDFController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportsPDFController;
use App\Http\Controllers\ServiceCatelogeController;
use App\Http\Controllers\ShiftsController;
use App\Http\Controllers\ShifttestController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\SystemHealthIssueController;
use App\Http\Controllers\UseCaseController;
use App\Http\Resources\CommunicationResource;
use App\Http\Resources\HealthResource;
use App\Http\Resources\ShiftsResource;
use App\Models\Communication;
use App\Models\DailyHealthCheck;
use App\Models\IncidentG;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\LaravelIgnition\Http\Controllers\HealthCheckController;


Route::middleware(['cors'])->group(function () {

    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    Route::put('/approve/user', [AuthController::class, 'approve_user_by_email']);
    Route::put('/disapprove/user', [AuthController::class, 'disapprove_user_by_email']);
    Route::get('/users', [AuthController::class, 'users']);

    Route::get('/orgs', [OrgStructureController::class, 'index']);
    Route::post('/orgs', [OrgStructureController::class, 'store']);
    Route::put('/orgs', [OrgStructureController::class, 'update']);

    Route::resource('/usecases', UseCaseController::class);
    Route::resource('/advisorysource', AdvisorySourceController::class);
    Route::resource('/servicecateloge', ServiceCatelogeController::class);

    Route::resource('/HealthCheck', DailyHealthCheckController::class);
//    Route::get('/HealthCheck', function () {
//        return HealthResource::collection(DailyHealthCheck::get())->all();
//    });
//    Route::resource('/healthissue', SystemHealthIssueController::class);
    Route::resource('/ALerts', ALertsController::class);
    Route::resource('/Incidents', IncidentsController::class);
    Route::resource('/PendingIssues', PendingIssuesController::class);

//    Route::get('/Communication', function () {
//        return CommunicationResource::collection(Communication::get())->all();
//    });
    Route::resource('/Communication', CommunicationController::class);


//    Route::get('/IncidentG', function () {
//        return IncidentGResource::collection(IncidentG::get())->all();
//    });
    Route::resource('/IncidentG', IncidentGController::class);

    Route::resource('/Staff', StaffController::class);
    Route::put('/Staff', [StaffController::class, 'update']);
    Route::delete('/Staff', [StaffController::class, 'destroy']);

//    Route::resource('/Shifts', ShiftsController::class);
    Route::resource('/Shifts', shifttestController::class);
    Route::put('/Shifts', [shifttestController::class, 'update']);

//    Route::resource('/PDF', PDFController::class);
//    Route::delete('/PDF', [PDFController::class, 'destroy']);

    Route::resource('/ReportsPDF', ReportsPDFController::class);
    Route::put('/ReportsPDF', [ReportsPDFController::class, 'update']);
    Route::delete('/ReportsPDF', [ReportsPDFController::class, 'destroy']);

    Route::resource('/PoliciesPDF', PoliciesPDFController::class);
    Route::put('/PoliciesPDF', [PoliciesPDFController::class, 'update']);
    Route::delete('/PoliciesPDF', [PoliciesPDFController::class, 'destroy']);

    Route::resource('/ProceduresPDF', ProceduresPDFController::class);
    Route::put('/ProceduresPDF', [ProceduresPDFController::class, 'update']);
    Route::delete('/ProceduresPDF', [ProceduresPDFController::class, 'destroy']);

    Route::resource('/PlayBook', PlayBookController::class);
    Route::put('/PlayBook', [PlayBookController::class . 'update']);
    Route::delete('/PlayBook', [PlayBookController::class, 'destroy']);


    Route::resource('/Home', HomeController::class);
    Route::put('/Home', [HomeController::class, 'update']);
    Route::delete('/Home', [HomeController::class, 'destroy']);

    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::post('/logout', [AuthController::class, 'logout']);
    });

});


//Route::resource('/products', ProductController::class);
//Route::get('/products', [ProductController::class, 'index']);
//Route::get('/products/{id}', [ProductController::class, 'show']);
//Route::get('/products/search/{name}', [ProductController::class, 'search']);
//Route::put('/approve/userbyid/{id}', [AuthController::class, 'approve_user_by_id']);

