<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Students\DashboardController;
use App\Http\Controllers\Students\LoginController;
use App\Http\Controllers\Students\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::view('/landing-page', 'landing-page')->name('home');

// student routes
Route::get('/masuk', [LoginController::class, 'index'])->name('student-login');
Route::post('/do-login', [LoginController::class, 'doLogin'])->name('student-do-login');

// Dashboard
Route::controller(DashboardController::class)->group(function () {
  Route::get('/data-diri', 'index');
  Route::get('/data-diri/data-pribadi', 'viewEditPersonalData');
  Route::get('/data-diri/edit-nilai/{semester}', 'viewEditStudentScore');

  Route::get('/get-data-pribadi-siswa', 'getDataDashboard');
  Route::get('/get-data-nilai-siswa', 'getDataScore');
  Route::post('/first-time-login', 'postFirstTimeLogin');
  Route::post('/personal-data/update-data', 'postUpdateStudentData');
  Route::post('/personal-data/update-profile-picture', 'postUpdateStudentProfileImage');
  Route::get('/personal-data/get-student-score/{semester}', 'getDataScoreBySemester');
  Route::post('/personal-data/{semester}/update-score', 'postUpdateStudentScore');
  Route::post('/lock-student-data', 'postLockStudentData');

  Route::get('/provinces', 'getProvinceLists');
  Route::get('/cities/{code}', 'getCityLists');
  Route::get('/districts/{code}', 'getDistrictLists');
  Route::get('/villages/{code}', 'getVillageLists');
});

// Registration as Pendaftaran
Route::controller(RegistrationController::class)->group(function () {
  Route::get('/pendaftaran', 'index');
  Route::get('/pendaftaran/tahap/{code}', 'phase');

  Route::get('/registration/get-schedules', 'getSchedules');
  Route::get('/registration/get-schedule-by-phase-code/{code}', 'getScheduleByPhaseCode');
});


// example
Route::view('/component', 'component')->name('component');
Route::view('/new-components', 'new-components')->name('new-components');
// example
