<?php

use App\Http\Controllers\HasRole\AgencyController;
use App\Http\Controllers\HasRole\DashboardController;
use App\Http\Controllers\HasRole\FaqController;
use App\Http\Controllers\HasRole\KeyController;
use App\Http\Controllers\HasRole\MajorController;
use App\Http\Controllers\HasRole\OperatorController;
use App\Http\Controllers\HasRole\OriginSchoolController;
use App\Http\Controllers\HasRole\RankController;
use App\Http\Controllers\HasRole\ReregistrationController;
use App\Http\Controllers\HasRole\ScheduleController;
use App\Http\Controllers\HasRole\SchoolController;
use App\Http\Controllers\HasRole\SchoolDataController;
use App\Http\Controllers\HasRole\SchoolQuotaController;
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
    Route::get('users/json/roles', 'roles');
    Route::get('users/json/regions', 'regions');
    Route::get('users/json/schools', 'schools');
    Route::get('users/json/origin-schools', 'originSchools');
    Route::get('users/json/user/{id}', 'user');
});

Route::controller(OriginSchoolController::class)->group(function () {
    Route::get('sekolah-asal', 'index')->name('sekolah-asal.index');
    Route::get('sekolah-asal/create', 'create')->name('sekolah-asal.create');
    Route::get('sekolah-asal/{id}', 'show')->name('sekolah-asal.show');
    Route::get('sekolah-asal/{id}/edit', 'edit')->name('sekolah-asal.edit');

    Route::post('sekolah-asal/store', 'store')->name('sekolah-asal.store'); // A.03.003
    Route::post('sekolah-asal/update', 'update')->name('sekolah-asal.update'); // A.03.004
    Route::post('sekolah-asal/delete', 'delete')->name('sekolah-asal.delete'); // A.03.005

    Route::get('sekolah-asal/json/get-all-data', 'getSchools')->name('sekolah-asal.json.all'); // A.03.001
    Route::get('sekolah-asal/json/get-single-data/{id}', 'getSingleSchool')->name('sekolah-asal.json.single'); // A.03.002
});

Route::controller(StudentController::class)->group(function () {
    Route::get('siswa', 'index')->name('siswa.index');
    Route::get('siswa/create', 'create')->name('siswa.create');
    Route::get('siswa/{id}', 'show')->name('siswa.show');
    Route::get('siswa/{id}/edit', 'edit')->name('siswa.edit');
    Route::get('siswa/{id}/score/{semester}', 'score')->name('siswa.score');

    Route::post('siswa/store', 'store')->name('siswa.store');
    Route::post('siswa/{id}/update', 'update')->name('siswa.update');
    Route::post('siswa/{id}/score/{semester}/update-score', 'updateScore')->name('siswa.post.score');

    Route::get('siswa/json/get-list', 'getStudents')->name('siswa.json.all');
    Route::get('siswa/json/get-single/{id}', 'getSingleStudent')->name('siswa.json.single');
    Route::get('siswa/json/search-nisn/{nisn}', 'getSingleStudentByNisn')->name('siswa.json.search');
    Route::get('siswa/json/get-origin-school-list', 'getOriginSchools')->name('siswa.json.origin-school');
    Route::get('siswa/json/get-grades/{id}', 'getGrades')->name('siswa.json.grades');
    Route::get('siswa/json/get-scores/{id}', 'getScores')->name('siswa.json.scores');
    Route::get('siswa/json/get-score/{id}/{semester}', 'getScore')->name('siswa.json.score');
});

