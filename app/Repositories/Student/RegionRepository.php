<?php

namespace App\Repositories\Student;

interface RegionRepository
{
    public function getListProvince(): array;

    public function getListCity(string $provinceCode): array;

    public function getListDistrict(string $cityCode): array;

    public function getListVillage(string $districtCode): array;
}
