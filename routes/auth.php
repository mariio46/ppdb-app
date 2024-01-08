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
use App\Http\Controllers\RegionController;
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
    Route::get('siswa/{username}/score/{semester}', 'score')->name('siswa.score');
    Route::post('siswa/{username}/score/{semester}/update-score', 'updateScore')->name('siswa.post.score');

    Route::get('siswa/get-scores/{username}/{semester}', 'getScores');
});

Route::controller(SchoolController::class)->group(function () {
    Route::get('sekolah', 'index')->name('sekolah.index');
    Route::get('sekolah/create', 'create')->name('sekolah.create');
    Route::get('sekolah/{npsn}/edit', 'edit')->name('sekolah.edit');
    Route::get('sekolah/{npsn}/info-sekolah', 'schoolDetail')->name('sekolah.detail');
    Route::get('sekolah/{npsn}/kuota-sekolah', 'schoolQuota')->name('sekolah.quota');
    Route::get('sekolah/{npsn}/wilayah-zonasi', 'schoolZone')->name('sekolah.zone');
    Route::get('sekolah/{npsn}/jurusan-dan-kuota', 'schoolMajorQuota')->name('sekolah.major-quota');
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
    Route::get('cabang-dinas/get-cabang-dinas-by-id/{id}', 'getAgencyById');
    Route::post('cabang-dinas/create', 'postNewData');
    Route::post('cabang-dinas/update', 'postUpdateData');
    Route::post('cabang-dinas/remove', 'postRemoveData')->name('cabang-dinas.remove');
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

    Route::get('tahap-jadwal/tambah', 'create')->name('schedules.create.index');
    Route::post('tahap-jadwal/save-data', 'saveData')->name('schedules.create');

    Route::get('tahap-jadwal/d/{id}', 'detail')->name('schedules.detail');
    Route::get('tahap-jadwal/d/{id}/get-data', 'detailData')->name('schedules.get.detail');
    Route::post('tahap-jadwal/remove', 'removeData')->name('schedules.remove');

    Route::get('tahap-jadwal/e/{id}', 'edit')->name('schedules.edit.index');
    Route::get('tahap-jadwal/get-single-data/{id}', 'getDataSchedule')->name('schedules.get.single');
    Route::post('tahap-jadwal/update-data', 'updateData')->name('schedules.edit');

    Route::get('tahap-jadwal/e-regis/{id}', 'editRegistration')->name('schedules.edit.regis');
    Route::get('tahap-jadwal/e-regis/{id}/get-data', 'getDataRegisSchedule')->name('schedules.get.regis');
    Route::post('tahap-jadwal/e-regis/{id}/update-data', 'updateRegistration')->name('schedules.update.regis');

    Route::get('tahap-jadwal/e-verif/{id}', 'editVerification')->name('schedules.edit.verif');
    Route::get('tahap-jadwal/e-verif/{id}/get-data', 'getDataVerifSchedule')->name('schedules.get.verif');
    Route::post('tahap-jadwal/e-verif/{id}/update-data', 'updateVerification')->name('schedules.update.verif');

    Route::get('tahap-jadwal/e-announce/{id}', 'editAnnouncement')->name('schedules.edit.announce');
    Route::get('tahap-jadwal/e-announce/{id}/get-data', 'getDataAnnounceSchedule')->name('schedules.get.announce');
    Route::post('tahap-jadwal/e-announce/{id}/update-data', 'updateAnnouncement')->name('schedules.update.announce');

    Route::get('tahap-jadwal/e-reregis/{id}', 'editReRegistration')->name('schedules.edit.reregis');
    Route::get('tahap-jadwal/e-reregis/{id}/get-data', 'getDataReRegisSchedule')->name('schedules.get.reregis');
    Route::post('tahap-jadwal/e-reregis/{id}/update-data', 'updateReRegistration')->name('schedules.update.reregis');
});

Route::controller(FaqController::class)->group(function () {
    Route::get('faq', 'index')->name('faq.index');
});

Route::controller(RegionController::class)->group(function () {
    Route::get('get-city/{province_code?}', 'getCityLists')->name('region.get.city');
});
