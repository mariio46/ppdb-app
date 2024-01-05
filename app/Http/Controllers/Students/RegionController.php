<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Repositories\Student\RegionRepository;
use Illuminate\Http\JsonResponse;

class RegionController extends Controller
{
    public function __construct(
        protected RegionRepository $region
    ) {
    }

    public function getProvinceLists(): JsonResponse
    {
        $data = $this->region->getListProvince();

        return response()->json($data['data'], $data['status_code']);
    }

    public function getCityLists(string $code): JsonResponse
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
