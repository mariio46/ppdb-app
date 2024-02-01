<?php

namespace App\Models\HasRole;

use App\Models\Base;
use Illuminate\Http\Request;

class SchoolCoordinate extends Base
{
    public function getSchool(string $school_id): array
    {
        $school = $this->getWithToken(endpoint: "sekolah/detail?id={$school_id}");

        return $this->serverResponseWithGetMethod(response: $school);
    }

    public function updateSchoolLocation(Request $request, string $school_id): array
    {
        $body = [
            'id' => $school_id,
            'lintang' => $request->lintang,
            'bujur' => $request->bujur,
        ];

        $schoolCoordinate = $this->postWithToken(endpoint: 'sekolah/create/update', data: $body);

        return $this->serverResponseWithPostMethod(data: $schoolCoordinate);
    }
}
