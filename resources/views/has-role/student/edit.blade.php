@extends('layouts.has-role.auth', ['title' => 'Edit Siswa'])

@section('vendorStyles')
    <link type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css" rel="stylesheet">
    <link type="text/css" href="/app-assets/css/plugins/forms/form-validation.css" rel="stylesheet">
@endsection

@section('vendorScripts')
    <script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="/app-assets/js/scripts/forms/form-select2.js"></script>
    <script src="/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
@endsection

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Akun Siswa</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('siswa.index') }}">
                                    Akun Siswa
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('siswa.show', [$id]) }}">
                                    Detail Siswa
                                </a>
                            </li>
                            <li class="breadcrumb-item active">
                                Edit Siswa
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (session()->get('msg'))
        <div class="alert alert-{{ session()->get('stat') }} p-1">
            <p class="mb-0 text-center">{{ session()->get('msg') }}</p>
        </div>
    @endif
    <div class="content-body">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Siswa</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('siswa.update', [$id]) }}" method="post" id="update-form">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6 ">
                            <div class="mb-2">
                                <x-label>Nama Lengkap</x-label>
                                <x-input id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" />
                            </div>
                            <div class="mb-2">
                                <x-label>NISN</x-label>
                                <x-input id="nisn" name="nisn" placeholder="NISN" />
                            </div>
                            <div class="mb-2">
                                <x-label>Asal Sekolah</x-label>
                                <x-select class="select2 form-select" id="sekolah_asal" name="sekolah_asal" data-placeholder="Asal Sekolah">
                                    <option value=""></option>
                                    <option value="other">Lainnya</option>
                                </x-select>
                                {{-- <x-input id="asal_sekolah" name="asal_sekolah" placeholder="Asal Sekolah" /> --}}
                            </div>
                            <div class="mb-2" id="origin-school-code-div" style="display: none;">
                                <x-label>NPSN Asal Sekolah</x-label>
                                <x-input id="npsn_sekolah_asal" name="npsn_sekolah_asal" placeholder="NPSN Sekolah Asal" value="{{ old('npsn_sekolah_asal') }}" />
                            </div>
                            <div class="mb-2" id="origin-school-name-div" style="display: none;">
                                <x-label>Nama Asal Sekolah</x-label>
                                <x-input id="nama_sekolah_asal" name="nama_sekolah_asal" placeholder="Nama Sekolah Asal" value="{{ old('nama_sekolah_asal') }}" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-2">
                                <x-label>Jenis Kelamin</x-label>
                                <x-select class="select2 form-select" id="jenis_kelamin" name="jenis_kelamin" data-placeholder="Jenis Kelamin" data-minimum-results-for-search="-1" >
                                    <option value=""></option>
                                    <option value="l">Laki-laki</option>
                                    <option value="p">Perempuan</option>
                                </x-select>
                            </div>
                            <div class="mb-2">
                                <x-label>Tempat Lahir</x-label>
                                <x-input id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" />
                            </div>
                            <div class="mb-2">
                                <x-label>Tanggal Lahir</x-label>
                                <x-input type="date" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" />
                            </div>
                        </div>
                    </div>
    
                    <div class="d-flex align-items-center justify-content-start gap-2">
                        <x-button color="success">Simpan Perubahan</x-button>
                        <a class="btn btn-outline-secondary " href="{{ route('siswa.show', $id) }}">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var id = "{{ $id }}";
    </script>
    <script>
        $(function() {
            'use strict';

            var originSchool = $('#sekolah_asal'),
                form = $('#update-form');

            getData();

            function getData() {
                $.ajax({
                    url: `/panel/siswa/json/get-single/${id}`,
                    method: 'get',
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);

                        let data = response.data;

                        $('#nama_lengkap').val(data.nama);
                        $('#nisn').val(data.nisn);
                        generateOriginSchool(`${data.id_sekolah_asal}|${data.sekolah_asal}`);
                        $('#jenis_kelamin').val(data.jenis_kelamin).trigger('change');
                        $('#tempat_lahir').val(data.tempat_lahir);
                        $('#tanggal_lahir').val(data.tanggal_lahir);
                    },
                    error: function(xhr, status, error) {
                        console.error('gagal mendapatkan data.', status, error);
                    }
                });
            }

            function generateOriginSchool(old) {
                console.log(old);
                $.ajax({
                    url: '/panel/siswa/json/get-origin-school-list',
                    method: 'get',
                    dataType: 'json',
                    success: function(data) {
                        originSchool.empty().append('<option value=""></option>');
                        
                        data.data.forEach(os => {
                            originSchool.append(`<option value="${os.id}|${os.nama}">${os.npsn} - ${os.nama}</option>`);
                        });

                        originSchool.append('<option value="other">Lainnya</option>');

                        originSchool.val(old).trigger('change');
                    },
                    error: function(xhr, status, error) {
                        console.error('gagal mendapatkan data.', status, error);
                    }
                });
            }

            if (originSchool.length) {
                originSchool.change(function() {
                    if (originSchool.val() === 'other') {
                        $('#origin-school-code-div, #origin-school-name-div').show();
                    } else {
                        $('#origin-school-code-div, #origin-school-name-div').hide();
                    }
                });
            }

            if (form.length) {
                form.validate({
                    rules: {
                        nama_lengkap: {
                            required: true,
                        },
                        nisn: {
                            required: true,
                            digits: true,
                            minlength: 10,
                            maxlength: 10
                        },
                        sekolah_asal: {
                            required: true
                        },
                        npsn_sekolah_asal: {
                            required: true,
                            digits: true,
                            minlength: 8,
                            maxlength: 8
                        },
                        nama_sekolah_asal: {
                            required: true
                        },
                        jenis_kelamin: {
                            required: true
                        },
                        tempat_lahir: {
                            required: true
                        },
                        tanggal_lahir: {
                            required: true
                        }
                    },
                    messages: {
                        nama_lengkap: {
                            required: "Harus diisi.",
                        },
                        nisn: {
                            required: "Harus diisi.",
                            digits: "Harus dalam bentuk angka.",
                            minlength: "Harus 10 digit.",
                            maxlength: "Harus 10 digit."
                        },
                        sekolah_asal: {
                            required: "Harus diisi."
                        },
                        npsn_sekolah_asal: {
                            required: "Harus diisi.",
                            digits: "Harus dalam bentuk angka.",
                            minlength: "Harus 8 digit.",
                            maxlength: "Harus 8 digit."
                        },
                        nama_sekolah_asal: {
                            required: "Harus diisi."
                        },
                        jenis_kelamin: {
                            required: "Harus diisi."
                        },
                        tempat_lahir: {
                            required: "Harus diisi."
                        },
                        tanggal_lahir: {
                            required: "Harus diisi."
                        }
                    }
                });
            }
        });
    </script>
@endpush