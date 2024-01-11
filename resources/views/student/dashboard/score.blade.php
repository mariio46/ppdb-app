@extends('layouts.student.auth')

@section('styles')
    <link type="text/css" href="/app-assets/css/plugins/forms/form-validation.css" rel="stylesheet">
    <link type="text/css" href="/css/student/pages/dashboard/update-score.css" rel="stylesheet">
@endsection

@section('content')
    <x-breadcrumb title="Data Diri">
        <x-breadcrumb-item to="{{ route('student.personal') }}" title="Data Diri" />
        <x-breadcrumb-active title="Edit Nilai" />
    </x-breadcrumb>

    @if (session()->get('stat'))
        <div class="alert alert-{{ session()->get('stat') }} p-1">
            <p class="mb-0 text-center">{{ session()->get('msg') }}</p>
        </div>
    @endif

    <div class="content-body mb-5">
        <div class="card">
            <div class="card-header"></div>
            <form id="formEditScore" action="{{ route('student.personal.update-score', [$semester]) }}" method="post">
                @csrf
                <div class="card-body border-top border-bottom p-0">
                    <div class="row">
                        <div class="col-md-4 col-xl-3 col-sm-12 border-md-end pe-0">
                            <ul class="nav flex-column ps-2 d-none d-md-block">
                                @for ($i = 1; $i <= 5; $i++)
                                    <li class="nav-item mt-1">
                                        <a class="nav-link {{ $semester == $i ? 'active' : '' }}" href="{{ route('student.personal.score', [$i]) }}">
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
                                        <a class="nav-link {{ $semester == $j ? 'active' : '' }}" href="{{ route('student.personal.score', [$j]) }}">{{ $j }}</a>
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
                    <a class="btn btn-outline-secondary" href="{{ route('student.personal') }}" role="button">Batalkan</a>
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
        var semester = {{ $semester ?? 0 }};
    </script>
    {{-- <script src="/js/student/pages/dashboard/update-score-v1.1.1.js"></script> --}}
    <script>
        $(function() {
            ('use strict');

            var formEditScore = $('#formEditScore'),
                subjects = ['math', 'indonesian', 'english', 'science', 'social'],
                rulesConf = {
                    required: true,
                    number: true,
                    min: 0, 
                    max: 100
                },
                messagesConf = {
                    required: '*Nilai harus diisi.',
                    number: '*Nilai harus dalam bentuk angka.',
                    min: '*Masukkan minimal 0.',
                    max: '*Masukkan maksimal 100.'
                };

            if (formEditScore.length) {
                let mrules = {},
                mmessages = {};

                subjects.forEach(subject => {
                    mrules[subject] = rulesConf;
                    mmessages[subject] = messagesConf;
                });

                formEditScore.validate({
                    rules: mrules,
                    messages: mmessages
                });
            }

            $.ajax({
                url: '/json/personal-data/get-student-score/' + semester,
                method: 'get',
                dataType: 'json',
                success: function(scores) {
                let score = scores.data;
                let sm = "sm" + semester + "_";

                $('#math').val(score[sm + 'mtk']);
                $('#indonesian').val(score[sm + 'bid']);
                $('#english').val(score[sm + 'big']);
                $('#science').val(score[sm + 'ipa']);
                $('#social').val(score[sm + 'ips']);
                }
            });
        });
    </script>
@endpush
