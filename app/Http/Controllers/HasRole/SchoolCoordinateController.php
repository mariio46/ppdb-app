<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use App\Repositories\HasRole\SchoolCoordinateRepository as Coordinate;
use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SchoolCoordinateController extends Controller
{
    protected string $schoolId;

    protected string $schoolUnit;

    protected bool $hasSchoolUnit;

    public function __construct(protected Coordinate $coordinate)
    {
        // $this->middleware(function ($request, $next) {
        //     $this->schoolId = session()->get('sekolah_id');
        //     $this->hasSchoolUnit = session()->has('satuan_pendidikan');
        //     $this->schoolUnit = $this->hasSchoolUnit ? session()->get('satuan_pendidikan') : null;

        //     $schoolStatus = $this->coordinate->show(school_id: $this->schoolId)['data']['terverifikasi'];
        //     $schoolHasSave = $schoolStatus == 'simpan';
        //     $schoolHasVerified = $schoolStatus == 'verifikasi';
        //     $protectedRoutes = ['school-coordinate.edit'];

        //     return ($schoolHasSave || $schoolHasVerified) && $request->routeIs($protectedRoutes)
        //         ? to_route('school-coordinate.index')->with(['stat' => 'error', 'msg' => 'Sekolah anda telah terkunci!'])
        //         : $next($request);
        // });
        $this->middleware('HasRole.isAdminSekolah');
        $this->middleware(function (Request $request, Closure $next) {
            $this->schoolId = session()->get('sekolah_id');
            $this->hasSchoolUnit = session()->has('satuan_pendidikan');
            $this->schoolUnit = $this->hasSchoolUnit ? session()->get('satuan_pendidikan') : null;

            return $next($request);
        });
    }

    public function index(): View
    {
        return view('has-role.school-data.coordinates.index', [
            'sekolah_id' => $this->schoolId,
            'satuan_pendidikan' => $this->schoolUnit,
        ]);
    }

    public function edit(): View
    {
        return view('has-role.school-data.coordinates.edit', [
            'sekolah_id' => $this->schoolId,
            'satuan_pendidikan' => $this->schoolUnit,
        ]);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $coordinate = $this->coordinate->update(request: $request, school_id: $id);

        return $this->repositoryResponseWithPostMethod(response: $coordinate, route: 'school-coordinate.index');
    }

    // --------------------------------------------------DATA API JSON--------------------------------------------------

    protected function school(string $school_id): JsonResponse
    {
        $school = $this->coordinate->show(school_id: $school_id);

        return response()->json($school['data']);
    }
}
