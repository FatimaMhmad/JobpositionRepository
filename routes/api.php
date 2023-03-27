<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobpositionController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\SpecializationController;
use App\Http\Controllers\UserrequestController;
use App\Models\Jobposition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\RequestContext;

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

Route::group([
    'prefix'     => 'auth'
], function ($router) {

    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login',    [AuthController::class, 'login']);
});



Route::middleware(['jwt.verify'])->group(function () {
    //user
    Route::group([
        'prefix'     => 'auth'
    ], function ($router)
    {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::post('/refresh', [AuthController::class, 'refresh']);
        Route::get('/user-profile', [AuthController::class, 'userProfile']);
        Route::post('/change-password', [AuthController::class, 'changePassword']);
    });

    //city
Route::post('/city/store',        [CityController::class,'store']);
Route::post('/city/update/{city}',  [CityController::class,'update']);
Route::post ('/city/destroy/{city}', [CityController::class,'destroy']);
Route::get('/city/index',         [CityController::class,'index'])  ;

//specialization
Route::post('/specialization/store',        [SpecializationController::class,'store']);
Route::post('/specialization/update/{specialization}',  [SpecializationController::class,'update']);
Route::post ('/specialization/destroy/{specialization}', [SpecializationController::class,'destroy']);
Route::get('/specialization/index',         [SpecializationController::class,'index'])  ;
//company
Route::post('/company/store',        [CompanyController::class,'store']);
Route::post ('/company/update/{company}',     [CompanyController::class,'update']);
Route::post ('/company/destroy/{company}',     [CompanyController::class,'destroy']);
Route::get ('/company/index',              [CompanyController::class,'index']);


//jobposition
Route::post('/jobposition/store',        [JobpositionController::class,'store']);
Route::post ('/jobposition/update/{jobposition}',     [JobpositionController::class,'update']);
Route::post ('/jobposition/destroy/{jobposition}',     [JobpositionController::class,'destroy']);
Route::get ('/jobposition/index',              [JobpositionController::class,'index']);

//request
Route::post ('/request/store',        [UserrequestController::class,'store']);
Route::post ('/request/update/{userrequest}',     [UserrequestController::class,'update']);
Route::post ('/request/destroy/{userrequest}',     [UserrequestController::class,'destroy']);
Route::get  ( '/request/index',              [UserrequestController::class,'index']);

//media
Route::post ('/media/store/{id}',        [MediaController::class,'store']);
Route::post ('/media/update/{id}',        [MediaController::class,'update']);

    });



