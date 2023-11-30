<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Repositories\Student\DashboardRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DashboardController extends Controller
{
    public function __construct(private DashboardRepository $dashboardRepo)
    {
    }

    // -------------------- VIEWS
    public function index(): Response
    {
        return response()->view('student.dashboard.index');
    }

    public function viewEditPersonalData(): Response
    {
        return response()->view('student.dashboard.personal-data');
    }

    public function viewEditStudentScore(string $semester): Response
    {
        $data = [
            'semester' => str_replace("semester-", "", $semester),
        ];

        return response()->view('student.dashboard.score', $data);
    }

    // -------------------- FUNCTIONS
    public function getDataDashboard()
    {
        return $this->dashboardRepo->getDataStudent();
    }

    public function getDataScore()
    {
        return $this->dashboardRepo->getDataScore();
    }

    public function getDataScoreBySemester(int $semester): JsonResponse
    {
        return $this->dashboardRepo->getScoreBySemester($semester);
    }

    public function postFirstTimeLogin(Request $request)
    {
        $update = $this->dashboardRepo->postFirstTimeLogin($request);

        $msg = (data_get($update, 'success')) ? ['ftlStatus' => 'success', 'ftlMsg' => 'Data berhasil diperbarui.'] : ['ftlStatus' => 'danger', 'ftlMsg' => 'Data gagal diperbarui.'];

        return redirect()->back()->with($msg);
    }

    public function getProvinceLists(): JsonResponse
    {
        $data = $this->dashboardRepo->getListProvince();

        return response()->json($data);
    }

    public function getCityLists(string $code): JsonResponse
    {
        $data = $this->dashboardRepo->getListCity($code);

        return response()->json($data);
    }

    public function getDistrictLists(string $code): JsonResponse
    {
        $data = $this->dashboardRepo->getListDistrict($code);

        return response()->json($data);
    }

    public function getVillageLists(string $code): JsonResponse
    {
        $data = $this->dashboardRepo->getListVillage($code);

        return response()->json($data);
    }

    public function postUpdateStudentData(Request $request)
    {
        $update = $this->dashboardRepo->postUpdateStudentData($request);

        if (data_get($update, 'success')) {
            return redirect()->to('/data-diri')->with(['ftlStatus' => 'success', 'ftlMsg' => 'Data berhasil diperbarui.']);
        } else {
            return redirect()->back()->with(['updStatus' => 'danger', 'updMsg' => 'Data gagal diperbarui. Coba lagi nanti.']);
        }
    }

    public function postUpdateStudentProfileImage(Request $request)
    {
        $update = $this->dashboardRepo->postUpdateStudentProfile($request);

        if (data_get($update, 'success')) {
            return redirect()->back()->with(['imgStatus' => 'success', 'imgMsg' => 'Data berhasil diperbarui.']);
        } else {
            return redirect()->back()->with(['imgStatus' => 'danger', 'imgMsg' => 'Data gagal diperbarui. Coba lagi nanti.']);
        }
    }

    public function postUpdateStudentScore(int $semester, Request $request)
    {
        $update = $this->dashboardRepo->postUpdateStudentScore($semester, $request);

        return redirect()->back()->with(data_get($update, 'message'));
    }

    public function postLockStudentData()
    {
        $lock = $this->dashboardRepo->postLockStudentData();

        $msg = (data_get($lock, 'success')) ? ['ftlStatus' => 'success', 'ftlMsg' => 'Data berhasil dikunci.'] : ['ftlStatus' => 'danger', 'ftlMsg' => 'Data gagal dikunci.'];

        return redirect()->back()->with($msg);
    }
}
