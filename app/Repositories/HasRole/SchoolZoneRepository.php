<?php

namespace App\Repositories\HasRole;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

interface SchoolZoneRepository
{
    public function index(string $school_id): array;

    public function show(string $zone_id): array;

    public function store(Request $request, string $school_id): array;

    public function update(Request $request, string $school_id, string $zone_id): array;

    public function destroy(string $zone_id): array;

    // -------------------------FORM DATA-------------------------

    public function provinces(): Collection;

    public function cities(string $province_code): Collection;

    public function districts(string $city_code): Collection;
}
