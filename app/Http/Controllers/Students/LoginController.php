<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Repositories\Student\LoginRepository;
use Illuminate\Auth\Events\Logout;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LoginController extends Controller
{
    public function __construct(protected LoginRepository $loginRepo)
    {
    }

    public function index(): Response
    {
        return response()->view('student.login');
    }

    public function doLogin(Request $request): RedirectResponse
    {
        $nisn = $request->get('nisn');
        $pass = $request->get('password');

        $authenticate = $this->loginRepo->doLogin($nisn, $pass);
        if (!$authenticate->get('success')) {
            return redirect()->back()->withErrors(['errorMsg' => $authenticate->get('message')])->withInput();
        }

        return redirect()->to('/data-diri');
    }

    public function logout(): RedirectResponse
    {
        $logout = $this->loginRepo->logout();

        if ($logout['success']) {
            session()->flush();
            return redirect('/masuk')->withErrors(['errorMsg' => 'Kamu sudah logout.']);
        } else {
            return redirect()->back();
        }
    }
}
