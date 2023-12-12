<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Students\DashboardController;
use App\Http\Controllers\Students\FaqController;
use App\Http\Controllers\Students\LoginController;
use App\Http\Controllers\Students\RegistrationController;
use App\Http\Controllers\Students\SchoolController;
use App\Http\Controllers\Students\StatusController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::view('/landing-page', 'landing-page')->name('home');

// middleware
Route::group(['middleware' => 'student.guest'], function () {
  // student routes
  Route::get('/masuk', [LoginController::class, 'index'])->name('student-login');
  Route::post('/do-login', [LoginController::class, 'doLogin'])->name('student-do-login');
});

// middleware
Route::group(['middleware' => 'student.auth'], function () {
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
    Route::get('/pendaftaran/jalur/{code}', 'track');
    Route::get('/pendaftaran/bukti/{phaseCode}', 'proof');

    Route::get('/registration/get-schedules', 'getSchedules');
    Route::get('/registration/get-data/{phase}', 'getDataByPhase');
    Route::get('/registration/get-schedule-by-phase-code/{code}', 'getScheduleByPhaseCode');
    Route::post('/registration/{trackCode}/register', 'postSchoolRegistration');
  });

  // Status
  Route::controller(StatusController::class)->group(function () {
    Route::get('/status', 'index');

    Route::get('/status/get-status', 'getStatus');
  });

  // School
  Route::controller(SchoolController::class)->group(function () {
    Route::get('/sekolah', 'index');

    Route::get('/schools/get-list', 'getSchools');
    Route::get('/schools/by-city/{cityCode}/{schoolType}', 'getSchoolByCity');
    Route::get('/schools/by-zone', 'getSchoolByZone');
    Route::get('/schools/boarding-school', 'getBoardingSchool');
    Route::get('/schools/department/{schoolId}', 'getDepartmentBySchool');
  });

  // faq
  Route::controller(FaqController::class)->group(function () {
    Route::get('/faq', 'index');

    Route::get('/faq/get-data', 'getFaqData');
  });

  // logout
  Route::get('/keluar', function () {
    session()->flush();
    return redirect('/masuk')->withErrors(['errorMsg' => 'Kamu sudah logout.']);
  });
});


// example
Route::view('/component', 'component')->name('component');
Route::view('/new-components', 'new-components')->name('new-components');
// example
