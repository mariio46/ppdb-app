<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use App\Repositories\HasRole\SchoolDataRepository as SchoolData;
use App\Repositories\HasRole\SchoolQuotaRepository as Quota;
use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SchoolQuotaController extends Controller
{
    protected string $smkPercentage;

    protected string $smaPercentage;

    protected string $percentage;

    protected string $schoolId;

    protected string $schoolUnit;

    protected bool $hasSchoolUnit;

    protected int $defaultValueRombel;

    public function __construct(protected Quota $quota, protected SchoolData $schoolData)
    {
        $this->middleware('HasRole.isAdminSekolah');
        $this->middleware(function (Request $request, Closure $next) {
            $this->schoolId = session()->get('sekolah_id');
            $this->hasSchoolUnit = session()->has('satuan_pendidikan');
            $this->schoolUnit = $this->hasSchoolUnit ? session()->get('satuan_pendidikan') : null;

            $this->defaultValueRombel = (int) config('constant.TOTAL_ROMBEL');
            $this->smkPercentage = json_encode(config('constant.PERCENTAGE_SMK'));
            $this->smaPercentage = json_encode(config('constant.PERCENTAGE_SMA'));
            $this->percentage = $this->schoolUnit == 'smk' ? $this->smkPercentage : $this->smaPercentage;

            return $next($request);
        });
    }

    public function index(): View
    {
        return view($this->schoolUnit == 'smk' ? 'has-role.school-data.quota-smk' : 'has-role.school-data.quota', [
            'sekolah_id' => $this->schoolId,
            'satuan_pendidikan' => $this->schoolUnit,
        ]);
    }

    public function create(): View
    {
        return view($this->schoolUnit == 'smk' ? 'has-role.school-data.add-quota-smk' : 'has-role.school-data.add-quota', [
            'sekolah_id' => $this->schoolId,
            'satuan_pendidikan' => $this->schoolUnit,
            'percentage' => $this->percentage,
            'default' => $this->defaultValueRombel,
        ]);
    }

    public function storeSmk(Request $request): RedirectResponse
    {
        $response = $this->quota->storeSmk(request: $request, school_id: $this->schoolId);

        return $this->repositoryResponseWithPostMethod(response: $response, route: 'school-quota.index');
    }

    public function storeSma(Request $request): RedirectResponse
    {
        $response = $this->quota->storeSma(request: $request, school_id: $this->schoolId);

        return $this->repositoryResponseWithPostMethod(response: $response, route: 'school-quota.index');
    }

    public function edit(string $id): View
    {
        $unit = match ($this->schoolUnit) {
            'smk' => 'smk',
            'sma' => 'sma',
            'hbs' => 'sma',
            'fbs' => 'sma',
            default => null
        };

        return view($unit == 'smk' ? 'has-role.school-data.edit-quota-smk' : 'has-role.school-data.edit-quota-sma', [
            'quota_id' => $id,
            'sekolah_id' => $this->schoolId,
            'satuan_pendidikan' => $this->schoolUnit,
            'unit' => $unit,
            'default' => $this->defaultValueRombel,
            'percentage' => $unit == 'smk' ? $this->smkPercentage : $this->smaPercentage,
        ]);
    }

    public function updateSmk(Request $request, string $id): RedirectResponse
    {
        $response = $this->quota->updateSmk(request: $request, quota_id: $id);

        return $this->repositoryResponseWithPostMethod(response: $response, route: 'school-quota.edit', params: $id);
    }

    public function updateSma(Request $request, string $id): RedirectResponse
    {
        $response = $this->quota->updateSma(request: $request, quota_id: $id);

        return $this->repositoryResponseWithPostMethod(response: $response, route: 'school-quota.index');
    }

    public function destroy(string $id): RedirectResponse
    {
        if ($this->schoolUnit != 'smk' || $this->schoolUnit == null) {
            return to_route('school-quota.index')->with([
                'stat' => 'error',
                'msg' => 'Kuota ini tidak bisa di hapus',
            ]);
        } else {
            $response = $this->quota->destroy(quota_id: $id, school_id: $this->schoolId);

            return $this->repositoryResponseWithPostMethod(response: $response, route: 'school-quota.index');
        }
    }

    // --------------------------------------------------DATA API JSON--------------------------------------------------

    public function quotas(string $unit, string $id): JsonResponse
    {
        $quotas = $this->quota->index(satuan_pendidikan: $unit, school_id: $id);

        return response()->json($quotas);
    }

    public function quota(string $unit, string $id): JsonResponse
    {
        $quota = $this->quota->show(satuan_pendidikan: $unit, quota_id: $id);

        return response()->json($quota);
    }

    // --------------------------------------------------FORM DATA JSON--------------------------------------------------

    protected function majors(): JsonResponse
    {
        return response()->json($this->quota->majors());
    }
}
