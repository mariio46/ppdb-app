<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function repositoryResponseWithPostMethod(array $response, string $route): RedirectResponse
    {
        $status_code = $response['statusCode'];

        $success = [
            'stat' => 'success',
            'msg' => $response['messages'],
        ];

        $failed = [
            'stat' => 'error',
            'msg' => $response['messages'],
        ];

        return $status_code == 201 || $status_code == 200
            ? to_route($route)->with($success)
            : to_route($route)->with($failed);
    }
}
