<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VerificationController extends Controller
{
    public function manual(): View
    {
        return view('has-role.verifications.manual');
    }

    public function reregistration(): View
    {
        return view('has-role.verifications.reregistration');
    }
}
