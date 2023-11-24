<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebScrapController;
use App\Http\Controllers\DailyDataController;
use App\Http\Controllers\AuthController;
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


Route::get('/twod', [WebScrapController::class,'scraper']);

Route::get('/dailydata', [DailyDataController::class,'index']);
Route::get('/alldata', [DailyDataController::class,'show']);

//todo Admin
Route::post('barsarmarkalartunnaingkyawtintwinswe/twod/login',[AuthController::class,'login']);

Route::group(['middleware'=> 'auth:sanctum'],function(){

    Route::post('admin/dailydata/store', [DailyDataController::class,'store']);
    Route::post('admin/dailydata/update', [DailyDataController::class,'update']);
    Route::post('admin/dailydata/delete', [DailyDataController::class,'destroy']);

});




