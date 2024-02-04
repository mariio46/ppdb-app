<?php

namespace App\Http\Middleware\HasRole;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AccessOperator
{
    public function handle(Request $request, Closure $next): Response
    {
        $sekolah_id = $request->session()->get('sekolah_id');
        $cabdin_id = $request->session()->get('cabdin_id');

        abort_if($cabdin_id == null && $sekolah_id == null, 401);

        if ($sekolah_id != null) {
            $request->attributes->add([
                'key' => 'sekolah_id',
                'param' => $sekolah_id,
            ]);
        }

        if ($cabdin_id != null) {
            $request->attributes->add([
                'key' => 'cabdin_id',
                'param' => $cabdin_id,
            ]);
        }

        return $next($request);
    }
}
