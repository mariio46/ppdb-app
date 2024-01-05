<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class OperatorController extends Controller
{
    public function index(): View
    {
        return view('has-role.operator.index');
    }
}
