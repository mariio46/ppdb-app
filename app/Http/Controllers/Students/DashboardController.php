<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Repositories\Student\DashboardRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(private DashboardRepository $dashboardRepo)
    {
    }

    // -------------------- VIEWS
    public function index(): View
    {
        return view('student.dashboard.index');
    }

    public function viewEditPersonalData(): View
    {
        return view('student.dashboard.personal-data');
    }

    public function viewEditStudentScore(string $semester): View
    {
        $data = [
            'semester' => str_replace('semester-', '', $semester),
        ];

        return view('student.dashboard.score', $data);
    }

    // -------------------- FUNCTIONS
    public function postFirstTimeLogin(Request $request): RedirectResponse
    {
        $update = $this->dashboardRepo->postFirstTimeLogin($request);

        $msg = (data_get($update, 'success')) ? ['stat' => 'success', 'msg' => 'Data berhasil diperbarui.'] : ['stat' => 'danger', 'msg' => 'Data gagal diperbarui.'];

        return redirect()->back()->with($msg);
    }

    public function postUpdateStudentData(Request $request): RedirectResponse
    {
        $update = $this->dashboardRepo->postUpdateStudentData($request);

        if (data_get($update, 'success')) {
            return to_route('student.personal')->with(['stat' => 'success', 'msg' => data_get($update, 'message')]);
        } else {
            return redirect()->back()->with(['stat' => 'danger', 'msg' => data_get($update, 'message', 'Gagal memperbarui Data')]);
        }
    }

    public function postUpdateStudentProfileImage(Request $request): RedirectResponse
    {
        $update = $this->dashboardRepo->postUpdateStudentProfile($request);

        if (data_get($update, 'success')) {
            return redirect()->back()->with(['stat' => 'success', 'msg' => 'Data berhasil diperbarui.']);
        } else {
            return redirect()->back()->with(['stat' => 'danger', 'msg' => 'Data gagal diperbarui. Coba lagi nanti.']);
        }
    }

    public function postUpdateStudentScore(int $semester, Request $request): RedirectResponse
    {
        $update = $this->dashboardRepo->postUpdateStudentScore($semester, $request);

        if (data_get($update, 'success')) {
            return redirect()->back()->with(['stat' => 'success', 'msg' => 'Nilai berhasil disimpan.']);
        } else {
            return redirect()->back()->with(['stat' => 'danger', 'msg' => 'Nilai gagal disimpan.']);
        }
    }

    public function postLockStudentData(): RedirectResponse
    {
        $lock = $this->dashboardRepo->postLockStudentData();

        $msg = (data_get($lock, 'success')) ? ['stat' => 'success', 'msg' => 'Data berhasil dikunci.'] : ['stat' => 'danger', 'msg' => 'Data gagal dikunci.'];

        return redirect()->back()->with($msg);
    }

    // -------------------- JSON
    public function getDataDashboard(): JsonResponse
    {
        return $this->dashboardRepo->getDataStudent();
    }

    public function getDataScore(): JsonResponse
    {
        return $this->dashboardRepo->getDataScore();
    }

    public function getDataScoreBySemester(int $semester): JsonResponse
    {
        return $this->dashboardRepo->getScoreBySemester($semester);
    }
}
