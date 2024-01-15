<?php

namespace App\Repositories\HasRole;

interface SchoolDataRepository
{
    public function index(string $school_id): array;
}
