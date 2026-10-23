<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Kategorikas;
use App\Http\Controllers\KategorikasController;
use App\Http\Controllers\Masteriuran;
use App\Http\Controllers\MasteriuranController;
use App\Http\Controllers\Transaksiiuran;
use App\Http\Controllers\TransaksiiuranController;
use App\Http\Controllers\TransaksikasController;
use App\Http\Controllers\Warga;
use App\Http\Controllers\WargaController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])
    ->name('home');

Route::get('/profile', [ProfileController::class, 'index'])
    ->name('profile');

Route::put('/profile', [ProfileController::class, 'update'])
    ->name('profile.update');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::middleware('auth')->group(function () {
    Route::resource('kategori', KategorikasController::class);
    Route::resource('iuran', MasteriuranController::class);
    Route::resource('warga', WargaController::class);
    Route::resource('pembayaran', TransaksiiuranController::class);
    Route::resource('transaksi', TransaksikasController::class);
});
