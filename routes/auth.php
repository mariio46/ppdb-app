<?php

use App\Http\Controllers\HasRole\AgencyController;
use App\Http\Controllers\HasRole\DashboardController;
use App\Http\Controllers\HasRole\FaqController;
use App\Http\Controllers\HasRole\KeyController;
use App\Http\Controllers\HasRole\OperatorController;
use App\Http\Controllers\HasRole\OriginSchoolController;
use App\Http\Controllers\HasRole\RankController;
use App\Http\Controllers\HasRole\ReregistrationController;
use App\Http\Controllers\HasRole\ScheduleController;
use App\Http\Controllers\HasRole\SchoolController;
use App\Http\Controllers\HasRole\SchoolDataController;
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
    Route::post('users/store', 'store')->name('users.store');
    Route::get('users/{id}', 'show')->name('users.show');
    Route::post('users/{id}/update', 'update')->name('users.update');
    Route::post('users/{id}/destroy', 'destroy')->name('users.destroy');
    Route::get('users/{id}/lupa-password', 'forgotPassword')->name('users.lupa-password');

    Route::get('users/json/users', 'users');
    Route::get('users/json/collections', 'usersCollections');
    Route::get('users/json/rolesCollections', 'rolesCollections');
    Route::get('users/json/regionsCollections', 'regionsCollections');
    Route::get('users/json/schoolsCollections', 'schoolsCollections');
    Route::get('users/json/originSchoolsCollections', 'originSchoolsCollections');
    Route::get('users/json/user/{id}', 'user');
    Route::get('users/json/single-user/{username}', 'singleUser');
});

Route::controller(OriginSchoolController::class)->group(function () {
    Route::get('sekolah-asal', 'index')->name('sekolah-asal.index');
    Route::get('sekolah-asal/create', 'create')->name('sekolah-asal.create');
    Route::get('sekolah-asal/{id}', 'show')->name('sekolah-asal.show');
    Route::get('sekolah-asal/{id}/edit', 'edit')->name('sekolah-asal.edit');

    Route::post('sekolah-asal/store', 'store')->name('sekolah-asal.store');
    Route::post('sekolah-asal/update', 'update')->name('sekolah-asal.update');
    Route::post('sekolah-asal/delete', 'delete')->name('sekolah-asal.delete');

    Route::get('sekolah-asal/json/get-all-data', 'getSchools')->name('sekolah-asal.json.all');
    Route::get('sekolah-asal/json/get-single-data/{id}', 'getSingleSchool')->name('sekolah-asal.json.single');
});

Route::controller(StudentController::class)->group(function () {
    Route::get('siswa', 'index')->name('siswa.index');
    Route::get('siswa/create', 'create')->name('siswa.create');
    Route::get('siswa/{id}', 'show')->name('siswa.show');
    Route::get('siswa/{id}/edit', 'edit')->name('siswa.edit');
    Route::get('siswa/{id}/score/{semester}', 'score')->name('siswa.score');

    Route::post('siswa/store', 'store')->name('siswa.store');
    Route::post('siswa/update', 'update')->name('siswa.update');
    Route::post('siswa/{id}/score/{semester}/update-score', 'updateScore')->name('siswa.post.score');

    Route::get('siswa/get-scores/{id}/{semester}', 'getScores');

    Route::get('siswa/json/get-list', 'getStudents')->name('siswa.json.all');
    Route::get('siswa/json/get-single/{id}', 'getSingleStudent')->name('siswa.json.single');
    Route::get('siswa/json/search-nisn/{nisn}', 'getSingleStudentByNisn')->name('siswa.json.search');
    Route::get('siswa/json/get-origin-school-list', 'getOriginSchools')->name('siswa.json.origin-school');
    Route::get('siswa/json/get-grades/{id}', 'getGrades')->name('siswa.json.grades');
});

