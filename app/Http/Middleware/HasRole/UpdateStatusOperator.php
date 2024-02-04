<?php

namespace App\Http\Middleware\HasRole;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UpdateStatusOperator
{
    public function handle(Request $request, Closure $next): Response
    {
        // return dd($request->status);
        abort_if($request->attributes->get('param') != $request->session()->get('sekolah_id'), 401);

        if ($request->status != 'a' && $request->status != 'n') {
            return back()->with([
                'stat' => 'error',
                'msg' => 'Invalid Status!',
            ]);
        }

        return $next($request);
    }
}
