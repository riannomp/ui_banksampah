<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KoordinatorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TellerController;
use App\Models\Koordinator;
use Illuminate\Routing\Route as RoutingRoute;
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

// Lupa password
Route::get('forgot-password', [LoginController::class, 'forgotPassword'])->name('forgot-password');
Route::get('forgot-password/{token}', [LoginController::class, 'forgotPasswordValidate']);
Route::post('forgot-password', [LoginController::class, 'resetPassword'])->name('forgot-password');
Route::put('reset-password', [LoginController::class, 'updatePassword'])->name('reset-password');

Route::get('logout', [LoginController::class, 'logout'])->name('logout');

// Route::group(['middleware' => 'auth', 'ceklevel:admin,teller,kepala,nasabah,koor'], function () {

Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('profile', [DashboardController::class, 'profile'])->name('profile');
    Route::post('profile/pegawai/edit', [ProfileController::class, 'updatePegawai'])->name('updatePegawai');
    Route::post('profile/koor/edit', [ProfileController::class, 'updateKoor'])->name('updateKoor');
    Route::post('profile/nasabah/edit', [ProfileController::class, 'updateNasabah'])->name('updateNasabah');

    Route::post('profile/auth/edit', [ProfileController::class, 'updateAuth'])->name('updateAuth');


    Route::group(['prefix' => 'admin/'], function () {
        Route::get('data_sampah', [AdminController::class, 'dataSampah']);
        Route::get('data_nasabah', [AdminController::class, 'dataNasabah']);
        Route::get('data_nasabah/tambah_nasabah', [AdminController::class, 'addNasabah'])->name('tambah_nasabah');
        Route::post('data_nasabah/tambah_nasabah/simpan', [AdminController::class, 'addNasabah2'])->name('tambahNasabahh');
        Route::post('data_nasabah/edit/simpan', [AdminController::class, 'updateNasabah'])->name('updateNasabahh');

        Route::get('data_pegawai', [AdminController::class, 'dataPegawai']);
        Route::get('tambah_pegawai', [AdminController::class, 'addPegawai'])->name('addPegawai');
        Route::post('tambah_pegawai/simpan', [AdminController::class, 'addPegawai2'])->name('addPegawai2');
        Route::post('update_pegawai/simpan', [AdminController::class, 'updatePegawai'])->name('updatePegawaii');
        Route::delete('data_pegawai/hapus/{id_pegawai}', [AdminController::class, 'deletePegawai'])->name('deletePegawai');

        Route::get('data_koordinator', [AdminController::class, 'dataKoor'])->name('datakoor');
        Route::get('data_koordinator/tambah_koor', [AdminController::class, 'addKoor'])->name('addKoor');
        Route::post('data_koordinator/tambah_koor/simpan', [AdminController::class, 'addKoor2'])->name('addKoor2');
        Route::post('data_koordinator/edit/simpan', [AdminController::class, 'updateKoor'])->name('updateKoorr');

        //view
        Route::get('data_sampah/tambah_sampah', [AdminController::class, 'addSampahView'])->name('addSampahView');
        //modal
        Route::post('addsampah', [AdminController::class, 'addSampah'])->name('addsampah');

        Route::get('data_sampah/ubah/{id_sampah}', [AdminController::class, 'editSampah']);
        Route::put('data_sampah/ubah/simpan', [AdminController::class, 'updateSampah'])->name('updatesampah2');
        Route::post('data_sampah/hapus/{id_sampah}', [AdminController::class, 'deleteSampah'])->name('deleteSampah');

        Route::get('setoran_sampah', [AdminController::class, 'dataSetoran']);
        Route::get('setoran_sampah2', [AdminController::class, 'searchBydate'])->name('filtersetoran');

        Route::get('detail_setoran/{id_setoran}', [AdminController::class, 'detailSetoran']);
        Route::get('addsetoran', [AdminController::class, 'addSetor']);



        Route::get('jenis_sampah', [AdminController::class, 'dataJenis']);
        Route::post('addjenis', [AdminController::class, 'addJenis']);
        Route::post('updatejenis', [AdminController::class, 'updateJenis'])->name('updateJenis');
        Route::post('jenis_sampah/hapus/{id_jenis}', [AdminController::class, 'deleteJenis'])->name('deleteJenis');

        Route::get('data_user', [AdminController::class, 'dataUser']);
        Route::post('updateStatus/{id_user}', [AdminController::class, 'updateStatus']);
        Route::post('resetpassword', [AdminController::class, 'resetPassword'])->name('resetPassword');

        Route::get('setoran/cetakpdf', [PDFController::class, 'cetakpdf'])->name('cetakpdf');
    });

    Route::group(['prefix' => 'teller/'], function () {
        Route::get('data_sampah', [TellerController::class, 'dataSampah']);

        Route::post('addsampah', [TellerController::class, 'addSampah2'])->name('addsampah');


        Route::get('data_sampah/ubah/{id_sampah}', [TellerController::class, 'editSampah']);
        Route::put('data_sampah/ubah/simpan', [TellerController::class, 'updateSampah'])->name('updatesampah');

        Route::get('data_nasabah', [TellerController::class, 'dataNasabah']);
        Route::get('data_nasabah/tambah_nasabah', [TellerController::class, 'addNasabah'])->name('addnasabah');
        Route::post('data_nasabah/tambah_nasabah/simpan', [TellerController::class, 'addNasabah2'])->name('addNasabahTeller');
        Route::post('data_nasabah/edit/simpan', [TellerController::class, 'updateNasabah'])->name('updateNasabahTeller');


        Route::get('data_koordinator', [TellerController::class, 'dataKoor']);
        Route::post('data_koordinator/tambah_koor/simpan', [TellerController::class, 'addKoor2'])->name('addKoorTeller');
        Route::post('data_koordinator/edit/simpan', [TellerController::class, 'updateKoor'])->name('updateKoorTeller');

        Route::get('setoran_sampah', [TellerController::class, 'dataSetoran']);


        Route::post('addsetor', [TellerController::class, 'addSetoran']);
        Route::post('addsetor/simpan', [TellerController::class, 'addSetoran2'])->name('teller.setoran');

        Route::get('detail_setoran/{id_setoran}', [TellerController::class, 'detailSetoran']);

        Route::get('penarikan', [TellerController::class, 'penarikan']);
        Route::post('penarikan/tambah_penarikan', [TellerController::class, 'addPenarikan'])->name('penarikan.teller');

        // PDF
        Route::get('detail_setoran/cetak_pdf={id_setoran}', [PDFController::class, 'cetakPDF'])->name('cetak_pdf');

        Route::get('addsetoran', [TellerController::class, 'addSetoran']);
    });

    Route::group(['prefix' => 'nasabah/'], function () {
        Route::get('tabungan', [NasabahController::class, 'tabungan']);
        Route::get('penarikan', [NasabahController::class, 'penarikan']);
        Route::get('detail_setoran/{id_setoran}', [NasabahController::class, 'detailSetoran']);

        Route::get('profile', [NasabahController::class, 'profile'])->name('nasabah.profile');
    });


    Route::group(['prefix' => 'koor/'], function () {
        Route::get('data_sampah', [KoordinatorController::class, 'dataSampah']);

        Route::get('setoran_sampah', [KoordinatorController::class, 'dataSetoran']);
        Route::get('addsetoran', [KoordinatorController::class, 'addSetoran']);
        Route::post('addsetor/simpan', [KoordinatorController::class, 'addSetoran2'])->name('koor.setoran');
        Route::get('detail_setoran/{id_setoran}', [KoordinatorController::class, 'detailSetoran']);

        // Route::post('setoran/kode', [KoordinatorController::class, 'kode'])->name('fetch');

        // Riwayat
        Route::get('riwayat_setoran', [KoordinatorController::class, 'riwayatSetor']);
        Route::get('riwayat_penarikan', [KoordinatorController::class, 'riwayatPenarikan']);


        Route::get('penarikan', [KoordinatorController::class, 'penarikan']);
        Route::post('penarikan/tambah_penarikan', [KoordinatorController::class, 'addPenarikan'])->name('penarikan.koor');

        Route::get('data_nasabah', [KoordinatorController::class, 'dataNasabah']);
        // Route::get('data_nasabah/tambah_nasabah', [KoordinatorController::class, 'addNasabah'])->name('addNasabahKoor');
        Route::post('data_nasabah/tambah_nasabah/simpan', [KoordinatorController::class, 'addNasabah2'])->name('addNasabahKoor');
        Route::post('data_nasabah/update', [KoordinatorController::class, 'updateNasabah'])->name('updateNasabahh');
    });
});
