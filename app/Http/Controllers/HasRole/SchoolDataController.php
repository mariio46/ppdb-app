<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use App\Repositories\HasRole\SchoolDataRepository as SchoolData;
use App\Repositories\HasRole\SchoolQuotaRepository as Quota;
use App\Repositories\HasRole\SchoolZoneRepository as Zone;
use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SchoolDataController extends Controller
{
    protected string $schoolId;

    protected string $schoolUnit;

    protected bool $hasSchoolUnit;

    public function __construct(protected SchoolData $school_data, protected Quota $quota, protected Zone $zone)
    {
        // $this->middleware(function (Request $request, Closure $next) {
        //     $this->schoolId = session()->get('sekolah_id');
        //     $this->hasSchoolUnit = session()->has('satuan_pendidikan');
        //     $this->schoolUnit = $this->hasSchoolUnit ? session()->get('satuan_pendidikan') : null;

        //     if (!$this->hasSchoolUnit && $this->schoolId == null) {
        //         return to_route('dashboard')->with(['stat' => 'error', 'msg' => 'Anda bukan Admin Sekolah!']);
        //     }

        //     $schoolStatus = $this->school_data->index(school_id: $this->schoolId)['data']['terverifikasi'];
        //     $protectedRoutes = ['school-data.edit', 'school-data.update', 'school-data.logos-update', 'school-data.lock', 'school-data.firstDocument', 'school-data.secondDocument'];

        //     if (($schoolStatus == 'simpan' || $schoolStatus == 'verifikasi') && $request->routeIs($protectedRoutes)) {
        //         return to_route('dashboard')->with(['stat' => 'error', 'msg' => 'Sekolah anda telah terkunci!']);
        //     }

        //     return $next($request);
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
        return view('has-role.school-data.index', [
            'sekolah_id' => $this->schoolId,
            'satuan_pendidikan' => $this->schoolUnit,
        ]);
    }

    public function edit(): View
    {
        return view('has-role.school-data.edit', [
            'sekolah_id' => $this->schoolId,
        ]);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $school = $this->school_data->update(request: $request, id: $id);

        return $this->repositoryResponseWithPostMethod(response: $school, route: 'school-data.edit');
    }

    public function document(): View
    {
        return view('has-role.school-data.document', [
            'sekolah_id' => $this->schoolId,
            'satuan_pendidikan' => $this->schoolUnit,
        ]);
    }

    public function firstDocument(Request $request, string $id): RedirectResponse
    {
        $response = $this->school_data->uploadFirstDocument(request: $request, school_id: $id);

        return $this->repositoryResponseWithPostMethod(response: $response, route: 'school-data.document');
    }

    public function secondDocument(Request $request, string $id): RedirectResponse
    {
        $response = $this->school_data->uploadSecondDocument(request: $request, school_id: $id);

        return $this->repositoryResponseWithPostMethod(response: $response, route: 'school-data.document');
    }

    public function logos(Request $request, string $id): RedirectResponse
    {
        $response = $this->school_data->uploadLogo(request: $request, school_id: $id);

        return $this->repositoryResponseWithPostMethod(response: $response, route: 'school-data.edit');
    }

    // --------------------------------------------------LOCK DATA SCHOOL--------------------------------------------------

    public function lock(string $school_id, string $unit): RedirectResponse
    {
        // Query For School and Quota
        $school = $this->school(school_id: $school_id)->original;
        $quotas = $this->quota->index(satuan_pendidikan: $unit, school_id: $school_id);
        $zones = $this->zone->index(school_id: $school_id);

        return $this->lockSchoolChecker($school, $quotas, $zones, $school_id, $unit);
    }

    protected function lockSchoolChecker(array $school, array $quotas, array $zones, string $school_id, string $unit): RedirectResponse
    {
        if ($this->isNull(data: $school)) {
            return back()->with(['stat' => 'error', 'msg' => 'Data Sekolah masih ada yang kosong!']);
        }

        if (! array_key_exists(key: 'data', array: $quotas)) {
            return back()->with(['stat' => 'error', 'msg' => 'Quota Sekolah belum ada!']);
        }

        if ($unit != 'smk' && $unit != 'fbs' && empty($zones['data'])) {
            return back()->with(['stat' => 'error', 'msg' => 'Wilayah Zonasi Sekolah belum ada!']);
        }

        $response = $this->school_data->lock($school_id);

        return $this->repositoryResponseWithPostMethod($response, 'school-data.index');
    }

    /**
     * Will check if there is an empty value in school data.
     * will return true if there is null in schooldata
     */
    protected function isNull(array $data): bool
    {
        foreach ($data as $key => $value) {
            // Check if the value is null
            if ($value == null) {
                return true; // Found a null value
            }

            // If the value is an array, recursively check for null values
            if (is_array($value)) {
                if ($this->isNull($value)) {
                    return true; // Found a null value in the nested array
                }
            }
        }

        // No null values found
        return false;
    }

    // --------------------------------------------------DATA API JSON--------------------------------------------------

    protected function school(string $school_id): JsonResponse
    {
        $school = $this->school_data->index(school_id: $school_id);

        return response()->json($school['data']);
    }

    protected function districts(string $code): JsonResponse
    {
        $districts = $this->school_data->districts(code: $code);

        return response()->json($districts);
    }
}
