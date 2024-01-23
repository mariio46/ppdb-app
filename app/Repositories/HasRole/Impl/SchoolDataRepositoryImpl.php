<?php

namespace App\Repositories\HasRole\Impl;

use App\Models\HasRole\SchoolData;
use App\Repositories\HasRole\SchoolDataRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class SchoolDataRepositoryImpl implements SchoolDataRepository
{
    public function __construct(protected SchoolData $school_data)
    {
        //
    }

    public function index(string $school_id): array
    {
        return $this->school_data->getSchool(school_id: $school_id);
    }

    public function update(Request $request, string $id): array
    {
        return $this->school_data->updateSchool(request: $request, school_id: $id);
    }

    public function districts(string $code): Collection
    {
        return $this->school_data->getDistrictsList(code: $code);
    }

    public function uploadFirstDocument(Request $request, string $school_id): array
    {
        return $this->school_data->uploadPaktaIntegritas(request: $request, school_id: $school_id);
    }

    public function uploadSecondDocument(Request $request, string $school_id): array
    {
        return $this->school_data->uploadSkPpdb(request: $request, school_id: $school_id);
    }

    public function uploadLogo(Request $request, string $school_id): array
    {
        return $this->school_data->uploadSchoolLogo(request: $request, school_id: $school_id);
    }
}