Route::controller(SchoolController::class)->group(function () {
    Route::get('sekolah', 'index')->name('sekolah.index');
    Route::get('sekolah/create', 'create')->name('sekolah.create');
    Route::post('sekolah/store', 'store')->name('sekolah.store');
    Route::get('sekolah/{id}/edit', 'edit')->name('sekolah.edit');
    Route::post('sekolah/{id}/update', 'update')->name('sekolah.update');
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

    Route::get('data-sekolah/dokumen', 'document')->name('school-data.document');

    Route::get('data-sekolah/edit', 'edit')->name('school-data.edit');
    Route::post('data-sekolah/{id}/update', 'update')->name('school-data.update'); // Route Action for update data sekolah
    Route::post('data-sekolah/{id}/update-logo', 'logos')->name('school-data.logos-update'); // Route Action for update logo sekolah

    Route::post('data-sekolah/dokumen/pakta-integritas/{id}', 'firstDocument')->name('school-data.firstDocument'); // Route Action for upload pakta integritas
    Route::post('data-sekolah/dokumen/sk-ppdb/{id}', 'secondDocument')->name('school-data.secondDocument'); // Route Action for upload SK PPDB

    Route::get('data-sekolah/json/school/{school_id}', 'school');
    Route::get('data-sekolah/json/districts/{code}', 'districts');
    // Route::get('data-sekolah/json/form-data-percentage', 'formDataPercentage');
    // Route::get('data-sekolah/json/school/{id}', 'school');
    // Route::get('data-sekolah/json/major-quota/{identifier}', 'majorQuota');
    // Route::get('data-sekolah/json/school-quota/{unit}', 'schoolsQuota');
});

Route::controller(SchoolQuotaController::class)->group(function () {
    Route::get('kuota-sekolah', 'index')->name('school-quota.index');
    Route::get('kuota-sekolah/create', 'create')->name('school-quota.create');
    Route::post('kuota-sekolah/store-smk', 'storeSmk')->name('school-quota.store-smk');
    Route::post('kuota-sekolah/store-sma', 'storeSma')->name('school-quota.store-sma');
    Route::get('kuota-sekolah/{id}/edit', 'edit')->name('school-quota.edit');
    Route::post('kuota-sekolah/{id}/update-smk', 'updateSmk')->name('school-quota.update-smk');
    Route::post('kuota-sekolah/{id}/update-sma', 'updateSma')->name('school-quota.update-sma');

    Route::post('kuota-sekolah/{id}/destroy', 'destroy')->name('school-quota.destroy');
    Route::post('kuota-sekolah/{id}/lock', 'lock')->name('school-quota.lock');

    Route::get('kuota-sekolah/json/majors', 'majors');
    Route::get('kuota-sekolah/json/quotas/{school_unit}/{id}', 'quotas');
    Route::get('kuota-sekolah/json/quotas/{school_unit}/{id}/quota', 'quota');
});

Route::controller(OperatorController::class)->group(function () {
    Route::get('operators', 'index')->name('operators.index');
    Route::get('operators/create', 'create')->name('operators.create');
    Route::post('operators/store', 'store')->name('operators.store');
    Route::get('operators/{param}', 'show')->name('operators.show');

    Route::get('operators/json/operator/{param}', 'operator');
    Route::get('operators/json/operators/{key}/{param}', 'operators');
});

