<?php

namespace App\Repositories\HasRole\Impl;

use App\Models\HasRole\School;
use App\Repositories\HasRole\SchoolRepository;
use Illuminate\Http\Request;

class SchoolRepositoryImpl implements SchoolRepository
{
    public function __construct(protected School $school)
    {
        //
    }

    public function index(): array
    {
        return $this->school->getSchools();
    }

    public function store(Request $request, string $cabdin_id): array
    {
        return $this->school->createSchool(request: $request, cabdin_id: $cabdin_id);
    }

    public function show(string $school_id): array
    {
        return $this->school->getSingleSchool(school_id: $school_id);
    }

    public function check(string $school_id): array
    {
        return $this->school->checkSchoolStatus(school_id: $school_id);
    }

    public function exists(string $school_id, string $school_unit): array
    {
        return $this->school->checkIfSchoolExists(school_id: $school_id, school_unit: $school_unit);
    }

    public function update(Request $request, string $school_id, string $cabdin_id): array
    {
        return $this->school->updateSchool(request: $request, school_id: $school_id, cabdin_id: $cabdin_id);
    }

    public function destroy(string $school_id): array
    {
        return $this->school->deleteSchool(school_id: $school_id);
    }

    public function quotas(string $school_unit, string $school_id): array
    {
        return $this->school->getSchoolQuota(school_unit: $school_unit, school_id: $school_id);
    }

    public function zones(string $school_id): array
    {
        return $this->school->getSchoolZone(school_id: $school_id);
    }

    public function verify(string $school_id, string $cabdin_id): array
    {
        return $this->school->verifySchool(school_id: $school_id, cabdin_id: $cabdin_id);
    }
}
