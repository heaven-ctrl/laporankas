<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PemasukanController;

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

Route::resource('/pemasukan', PemasukanController::class);
