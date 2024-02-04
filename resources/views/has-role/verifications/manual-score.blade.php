@extends('layouts.has-role.auth', ['title' => 'Edit Nilai Siswa'])

@section('styles')
    <link type="text/css" href="/app-assets/css/plugins/forms/form-validation.css" rel="stylesheet">
    <link type="text/css" href="/css/student/pages/dashboard/update-score.css" rel="stylesheet">
@endsection

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Verifikasi Manual</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('verifikasi.manual') }}">
                                    Verifikasi Manual
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('verifikasi.manual.detail', [$id]) }}">
                                    Lihat Detail Siswa
                                </a>
                            </li>
                            <li class="breadcrumb-item active">
                                Edit Nilai Siswa
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-body mb-5">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <table class="table table-borderless">
                            <x-three-row-info identifier="name" label="Nama Siswa" />
                            <x-three-row-info identifier="nisn" label="NISN" />
                            <x-three-row-info identifier="origin_school" label="Asal Sekolah" />
                        </table>
                    </div>
                </div>
            </div>
            <form id="formEditScore" action="{{ route('verifikasi.manual.update-score', [$id]) }}" method="post">
                @csrf
                <x-input id="student_id" name="student_id" type="hidden" />
                <x-input id="semester" name="semester" type="hidden" value="{{ $semester }}" />
                <div class="card-body border-top border-bottom p-0">
                    <div class="row">
                        <div class="col-md-4 col-xl-3 col-sm-12 border-md-end pe-0">
                            <ul class="nav flex-column ps-2 d-none d-md-block">
                                @for ($i = 1; $i <= 5; $i++)
                                    <li class="nav-item mt-1">
                                        <a class="nav-link {{ $semester == $i ? 'active' : '' }}" href="{{ route('verifikasi.manual.score', ['id' => $id, 'semester' => $i]) }}">
                                            <div class="row tab-smt">
                                                <div class="col-5 tab-smt-badge">
                                                    <p>{{ $i }}</p>
                                                </div>
                                                <div class="col-7 tab-smt-body">
                                                    <div>
                                                        <p class="tab-smt-title">Semester {{ $i }}</p>
                                                        <small class="tab-smt-subtitle">Input nilai rapor</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endfor
                            </ul>

                            <ul class="nav nav-pills d-md-none align-items-center mt-1">
                                <div class="nav-item me-1 ms-1">
                                    <span>Semester :</span>
                                </div>
                                @for ($j = 1; $j <= 5; $j++)
                                    <div class="nav-item">
                                        <a class="nav-link {{ $semester == $j ? 'active' : '' }}" href="{{ route('verifikasi.manual.score', ['id' => $id, 'semester' => $j]) }}">{{ $j }}</a>
                                    </div>
                                @endfor
                            </ul>
                        </div>
                        <div class="col-md-8 col-xl-9 col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Mata Pelajaran</th>
                                            <th class="text-center">Nilai Semester {{ $semester }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="align-middle">
                                                Matematika
                                            </td>
                                            <td style="width: 50%;">
                                                <x-label for="mtk">Nilai</x-label>
                                                <x-input id="mtk" name="mtk" type="number" placeholder="0" autofocus />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">
                                                Bahasa Indonesia
                                            </td>
                                            <td style="width: 50%;">
                                                <x-label for="bid">Nilai</x-label>
                                                <x-input id="bid" name="bid" type="number" placeholder="0" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">
                                                Bahasa Inggris
                                            </td>
                                            <td style="width: 50%;">
                                                <x-label for="big">Nilai</x-label>
                                                <x-input id="big" name="big" type="number" placeholder="0" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">
                                                Ilmu Pengetahuan Alam
                                            </td>
                                            <td style="width: 50%;">
                                                <x-label for="ipa">Nilai</x-label>
                                                <x-input id="ipa" name="ipa" type="number" placeholder="0" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">
                                                Ilmu Pengetahuan Sosial
                                            </td>
                                            <td style="width: 50%;">
                                                <x-label for="ips">Nilai</x-label>
                                                <x-input id="ips" name="ips" type="number" placeholder="0" />
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body pb-3">
                    <x-button type="submit" color="success">Simpan Nilai Semester {{ $semester }}</x-button>
                    <a class="btn btn-outline-secondary" href="{{ route('verifikasi.manual.detail', [$id]) }}" role="button">Batalkan</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('vendorScripts')
    <script src="/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
@endsection

@push('scripts')
    <script>
        var id = "{{ $id }}",
            semester = "{{ $semester }}";
    </script>
    <script>
        $(function() {
            ('use strict');

            var formEditScore = $('#formEditScore');

            // validations
            if (formEditScore.length) {
                formEditScore.validate({
                    rules: {
                        mtk: {
                            required: true,
                            number: true,
                            min: 0,
                            max: 100
                        },
                        bid: {
                            required: true,
                            number: true,
                            min: 0,
                            max: 100
                        },
                        big: {
                            required: true,
                            number: true,
                            min: 0,
                            max: 100
                        },
                        ipa: {
                            required: true,
                            number: true,
                            min: 0,
                            max: 100
                        },
                        ips: {
                            required: true,
                            number: true,
                            min: 0,
                            max: 100
                        }
                    },
                    messages: {
                        mtk: {
                            required: '*Nilai harus diisi.',
                            number: '*Nilai harus dalam bentuk angka.',
                            min: '*Masukkan minimal 0.',
                            max: '*Masukkan maksimal 100.'
                        },
                        bid: {
                            required: '*Nilai harus diisi.',
                            number: '*Nilai harus dalam bentuk angka.',
                            min: '*Masukkan minimal 0.',
                            max: '*Masukkan maksimal 100.'
                        },
                        big: {
                            required: '*Nilai harus diisi.',
                            number: '*Nilai harus dalam bentuk angka.',
                            min: '*Masukkan minimal 0.',
                            max: '*Masukkan maksimal 100.'
                        },
                        ipa: {
                            required: '*Nilai harus diisi.',
                            number: '*Nilai harus dalam bentuk angka.',
                            min: '*Masukkan minimal 0.',
                            max: '*Masukkan maksimal 100.'
                        },
                        ips: {
                            required: '*Nilai harus diisi.',
                            number: '*Nilai harus dalam bentuk angka.',
                            min: '*Masukkan minimal 0.',
                            max: '*Masukkan maksimal 100.'
                        },
                    }
                })
            }

            $.ajax({
                url: `/panel/verifikasi-manual/d/${id}/get-data-detail`,
                method: 'get',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    $('#name').text(data.data.nama);
                    $('#nisn').text(data.data.nisn);
                    $('#origin_school').text(data.data.sekolah_asal);
                    $('#student_id').val(data.data.siswa_id);

                    getScore(data.data.siswa_id);
                },
                error: function(xhr, status, error) {
                    console.error('gagal mendapatkan data.', status, error);
                }
            });

            // get scores
            function getScore(student_id) {
                $.ajax({
                    url: `/panel/siswa/json/get-score/${student_id}/${semester}`,
                    method: 'get',
                    dataType: 'json',
                    success: function(scores) {
                        let score = scores.data;
                        $('#mtk').val(score[`sm${semester}_mtk`]);
                        $('#bid').val(score[`sm${semester}_bid`]);
                        $('#big').val(score[`sm${semester}_big`]);
                        $('#ipa').val(score[`sm${semester}_ipa`]);
                        $('#ips').val(score[`sm${semester}_ips`]);
                    }
                });
            }
        });
    </script>
@endpush
