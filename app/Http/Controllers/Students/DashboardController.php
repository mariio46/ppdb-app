<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Repositories\Student\DashboardRepository;
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

    // -------------------- FUNCTIONS
    public function getDataDashboard()
    {
        return $this->dashboardRepo->getDataStudent();
    }

    public function getDataNilai()
    {
        return $this->dashboardRepo->getDataNilai();
    }

    public function postFirstTimeLogin(Request $request)
    {
        $update = $this->dashboardRepo->postFirstTimeLogin($request);

        $msg = (data_get($update, 'success')) ? ['ftlStatus' => 'success', 'ftlMsg' => 'Data berhasil diperbarui'] : ['ftlStatus' => 'danger', 'ftlMsg' => 'Data gagal diperbarui.'];

        return redirect()->back()->with($msg);
    }
}
