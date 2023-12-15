@extends('layouts.has-role.auth', ['title' => 'Nilai Rapor Siswa'])

@section('styles')
    <link type="text/css" href="/app-assets/css/plugins/forms/form-validation.css" rel="stylesheet">
    <link type="text/css" href="/css/student/pages/dashboard/update-score.css" rel="stylesheet">
@endsection

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Akun Siswa</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb breadcrumb-slash">
                            <li class="breadcrumb-item">
                                <a href="{{ route('siswa.index') }}">Akun Siswa</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('siswa.show', $username) }}">Lihat Detail Siswa</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Edit Nilai Rapor
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (session()->get('scoreStatus'))
        <div class="alert alert-{{ session()->get('scoreStatus') }} p-1">
            <p class="mb-0 text-center">{{ session()->get('scoreMsg') }}</p>
        </div>
    @endif

    <div class="content-body mb-5">
        <div class="card">
            <div class="card-header"></div>
            <form id="formEditScore" action="{{ route('siswa.post.score', [$username, 'semester-' . $semester]) }}" method="post">
                @csrf
                <div class="card-body border-top border-bottom p-0">
                    <div class="row">
                        <div class="col-md-4 col-xl-3 col-sm-12 border-md-end pe-0">
                            <ul class="nav flex-column ps-2 d-none d-md-block">
                                @for ($i = 1; $i <= 5; $i++)
                                    <li class="nav-item mt-1">
                                        <a class="nav-link {{ $semester == $i ? 'active' : '' }}" href="{{ route('siswa.score', [$username, 'semester-' . $i]) }}">
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
                                        <a class="nav-link {{ $semester == $j ? 'active' : '' }}" href="{{ route('siswa.score', [$username, 'semester-' . $j]) }}">{{ $j }}</a>
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
                                                <x-label for="math">Nilai</x-label>
                                                <x-input id="math" name="math" type="number" placeholder="0" autofocus />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">
                                                Bahasa Indonesia
                                            </td>
                                            <td style="width: 50%;">
                                                <x-label for="indonesian">Nilai</x-label>
                                                <x-input id="indonesian" name="indonesian" type="number" placeholder="0" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">
                                                Bahasa Inggris
                                            </td>
                                            <td style="width: 50%;">
                                                <x-label for="english">Nilai</x-label>
                                                <x-input id="english" name="english" type="number" placeholder="0" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">
                                                Ilmu Pengetahuan Alam
                                            </td>
                                            <td style="width: 50%;">
                                                <x-label for="science">Nilai</x-label>
                                                <x-input id="science" name="science" type="number" placeholder="0" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">
                                                Ilmu Pengetahuan Sosial
                                            </td>
                                            <td style="width: 50%;">
                                                <x-label for="social">Nilai</x-label>
                                                <x-input id="social" name="social" type="number" placeholder="0" />
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
                    <a class="btn btn-outline-secondary" href="{{ route('siswa.show', [$username]) }}" role="button">Batalkan</a>
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
        var semester = '{{ $semester ?? 0 }}',
            username = '{{ $username }}';
    </script>
    <script>
        $(function() {
            ('use strict');

            var formEditScore = $('#formEditScore');

            if (formEditScore.length) {
                formEditScore.validate({
                    rules: {
                        math: {
                            required: true,
                            number: true,
                            min: 0,
                            max: 100
                        },
                        indonesian: {
                            required: true,
                            number: true,
                            min: 0,
                            max: 100
                        },
                        english: {
                            required: true,
                            number: true,
                            min: 0,
                            max: 100
                        },
                        science: {
                            required: true,
                            number: true,
                            min: 0,
                            max: 100
                        },
                        social: {
                            required: true,
                            number: true,
                            min: 0,
                            max: 100
                        }
                    },
                    messages: {
                        math: {
                            required: '*Nilai harus diisi.',
                            number: '*Nilai harus dalam bentuk angka.',
                            min: '*Masukkan minimal 0.',
                            max: '*Masukkan maksimal 100.'
                        },
                        indonesian: {
                            required: '*Nilai harus diisi.',
                            number: '*Nilai harus dalam bentuk angka.',
                            min: '*Masukkan minimal 0.',
                            max: '*Masukkan maksimal 100.'
                        },
                        english: {
                            required: '*Nilai harus diisi.',
                            number: '*Nilai harus dalam bentuk angka.',
                            min: '*Masukkan minimal 0.',
                            max: '*Masukkan maksimal 100.'
                        },
                        science: {
                            required: '*Nilai harus diisi.',
                            number: '*Nilai harus dalam bentuk angka.',
                            min: '*Masukkan minimal 0.',
                            max: '*Masukkan maksimal 100.'
                        },
                        social: {
                            required: '*Nilai harus diisi.',
                            number: '*Nilai harus dalam bentuk angka.',
                            min: '*Masukkan minimal 0.',
                            max: '*Masukkan maksimal 100.'
                        },
                    }
                })
            }

            $.ajax({
                url: '/panel/siswa/get-scores/' + username + '/' + semester,
                method: 'get',
                dataType: 'json',
                success: function(scores) {
                    console.log(scores);
                    $('#math').val(scores.mtk);
                    $('#indonesian').val(scores.bid);
                    $('#english').val(scores.big);
                    $('#science').val(scores.ipa);
                    $('#social').val(scores.ips);
                }
            });
        });
    </script>
@endpush
