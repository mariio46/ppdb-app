<?php

namespace App\Repositories\HasRole\Impl;

use App\Models\HasRole\SchoolZone as Zone;
use App\Repositories\HasRole\SchoolZoneRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class SchoolZoneRepositoryImpl implements SchoolZoneRepository
{
    public function __construct(protected Zone $zone)
    {
        //
    }

    public function index(string $school_id): array
    {
        return $this->zone->getSchoolZonesList(school_id: $school_id);
    }

    public function show(string $zone_id): array
    {
        return $this->zone->getSingleSchoolZone(zone_id: $zone_id);
    }

    public function store(Request $request, string $school_id): array
    {
        return $this->zone->createSchoolZone(request: $request, school_id: $school_id);
    }

    public function update(Request $request, string $school_id, string $zone_id): array
    {
        return $this->zone->editSchoolZone(request: $request, school_id: $school_id, zone_id: $zone_id);
    }

    public function destroy(string $zone_id): array
    {
        return $this->zone->deleteSchoolZone(zone_id: $zone_id);
    }

    // -------------------------FORM DATA-------------------------
    public function provinces(): Collection
    {
        return $this->zone->getListProvince();
    }

    public function cities(string $province_code): Collection
    {
        return $this->zone->getListCity(province_code: $province_code);
    }

    public function districts(string $city_code): Collection
    {
        return $this->zone->getListDistrict(city_code: $city_code);
    }
}
