<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use App\Repositories\HasRole\OperatorRepository as Operator;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class OperatorController extends Controller
{
    public function __construct(protected Operator $operator)
    {
        //
    }

    public function index(Request $request): View
    {
        return view('has-role.operator.index', [
            'key' => $request->attributes->get('key'),
            'param' => $request->attributes->get('param'),
        ]);
    }

    public function create(): view
    {
        return view('has-role.operator.create');
    }

    public function pdf(): Response
    {
        return Pdf::loadView('has-role.operator.pdf')->stream(now()->addMinute().mt_rand(9999, 99999).'.pdf');
    }

    public function store(Request $request): RedirectResponse
    {
        $response = $this->operator->store(request: $request, param: $request->attributes->get('param'));

        return $this->repositoryResponseWithPostMethod(response: $response, route: 'operators.index');
    }

    public function show(Request $request, string $id): View
    {
        return view('has-role.operator.show', [
            'id' => $id,
            'key' => $request->attributes->get('key'),
        ]);
    }

    public function verify(string $id): RedirectResponse
    {
        $response = $this->operator->verify(operator_id: $id);

        return $this->repositoryResponseWithPostMethod(response: $response, route: 'operators.show', params: $id);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $response = $this->operator->status(request: $request, operator_id: $id);

        return $this->repositoryResponseWithPostMethod(response: $response, route: 'operators.show', params: $id);
    }

    // --------------------------------------------------DATA API JSON--------------------------------------------------
    protected function operators(string $key, string $param): JsonResponse
    {
        $operators = $this->operator->index(key: $key, param: $param);

        return response()->json($operators);
    }

    public function operator(string $id): JsonResponse
    {
        $operator = $this->operator->show(operator_id: $id);

        return response()->json($operator['data']);
    }
}
