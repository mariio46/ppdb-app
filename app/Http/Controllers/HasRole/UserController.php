<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        return view('has-role.users.index', [
            'collections' => $this->getUsers(),
        ]);
    }

    public function create(): View
    {
        return view('has-role.users.create',);
    }

    public function show($id): View
    {
        return view('has-role.users.show', [
            'user' => $this->getSingleUser($id),
        ]);
    }

    public function forgotPassword($id): View
    {
        return view('has-role.users.forgot-password', [
            'user' => $this->getSingleUser($id),
        ]);
    }

    protected function getSingleUser($id)
    {
        $users = $this->getUsers()->where('id', $id);
        $data = json_decode($users, true);
        foreach ($data as $key => $item) {
            $user = (object) $item;
        }
        return $user;
    }

    protected function getUsers()
    {
        return collect([
            (object)[
                'id' => 1,
                'name' => 'Ryan Rafli',
                'username' => 'ryan' . mt_rand(11111, 99999),
                'role' => 'Super Admin',
                'unique_id' => mt_rand(111111, 999999),
                'status' => rand(1, 2),
            ],
            (object)[
                'id' => 2,
                'name' => 'Rafie Muix',
                'username' => 'rafie' . mt_rand(11111, 99999),
                'role' => 'Admin',
                'unique_id' => mt_rand(111111, 999999),
                'status' => rand(1, 2),
            ],
            (object)[
                'id' => 3,
                'name' => 'Muhammad Al Muqtadir',
                'username' => 'tadir' . mt_rand(11111, 99999),
                'role' => 'Operator',
                'unique_id' => mt_rand(111111, 999999),
                'status' => rand(1, 2),
            ],
            (object)[
                'id' => 4,
                'name' => 'Muhammad Raiz',
                'username' => 'raiz' . mt_rand(11111, 99999),
                'role' => 'admin cabang dinas',
                'unique_id' => mt_rand(111111, 999999),
                'status' => rand(1, 2),
            ],
            (object)[
                'id' => 5,
                'name' => 'Edy Siswanto Syarif',
                'username' => 'edy' . mt_rand(11111, 99999),
                'role' => 'admin sekolah',
                'unique_id' => mt_rand(111111, 999999),
                'status' => rand(1, 2),
            ],
            (object)[
                'id' => 6,
                'name' => 'Mario Arya Dimus',
                'username' => 'mario' . mt_rand(11111, 99999),
                'role' => 'operator sekolah',
                'unique_id' => mt_rand(111111, 999999),
                'status' => rand(1, 2),
            ],
        ]);
    }
}
