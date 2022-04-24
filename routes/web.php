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

Route::get('logout', [LoginController::class, 'logout'])->name('logout');

// Route::group(['middleware' => 'auth', 'ceklevel:admin,teller,kepala,nasabah,koor'], function () {

Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('profile', [DashboardController::class, 'profile'])->name('profile');

    Route::group(['prefix' => 'admin/'], function () {
        Route::get('data_sampah', [AdminController::class, 'dataSampah']);
        Route::get('data_nasabah', [AdminController::class, 'dataNasabah']);
        Route::get('supplier', [AdminController::class, 'dataSupplier']);

        Route::post('addsampah', [AdminController::class, 'addSampah'])->name('addsampah');

        Route::get('setoran_sampah', [AdminController::class, 'dataSetoran']);
        Route::get('detail_setoran', [AdminController::class, 'detailSetoran']);
        Route::get('addsetoran', [AdminController::class, 'addSetor']);


        Route::get('kerajinan', [AdminController::class, 'dataKerajinan']);
        Route::get('penjualan', [AdminController::class, 'dataPenjualan']);
        Route::get('jenis_sampah', [AdminController::class, 'dataJenis']);
        Route::post('addjenis', [AdminController::class, 'addJenis']);


        Route::get('data_user', [AdminController::class, 'dataUser']);
        Route::post('updateStatus/{id}', [AdminController::class, 'updateStatus']);
    });

    Route::group(['prefix' => 'teller/'], function () {
        Route::get('data_sampah', [TellerController::class, 'dataSampah']);

        Route::post('addsampah', [TellerController::class, 'addSampah2'])->name('addsampah');

        Route::get('data_sampah/ubah/{id_sampah}', [TellerController::class, 'editSampah']);
        Route::put('data_sampah/ubah/simpan', [TellerController::class, 'updateSampah'])->name('updatesampah');

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

    Route::group(['prefix' => 'nasabah/'], function () {
        Route::get('tabungan', [NasabahController::class, 'tabungan']);
        Route::get('profile', [NasabahController::class, 'profile'])->name('nasabah.profile');
    });
});
