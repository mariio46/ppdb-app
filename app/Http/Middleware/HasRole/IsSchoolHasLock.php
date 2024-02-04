<?php

namespace App\Http\Middleware\HasRole;

use App\Repositories\HasRole\SchoolRepository as School;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsSchoolHasLock
{
    protected int $roleId;

    protected string $roleName;

    public function __construct(protected School $school)
    {
        $this->roleId = session()->get('role_id');
        $this->roleName = session()->get('roles.name');
    }

    public function handle(Request $request, Closure $next): Response
    {
        $schoolStatus = $this->school->check(school_id: $request->id)['data']['terverifikasi'];

        $protectedRoutes = ['sekolah.edit', 'sekolah.update'];

        if (($schoolStatus == 'simpan' || $schoolStatus == 'verifikasi') && $request->routeIs($protectedRoutes)) {
            $status = $schoolStatus == 'verifikasi' ? 'terverifikasi' : 'terkunci';

            return to_route('sekolah.detail', ['id' => $request->id, 'unit' => $request->unit])->with(['stat' => 'error', 'msg' => "Sekolah ini telah {$status}!"]);
        }

        $request->attributes->add([
            'roleId' => $this->roleId,
            'roleName' => $this->roleName,
        ]);

        return $next($request);
    }
}
