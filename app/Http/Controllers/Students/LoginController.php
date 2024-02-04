<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Repositories\Student\LoginRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function __construct(protected LoginRepository $loginRepo)
    {
    }

    public function index(): View
    {
        return view('student.login');
    }

    public function doLogin(Request $request): RedirectResponse
    {
        $nisn = $request->get('nisn');
        $pass = $request->get('password');

        // $authenticate = $this->loginRepo->doLogin($nisn, $pass);
        // if (!$authenticate->get('success')) {
        //     return redirect()->back()->withErrors(['errorMsg' => $authenticate->get('message')])->withInput();
        // }

        // return redirect()->to('/data-diri');

        $auth = $this->loginRepo->login($nisn, $pass);
        if ($auth['statusCode'] == 200) {
            return redirect()->back()->withErrors(['errorMsg' => $auth['messages']])->withInput();
        }

        return to_route('student.personal');
    }

    public function logout(): RedirectResponse
    {
        $logout = $this->loginRepo->logout();

        if ($logout['statusCode'] == 200) {
            return to_route('student.masuk')->withErrors([
                'errorMsg' => 'Kamu sudah logout.',
            ]);
        }

        return redirect()->back()->with(['stat' => 'error', 'msg' => $logout['statusCode']]);
    }
}
