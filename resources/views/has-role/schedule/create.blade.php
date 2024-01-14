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
                                    <x-select class="form-select select2" id="sma" name="sma" data-placeholder="Pilih Jalur SMA" multiple>
                                        <option value=""></option>
                                        <option value="smaafirmasi">Afirmasi</option>
                                        <option value="boardingschool">Boarding School</option>
                                    </x-select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="mb-2">
                                    <x-label for="smk">SMK</x-label>
                                    <x-select class="form-select select2" id="smk" name="smk" data-placeholder="Pilih Jalur SMK" multiple>
                                        <option value=""></option>
                                        <option value="smkafirmasi">Afirmasi</option>
                                        <option value="smkanakdudi">Anak DUDI</option>
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
                                    <x-label for="regisStart">Tanggal Mulai Pendaftaran</x-label>
                                    <x-input id="regisStart" name="regisStart" type="date" placeholder="Tanggal mulai" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-2">
                                    <x-label for="regisEnd">Tanggal Selesai Pendaftaran</x-label>
                                    <x-input id="regisEnd" name="regisEnd" type="date" placeholder="Tanggal selesai" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body border-top">
                        <h5 class="text-primary mb-1">Jadwal Verifikasi</h5>

                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="mb-2">
                                    <x-label for="verifStart">Tanggal Mulai Verifikasi</x-label>
                                    <x-input id="verifStart" name="verifStart" type="date" placeholder="Tanggal mulai" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-2">
                                    <x-label for="verifEnd">Tanggal Selesai Verifikasi</x-label>
                                    <x-input id="verifEnd" name="verifEnd" type="date" placeholder="Tanggal selesai" />
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
                                    <x-label for="reRegisStart">Tanggal Mulai Daftar Ulang</x-label>
                                    <x-input id="reRegisStart" name="reRegisStart" type="date" placeholder="Tanggal mulai" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-2">
                                    <x-label for="reRegisEnd">Tanggal Selesai Daftar Ulang</x-label>
                                    <x-input id="reRegisEnd" name="reRegisEnd" type="date" placeholder="Tanggal selesai" />
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
                form.validate({
                    rules: {
                        phase: {
                            required: true,
                        },
                        regisStart: {
                            required: true
                        },
                        regisEnd: {
                            required: true
                        },
                        verifStart: {
                            required: true
                        },
                        verifEnd: {
                            required: true
                        },
                        announcement: {
                            required: true
                        },
                        reRegisStart: {
                            required: true
                        },
                        reRegisEnd: {
                            required: true
                        }
                    },
                    messages: {
                        phase: {
                            required: '*Bidang ini wajib dipilih.',
                        },
                        regisStart: {
                            required: '*Bidang ini wajib diisi.'
                        },
                        regisEnd: {
                            required: '*Bidang ini wajib diisi.'
                        },
                        verifStart: {
                            required: '*Bidang ini wajib diisi.'
                        },
                        verifEnd: {
                            required: '*Bidang ini wajib diisi.'
                        },
                        announcement: {
                            required: '*Bidang ini wajib diisi.'
                        },
                        reRegisStart: {
                            required: '*Bidang ini wajib diisi.'
                        },
                        reRegisEnd: {
                            required: '*Bidang ini wajib diisi.'
                        }
                    }
                });
            }

            if (tracksma.length) {
                $.ajax({
                    url: '/panel/tahap-jadwal/jalur/sma',
                    method: 'get',
                    dataType: 'json',
                    success: function(data) {
                        tracksma.empty().append('<option value=""></option>');

                        data.data.forEach(sma => {
                            tracksma.append(`<option value="${sma.kode_jalur}">${sma.nama_jalur}</option>`);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('gagal mendapatkan data.', status, error);
                    }
                });
            }

            if (tracksmk.length) {
                $.ajax({
                    url: '/panel/tahap-jadwal/jalur/smk',
                    method: 'get',
                    dataType: 'json',
                    success: function(data) {
                        tracksmk.empty().append('<option value=""></option>');

                        data.data.forEach(smk => {
                            tracksmk.append(`<option value="${smk.kode_jalur}">${smk.nama_jalur}</option>`);
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
