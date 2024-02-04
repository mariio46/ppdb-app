<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('landing-page-x');
    }

    public function announcement(): View
    {
        return view('announcement');
    }

    public function mapZone()
    {
        return view('zone-map');
    }
}
