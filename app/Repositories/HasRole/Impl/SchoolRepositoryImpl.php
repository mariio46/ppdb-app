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

    public function store(Request $request): array
    {
        return $this->school->createSchool(request: $request);
    }

    public function show(string $school_id): array
    {
        return $this->school->getSingleSchool(school_id: $school_id);
    }
}
