<?php

use App\Http\Controllers\HasRole\AgencyController;
use App\Http\Controllers\HasRole\DashboardController;
use App\Http\Controllers\HasRole\FaqController;
use App\Http\Controllers\HasRole\KeyController;
use App\Http\Controllers\HasRole\OperatorController;
use App\Http\Controllers\HasRole\OriginSchoolController;
use App\Http\Controllers\HasRole\RankController;
use App\Http\Controllers\HasRole\ScheduleController;
use App\Http\Controllers\HasRole\SchoolController;
use App\Http\Controllers\HasRole\StudentController;
use App\Http\Controllers\HasRole\UserController;
use App\Http\Controllers\HasRole\VerificationController;
use Illuminate\Support\Facades\Route;

// Prefix = /panel;
Route::get('dashboard', DashboardController::class)->name('dashboard');

Route::controller(UserController::class)->group(function () {
    Route::get('users', 'index')->name('users.index');
    Route::get('users/create', 'create')->name('users.create');
    Route::get('users/{id}', 'show')->name('users.show');
    Route::get('users/{id}/lupa-password', 'forgotPassword')->name('users.lupa-password');
});

Route::controller(OriginSchoolController::class)->group(function () {
    Route::get('sekolah-asal', 'index')->name('sekolah-asal.index');
    Route::get('seskolah-asal/create', 'create')->name('sekolah-asal.create');
    Route::get('seskolah-asal/{id}', 'show')->name('sekolah-asal.show');
    Route::get('seskolah-asal/{id}/edit', 'edit')->name('sekolah-asal.edit');
});

Route::controller(StudentController::class)->group(function () {
    Route::get('siswa', 'index')->name('siswa.index');
    Route::get('siswa/create', 'create')->name('siswa.create');
    Route::get('siswa/{username}', 'show')->name('siswa.show');
    Route::get('siswa/{username}/edit', 'edit')->name('siswa.edit');
});

Route::controller(SchoolController::class)->group(function () {
    Route::get('sekolah', 'index')->name('sekolah.index');
    Route::get('sekolah/create', 'create')->name('sekolah.create');
});

Route::controller(OperatorController::class)->group(function () {
    Route::get('operators', 'index')->name('operators.index');
});

Route::controller(VerificationController::class)->group(function () {
    Route::get('verifikasi-manual', 'manual')->name('verifikasi.manual');
    Route::get('verifikasi-daftar-ulang', 'reregistration')->name('verifikasi.daftar.ulang');
});

Route::controller(AgencyController::class)->group(function () {
    Route::get('cabang-dinas', 'index')->name('cabang-dinas.index');
    Route::get('cabang-dinas/create', 'create')->name('cabang-dinas.create');
    Route::get('cabang-dinas/d/{slug}', 'detail')->name('cabang-dinas.detail');

    Route::get('cabang-dinas/get-cabang-dinas', 'getAgency');
    Route::get('cabang-dinas/get-city', 'getCity');
    Route::get('cabang-dinas/get-cabang-dinas-by-slug/{slug}', 'getAgencyBySlug');
    Route::post('cabang-dinas/create', 'postNewData');
    Route::post('cabang-dinas/update', 'postUpdateData');
    Route::post('cabang-dinas/remove', 'postRemoveData');
});

Route::controller(KeyController::class)->group(function () {
    Route::get('kunci-sekolah', 'index')->name('kunci-sekolah.index');
});

Route::controller(RankController::class)->group(function () {
    Route::get('ranking', 'index')->name('ranking.index');
});

Route::controller(ScheduleController::class)->group(function () {
    Route::get('schedules', 'index')->name('schedules.index');
});

Route::controller(FaqController::class)->group(function () {
    Route::get('faq', 'index')->name('faq.index');
});
