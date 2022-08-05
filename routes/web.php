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
use App\Http\Controllers\Savings\SavingController;
use App\Http\Controllers\TransaksiController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'loans', 'namespace' => 'Loans'], function(){

    route::get('/', [SubmissionController::class, 'index'])->name('loans');
    route::get('submissions', [SubmissionController::class, 'index'])->name('submissions');
});
Route::group(['namespace'], function(){

    route::resource('types', 'TypeController');
});

Route::group(['prefix' =>'savings'],  function(){
    route::get('/anggota', [SavingController::class,'index'])->name('savings.anggota');
});
Route::group(['prefix' => 'transaksi'], function(){
    route::get('', [TransaksiController::class, 'index'])->name('transaksi'); // Ini belum dikasih url
});

Route::group(['prefix'=> 'installments', 'namespace'=>'Installments'], function(){
    route::get('/', 'InstallmentController@index')->name('installments.index');
});

Route::group(['prefix' => 'users', 'namespace' => 'Users'], function(){
    Route::post('/', 'UserController@store')->name('users.store');
    Route::get('anggota','AnggotaController@index')->name('anggota.index');
    Route::get('create', 'UserController@create')->name('users.create');
    Route::get('pegawai','PegawaiController@index')->name('pegawai.index');
});

