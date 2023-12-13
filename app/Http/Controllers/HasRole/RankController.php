<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RankController extends Controller
{
    public function index(): View
    {
        return view('has-role.ranking.index');
    }
}
