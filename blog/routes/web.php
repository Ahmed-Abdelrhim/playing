<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => 'disable_back_btn'], function () {
    Route::get('/', function () {
        return view('welcome');
    });



    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('data','Controller@data');
//'middleware' => 'guest:admin'
    Route::group(['middleware'=>'guest:web'] , function() {
        Route::get('admin/login' , 'LoginController@viewAdminLogin')->name('admin.login');
        Route::post('checkAdmin','LoginController@checkAdminIfExists')->name('admin.post.login');

        Route::get('login/google','LoginController@redirectToGoogle')->name('login.google');
        Route::get('login/google/callback', 'LoginController@handleProviderGoogleCallback');

        Route::get('sign-in/github','LoginController@redirectToGithub')->name('login.github');
        Route::get('login/github/callback', 'LoginController@handleProviderGithubCallback');



        Auth::routes();

        Route::get('data','LoginController@data');
    });
// ,'namespace' =>'Auth'
    Route::group(['middleware' => 'auth:web'  ] , function() {
        Route::get('dashboard','LoginController@index')->name('dashboard');
        Route::get('cantRedirect','LoginController@index')->name('cantRedirect');
        Route::get('logout','LoginController@logout')->name('logout');
        Route::get('getUniversities/{id}','LoginController@getUniversities')->name('getUniversities');

        Route::get('dropzone',[HomeController::class , 'form']);

        Route::post('/save_ropzone',[HomeController::class,'dropzoneImage'])->name('dropzone-images');
        Route::get('custom', [HomeController::class, 'custom']);

        Route::get('view/data',[EmployeeController::class,'customView']);
        Route::get('custom',[EmployeeController::class,'fetchAll']) ->name('dataTable');

        Route::get('play',[HomeController::class , 'play']);
        Route::post('reject/submit/data',[HomeController::class , 'rejectSubmitData']) -> name('rejected-submit-data');
        Route::get('employee/data',[EmployeeController::class , 'dataModel'])->name('emp.data');

        Route::get('edit/Employee' , [EmployeeController::class , 'editAdmin'])->name('editEmployee');
    });


    Route::get('play', [HomeController::class, 'jquery']);



});
