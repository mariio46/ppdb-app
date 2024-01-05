<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function index(): View
    {
        return view('has-role.auth.login');
    }
}
