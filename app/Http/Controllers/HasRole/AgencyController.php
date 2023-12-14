<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AgencyController extends Controller
{
    public function index(): View
    {
        return view('has-role.agency.index');
    }

    protected function getAgency(): JsonResponse
    {
        return response()->json([
            [
                "id"            => 1,
                "slug"          => "wilayah1",
                "name"          => "Wilayah I",
                "position"      => "Makassar",
                "service_area"  => "Makassar, Maros"
            ],
            [
                "id"            => 2,
                "slug"          => "wilayah2",
                "name"          => "Wilayah II",
                "position"      => "Gowa",
                "service_area"  => "Gowa"
            ],
            [
                "id"            => 3,
                "slug"          => "wilayah3",
                "name"          => "Wilayah III",
                "position"      => "Bone",
                "service_area"  => "Bone, Sinjai"
            ],
            [
                "id"            => 4,
                "slug"          => "wilayah4",
                "name"          => "Wilayah IV",
                "position"      => "Wajo",
                "service_area"  => "Wajo, Soppeng"
            ],
            [
                "id"            => 5,
                "slug"          => "wilayah5",
                "name"          => "Wilayah V",
                "position"      => "Bantaeng",
                "service_area"  => "Bantaeng, Bulukumba"
            ],
            [
                "id"            => 6,
                "slug"          => "wilayah6",
                "name"          => "Wilayah VI",
                "position"      => "Kepulauan Selayar",
                "service_area"  => "Kepulauan Selayar"
            ],
            [
                "id"            => 7,
                "slug"          => "wilayah7",
                "name"          => "Wilayah VII",
                "position"      => "Jeneponto",
                "service_area"  => "Jeneponto, Takalar"
            ],
            [
                "id"            => 8,
                "slug"          => "wilayah8",
                "name"          => "Wilayah VIII",
                "position"      => "Parepare",
                "service_area"  => "Parepare, Barru, Sidrap"
            ],
            [
                "id"            => 9,
                "slug"          => "wilayah9",
                "name"          => "Wilayah IX",
                "position"      => "Pangkajene dan Kepulauan",
                "service_area"  => "Pangkajene dan Kepulauan"
            ],
            [
                "id"            => 10,
                "slug"          => "wilayah10",
                "name"          => "Wilayah X",
                "position"      => "Pinrang",
                "service_area"  => "Pinrang, Enrekang, Tana Toraja"
            ],
            [
                "id"            => 11,
                "slug"          => "wilayah11",
                "name"          => "Wilayah XI",
                "position"      => "Palopo",
                "service_area"  => "Palopo, Luwu, Toraja Utara"
            ],
            [
                "id"            => 12,
                "slug"          => "wilayah12",
                "name"          => "Wilayah XII",
                "position"      => "Luwu Timur",
                "service_area"  => "Luwu Timur, Luwu Utara"
            ]
        ]);
    }
}
