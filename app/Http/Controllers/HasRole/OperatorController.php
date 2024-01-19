<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use App\Repositories\HasRole\OperatorRepository as Operator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OperatorController extends Controller
{
    public function __construct(protected Operator $operator)
    {
        //
    }

    protected function authenticatedUserRoleId(): int
    {
        return session()->get('role_id');
    }

    public function index(): View
    {

        $key = match ($this->authenticatedUserRoleId()) {
            1 => 'id',
            3 => 'cabdin_id',
            4 => 'sekolah_id',
            default => null,
        };
        $param = match ($this->authenticatedUserRoleId()) {
            1 => session()->get('id'),
            3 => session()->get('cabdin_id'),
            4 => session()->get('sekolah_id'),
            default => null,
        };

        return view('has-role.operator.index', [
            'key' => $key,
            'param' => $param,
        ]);
    }

    public function create(): view
    {
        return view('has-role.operator.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $sekolah_id = session()->get('sekolah_id');

        $response = $this->operator->store(request: $request, param: $sekolah_id);

        if ($response['statusCode'] == 201) {
            return to_route('operators.index')->with([
                'stat' => 'success',
                'msg' => $response['messages'],
            ]);
        } else {
            return to_route('operators.index')->with([
                'stat' => 'error',
                'msg' => $response['messages'],
            ]);
        }
    }

    public function show(string $param): View
    {
        return view('has-role.operator.show', compact('param'));
    }

    // --------------------------------------------------DATA API JSON--------------------------------------------------
    protected function operators(string $key, string $param): JsonResponse
    {
        $operators = $this->operator->index(key: $key, param: $param);

        return response()->json($operators['data']);
    }

    public function operator(string $param): JsonResponse
    {
        $operator = $this->operator->show(param: $param);

        return response()->json($operator['data']);
    }
}
