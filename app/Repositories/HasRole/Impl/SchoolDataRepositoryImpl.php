<?php

namespace App\Repositories\HasRole\Impl;

use App\Models\HasRole\SchoolData;
use App\Repositories\HasRole\SchoolDataRepository;

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
}
