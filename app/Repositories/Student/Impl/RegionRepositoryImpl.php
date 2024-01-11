<?php

namespace App\Repositories\Student\Impl;

use App\Models\Student\RegionModel;
use App\Repositories\Student\RegionRepository;

class RegionRepositoryImpl implements RegionRepository
{
    public function __construct(
        protected RegionModel $regionModel
    ) {
    }

    public function getListProvince(): array
    {
        $lists = $this->regionModel->getListProvince();

        // dd($lists);

        $data = array_map(function ($p) {
            return ['code' => $p['kode'], 'name' => $p['nama']];
        }, $lists['response']['data']);

        return ['status_code' => $lists['status_code'], 'data' => $data];
    }

    public function getListCity(string $provinceCode): array
    {
        $lists = $this->regionModel->getListCity($provinceCode);

        $data = array_map(function ($c) {
            return ['code' => $c['kode'], 'name' => $c['nama']];
        }, $lists['response']['data']);

        return ['status_code' => $lists['status_code'], 'data' => $data];
    }

    public function getListDistrict(string $cityCode): array
    {
        $lists = $this->regionModel->getListDistrict($cityCode);

        $data = array_map(function ($d) {
            return ['code' => $d['kode'], 'name' => $d['nama']];
        }, $lists['response']['data']);

        return ['status_code' => $lists['status_code'], 'data' => $data];
    }

    public function getListVillage(string $districtCode): array
    {
        $lists = $this->regionModel->getListVillage($districtCode);

        $data = array_map(function ($v) {
            return ['code' => $v['kode'], 'name' => $v['nama']];
        }, $lists['response']['data']);

        return ['status_code' => $lists['status_code'], 'data' => $data];
    }
}
