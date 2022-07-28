<?php

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
use App\Http\Controllers\LoanController;
use App\Http\Controllers\SubmissionController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'loans', 'namespace' => 'Loans'], function(){

    route::get('/', [LoanController::class,'index'])->name('loans');
    route::get('submissions', [SubmissionController::class, 'index'])->name('submissions');
});
Route::group(['namespace'], function(){

    route::resource('types', 'TypeController');
});