Route::controller(VerificationController::class)->group(function () {
    Route::get('verifikasi-manual', 'manual')->name('verifikasi.manual');
    Route::get('verifikasi-manual/d/{id}', 'manualDetail')->name('verifikasi.manual.detail');
    Route::get('verifikasi-manual/d/{id}/edit-nilai', 'manualScore')->name('verifikasi.manual.score');
    Route::get('verifikasi-manual/d/{id}/edit-titik-rumah/{student_id}', 'manualMap')->name('verifikasi.manual.map');
    Route::get('verifikasi-manual/d/{id}/edit-prestasi', 'manualAchievement')->name('verifikasi.manual.achievement');

    Route::post('verifikasi-manual/d/{id}/update-score', 'manualUpdateScore')->name('verifikasi.manual.update-score');
    Route::post('verifikasi-manual/d/{id}/update-map', 'manualUpdateMap')->name('verifikasi.manual.update-map');
    Route::post('verifikasi-manual/d/{id}/update-achievement', 'manualUpdateAchievement')->name('verifikasi.manual.update-achievement');
    Route::post('verifikasi-manual/d/{id}/is-color-blind', 'manualUpdateColorBlind')->name('verifikasi.manual.color-blind');
    Route::post('verifikasi-manual/d/{id}/is-short', 'manualUpdateShort')->name('verifikasi.manual.short');
    Route::post('verifikasi-manual/d/{id}/accept-verication', 'manualAcceptVerification')->name('verifikasi.manual.accept');
    Route::post('verifikasi-manual/d/{id}/decline-verication', 'manualDeclineVerification')->name('verifikasi.manual.decline');

    Route::get('verifikasi-manual/get-data', 'manualGetData');
    Route::get('verifikasi-manual/d/{id}/get-data-detail', 'manualgetDetailData')->name('verifikasi.manual.getdetail');
    Route::get('json/verifikasi-manual/get-time', 'getTimeVerification')->name('verifikasi.manual.get-time');
    Route::get('json/verifikasi-manual/get-coordinate/{student_id}', 'getCoordinate')->name('verifikasi.manual.get-coordinate');

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
    Route::get('tahap-jadwal/tambah', 'create')->name('schedules.create.index');
    Route::get('tahap-jadwal/d/{id}', 'detail')->name('schedules.detail');

    Route::post('tahap-jadwal/save-data', 'saveData')->name('schedules.create');
    Route::post('tahap-jadwal/remove', 'removeData')->name('schedules.remove');

    Route::get('tahap-jadwal/e/{id}', 'edit')->name('schedules.edit.index');
    Route::get('tahap-jadwal/get-single-data/{id}', 'getDataSchedule')->name('schedules.get.single');
    Route::post('tahap-jadwal/update-data/{id}', 'updateData')->name('schedules.edit');

    Route::get('tahap-jadwal/e-{type}/{id}', 'editTime')->name('schedules.edit.time');
    Route::post('tahap-jadwal/e-{type}/{id}/update-data', 'updateTime')->name('schedules.update.time');

    // Route::post('tahap-jadwal/e-announce/{id}/update-data', 'updateAnnouncement')->name('schedules.update.announce');

    Route::get('tahap-jadwal/json/d/{id}/get-data', 'detailData')->name('schedules.get.detail');
    Route::get('tahap-jadwal/json/e-{type}/{id}/get-data', 'getDataTime')->name('schedules.get.time');
    Route::get('tahap-jadwal/json/get-data', 'getDataSchedules')->name('schedules.get.data');
    Route::get('tahap-jadwal/json/jalur/{type}', 'getTracks')->name('schedules.tracks');
});

Route::controller(FaqController::class)->group(function () {
    Route::get('faqs', 'index')->name('faqs.index');
    Route::get('faqs/create', 'create')->name('faqs.create');
    Route::post('faqs/store', 'store')->name('faqs.store');
    Route::get('faqs/{id}/edit', 'edit')->name('faqs.edit');
    Route::post('faqs/{id}/update', 'update')->name('faqs.update');
    Route::post('faqs/{id}/destroy', 'destroy')->name('faqs.destroy');

    Route::get('faqs/json/faqs', 'faqs');
    Route::get('faqs/json/faq/{id}', 'faq');
});

Route::controller(MajorController::class)->group(function () {
    Route::get('jurusan', 'index')->name('majors.index');
    Route::post('jurusan/store', 'store')->name('majors.store');
    Route::get('jurusan/{id}/edit', 'edit')->name('majors.edit');
    Route::post('jurusan/{id}/update', 'update')->name('majors.update');
    Route::post('jurusan/{id}/destroy', 'destroy')->name('majors.destroy');

    Route::get('jurusan/json/majors', 'majors');
    Route::get('jurusan/json/major/{id}', 'major');
});

Route::controller(RegionController::class)->group(function () {
    Route::get('get-city/{province_code?}', 'getCityLists')->name('region.get.city');
    Route::get('get-district/{city_code}', 'getDistrictLists')->name('region.get.district');
});
