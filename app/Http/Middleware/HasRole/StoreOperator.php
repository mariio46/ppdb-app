<?php

namespace App\Http\Middleware\HasRole;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StoreOperator
{
    public function handle(Request $request, Closure $next): Response
    {
        abort_if($request->attributes->get('param') != $request->session()->get('sekolah_id'), 401);

        return $next($request);
    }
}
