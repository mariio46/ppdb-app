@extends('layouts.student.auth')

@section('vendorStyles')
    <link type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css" rel="stylesheet">
    <link type="text/css" href="/app-assets/css/plugins/forms/form-validation.css" rel="stylesheet">
@endsection

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Pendaftaran</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb breadcrumb-slash">
                            <li class="breadcrumb-item">
                                <a href="/pendaftaran">Pendaftaran</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="/pendaftaran/tahap/{{ $phaseCode }}">Pendaftaran Tahap {{ $phase }}</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Pendaftaran Jalur {{ $track }}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-body">
        <div class="row">
            <div class="col-12">
                @switch($code)
                    @case('AA')
                        @include('student.registration.tracks.sma-affirmation');
                    @break

                    @case('AB')
                        @include('student.registration.tracks.sma-mutation');
                    @break

                    @case('AC')
                        @include('student.registration.tracks.sma-teachers-child');
                    @break

                    @case('AD')
                        @include('student.registration.tracks.sma-academic');
                    @break

                    @case('AE')
                        @include('student.registration.tracks.sma-non-academic');
                    @break

                    @case('AF')
                        @include('student.registration.tracks.sma-zoning');
                    @break

                    @case('AG')
                        @include('student.registration.tracks.sma-boarding-school');
                    @break

                    @case('KA')
                        @include('student.registration.tracks.smk-affirmation');
                    @break

                    @case('KB')
                        @include('student.registration.tracks.smk-mutation');
                    @break

                    @case('KC')
                        @include('student.registration.tracks.smk-teachers-child');
                    @break

                    @case('KD')
                        @include('student.registration.tracks.smk-academic');
                    @break

                    @case('KE')
                        @include('student.registration.tracks.smk-non-academic');
                    @break

                    @case('KF')
                        @include('student.registration.tracks.smk-domicile');
                    @break

                    @case('KG')
                        @include('student.registration.tracks.smk-partners-child');
                    @break

                    @default
                @endswitch
            </div>
        </div>
    </div>
@endsection

@section('vendorScripts')
    <script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
@endsection

@push('scripts')
    <script>
        var track = '{{ $code }}';
    </script>
    @if (substr($code, 0, 1) == 'A')
        <script src="/js/student/pages/registration/track-base-sma-v1.0.1.js"></script>
    @else
        <script src="/js/student/pages/registration/track-base-smk-v1.0.1.js"></script>
    @endif
@endpush
