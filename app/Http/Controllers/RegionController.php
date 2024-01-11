<?php

namespace App\Http\Controllers;

use App\Repositories\RegionRepository;
use Illuminate\Http\JsonResponse;

class RegionController extends Controller
{
    public function __construct(protected RegionRepository $region)
    {
    }

    public function getProvinceLists(): JsonResponse
    {
        $data = $this->region->getListProvince();

        return response()->json($data['data'], $data['status_code']);
    }

    /**
     * default 73 - Sulawesi Selatan
     */
    public function getCityLists(string $code = '73'): JsonResponse
    {
        $data = $this->region->getListCity($code);

        return response()->json($data['data'], $data['status_code']);
    }

    public function getDistrictLists(string $code): JsonResponse
    {
        $data = $this->region->getListDistrict($code);

        return response()->json($data['data'], $data['status_code']);
    }

    public function getVillageLists(string $code): JsonResponse
    {
        $data = $this->region->getListVillage($code);

        return response()->json($data['data'], $data['status_code']);
    }
}
