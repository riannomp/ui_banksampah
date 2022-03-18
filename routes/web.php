<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\TellerController;
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

Route::get('login', function () {
    return view('login');
});
Route::get('/', [LoginController::class, 'showFormLogin'])->name('login');
Route::get('login', [LoginController::class, 'showFormLogin'])->name('login');
Route::post('postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('register', [LoginController::class, 'showFormRegister'])->name('register');
Route::post('register', [LoginController::class, 'register']);

Route::group(['middleware' => 'auth', 'cekrole:1,2,3,4,5'], function () {

    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::get('profile', [DashboardController::class, 'profile'])->name('profile');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    Route::group(['prefix' => 'admin/'], function () {
        Route::get('data_sampah', [AdminController::class, 'dataSampah']);
        Route::get('data_nasabah', [AdminController::class, 'dataNasabah']);
        Route::get('supplier', [AdminController::class, 'dataSupplier']);


        Route::get('setoran_sampah', [AdminController::class, 'dataSetoran']);
        Route::get('detail_setoran', [AdminController::class, 'detailSetoran']);
        Route::get('addsetoran', [AdminController::class, 'addSetor']);


        Route::get('kerajinan', [AdminController::class, 'dataKerajinan']);
        Route::get('penjualan', [AdminController::class, 'dataPenjualan']);
        Route::get('jenis_sampah', [AdminController::class, 'dataJenis']);


        Route::get('data_user', [AdminController::class, 'dataUser']);
        Route::post('updateStatus/{id}', [AdminController::class, 'updateStatus']);

    });

    Route::group(['prefix' => 'teller/'], function (){
        Route::get('data_sampah', [TellerController::class, 'dataSampah']);
        Route::get('add_sampah', [TellerController::class, 'addSampah'])->name('teller.addsampah');
        Route::post('data_sampah/simpah',[TellerController::class, 'addSampah2'])->name('teller.simpahdata');
        Route::get('data_sampah/ubah/{id}', [TellerController::class, 'editSampah']);
        Route::put('data_sampah/ubah/simpan',[TellerController::class,'updateSampah'])->name('teller.update');

        Route::get('data_nasabah', [TellerController::class, 'dataNasabah']);
        Route::get('addnasabah', [TellerController::class, 'addNasabah']);
        Route::get('supplier', [TellerController::class, 'dataSupplier']);
        Route::get('setoran_sampah', [TellerController::class, 'dataSetoran']);
        Route::get('detail_setoran', [TellerController::class, 'detailSetoran']);
        Route::get('addsetoran', [TellerController::class, 'addSetoran']);
        Route::get('kerajinan', [TellerController::class, 'dataKerajinan']);
        Route::get('transaksi_sampah', [TellerController::class, 'dataTransaksiSampah']);
        Route::get('transaksi_produk', [TellerController::class, 'dataTransaksiProduk']);
    });

    Route::group(['prefix' => 'nasabah/'], function (){
        Route::get('tabungan', [NasabahController::class, 'tabungan']);
        Route::get('profile', [NasabahController::class, 'profile'])->name('nasabah.profile');
    });

});
