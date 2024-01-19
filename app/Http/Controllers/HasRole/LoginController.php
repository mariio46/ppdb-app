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
        $authenticate = $this->auth->login($request->username, $request->password);
        if ($authenticate->get('status') == 'success') {
            return to_route('dashboard');
        } else {
            return back()->withErrors(['login_error' => $authenticate->get('message')])->withInput();
        }
    }

    public function destroy(): RedirectResponse
    {
        $logout = $this->auth->logout();
        if ($logout['success']) {
            return to_route('login')->with([
                'stat' => 'success',
                'msg' => 'Anda berhasil keluar!',
            ]);
        } else {
            return back();
        }
    }
}
