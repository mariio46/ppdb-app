<?php

namespace App\Repositories\HasRole\Impl;

use App\Models\HasRole\SchoolCoordinate as Coordinate;
use App\Repositories\HasRole\SchoolCoordinateRepository;
use Illuminate\Http\Request;

class SchoolCoordinateRepositoryImpl implements SchoolCoordinateRepository
{
    public function __construct(protected Coordinate $coordinate)
    {
        //
    }

    public function show(string $school_id): array
    {
        return $this->coordinate->getSchool(school_id: $school_id);
    }

    public function update(Request $request, string $school_id): array
    {
        return $this->coordinate->updateSchoolLocation(request: $request, school_id: $school_id);
    }
}