Route::controller(SchoolController::class)->group(function () {
    Route::get('sekolah', 'index')->name('sekolah.index');
    Route::get('sekolah/create', 'create')->name('sekolah.create');
    Route::post('sekolah/store', 'store')->name('sekolah.store');
    Route::get('sekolah/{npsn}/edit', 'edit')->name('sekolah.edit');
    Route::get('sekolah/{id}/{unit}/info-sekolah', 'schoolDetail')->name('sekolah.detail');
    Route::get('sekolah/{id}/{unit}/kuota-sekolah', 'schoolQuota')->name('sekolah.quota');
    Route::get('sekolah/{id}/{unit}/wilayah-zonasi', 'schoolZone')->name('sekolah.zone');
    Route::get('sekolah/{id}/{unit}/jurusan-dan-kuota', 'schoolMajorQuota')->name('sekolah.major-quota');

    Route::get('sekolah/json/units', 'units');
    Route::get('sekolah/json/zones', 'zones');
    Route::get('sekolah/json/schools-collections', 'schools');
    Route::get('sekolah/json/single-school/{id}', 'school');
    Route::get('sekolah/json/schools-quota/{npsn}/{unit}', 'schoolsQuota');
});

Route::controller(SchoolDataController::class)->group(function () {
    Route::get('data-sekolah', 'index')->name('school-data.index');
    Route::get('data-sekolah/edit', 'edit')->name('school-data.edit');
    Route::get('data-sekolah/quota', 'quota')->name('school-data.quota');
    Route::get('data-sekolah/dokumen', 'document')->name('school-data.document');
    Route::get('data-sekolah/quota/add', 'addQuota')->name('school-data.add-quota');
    Route::get('data-sekolah/quota/edit/{identifier}', 'editQuota')->name('school-data.edit-quota');

    Route::get('data-sekolah/json/schools', 'schools');
    Route::get('data-sekolah/json/form-data-percentage', 'formDataPercentage');
    Route::get('data-sekolah/json/school/{id}', 'school');
    Route::get('data-sekolah/json/major-quota/{identifier}', 'majorQuota');
    Route::get('data-sekolah/json/school-quota/{unit}', 'schoolsQuota');
});

Route::controller(OperatorController::class)->group(function () {
    Route::get('operators', 'index')->name('operators.index');
    Route::get('operators/create', 'create')->name('operators.create');
    Route::get('operators/{username}', 'show')->name('operators.show');
    Route::get('operators/{username}/edit', 'edit')->name('operators.edit');

    Route::get('operators/json/operators', 'operators');
    Route::get('operators/json/singleOperator/{username}', 'singleOperator');
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

    // Route::get('verifikasi-daftar-ulang', 'reregistration')->name('verifikasi.daftar-ulang');
    // Route::get('verifikasi-daftar-ulang/{nisn}', 'reregistrationShow')->name('verifikasi.daftar-ulang.show');
});

Route::controller(ReregistrationController::class)->group(function () {
    Route::get('daftar-ulang', 'index')->name('daftar-ulang.index');
    Route::get('daftar-ulang/{nisn}', 'show')->name('daftar-ulang.show');

    Route::get('daftar-ulang/json/students', 'students');
    Route::get('daftar-ulang/json/students/{nisn}', 'student');
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

    Route::get('kunci-sekolah/json/schools', 'schools');
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

    Route::get('tahap-jadwal/jalur/{type}', 'getTracks')->name('schedules.tracks');
});

Route::controller(FaqController::class)->group(function () {
    Route::get('faqs', 'index')->name('faqs.index');
    Route::get('faqs/create', 'create')->name('faqs.create');
    Route::get('faqs/{slug}/edit', 'edit')->name('faqs.edit');

    Route::get('faqs/json/faqs', 'faqs');
    Route::get('faqs/json/faq/{slug}', 'faq');
});

Route::controller(RegionController::class)->group(function () {
    Route::get('get-city/{province_code?}', 'getCityLists')->name('region.get.city');
    Route::get('get-district/{city_code}', 'getDistrictLists')->name('region.get.district');
});
