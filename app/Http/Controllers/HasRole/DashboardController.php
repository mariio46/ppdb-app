<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(Request $request): View
    {
        // Check if admin or not = session()->get('roles.name');
        return view('has-role.dashboard.index', [
            'session' => session()->all(),
        ]);
    }
}
