<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use App\Repositories\HasRole\AgencyRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AgencyController extends Controller
{
    public function __construct(protected AgencyRepository $agencyRepository)
    {
    }

    public function index(): View
    {
        return view('has-role.agency.index');
    }

    public function create(): View
    {
        return view('has-role.agency.create');
    }

    public function detail(string $idAgency): View
    {
        $data = [
            'id_agency' => $idAgency,
        ];

        return view('has-role.agency.detail', $data);
    }

    // --------------------------------------------------
    /**
     * trello: A.09.003
     */
    public function postNewData(Request $request): RedirectResponse
    {
        $save = $this->agencyRepository->create($request);

        if ($save['statusCode'] == 201) {
            return to_route('cabang-dinas.index')->with(['stat' => 'success', 'msg' => $save['messages']]);
        } else {
            return redirect()->back()->with([
                'stat' => 'error',
                'msg' => $save['messages'],
            ]);
        }
    }

    /**
     * trello: A.09.004
     */
    public function postUpdateData(Request $request): RedirectResponse
    {
        $upd = $this->agencyRepository->update($request);

        return redirect()->back()->with([
            'stat' => ($upd['statusCode'] == 200) ? 'success' : 'danger',
            'msg' => $upd['messages'],
            'data' => $upd,
        ]);
    }

    /**
     * trello: A.09.005
     */
    public function postRemoveData(Request $request): RedirectResponse
    {
        $del = $this->agencyRepository->remove($request->post('agencyId'));

        return to_route('cabang-dinas.index')->with([
            'stat' => ($del['statusCode'] == 200) ? 'success' : 'danger',
            'msg' => $del['messages'],
            'data' => $del,
        ]);
    }

    // --------------------------------------------------
    /**
     * trello: A.09.001
     */
    protected function getAgency(): JsonResponse
    {
        $get = $this->agencyRepository->getAgency();

        return response()->json($get['data']);
    }

    /**
     * trello: 00.003 -> with data province is 73 (Sulawesi Selatan)
     */
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

    /**
     * trello: A.09.002
     */
    protected function getAgencyById(string $id): JsonResponse
    {
        $get = $this->agencyRepository->getById($id);

        return response()->json($get['data']);
    }
}
