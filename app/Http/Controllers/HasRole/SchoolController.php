<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use App\Repositories\HasRole\SchoolRepository as School;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SchoolController extends Controller
{
    public function __construct(protected School $school)
    {
    }

    public function index(): View
    {
        return view('has-role.school.index');
    }

    public function create(): View
    {
        return view('has-role.school.create');
    }

    public function store(Request $request)
    {
        // return dd($request->all());
        $response = $this->school->store(request: $request);
        if ($response['statusCode'] == 201) {
            return back()->with([
                'stat' => 'success',
                'msg' => $response['messages'],
            ]);
        } else {
            return back()->with([
                'stat' => 'error',
                'msg' => $response['messages'],
            ]);
        }
    }

    public function edit($npsn): View
    {
        return view('has-role.school.edit', compact('npsn'));
    }

    public function schoolMajorQuota($npsn): View
    {
        return view('has-role.school.major', [
            'school' => $this->getSingleSchool($npsn),
            'quotas' => $this->getSchoolMajorQuota(),
        ]);
    }

    public function schoolDetail($id, $unit): View
    {
        return view('has-role.school.detail', compact('id', 'unit'));
    }

    public function schoolQuota($id, $unit): View
    {
        return view('has-role.school.quota', compact('id', 'unit'));
    }

    public function schoolZone($npsn, $unit): View
    {
        return $unit == 'SMA' || $unit == 'SMA Half Boarding'
            ? view('has-role.school.zone', compact('npsn', 'unit'))
            : abort(404);
    }

    // --------------------------------------------------DATA JSON--------------------------------------------------
    protected function units(): JsonResponse
    {
        $units = [
            [
                'label' => 'SMA',
                'value' => 'sma',
            ],
            [
                'label' => 'SMK',
                'value' => 'smk',
            ],
            [
                'label' => 'SMA Boarding',
                'value' => 'fbs',
            ],
            [
                'label' => 'SMA Half Boarding',
                'value' => 'hbs',
            ],
        ];

        return response()->json($units);
    }

    protected function zones(): JsonResponse
    {
        $zones = [
            [
                'id' => 1,
                'province' => 'Sulawesi Selatan',
                'city' => 'Parepare',
                'subdistrict' => 'Bacukiki',
            ],
            [
                'id' => 2,
                'province' => 'Sulawesi Selatan',
                'city' => 'Parepare',
                'subdistrict' => 'Soreang',
            ],
            [
                'id' => 3,
                'province' => 'Sulawesi Selatan',
                'city' => 'Parepare',
                'subdistrict' => 'Ujung',
            ],
            [
                'id' => 4,
                'province' => 'Sulawesi Selatan',
                'city' => 'Makassar',
                'subdistrict' => 'Biringkanaya',
            ],
            [
                'id' => 5,
                'province' => 'Sulawesi Selatan',
                'city' => 'Makassar',
                'subdistrict' => 'Bontoala',
            ],
            [
                'id' => 6,
                'province' => 'Sulawesi Selatan',
                'city' => 'Makassar',
                'subdistrict' => 'Kepulauan Sangkarrang',
            ],
            [
                'id' => 7,
                'province' => 'Sulawesi Selatan',
                'city' => 'Makassar',
                'subdistrict' => 'Mamajang',
            ],
            [
                'id' => 8,
                'province' => 'Sulawesi Selatan',
                'city' => 'Makassar',
                'subdistrict' => 'Manggala',
            ],
            [
                'id' => 9,
                'province' => 'Sulawesi Selatan',
                'city' => 'Barru',
                'subdistrict' => 'Balusu',
            ],
            [
                'id' => 10,
                'province' => 'Sulawesi Selatan',
                'city' => 'Barru',
                'subdistrict' => 'Mallusetasi',
            ],
            [
                'id' => 11,
                'province' => 'Sulawesi Selatan',
                'city' => 'Barru',
                'subdistrict' => 'Pujananting',
            ],
            [
                'id' => 12,
                'province' => 'Sulawesi Selatan',
                'city' => 'Barru',
                'subdistrict' => 'Tanete Riaja',
            ],
            [
                'id' => 13,
                'province' => 'Sulawesi Selatan',
                'city' => 'Enrekang',
                'subdistrict' => 'Alla',
            ],
            [
                'id' => 14,
                'province' => 'Sulawesi Selatan',
                'city' => 'Enrekang',
                'subdistrict' => 'Anggeraja',
            ],
            [
                'id' => 15,
                'province' => 'Sulawesi Selatan',
                'city' => 'Enrekang',
                'subdistrict' => 'Baraka',
            ],
            [
                'id' => 16,
                'province' => 'Sulawesi Selatan',
                'city' => 'Enrekang',
                'subdistrict' => 'Buntu Batu',
            ],
            [
                'id' => 17,
                'province' => 'Sulawesi Selatan',
                'city' => 'Sidrap',
                'subdistrict' => 'Baranti',
            ],
            [
                'id' => 18,
                'province' => 'Sulawesi Selatan',
                'city' => 'Sidrap',
                'subdistrict' => 'Duapitue',
            ],
            [
                'id' => 19,
                'province' => 'Sulawesi Selatan',
                'city' => 'Sidrap',
                'subdistrict' => 'Kulo',
            ],
            [
                'id' => 20,
                'province' => 'Sulawesi Selatan',
                'city' => 'Sidrap',
                'subdistrict' => 'Panca Lautang',
            ],
        ];

        return response()->json($zones);
    }

    protected function schoolsQuota($npsn, $unit): JsonResponse
    {
        $quota_smk = [
            [
                'label' => 'Teknik Komputer dan Jaringan',
                'value' => '150 Orang',
            ],
            [
                'label' => 'Teknik Kendaraan Ringan',
                'value' => '75 Orang',
            ],
            [
                'label' => 'Pemodelan dan Informasi Bangunan',
                'value' => '100 Orang',
            ],
            [
                'label' => 'Administrasi Perkantoran',
                'value' => '200 Orang',
            ],
            [
                'label' => 'Tata Rias dan Kecantikan',
                'value' => '250 Orang',
            ],
            [
                'label' => 'Perbankan dan Keuangan Syariah',
                'value' => '50 Orang',
            ],
        ];

        $quota_sma = [
            [
                // Afirmasi
                'label' => 'Jalur Afirmasi',
                'value' => '150 Orang',
            ],
            [
                // Mutasi
                'label' => 'Jalur Perpindahan Tugas Orang Tua',
                'value' => '75 Orang',
            ],
            [
                // Anak Guru
                'label' => 'Jalur Anak Guru',
                'value' => '100 Orang',
            ],
            [
                // Akademik
                'label' => 'Jalur Prestasi Akademik',
                'value' => '50 Orang',
            ],
            [
                // Non Akademik
                'label' => 'Jalur Prestasi Non Akademik',
                'value' => '200 Orang',
            ],
            [
                // Zonasi
                'label' => 'Jalur Zonasi',
                'value' => '250 Orang',
            ],
        ];

        $quota_sma_full_boarding = [
            [
                'label' => 'Jalur Boarding School',
                'value' => '500 Orang',
            ],
        ];

        $quota_sma_half_boarding = array_merge($quota_sma, $quota_sma_full_boarding);

        if ($unit == 'SMA') {
            return response()->json($quota_sma);
        } elseif ($unit == 'SMA Half Boarding') {
            return response()->json($quota_sma_half_boarding);
        } elseif ($unit == 'SMA Boarding') {
            return response()->json($quota_sma_full_boarding);
        } elseif ($unit == 'SMK') {
            return response()->json($quota_smk);
        } else {
            return response()->json(['error' => 'Quota Tidak Ditemukan'], 404);
        }
    }

    // --------------------------------------------------DATA API JSON--------------------------------------------------
    protected function schools(): JsonResponse
    {
        $schools = $this->school->index();

        return response()->json($schools['data']);
    }

    protected function school(string $school_id): JsonResponse
    {
        $school = $this->school->show(school_id: $school_id)['data'];

        return response()->json($school);
    }
}
