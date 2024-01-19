<?php

namespace App\Repositories\HasRole;

use Illuminate\Http\Request;

interface OperatorRepository
{
    public function index(string $key, string $param): array;

    public function show(string $param): array;

    public function store(Request $request, string $param): array;
}
