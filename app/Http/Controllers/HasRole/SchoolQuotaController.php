<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use App\Repositories\HasRole\SchoolDataRepository;
use App\Repositories\HasRole\SchoolQuotaRepository as Quota;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SchoolQuotaController extends Controller
{
    public function __construct(protected Quota $quota, protected SchoolDataRepository $school_data)
    {
        //
    }

    public function index(): View
    {
        $sekolah_id = session()->get('sekolah_id');
        $satuan_pendidikan = session()->has('satuan_pendidikan') ? session()->get('satuan_pendidikan') : null;

        return $satuan_pendidikan == 'smk'
            ? view('has-role.school-data.quota-smk', compact('sekolah_id', 'satuan_pendidikan'))
            : view('has-role.school-data.quota', compact('sekolah_id', 'satuan_pendidikan'));
    }

    public function create(): View
    {
        $sekolah_id = session()->get('sekolah_id');
        $satuan_pendidikan = session()->has('satuan_pendidikan') ? session()->get('satuan_pendidikan') : null;

        $default = (int) config('constant.TOTAL_ROMBEL');
        $percentage = $satuan_pendidikan == 'smk' ? json_encode(config('constant.PERCENTAGE_SMK')) : json_encode(config('constant.PERCENTAGE_SMA'));

        return $satuan_pendidikan == 'smk'
            ? view('has-role.school-data.add-quota-smk', compact('sekolah_id', 'satuan_pendidikan', 'percentage', 'default'))
            : view('has-role.school-data.add-quota', compact('sekolah_id', 'satuan_pendidikan', 'percentage', 'default'));
    }

    public function storeSmk(Request $request): RedirectResponse
    {
        $sekolah_id = session()->get('sekolah_id');

        $response = $this->quota->storeSmk(request: $request, school_id: $sekolah_id);

        return $this->repositoryResponseWithPostMethod(response: $response, route: 'school-quota.index');
    }

    public function storeSma(Request $request): RedirectResponse
    {
        $sekolah_id = session()->get('sekolah_id');

        $response = $this->quota->storeSma(request: $request, school_id: $sekolah_id);

        return $this->repositoryResponseWithPostMethod(response: $response, route: 'school-quota.index');
    }

    public function edit(string $id): View
    {
        $sekolah_id = session()->get('sekolah_id');
        $satuan_pendidikan = session()->has('satuan_pendidikan') ? session()->get('satuan_pendidikan') : null;
        $unit = match ($satuan_pendidikan) {
            'smk' => 'smk',
            'sma' => 'sma',
            'hbs' => 'sma',
            'fbs' => 'sma',
            default => null
        };

        return view($unit == 'smk' ? 'has-role.school-data.edit-quota-smk' : 'has-role.school-data.edit-quota-sma', [
            'quota_id' => $id,
            'sekolah_id' => $sekolah_id,
            'satuan_pendidikan' => $satuan_pendidikan,
            'unit' => $unit,
            'default' => (int) config('constant.TOTAL_ROMBEL'),
            'percentage' => $unit == 'smk' ? json_encode(config('constant.PERCENTAGE_SMK')) : json_encode(config('constant.PERCENTAGE_SMA')),
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
        $sekolah_id = session()->get('sekolah_id');
        $satuan_pendidikan = session()->has('satuan_pendidikan') ? session()->get('satuan_pendidikan') : null;

        if ($satuan_pendidikan != 'smk' || $satuan_pendidikan == null) {
            return to_route('school-quota.index')->with([
                'stat' => 'error',
                'msg' => 'Kuota ini tidak bisa di hapus',
            ]);
        } else {
            $response = $this->quota->destroy(quota_id: $id, school_id: $sekolah_id);

            return $this->repositoryResponseWithPostMethod(response: $response, route: 'school-quota.index');
        }
    }

    // --------------------------------------------------LOCK DATA SCHOOL--------------------------------------------------

    public function lock(string $school_id)
    {
        $sekolah_id = session()->get('sekolah_id');
        $school = $this->school(school_id: $sekolah_id)->original;
        // $hasNullChecked = $this->checkForNullValuesWithOption(data: $school, excludeKey: 'wilayah_id');
        $hasNullChecked = $this->checkForNullValues(data: $school);

        return dd($hasNullChecked);
        // return $school;
    }

    // will return true if there is null in schooldata
    private function checkForNullValues(array $data): bool
    {
        foreach ($data as $key => $value) {
            // Check if the value is null
            if ($value === null) {
                return true; // Found a null value
            }

            // If the value is an array, recursively check for null values
            if (is_array($value)) {
                if ($this->checkForNullValues($value)) {
                    return true; // Found a null value in the nested array
                }
            }
        }

        // No null values found
        return false;
    }

    // will return true if there is null in schooldata
    private function checkForNullValuesWithOption(array $data, string $excludeKey): bool
    {
        foreach ($data as $key => $value) {
            // Exclude the specified key from the null check
            if ($key === $excludeKey) {
                continue;
            }

            // Check if the value is null
            if ($value === null) {
                return true; // Found a null value
            }

            // If the value is an array, recursively check for null values
            if (is_array($value)) {
                if ($this->checkForNullValues($value, $excludeKey)) {
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
