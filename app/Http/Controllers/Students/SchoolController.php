<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Repositories\Student\SchoolRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SchoolController extends Controller
{
    public function __construct(
        public SchoolRepository $schoolRepo
    ) {
    }

    //------------------------------------------------------------VIEW
    public function index(): Response
    {
        return response()->view('student.school.index');
    }

    // --------------------------------------------------JSON
    public function getSchools(Request $request): JsonResponse
    {
        $type = $request->get('t', '');
        $city = $request->get('c', '');

        $get = $this->schoolRepo->getSchools($type, $city);

        return response()->json($get);
    }

    public function getSchoolByCity(string $cityCode, string $schoolType): JsonResponse
    {
        $get = $this->schoolRepo->getSchoolByCity($schoolType, $cityCode);

        return response()->json($get);
    }

    public function getSchoolByZone(): JsonResponse
    {
        $get = $this->schoolRepo->getSchoolByZone();

        return response()->json($get);
    }

    public function getBoardingSchool(): JsonResponse
    {
        $get = $this->schoolRepo->getBoardingSchool();
        return response()->json($get);
    }

    public function getDepartmentBySchool(string $schoolId): JsonResponse
    {
        $get = $this->schoolRepo->getDepartmentBySchool($schoolId);
        return response()->json($get);
    }
}
