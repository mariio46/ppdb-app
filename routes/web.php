<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HasRole\LoginController;

Route::get('/', HomeController::class)->name('home');

Route::view('/landing-page', 'landing-page')->name('home');

Route::view('/dashboard', 'dashboard.index')->name('dashboard');

Route::get('login', [LoginController::class, 'index'])->name('login');
// example
Route::view('/component', 'component')->name('component');
Route::view('/new-components', 'new-components')->name('new-components');
// example
