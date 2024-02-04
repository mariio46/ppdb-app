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

    //------------------------------------------------------------VIEWS
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

    //------------------------------------------------------------FUNC
    public function postFirstTimeLogin(Request $request): RedirectResponse
    {
        $update = $this->dashboardRepo->postFirstTimeLogin($request);

        return redirect()->back()->with([
            'stat' => ($update['statusCode'] == 200 || $update['statusCode'] == 201) ? 'success' : 'error',
            'msg' => $update['messages'],
        ]);
    }

    public function postUpdateStudentData(Request $request): RedirectResponse
    {
        $update = $this->dashboardRepo->postUpdateStudentData($request);

        if ($update['statusCode'] == 200 || $update['statusCode'] == 201) {
            return to_route('student.personal')->with(['stat' => 'success', 'msg' => $update['messages']]);
        } else {
            return redirect()->back()->with(['stat' => 'error', 'msg' => $update['messages']]);
        }
    }

    public function postUpdateStudentProfileImage(Request $request): RedirectResponse
    {
        $update = $this->dashboardRepo->postUpdateStudentProfile($request);

        return redirect()->back()->with([
            'stat' => $update['statusCode'] == 200 || $update['statusCode'] == 201 ? 'success' : 'error',
            'msg' => $update['messages'],
        ]);
    }

    public function postUpdateStudentScore(int $semester, Request $request): RedirectResponse
    {
        $update = $this->dashboardRepo->postUpdateStudentScore($semester, $request);

        return redirect()->back()->with([
            'stat' => $update['statusCode'] == 200 || $update['statusCode'] == 201 ? 'success' : 'error',
            'msg' => $update['messages'],
        ]);
    }

    public function postLockStudentData(): RedirectResponse
    {
        $lock = $this->dashboardRepo->postLockStudentData();

        return redirect()->back()->with([
            'stat' => ($lock['statusCode'] == 200 || $lock['statusCode'] == 201) ? 'success' : 'error',
            'msg' => $lock['messages'],
        ]);
    }

    //------------------------------------------------------------JSON
    public function getDataDashboard(): JsonResponse
    {
        $get = $this->dashboardRepo->getDataStudent();

        return response()->json($get);
    }

    public function getDataScore(): JsonResponse
    {
        $get = $this->dashboardRepo->getDataScore();

        return response()->json($get);
    }

    public function getDataScoreBySemester(int $semester): JsonResponse
    {
        $get = $this->dashboardRepo->getScoreBySemester($semester);

        return response()->json($get);
    }
}
