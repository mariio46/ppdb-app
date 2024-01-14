@extends('layouts/has-role/auth', ['title' => 'Tambah Tahap'])

@section('vendorStyles')
    <link type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css" rel="stylesheet">
    <link type="text/css" href="/app-assets/css/plugins/forms/form-validation.css" rel="stylesheet">
@endsection

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Tahap & Jadwal</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('schedules.index') }}">
                                    Tahap & Jadwal
                                </a>
                            </li>
                            <li class="breadcrumb-item active">
                                Tambah Tahap
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (session()->get('msg'))
        <div class="alert alert-danger p-1">
            <p class="mb-0 text-center">{{ session()->get('msg') }}</p>
        </div>
    @endif

    <div class="content-body row">
        <div class="col-12">
            <div class="card">
                <form id="formData" action="{{ route('schedules.create') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <h5 class="text-primary mb-1">Pendaftaran Tahap</h5>

                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="mb-2">
                                    <x-label for="phase">Pendaftaran Tahap</x-label>

                                    <x-select class="form-select select2" id="phase" name="phase" data-placeholder="Pilih Tahap" data-minimum-results-for-search="-1">
                                        <option value=""></option>
                                        <option value="1">Tahap 1</option>
                                        <option value="2">Tahap 2</option>
                                        <option value="3">Tahap 3</option>
                                        <option value="4">Tahap 4</option>
                                    </x-select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body border-top">
                        <h5 class="text-primary mb-1">Jalur Pendaftaran</h5>
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="mb-2">
                                    <x-label for="sma">SMA</x-label>
                                    <x-select class="form-select select2" id="sma" name="sma[]" data-placeholder="Pilih Jalur SMA" multiple>
                                        <option value=""></option>
                                    </x-select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="mb-2">
                                    <x-label for="smk">SMK</x-label>
                                    <x-select class="form-select select2" id="smk" name="smk[]" data-placeholder="Pilih Jalur SMK" multiple>
                                        <option value=""></option>
                                    </x-select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body border-top">
                        <h5 class="text-primary mb-1">Jadwal Pendaftaran</h5>

                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="mb-2">
                                    <x-label for="regis_start">Tanggal Mulai Pendaftaran</x-label>
                                    <x-input id="regis_start" name="regis_start" type="date" placeholder="Tanggal mulai" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-2">
                                    <x-label for="regis_end">Tanggal Selesai Pendaftaran</x-label>
                                    <x-input id="regis_end" name="regis_end" type="date" placeholder="Tanggal selesai" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body border-top">
                        <h5 class="text-primary mb-1">Jadwal Verifikasi</h5>

                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="mb-2">
                                    <x-label for="verif_start">Tanggal Mulai Verifikasi</x-label>
                                    <x-input id="verif_start" name="verif_start" type="date" placeholder="Tanggal mulai" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-2">
                                    <x-label for="verif_end">Tanggal Selesai Verifikasi</x-label>
                                    <x-input id="verif_end" name="verif_end" type="date" placeholder="Tanggal selesai" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body border-top">
                        <h5 class="text-primary mb-1">Jadwal Pengumuman</h5>

                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="mb-2">
                                    <x-label for="announcement">Tanggal Pengumuman</x-label>
                                    <x-input id="announcement" name="announcement" type="date" placeholder="Tanggal pengumuman" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body border-top">
                        <h5 class="text-primary mb-1">Jadwal Daftar Ulang</h5>

                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="mb-2">
                                    <x-label for="re_regis_start">Tanggal Mulai Daftar Ulang</x-label>
                                    <x-input id="re_regis_start" name="re_regis_start" type="date" placeholder="Tanggal mulai" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-2">
                                    <x-label for="re_regis_end">Tanggal Selesai Daftar Ulang</x-label>
                                    <x-input id="re_regis_end" name="re_regis_end" type="date" placeholder="Tanggal selesai" />
                                </div>
                            </div>
                        </div>

                        <div class="my-2">
                            <x-button id="submitBtn" type="submit" color="success">Tambah Data</x-button>

                            <a class="btn btn-outline-secondary" type="button" href="{{ route('schedules.index') }}">Batalkan</a>
                        </div>
                    </div>
                </form>
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
        $(function() {
            'use strict';

            var select2 = $('.select2'),
                tracksma = $('#sma'),
                tracksmk = $('#smk'),
                form = $('#formData'),
                submit = $('#submitBtn');

            if (select2.length) {
                select2.each(function() {
                    var $this = $(this);
                    $this.wrap('<div class="position-relative"></div>');
                    $this.select2({
                        dropdownParent: $this.parent()
                    });
                });
            }

            if (form.length) {
                let fields = ["phase", "regis_start", "regis_end", "verif_start", "verif_end", "announcement", "re_regis_start", "re_regis_end"];

                let validationConf = {
                    rules: {},
                    messages: {}
                };

                fields.forEach(field => {
                    validationConf.rules[field] = {required: true},
                    validationConf.messages[field] = "Bidang ini tidak boleh dikosongkan."
                });

                form.validate(validationConf);
                
                $('#sma').rules("add", {
                    requiredDepends: '#smk',
                    messages: {
                        requiredDepends: "Pilih minimal 1 Jalur SMA atau SMK."
                    }
                });

                $('#smk').rules("add", {
                    requiredDepends: '#sma',
                    messages: {
                        requiredDepends: "Pilih minimal 1 Jalur SMA atau SMK."
                    }
                });

                $.validator.addMethod("requiredDepends", function(value, element, params) {
                    var dependsValue = $(params).val();

                    var isDependsEmpty = (Array.isArray(dependsValue) && dependsValue.length === 0) || dependsValue === null;

                    // Jika nilai depends kosong, maka nilai saat ini harus diisi
                    return isDependsEmpty ? value.length !== 0 : true;
                }, "This field is required when the other select is empty.");
            }

            if (tracksma.length) {
                $.ajax({
                    url: '/panel/tahap-jadwal/json/jalur/sma',
                    method: 'get',
                    dataType: 'json',
                    success: function(data) {
                        tracksma.empty().append('<option value=""></option>');

                        data.forEach(sma => {
                            tracksma.append(`<option value="${sma.code}">${sma.name}</option>`);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('gagal mendapatkan data.', status, error);
                    }
                });
            }

            if (tracksmk.length) {
                $.ajax({
                    url: '/panel/tahap-jadwal/json/jalur/smk',
                    method: 'get',
                    dataType: 'json',
                    success: function(data) {
                        tracksmk.empty().append('<option value=""></option>');

                        data.forEach(smk => {
                            tracksmk.append(`<option value="${smk.code}">${smk.name}</option>`);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('gagal mendapatkan data.', status, error);
                    }
                });
            }

            submit.click(function() {
                if (form.valid()) {
                    form.submit();
                }
            });
        })
    </script>
@endpush
