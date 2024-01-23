<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use App\Repositories\HasRole\SchoolDataRepository as SchoolData;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SchoolDataController extends Controller
{
    public function __construct(protected SchoolData $school_data)
    {
        // School Data Repository
    }

    public function index(): View
    {
        $satuan_pendidikan = session()->has('satuan_pendidikan') ? session()->get('satuan_pendidikan') : null;

        $sekolah_id = session()->get('sekolah_id');

        return view('has-role.school-data.index', compact('sekolah_id', 'satuan_pendidikan'));
    }

    public function edit(): View
    {
        $sekolah_id = session()->get('sekolah_id');

        return view('has-role.school-data.edit', compact('sekolah_id'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $school = $this->school_data->update(request: $request, id: $id);

        return $this->repositoryResponseWithPostMethod(response: $school, route: 'school-data.edit');
    }

    public function document(): View
    {
        $sekolah_id = session()->get('sekolah_id');
        $satuan_pendidikan = session()->has('satuan_pendidikan') ? session()->get('satuan_pendidikan') : null;

        return view('has-role.school-data.document', compact('sekolah_id', 'satuan_pendidikan'));
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

    // public function editQuota(string $identifier): View
    // {
    //     $json = $this->formDataPercentage();
    //     $default = 36;

    //     return view('has-role.school-data.edit-quota-smk', compact('identifier', 'json', 'default'));
    // }

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

    // --------------------------------------------------DATA JSON--------------------------------------------------

    // protected function majorQuota(string $identifier): JsonResponse
    // {
    //     $quota = collect($this->schoolsQuota($this->unit)->original)->firstWhere('identifier', $identifier);

    //     return response()->json($quota);
    // }

    // protected function schoolsQuota($unit): JsonResponse
    // {
    //     $quota_smk = [
    //         [
    //             'label' => 'Teknik Komputer dan Jaringan',
    //             'identifier' => 479305,
    //             'value' => 144,
    //         ],
    //         [
    //             'label' => 'Teknik Kendaraan Ringan',
    //             'identifier' => 114565,
    //             'value' => 72,
    //         ],
    //         [
    //             'label' => 'Pemodelan dan Informasi Bangunan',
    //             'identifier' => 911899,
    //             'value' => 108,
    //         ],
    //         [
    //             'label' => 'Administrasi Perkantoran',
    //             'identifier' => 238415,
    //             'value' => 216,
    //         ],
    //         [
    //             'label' => 'Tata Rias dan Kecantikan',
    //             'identifier' => 598110,
    //             'value' => 252,
    //         ],
    //         [
    //             'label' => 'Perbankan dan Keuangan Syariah',
    //             'identifier' => 922020,
    //             'value' => 72,
    //         ],
    //     ];

    //     $quota_sma = [
    //         [
    //             // Afirmasi
    //             'label' => 'Jalur Afirmasi',
    //             'identifier' => 333992,
    //             'value' => 150,
    //         ],
    //         [
    //             // Mutasi
    //             'label' => 'Jalur Perpindahan Tugas Orang Tua',
    //             'identifier' => 476632,
    //             'value' => 75,
    //         ],
    //         [
    //             // Anak Guru
    //             'label' => 'Jalur Anak Guru',
    //             'identifier' => 939003,
    //             'value' => 100,
    //         ],
    //         [
    //             // Akademik
    //             'label' => 'Jalur Prestasi Akademik',
    //             'identifier' => 589846,
    //             'value' => 50,
    //         ],
    //         [
    //             // Non Akademik
    //             'label' => 'Jalur Prestasi Non Akademik',
    //             'identifier' => 891432,
    //             'value' => 200,
    //         ],
    //         [
    //             // Zonasi
    //             'label' => 'Jalur Zonasi',
    //             'identifier' => 505066,
    //             'value' => 250,
    //         ],
    //     ];

    //     $quota_sma_full_boarding = [
    //         [
    //             'label' => 'Jalur Boarding School',
    //             'identifier' => 919851,
    //             'value' => 500,
    //         ],
    //     ];

    //     $quota_sma_half_boarding = array_merge($quota_sma, $quota_sma_full_boarding);

    //     if ($unit == 1) {
    //         return response()->json($quota_sma);
    //     } elseif ($unit == 2) {
    //         return response()->json($quota_smk);
    //     } elseif ($unit == 3) {
    //         return response()->json($quota_sma_full_boarding);
    //     } elseif ($unit == 4) {
    //         return response()->json($quota_sma_half_boarding);
    //     } else {
    //         return response()->json(['error' => 'Quota Tidak Ditemukan'], 404);
    //     }
    // }
}
