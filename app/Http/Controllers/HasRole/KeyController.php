<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KeyController extends Controller
{
    public function index(): View
    {
        return view('has-role.key.index');
    }
}
