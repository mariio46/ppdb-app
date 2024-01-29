<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use App\Repositories\HasRole\LoginRepository as Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function __construct(protected Auth $auth)
    {
        //
    }

    public function index(): View
    {
        return view('has-role.auth.login');
    }

    public function store(Request $request): RedirectResponse
    {
        $response = $this->auth->login($request->username, $request->password);

        if ($response['stat'] == 'success') {
            return to_route('dashboard')->with([
                'stat' => $response['stat'],
                'msg' => $response['msg'],
            ]);
        } else {
            return back()->with([
                'stat' => $response['stat'],
                'msg' => $response['msg'],
            ]);
        }
    }

    public function destroy(): RedirectResponse
    {
        $response = $this->auth->logout(user_id: session()->get('id'));

        if ($response['stat'] == 'success') {
            return to_route('login')->with([
                'stat' => $response['stat'],
                'msg' => $response['msg'],
            ]);
        } else {
            return back()->with([
                'stat' => $response['stat'],
                'msg' => $response['msg'],
            ]);
        }
    }
}
