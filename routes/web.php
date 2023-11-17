<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::view('/landing-page', 'landing-page')->name('home');

Route::view('/dashboard', 'dashboard.index')->name('dashboard');

Route::view('/beranda', 'auth.siswa.dashboard')->name('siswa-dashboard');
