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
    Route::get('users/{username}', 'show')->name('users.show');
    Route::get('users/{username}/lupa-password', 'forgotPassword')->name('users.lupa-password');

    Route::get('users/json/collections', 'usersCollections');
    Route::get('users/json/rolesCollections', 'rolesCollections');
    Route::get('users/json/regionsCollections', 'regionsCollections');
    Route::get('users/json/schoolsCollections', 'schoolsCollections');
    Route::get('users/json/originSchoolsCollections', 'originSchoolsCollections');
    Route::get('users/json/single-user/{username}', 'singleUser');
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
    Route::get('siswa/{username}/score/{semester}', 'score')->name('siswa.score');
    Route::post('siswa/{username}/score/{semester}/update-score', 'updateScore')->name('siswa.post.score');

    Route::get('siswa/get-scores/{username}/{semester}', 'getScores');
});

Route::controller(SchoolController::class)->group(function () {
    Route::get('sekolah', 'index')->name('sekolah.index');
    Route::get('sekolah/create', 'create')->name('sekolah.create');
    Route::get('sekolah/{npsn}/edit', 'edit')->name('sekolah.edit');
    Route::get('sekolah/{npsn}/{unit}/info-sekolah', 'schoolDetail')->name('sekolah.detail');
    Route::get('sekolah/{npsn}/{unit}/kuota-sekolah', 'schoolQuota')->name('sekolah.quota');
    Route::get('sekolah/{npsn}/{unit}/wilayah-zonasi', 'schoolZone')->name('sekolah.zone');
    Route::get('sekolah/{npsn}/{unit}/jurusan-dan-kuota', 'schoolMajorQuota')->name('sekolah.major-quota');

    Route::get('sekolah/json/units', 'units');
    Route::get('sekolah/json/zones', 'zones');
    Route::get('sekolah/json/schools-collections', 'schools');
    Route::get('sekolah/json/single-school/{npsn}', 'getSingleSchool');
    Route::get('sekolah/json/schools-quota/{npsn}/{unit}', 'schoolsQuota');
});

Route::controller(OperatorController::class)->group(function () {
    Route::get('operators', 'index')->name('operators.index');
});

Route::controller(VerificationController::class)->group(function () {
    Route::get('verifikasi-manual', 'manual')->name('verifikasi.manual');
    Route::get('verifikasi-manual/get-data', 'manualGetData');
    Route::get('verifikasi-manual/d/{id}', 'manualDetail')->name('verifikasi.manual.detail');
    Route::get('verifikasi-manual/d/{id}/get-data-detail', 'manualgetDetailData')->name('verifikasi.manual.getdetail');
    Route::get('verifikasi-manual/d/{id}/edit-nilai', 'manualScore')->name('verifikasi.manual.score');
    Route::get('verifikasi-manual/d/{id}/edit-titik-rumah', 'manualMap')->name('verifikasi.manual.map');
    Route::post('verifikasi-manual/d/{id}/accept-verication', 'manualAcceptVerification')->name('verifikasi.manual.accept');
    Route::post('verifikasi-manual/d/{id}/decline-verication', 'manualDeclineVerification')->name('verifikasi.manual.decline');

    Route::get('verifikasi-daftar-ulang', 'reregistration')->name('verifikasi.daftar-ulang');
    Route::get('verifikasi-daftar-ulang/{nisn}', 'reregistrationShow')->name('verifikasi.daftar-ulang.show');
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
    Route::get('tahap-jadwal', 'index')->name('schedules.index');
    Route::get('tahap-jadwal/get-data', 'getDataSchedules')->name('schedules.get.data');

    Route::get('tahap-jadwal/tambah', 'create')->name('schedules.create');
    Route::post('tahap-jadwal/save-data', 'saveData')->name('schedules.create');

    Route::get('tahap-jadwal/d/{id}', 'detail')->name('schedules.detail');
    Route::post('tahap-jadwal/remove', 'removeData')->name('schedules.remove');
});

Route::controller(FaqController::class)->group(function () {
    Route::get('faq', 'index')->name('faq.index');
});
