<?php

namespace App\Repositories\Impl;

use App\Models\Region;
use App\Repositories\RegionRepository;

class RegionRepositoryImpl implements RegionRepository
{
  public function __construct(
    protected Region $region
  ) {
  }

  public function getListProvince(): array
  {
    $lists = $this->region->getListProvince();

    $data = array_map(function ($p) {
      return [
        'code' => $p['kode'],
        'name' => $p['nama']
      ];
    }, $lists['response']['data']);

    return [
      'status_code' => $lists['status_code'],
      'data' => $data
    ];
  }

  public function getListCity(string $provinceCode): array
  {
    $lists = $this->region->getListCity($provinceCode);

    $data = array_map(function ($c) {
      return [
        'code' => $c['kode'],
        'name' => $c['nama']
      ];
    }, $lists['response']['data']);

    return [
      'status_code' => $lists['status_code'],
      'data' => $data
    ];
  }

  public function getListDistrict(string $cityCode): array
  {
    $lists = $this->region->getListDistrict($cityCode);

    $data = array_map(function ($d) {
      return [
        'code' => $d['kode'],
        'name' => $d['nama']
      ];
    }, $lists['response']['data']);

    return [
      'status_code' => $lists['status_code'],
      'data' => $data
    ];
  }

  public function getListVillage(string $districtCode): array
  {
    $lists = $this->region->getListVillage($districtCode);

    $data = array_map(function ($v) {
      return [
        'code' => $v['kode'],
        'name' => $v['nama']
      ];
    }, $lists['response']['data']);

    return [
      'status_code' => $lists['status_code'],
      'data' => $data
    ];
  }
}
