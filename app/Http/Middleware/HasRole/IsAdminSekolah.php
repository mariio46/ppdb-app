<?php

namespace App\Http\Middleware\HasRole;

use App\Repositories\HasRole\SchoolDataRepository as SchoolData;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdminSekolah
{
    protected ?string $schoolId;

    protected ?string $schoolUnit;

    protected bool $hasSchoolUnit;

    public function __construct(protected SchoolData $schoolData)
    {
        $this->schoolId = session()->get('sekolah_id');
        $this->hasSchoolUnit = session()->has('satuan_pendidikan');
        $this->schoolUnit = $this->hasSchoolUnit ? session()->get('satuan_pendidikan') : null;
    }

    public function handle(Request $request, Closure $next): Response
    {
        if (! $this->hasSchoolUnit || $this->schoolId == null) {
            return to_route('dashboard')->with([
                'stat' => 'error',
                'msg' => 'Anda bukan Admin Sekolah!',
                'data' => [
                    'satuan_pendidikan' => $this->schoolUnit,
                    'sekolah_id' => $this->schoolId,
                ],
            ]);
        }

        $schoolStatus = $this->schoolData->index(school_id: $this->schoolId)['data']['terverifikasi'];

        $schoolDataProtectedRoutes = ['school-data.edit', 'school-data.update', 'school-data.logos-update', 'school-data.lock', 'school-data.firstDocument', 'school-data.secondDocument'];
        $schoolCoordinateProtectedRoutes = ['school-coordinate.edit', 'school-coordinate.update'];
        $schoolQuotaProtectedRoutes = ['school-quota.create', 'school-quota.store-smk', 'school-quota.store-sma', 'school-quota.edit', 'school-quota.update-smk', 'school-quota.update-sma', 'school-quota.destroy'];
        $schoolZoneProtectedRoutes = ['school-zone.edit', 'school-zone.store', 'school-zone.update', 'school-zone.destroy'];

        if (($schoolStatus == 'simpan' || $schoolStatus == 'verifikasi') && $request->routeIs($schoolDataProtectedRoutes, $schoolCoordinateProtectedRoutes, $schoolQuotaProtectedRoutes, $schoolZoneProtectedRoutes)) {
            return back()->with(['stat' => 'error', 'msg' => 'Sekolah anda telah terkunci!']);
        }

        return $next($request);
    }
}
