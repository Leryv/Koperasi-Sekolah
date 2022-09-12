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
use App\Http\Controllers\Types\TypeController;
use App\Http\Controllers\Savings\SavingController;
use App\Http\Controllers\Installments\InstallmentController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Users\AnggotaController;
use App\Http\Controllers\Users\PegawaiController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\WithdrawalController;
// use App\Http\Controllers\Cetak\LaporanAnggotaController;
// use App\Http\Controllers\Cetak\LaporanInstallmentsController;
// use App\Http\Controllers\Cetak\LaporanSavingController;
// use App\Http\Controllers\Cetak\LaporanTransaksiController;
// use App\Http\Controllers\Cetak\PrintLoanController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class , 'index'])->name('home');

Route::group(['prefix' => 'loans'
// , 'namespace' => 'Loans'
], function(){

    route::get('/', [LoanController::class, 'index'])->name('loans');
    route::get('create/{type}', [LoanController::class, 'create'])->name('loans.create');
    route::post('kalkulasi/{type}', [LoanController::class, 'kalkulasi'])->name('loans.kalkulasi');
    route::post('store/{type}', [LoanController::class, 'store'])->name('loans.store');
    route::post('{loan}', [LoanController::class, 'destroy'])->name('loans.destroy');
    
    route::get('cetak',[LoanController::class, 'cetak'])->name('loans.cetak');
    route::get('print/{loan}',[LoanController::class, 'print'])->name('loans.print');

    // Route Submission
    route::get('submissions', [SubmissionController::class, 'index'])->name('submissions');
    route::post('submissions/{loan}', [SubmissionController::class, 'store'])->name('submissions.store');
});

Route::group(['namespace'=> 'Types'], function(){
    route::resource('types', 'TypesController');
});

Route::group(['prefix' =>'savings'],  function(){
    route::get('/anggota', [SavingController::class,'index'])->name('savings.anggota');
    route::get('create', [SavingController::class,'create'])->name('savings.create');
    route::post('store', [SavingController::class,'store'])->name('savings.store');
    route::get('edit/{saving}', [SavingController::class,'edit'])->name('savings.edit');
    route::patch('update/{saving}', [SavingController::class,'update'])->name('savings.update');

    route::get('laporan/savings', [SavingController::class, 'cetak'])->name('savings.cetak');
});

Route::group(['prefix' => 'transaksi'], function(){
    route::get('', [TransaksiController::class,'index'])->name('transaksi');
    route::get('edit/{saving}', [TransaksiController::class,'edit'])->name('transaksi.edit');
    route::patch('store/{saving}', [TransaksiController::class,'store'])->name('transaksi.store');

    route::get('cetak-butki/{withdrawal}',[TransaksiController::class,'cetak'])->name('cetak-bukti.transaksi');

});
Route::group(['prefix'=> 'installments', 'namespace'=>'Installments'], function(){
    route::get('/', [InstallmentController::class , 'index'])->name('installments.index');
    route::get('/{loan}', [InstallmentController::class , 'show'])->name('installments.show');
    route::get('/{loan}/create', [InstallmentController::class , 'create'])->name('installments.create');
    route::post('{loan}/store', [InstallmentController::class , 'store'])->name('installments.store');

    route::get('laporan/installlments', [InstallmentController::class , 'all'])->name('laporan.installments');
    route::get('laporan/month/installments', [InstallmentController::class , 'monthly'])->name('laporan.months.installments');

});

Route::group(['prefix' => 'users', 'namespace' => 'Users'], function(){
    Route::post('/', [UserController::class, 'store'])->name('users.store');
    Route::get('{user}/edit', 'UserController@edit')->name('users.edit');
    Route::get('create', [UserController::class, 'create'])->name('users.create');
    Route::patch('{user}/update', [UserController::class , 'update'])->name('users.update');

    
    Route::get('anggota',[AnggotaController::class, 'index'])->name('anggota.index');
    Route::get('laporan/anggota', [AnggotaController::class,'month'])->name('laporan.anggota');
    Route::get('laporan/all/anggota', [AnggotaController::class,'all'])->name('laporan.all.anggota');

    Route::get('pegawai',[PegawaiController::class, 'index'])->name('pegawai.index');
});

// Route::group(['prefix' =>'withdrawal'],  function(){
//     route::get('', [WithdrawalController::class, 'index'])->name('withdrawal');
// });

// Route::group(['prefix' =>'cetak'],  function(){
//     route::get('laporan/savings', [LaporanSavingController::class, 'savings'])->name('laporan.savings');
//     route::get('laporan/anggota', [AnggotaController::class,'month'])->name('laporan.anggota');
//     route::get('laporan/all/anggota', [AnggotaController::class,'all'])->name('laporan.all.anggota');
//     route::get('laporan/month/installments', 'Cetak\LaporanInstallmentController@monthly')->name('laporan.months.installments');
//     route::get('laporan/installlments', 'Cetak\LaporanInstallmentController@all')->name('laporan.installments');
//     route::get('cetak-butki/{withdrawal}',[LaporanTransaksiController::class,'show'])->name('transaksi.cetak-bukti');
//     route::get('cetak/{loan}',[PrintLoanController::class, 'show'])->name('loans.cetak');
// });


