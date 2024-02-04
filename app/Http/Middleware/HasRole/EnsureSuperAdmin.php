<?php

namespace App\Http\Middleware\HasRole;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureSuperAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->session()->get('role_id') != 1 && $request->session()->get('roles.name') != 'SuperAdmin') {
            return to_route('sekolah.detail', ['id' => $request->id, 'unit' => $request->unit])->with([
                'stat' => 'error',
                'msg' => 'Akses ditolak, Anda tidak memiliki izin untuk melakukan aksi ini.',
            ]);
        }

        return $next($request);
    }
}
