<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Students\DashboardController;
use App\Http\Controllers\Students\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::view('/landing-page', 'landing-page')->name('home');

// student routes
Route::get('/masuk', [LoginController::class, 'index'])->name('student-login');
Route::post('/do-login', [LoginController::class, 'doLogin'])->name('student-do-login');

Route::get('/beranda', [DashboardController::class, 'index'])->name('student-dashboard');
Route::get('/get-data-pribadi-siswa', [DashboardController::class, 'getDataDashboard']);
Route::get('/get-data-nilai-siswa', [DashboardController::class, 'getDataNilai']);
Route::post('/first-time-login', [DashboardController::class, 'postFirstTimeLogin']);
Route::post('/lock-student-data', [DashboardController::class, 'postLockStudentData']);


// example
Route::view('/component', 'component')->name('component');
Route::view('/new-components', 'new-components')->name('new-components');
// example
