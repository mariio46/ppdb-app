<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class SchoolCoordinateController extends Controller
{
    protected string $schoolId;

    protected string $schoolUnit;

    protected bool $hasSchoolUnit;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->schoolId = session()->get('sekolah_id');
            $this->hasSchoolUnit = session()->has('satuan_pendidikan');
            $this->schoolUnit = $this->hasSchoolUnit ? session()->get('satuan_pendidikan') : null;

            return $next($request);
        });
    }

    public function index(): View
    {
        return view('has-role.school-data.coordinates.index', [
            'sekolah_id' => $this->schoolId,
            'satuan_pendidikan' => $this->schoolUnit,
        ]);
    }
}
