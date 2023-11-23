<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Students\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::view('/landing-page', 'landing-page')->name('home');

// student routes
Route::get('/masuk', [LoginController::class, 'index'])->name('student-login');
Route::post('/do-login', [LoginController::class, 'doLogin'])->name('student-do-login');

Route::view('/beranda', 'student.dashboard.index')->name('student-dashboard');


// example
Route::view('/component', 'component')->name('component');
Route::view('/new-components', 'new-components')->name('new-components');
// example
