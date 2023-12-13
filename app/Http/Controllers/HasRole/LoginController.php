<?php

namespace App\Http\Controllers\HasRole;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index(): View
    {
        return view('has-role.auth.login');
    }
}
