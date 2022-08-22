<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::post('register' , [LoginController::class , 'registerSanctum']);
Route::post('login' , [LoginController::class, 'loginSanctum']);

//Route::group(['middleware' => ['auth:sanctum']] , function() {
//    Route::resources(['employee' => 'EmployeeController']);
//
//});
/*Route::get('play' , function(Request  $request) {
    return \App\Models\Employee::;
});*/



//http://127.0.0.1:8000/api/register
