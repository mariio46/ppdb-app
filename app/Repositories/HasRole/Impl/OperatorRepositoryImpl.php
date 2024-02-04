<?php

namespace App\Repositories\HasRole\Impl;

use App\Models\HasRole\Operator;
use App\Repositories\HasRole\OperatorRepository;
use Illuminate\Http\Request;

class OperatorRepositoryImpl implements OperatorRepository
{
    public function __construct(protected Operator $operator)
    {
        //
    }

    public function index(string $key, string $param): array
    {
        return $this->operator->getOperators(key: $key, param: $param);
    }

    public function show(string $operator_id): array
    {
        return $this->operator->getSingleOperator(operator_id: $operator_id);
    }

    public function store(Request $request, string $param): array
    {
        return $this->operator->createOperator(request: $request, param: $param);
    }

    public function verify(string $operator_id): array
    {
        return $this->operator->verifyOperator(operator_id: $operator_id);
    }

    public function status(Request $request, string $operator_id): array
    {
        return $this->operator->updateOperatorStatus(request: $request, operator_id: $operator_id);
    }
}
