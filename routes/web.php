<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\Dashboard\DashboardController::class, 'index'])->name('index');
    Route::resource('users', App\Http\Controllers\Dashboard\UserController::class);
    Route::resource('kategori', App\Http\Controllers\Dashboard\KategoriController::class);
    Route::resource('lokasi', App\Http\Controllers\Dashboard\LokasiController::class);
    Route::resource('barang', App\Http\Controllers\Dashboard\BarangController::class);
    Route::resource('peminjaman', App\Http\Controllers\Dashboard\PeminjamanController::class);
    Route::get('barang-export-excel', [App\Http\Controllers\Dashboard\BarangController::class, 'exportExcel'])
        ->name('barang.export.excel');
    Route::get('barang-export-pdf', [App\Http\Controllers\Dashboard\BarangController::class, 'exportPdf'])
        ->name('barang.export.pdf');
    Route::resource('barang-masuks', App\Http\Controllers\Dashboard\BarangMasukController::class);
    Route::resource('barang-keluars', App\Http\Controllers\Dashboard\BarangKeluarController::class);
    Route::get('barang-masuks-export-excel', [App\Http\Controllers\Dashboard\BarangMasukController::class, 'exportExcel'])
        ->name('barang-masuks.export.excel');
    Route::get('barang-masuks-export-pdf', [App\Http\Controllers\Dashboard\BarangMasukController::class, 'exportPdf'])
        ->name('barang-masuks.export.pdf'); 
    Route::get('barang-keluars-export-excel', [App\Http\Controllers\Dashboard\BarangKeluarController::class, 'exportExcel'])
        ->name('barang-keluars.export.excel');
    Route::get('barang-keluars-export-pdf', [App\Http\Controllers\Dashboard\BarangKeluarController::class, 'exportPdf'])
        ->name('barang-keluars.export.pdf');
    Route::get('kategori-export-excel', [App\Http\Controllers\Dashboard\KategoriController::class, 'exportExcel'])
        ->name('kategori.export.excel');
    Route::get('kategori-export-pdf', [App\Http\Controllers\Dashboard\KategoriController::class, 'exportPdf'])
        ->name('kategori.export.pdf');
    Route::get('lokasi-export-excel', [App\Http\Controllers\Dashboard\LokasiController::class, 'exportExcel'])
        ->name('lokasi.export.excel');
    Route::get('lokasi-export-pdf', [App\Http\Controllers\Dashboard\LokasiController::class, 'exportPdf'])
        ->name('lokasi.export.pdf');
    Route::get('peminjaman-export-excel', [App\Http\Controllers\Dashboard\PeminjamanController::class, 'exportExcel'])
        ->name('peminjaman.export.excel');
    Route::get('peminjaman-export-pdf', [App\Http\Controllers\Dashboard\PeminjamanController::class, 'exportPdf'])
        ->name('peminjaman.export.pdf');
    Route::get('users-export-excel', [App\Http\Controllers\Dashboard\UserController::class, 'exportExcel'])
        ->name('users.export.excel');
    Route::get('users-export-pdf', [App\Http\Controllers\Dashboard\UserController::class, 'exportPdf'])
        ->name('users.export.pdf');           
});

use App\Http\Controllers\Dashboard\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard.index');
