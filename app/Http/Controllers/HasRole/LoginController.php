<?php

namespace App\Http\Controllers\HasRole;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\HasRole\LoginRepository;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    public function __construct(protected LoginRepository $loginRepository)
    {
        // 
    }

    public function index(): View
    {
        return view('has-role.auth.login');
    }

    public function store(Request $request): RedirectResponse
    {
        $authenticate = $this->loginRepository->login($request->username, $request->password);
        if ($authenticate->get('status') == 'success') {
            return to_route('dashboard');
        } else {
            return back()->withErrors(['login_error' => $authenticate->get('message')])->withInput();
        }
    }

    public function destroy(): RedirectResponse
    {
        $logout = $this->loginRepository->logout();
        if ($logout['success']) {
            # code...
            return to_route('login')->withErrors(['login_error' => 'You are already logout!']);
        } else {
            return back();
        }
    }
}
