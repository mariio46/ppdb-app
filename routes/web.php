<?php

use App\Http\Controllers\HasRole\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Students\DashboardController;
use App\Http\Controllers\Students\FaqController;
use App\Http\Controllers\Students\LoginController as studentLoginController;
use App\Http\Controllers\Students\RegionController;
use App\Http\Controllers\Students\RegistrationController;
use App\Http\Controllers\Students\SchoolController;
use App\Http\Controllers\Students\StatusController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::view('/landing-page', 'landing-page')->name('home');

// middleware
Route::group(['middleware' => 'student.guest'], function () {
    // student routes
    Route::get('/masuk', [studentLoginController::class, 'index'])->name('student.login');
    Route::post('/do-login', [studentLoginController::class, 'doLogin'])->name('student.login');
});

// middleware
Route::group(['middleware' => 'student.auth'], function () {
    // Dashboard
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/data-diri', 'index')->name('student.personal');
        Route::get('/data-diri/data-pribadi', 'viewEditPersonalData')->name('student.personal.data');
        Route::get('/data-diri/edit-nilai/{semester}', 'viewEditStudentScore')->name('student.personal.score');

        Route::get('/get-data-pribadi-siswa', 'getDataDashboard')->name('student.personal.get-data');
        Route::get('/get-data-nilai-siswa', 'getDataScore')->name('student.personal.get-score');
        Route::post('/first-time-login', 'postFirstTimeLogin')->name('student.personal.first-login');
        Route::post('/personal-data/update-data', 'postUpdateStudentData')->name('student.personal.update-data');
        Route::post('/personal-data/update-profile-picture', 'postUpdateStudentProfileImage')->name('student.personal.update-photo');
        Route::get('/personal-data/get-student-score/{semester}', 'getDataScoreBySemester')->name('student.personal.get-score');
        Route::post('/personal-data/{semester}/update-score', 'postUpdateStudentScore')->name('student.personal.update-score');
        Route::post('/lock-student-data', 'postLockStudentData')->name('student.personal.lock-data');
    });

    // Registration as Pendaftaran
    Route::controller(RegistrationController::class)->group(function () {
        Route::get('/pendaftaran', 'index')->name('student.regis');
        Route::get('/pendaftaran/tahap/{code}', 'phase')->name('student.regis.phase');
        Route::get('/pendaftaran/jalur/{code}', 'track')->name('student.regis.track');
        Route::get('/pendaftaran/bukti/{phaseCode}', 'proof')->name('student.regis.proof');

        Route::get('/registration/get-schedules', 'getSchedules')->name('student.regis.get-schedule');
        Route::get('/registration/get-schedule-by-phase-code/{code}', 'getScheduleByPhaseCode')->name('student.regis.get-phase');
        Route::post('/registration/{trackCode}/register', 'postSchoolRegistration')->name('student.regis.save-registration');
        Route::get('/registration/get-data/{phase}', 'getDataByPhase')->name('student.regis.get-registration'); // student registration data
    });

    // Status
    Route::controller(StatusController::class)->group(function () {
        Route::get('/status', 'index')->name('student.status');

        Route::get('/status/get-status', 'getStatus')->name('student.status.get-data');
    });

    // School
    Route::controller(SchoolController::class)->group(function () {
        Route::get('/sekolah', 'index')->name('student.school');

        Route::get('/schools/get-list', 'getSchools')->name('student.school.get-data');
        Route::get('/schools/by-city/{cityCode}/{schoolType}', 'getSchoolByCity')->name('student.school.filter-school');
        Route::get('/schools/by-zone', 'getSchoolByZone')->name('student.school.get-zone');
        Route::get('/schools/boarding-school', 'getBoardingSchool')->name('student.school.get-boarding');
        Route::get('/schools/department/{schoolId}', 'getDepartmentBySchool')->name('student.school.get-department');
    });

    // faq
    Route::controller(FaqController::class)->group(function () {
        Route::get('/faq', 'index')->name('student.faq');

        Route::get('/faq/get-data', 'getFaqData')->name('student.faq.get-data');
    });

    Route::controller(RegionController::class)->group(function () {
        Route::get('/provinces', 'getProvinceLists')->name('student.region.get-province');
        Route::get('/cities/{code}', 'getCityLists')->name('student.region.get-city');
        Route::get('/districts/{code}', 'getDistrictLists')->name('student.region.get-district');
        Route::get('/villages/{code}', 'getVillageLists')->name('student.region.get-village');
    });

    // logout
    Route::get('/keluar', [StudentLoginController::class, 'logout'])->name('student.logout');
});

/**
 * HasRole Authentication Action
 * - Login
 * - Logout
 */
Route::middleware(['HasRole.guest'])->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'store']);
});

Route::middleware(['HasRole.auth'])->group(function () {
    Route::post('logout', [LoginController::class, 'destroy'])->name('logout');
});

// example
Route::view('/component', 'component')->name('component');
Route::view('/new-components', 'new-components')->name('new-components');
// example
