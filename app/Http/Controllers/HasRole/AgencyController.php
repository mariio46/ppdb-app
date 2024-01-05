<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AgencyController extends Controller
{
    public function index(): View
    {
        return view('has-role.agency.index');
    }

    public function create(): View
    {
        return view('has-role.agency.create');
    }

    public function detail(string $slugAgency): View
    {
        $data = [
            'slug' => $slugAgency,
        ];

        return view('has-role.agency.detail', $data);
    }

    // --------------------------------------------------
    public function postNewData(Request $request): RedirectResponse
    {
        $data = [
            'name' => $request->post('name'),
            'phone' => $request->post('phone'),
            'service_area' => $request->post('serviceArea'),
            'position' => $request->post('position'),
            'address' => $request->post('address'),
        ];

        return response()->redirectTo('/panel/cabang-dinas')->with('postMsg', json_encode($data));
    }

    public function postUpdateData(Request $request): RedirectResponse
    {
        $data = [
            'name' => $request->post('name'),
            'phone' => $request->post('phone'),
            'service_area' => $request->post('serviceArea'),
            'position' => $request->post('position'),
            'address' => $request->post('address'),
        ];

        return response()->redirectTo('/panel/cabang-dinas')->with('postMsg', json_encode($data));
    }

    public function postRemoveData(Request $request): RedirectResponse
    {
        $data = [
            'id' => $request->post('agencyId'),
        ];

        return response()->redirectTo('/panel/cabang-dinas')->with('postMsg', json_encode($data));
    }

    // --------------------------------------------------
    protected function getAgency(): JsonResponse
    {
        return response()->json([
            [
                'id' => 1,
                'slug' => 'wilayah1',
                'name' => 'Wilayah I',
                'position' => 'Makassar',
                'service_area' => 'Makassar, Maros',
            ],
            [
                'id' => 2,
                'slug' => 'wilayah2',
                'name' => 'Wilayah II',
                'position' => 'Gowa',
                'service_area' => 'Gowa',
            ],
            [
                'id' => 3,
                'slug' => 'wilayah3',
                'name' => 'Wilayah III',
                'position' => 'Bone',
                'service_area' => 'Bone, Sinjai',
            ],
            [
                'id' => 4,
                'slug' => 'wilayah4',
                'name' => 'Wilayah IV',
                'position' => 'Wajo',
                'service_area' => 'Wajo, Soppeng',
            ],
            [
                'id' => 5,
                'slug' => 'wilayah5',
                'name' => 'Wilayah V',
                'position' => 'Bantaeng',
                'service_area' => 'Bantaeng, Bulukumba',
            ],
            [
                'id' => 6,
                'slug' => 'wilayah6',
                'name' => 'Wilayah VI',
                'position' => 'Kepulauan Selayar',
                'service_area' => 'Kepulauan Selayar',
            ],
            [
                'id' => 7,
                'slug' => 'wilayah7',
                'name' => 'Wilayah VII',
                'position' => 'Jeneponto',
                'service_area' => 'Jeneponto, Takalar',
            ],
            [
                'id' => 8,
                'slug' => 'wilayah8',
                'name' => 'Wilayah VIII',
                'position' => 'Parepare',
                'service_area' => 'Parepare, Barru, Sidrap',
            ],
            [
                'id' => 9,
                'slug' => 'wilayah9',
                'name' => 'Wilayah IX',
                'position' => 'Pangkajene dan Kepulauan',
                'service_area' => 'Pangkajene dan Kepulauan',
            ],
            [
                'id' => 10,
                'slug' => 'wilayah10',
                'name' => 'Wilayah X',
                'position' => 'Pinrang',
                'service_area' => 'Pinrang, Enrekang, Tana Toraja',
            ],
            [
                'id' => 11,
                'slug' => 'wilayah11',
                'name' => 'Wilayah XI',
                'position' => 'Palopo',
                'service_area' => 'Palopo, Luwu, Toraja Utara',
            ],
            [
                'id' => 12,
                'slug' => 'wilayah12',
                'name' => 'Wilayah XII',
                'position' => 'Luwu Timur',
                'service_area' => 'Luwu Timur, Luwu Utara',
            ],
        ]);
    }

    protected function getCity(): JsonResponse
    {
        $data = [
            [
                'code' => '73.01',
                'name' => 'Kab. Kepulauan Selayar',
            ],
            [
                'code' => '73.02',
                'name' => 'Kab. Bulukumba',
            ],
            [
                'code' => '73.03',
                'name' => 'Kab. Bantaeng',
            ],
            [
                'code' => '73.04',
                'name' => 'Kab. Jeneponto',
            ],
            [
                'code' => '73.05',
                'name' => 'Kab. Takalar',
            ],
            [
                'code' => '73.06',
                'name' => 'Kab. Gowa',
            ],
            [
                'code' => '73.07',
                'name' => 'Kab. Sinjai',
            ],
            [
                'code' => '73.08',
                'name' => 'Kab. Bone',
            ],
            [
                'code' => '73.09',
                'name' => 'Kab. Maros',
            ],
            [
                'code' => '73.10',
                'name' => 'Kab. Pangkajene Kepulauan',
            ],
            [
                'code' => '73.11',
                'name' => 'Kab. Barru',
            ],
            [
                'code' => '73.12',
                'name' => 'Kab. Soppeng',
            ],
            [
                'code' => '73.13',
                'name' => 'Kab. Wajo',
            ],
            [
                'code' => '73.14',
                'name' => 'Kab. Sidenreng Rappang',
            ],
            [
                'code' => '73.15',
                'name' => 'Kab. Pinrang',
            ],
            [
                'code' => '73.16',
                'name' => 'Kab. Enrekang',
            ],
            [
                'code' => '73.17',
                'name' => 'Kab. Luwu',
            ],
            [
                'code' => '73.18',
                'name' => 'Kab. Tana Toraja',
            ],
            [
                'code' => '73.22',
                'name' => 'Kab. Luwu Utara',
            ],
            [
                'code' => '73.24',
                'name' => 'Kab. Luwu Timur',
            ],
            [
                'code' => '73.26',
                'name' => 'Kab. Toraja Utara',
            ],
            [
                'code' => '73.71',
                'name' => 'Kota Makassar',
            ],
            [
                'code' => '73.72',
                'name' => 'Kota Pare Pare',
            ],
            [
                'code' => '73.73',
                'name' => 'Kota Palopo',
            ],
        ];

        return response()->json($data);
    }

    protected function getAgencyBySlug(string $slug): JsonResponse
    {
        $data = [
            'id' => 'aksjdaksjdkasdlask',
            'slug' => 'wilayah1',
            'name' => 'Wilayah I',
            'phone' => '08123456789',
            'service_area' => ['73.09|Kab. Maros', '73.71|Kota Makassar'],
            'position' => '73.71|Kota Makassar',
            // 'position'      => "",
            'address' => 'jl. Perintis Kemerdekaan No. 29',
        ];

        return response()->json($data);
    }
}
