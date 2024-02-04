<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use App\Repositories\HasRole\SchoolDataRepository as School;
use App\Repositories\HasRole\SchoolZoneRepository as Zone;
use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SchoolZoneController extends Controller
{
    protected string $schoolId;

    protected string $schoolUnit;

    protected bool $hasSchoolUnit;

    public function __construct(protected Zone $zone, protected School $school)
    {
        // $this->middleware(function ($request, $next) {
        //     $this->schoolId = session()->get('sekolah_id');
        //     $this->hasSchoolUnit = session()->has('satuan_pendidikan');
        //     $this->schoolUnit = $this->hasSchoolUnit ? session()->get('satuan_pendidikan') : null;

        //     $schoolHasVerified = $this->school->index(school_id: $this->schoolId)['data']['terverifikasi'] == 'simpan';
        //     $protectedRoutes = ['school-zone.edit', 'school-zone.store', 'school-zone.update', 'school-zone.destroy'];

        //     return $schoolHasVerified && $request->routeIs($protectedRoutes)
        //         ? to_route('school-zone.index')->with(['stat' => 'error', 'msg' => 'Sekolah anda telah terkunci!'])
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
        return view('has-role.school-data.zones.index', [
            'sekolah_id' => $this->schoolId,
            'satuan_pendidikan' => $this->schoolUnit,
        ]);
    }

    public function store(Request $request, string $id): RedirectResponse
    {
        if ($this->schoolId != $id) {
            return back()->with(['stat' => 'error', 'msg' => 'ID Sekolah Salah!']);
        } else {
            $zone = $this->zone->store(request: $request, school_id: $id);

            return $this->repositoryResponseWithPostMethod(response: $zone, route: 'school-zone.index');
        }
    }

    public function edit(string $id): View
    {
        return view('has-role.school-data.zones.edit', compact('id'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $zone = $this->zone->update(request: $request, school_id: $this->schoolId, zone_id: $id);

        return $this->repositoryResponseWithPostMethod(response: $zone, route: 'school-zone.index');
    }

    public function destroy(string $id): RedirectResponse
    {
        $response = $this->zone->destroy(zone_id: $id);

        return $this->repositoryResponseWithPostMethod(response: $response, route: 'school-zone.index');
    }

    // -------------------------JSON API DATA-------------------------

    protected function zones(string $id): JsonResponse
    {
        $zones = $this->zone->index(school_id: $id);

        return response()->json($zones);
    }

    protected function zone(string $id): JsonResponse
    {
        $zone = $this->zone->show(zone_id: $id);

        return response()->json($zone);
    }

    // -------------------------FORM DATA-------------------------

    protected function provinces(): JsonResponse
    {
        return response()->json($this->zone->provinces());
    }

    protected function cities(string $code): JsonResponse
    {
        return response()->json($this->zone->cities(province_code: $code));
    }

    protected function districts(string $code): JsonResponse
    {
        return response()->json($this->zone->districts(city_code: $code));
    }
}
