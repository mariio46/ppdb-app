<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StudentController extends Controller
{
    public function index(): View
    {
        return view('has-role.student.index', [
            'collections' => $this->getStudents(),
        ]);
    }

    public function create(): View
    {
        return view('has-role.student.create', [
            'months' => $this->getMoths(),
            'years' => $this->getYears(),
        ]);
    }

    public function show($username): View
    {
        return view('has-role.student.show', [
            'student' => $this->getSingleStudent($username),
            'grades' => $this->getGrades(),
        ]);
    }

    public function edit($username): View
    {
        return view('has-role.student.edit', [
            'student' => $this->getSingleStudent($username),
            'months' => $this->getMoths(),
            'years' => $this->getYears(),
        ]);
    }

    protected function getSingleStudent($username)
    {
        $users = $this->getStudents()->where('username', $username);
        $data = json_decode($users, true);
        foreach ($data as $key => $item) {
            $user = (object) $item;
        }
        return $user;
    }

    protected function getStudents()
    {
        return collect([
            (object)[
                'id' => 1,
                'name' => 'Ryan Rafli',
                'username' => 'ryan' . 6564553453,
                'asal_sekolah' => 'SMPN 1 Parepare',
                'nisn' => 6564553453,
            ],
            (object)[
                'id' => 2,
                'name' => 'Al Muqtadir',
                'username' => 'tadir' . 5454224678,
                'asal_sekolah' => 'SMPN 1 Parepare',
                'nisn' => 5454224678,
            ],
            (object)[
                'id' => 3,
                'name' => 'Ainun Putri',
                'username' => 'ainun' . 10302913833,
                'asal_sekolah' => 'SMPN 3 Makassar',
                'nisn' => 10302913833,
            ],
            (object)[
                'id' => 4,
                'name' => 'Edy Siswanto Syarif',
                'username' => 'edy' . 43242354815,
                'asal_sekolah' => 'SMPN 10 Maros',
                'nisn' => 43242354815,
            ],
            (object)[
                'id' => 5,
                'name' => 'Muh Rafie Muis',
                'username' => 'rafie' . 42342356788,
                'asal_sekolah' => 'SMPN 3 Pangkep',
                'nisn' => 42342356788,
            ],
            (object)[
                'id' => 6,
                'name' => 'Vicky Giovaldi',
                'username' => 'vicky' . 8787575645,
                'asal_sekolah' => 'SMP 1 Luwu Timur',
                'nisn' => 8787575645,
            ],
            (object)[
                'id' => 7,
                'name' => 'Muh Raiz Muis',
                'username' => 'raiz' . 2432545466,
                'asal_sekolah' => 'SMPN 1 Parepare',
                'nisn' => 2432545466,
            ],
            (object)[
                'id' => 8,
                'name' => 'Zhafran',
                'username' => 'zhafran' . 34234234223,
                'asal_sekolah' => 'SMPN 2 Makassar',
                'nisn' => 34234234223,
            ],
        ]);
    }

    protected function getMoths()
    {
        return collect([
            (object) [
                'label' => 'Januari',
                'value' => 'januari',
            ],
            (object) [
                'label' => 'Februari',
                'value' => 'februari',
            ],
            (object) [
                'label' => 'Maret',
                'value' => 'maret',
            ],
            (object) [
                'label' => 'April',
                'value' => 'april',
            ],
            (object) [
                'label' => 'Mei',
                'value' => 'mei',
            ],
            (object) [
                'label' => 'Juni',
                'value' => 'juni',
            ],
            (object) [
                'label' => 'Juli',
                'value' => 'juli',
            ],
            (object) [
                'label' => 'Agustus',
                'value' => 'agustus',
            ],
            (object) [
                'label' => 'Semptember',
                'value' => 'semptember',
            ],
            (object) [
                'label' => 'Oktober',
                'value' => 'oktober',
            ],
            (object) [
                'label' => 'November',
                'value' => 'november',
            ],
            (object) [
                'label' => 'Desember',
                'value' => 'desember',
            ],
        ]);
    }

    protected function getYears()
    {
        return collect([
            (object) [
                'label' => '2004',
                'value' => '2004',
            ],
            (object) [
                'label' => '2005',
                'value' => '2005',
            ],
            (object) [
                'label' => '2006',
                'value' => '2006',
            ],
            (object) [
                'label' => '2007',
                'value' => '2007',
            ],
            (object) [
                'label' => '2008',
                'value' => '2008',
            ],
            (object) [
                'label' => '2009',
                'value' => '2009',
            ],
            (object) [
                'label' => '2010',
                'value' => '2010',
            ],
            (object) [
                'label' => '2011',
                'value' => '2011',
            ],
            (object) [
                'label' => '2012',
                'value' => '2012',
            ],
            (object) [
                'label' => '2013',
                'value' => '2013',
            ],
            (object) [
                'label' => '2014',
                'value' => '2014',
            ],
            (object) [
                'label' => '2015',
                'value' => '2015',
            ],
        ]);
    }

    protected function getGrades()
    {
        return collect([
            (object) [
                'mata_pelajaran' => 'Bahasa Indonesia',
                'semester_1' => '90',
                'semester_2' => '98',
                'semester_3' => '87',
                'semester_4' => '98',
                'semester_5' => '94',
            ],
            (object) [
                'mata_pelajaran' => 'Bahasa Inggris',
                'semester_1' => '87',
                'semester_2' => '78',
                'semester_3' => '79',
                'semester_4' => '76',
                'semester_5' => '87',
            ],
            (object) [
                'mata_pelajaran' => 'Matematika',
                'semester_1' => '70',
                'semester_2' => '99',
                'semester_3' => '76',
                'semester_4' => '98',
                'semester_5' => '98',
            ],
            (object) [
                'mata_pelajaran' => 'IPA',
                'semester_1' => '78',
                'semester_2' => '89',
                'semester_3' => '90',
                'semester_4' => '85',
                'semester_5' => '90',
            ],
            (object) [
                'mata_pelajaran' => 'IPS',
                'semester_1' => '95',
                'semester_2' => '76',
                'semester_3' => '87',
                'semester_4' => '93',
                'semester_5' => '71',
            ],
        ]);
    }
}
