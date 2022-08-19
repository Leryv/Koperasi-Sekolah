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

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\Savings\SavingController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\Installments\InstallmentController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Users\AnggotaController;
use App\Http\Controllers\Users\PegawaiController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class , 'index'])->name('home');

Route::group(['prefix' => 'loans', 'namespace' => 'Loans'], function(){

    route::get('/', [LoanController::class, 'index'])->name('loans');
    route::get('create/{type}', [LoanController::class, 'create'])->name('loans.create');
    route::post('kalkulasi/{type}', [LoanController::class, 'kalkulasi'])->name('loans.kalkulasi');

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
    route::get('/', [InstallmentController::class , 'index'])->name('installments.index');
});

Route::group(['prefix' => 'users', 'namespace' => 'Users'], function(){
    Route::post('/', [UserController::class, 'store'])->name('users.store');
    Route::get('{user}/edit', 'UserController@edit')->name('users.edit');
    Route::get('create', [UserController::class, 'create'])->name('users.create');
    Route::patch('{user}/update', [UserController::class , 'update'])->name('users.update');


    Route::get('anggota',[AnggotaController::class, 'index'])->name('anggota.index');
    Route::get('pegawai',[PegawaiController::class, 'index'])->name('pegawai.index');
    // Route::get('create',[PegawaiController::class, 'create'])->name('pegawai.create');
});

