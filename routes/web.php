<?php

use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\BarangKeluarController;

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
Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAksi')->name('login.aksi');
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});



Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::controller(BarangController::class)->prefix('barang')->group(function () {
        Route::get('', 'index')->name('barang');
    });

    Route::controller(BarangMasukController::class)->prefix('barangMasuk')->group(function () {
        Route::get('', 'index')->name('barangMasuk');
        Route::get('tambah', 'tambah')->name('barangMasuk.tambah');
        Route::post('tambah', 'simpan')->name('barangMasuk.tambah.simpan');
        Route::get('edit/{id}', 'edit')->name('barangMasuk.edit');
        Route::post('edit/{id}', 'update')->name('barangMasuk.tambah.update');
        // Route::post('hapus/{id}', 'hapusBarangMasuk');
    });
    Route::post('hapusBarangMasuk/{id}', [BarangMasukController::class, 'hapusBarangMasuk']);


    Route::controller(BarangKeluarController::class)->prefix('barangKeluar')->group(function () {
        Route::get('', 'index')->name('barangKeluar');
        Route::get('tambah', 'tambah')->name('barangKeluar.tambah');
        Route::post('tambah', 'simpan')->name('barangKeluar.tambah.simpan');
        Route::get('edit/{id}', 'edit')->name('barangKeluar.edit');
        Route::post('edit/{id}', 'update')->name('barangKeluar.tambah.update');
        // Route::post('hapus/{id}', 'hapus');
    });
    Route::post('hapusBarangKeluar/{id}', [BarangKeluarController::class, 'hapusBarangKeluar']);

    Route::controller(JenisBarangController::class)->prefix('jenisBarang')->group(function () {
        Route::get('', 'index')->name('jenisBarang');
        Route::get('tambah', 'tambah')->name('jenisBarang.tambah');
        Route::post('tambah', 'simpan')->name('jenisBarang.tambah.simpan');
        Route::get('edit/{id}', 'edit')->name('jenisBarang.edit');
        Route::post('edit/{id}', 'update')->name('jenisBarang.tambah.update');
        // Route::post('hapus/{id}', 'hapusJenisBarang');
    });
    Route::post('hapusJenisBarang/{id}', [JenisBarangController::class, 'hapusJenisBarang']);
    Route::controller(UserController::class)->prefix('user')->group(function () {
        Route::get('', 'index')->name('user');
        Route::get('tambah', 'tambah')->name('user.tambah');
        Route::post('tambah', 'simpan')->name('user.tambah.simpan');
        Route::get('edit/{id}', 'edit')->name('user.edit');
        Route::post('edit/{id}', 'update')->name('user.tambah.update');
        // Route::post('hapus/{id}', 'hapusUser');
    });
    Route::post('hapus/{id}', [UserController::class, 'hapusUser']);

    Route::controller(LaporanController::class)->prefix('laporan')->group(function () {
        Route::get('', 'index')->name('laporan');
    });
});