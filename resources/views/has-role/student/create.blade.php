@extends('layouts.has-role.auth', ['title' => 'Tambah Siswa'])

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
                                <a href="{{ route('siswa.index') }}">Akun Siswa</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Tambah Akun Siswa
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
        {{-- <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah Siswa</h4>
            </div>
            <div class="card-body">
                <div class="d-flex">
                    <a class="me-25 " href="#">
                        <img class="uploadedAvatar rounded me-50" id="account-upload-img" src="{{ Storage::url('images/static/default-upload.png') }}" alt="profil sekolah" height="200" width="150" />
                    </a>
                    <!-- upload and reset button -->
                    <div class="d-flex align-items-center ms-1">
                        <div>
                            <label class="btn btn-primary mb-75 me-75" for="account-upload">Upload Foto</label>
                            <input id="account-upload" type="file" hidden accept="image/*" />
                            <x-button class="mb-75" id="account-reset" type="button" variant="outline" color="secondary">
                                Hapus Logo
                            </x-button>
                            <p class="mb-0">Upload Foto ukuran 3x4 dengan format JPG, GIF or PNG, Max size of 500K</p>
                        </div>
                    </div>
                    <!--/ upload and reset button -->
                </div>

                <x-separator marginY="2" />

                <div class="row">
                    <div class="col-sm-6 ">
                        <div class="mb-2">
                            <x-label>Nama Lengkap</x-label>
                            <x-input id="nama_lengkap" name="nama_lengkap" />
                        </div>
                        <div class="mb-2">
                            <x-label>NISN</x-label>
                            <x-input id="nisn" name="nisn" />
                        </div>
                        <div class="mb-2">
                            <x-label>NIK</x-label>
                            <x-input id="nik" name="nik" />
                        </div>
                        <div class="mb-2">
                            <x-label>Asal Sekolah</x-label>
                            <x-input id="asal_sekolah" name="asal_sekolah" />
                        </div>
                        <div class="mb-2">
                            <x-label>Jenis Kelamin</x-label>
                            <x-select class="select2 form-select">
                                <option value="lakilaki">Lakilaki</option>
                                <option value="perempuan">Perempuan</option>
                            </x-select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-2">
                            <x-label>Tempat Lahir</x-label>
                            <x-input id="tempat_lahir" name="tempat_lahir" />
                        </div>
                        <div class="mb-2">
                            <x-label>Tanggal Lahir</x-label>
                            <div class="row">
                                <div class="col-4">
                                    <x-select class="select2 form-select w-100">
                                        <option selected disabled>Tanggal</option>
                                        @for ($i = 1; $i <= 31; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </x-select>
                                </div>
                                <div class="col-4">
                                    <x-select class="select2 form-select w-100">
                                        <option selected disabled>Bulan</option>
                                        @foreach ($months as $item)
                                            <option value="{{ $item->value }}">{{ $item->label }}</option>
                                        @endforeach
                                    </x-select>
                                </div>
                                <div class="col-4">
                                    <x-select class="select2 form-select w-100">
                                        <option selected disabled>Tahun</option>
                                        @foreach ($years as $item)
                                            <option value="{{ $item->value }}">{{ $item->label }}</option>
                                        @endforeach
                                    </x-select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <x-label>Nomor HP</x-label>
                            <x-input id="nomor_hp" name="nomor_hp" />
                        </div>
                        <div class="mb-2">
                            <x-label>Email</x-label>
                            <x-input id="email" name="email" />
                        </div>
                    </div>
                </div>

                <x-separator marginY="2" />

                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-2">
                            <x-label>Kabupaten / Kota</x-label>
                            <x-select class="select2 form-select">
                                <option selected disabled>Pilih Kabupaten / Kota</option>
                                <option value="parepare">Parepare</option>
                                <option value="pangkep">Pangkep</option>
                                <option value="maros">Maros</option>
                                <option value="makassar">Makassar</option>
                            </x-select>
                        </div>
                        <div class="mb-2">
                            <x-label>kecamatan</x-label>
                            <x-select class="select2 form-select">
                                <option selected disabled>Pilih Kecamatan</option>
                                <option value="parepare">Cappa Ujung</option>
                                <option value="pangkep">Soreang</option>
                                <option value="maros">Bacukiki</option>
                                <option value="makassar">Ujung Bulu</option>
                            </x-select>
                        </div>
                        <div class="mb-2">
                            <x-label>Desa / Kelurahan</x-label>
                            <x-select class="select2 form-select">
                                <option selected disabled>Pilih Desa / Kelurahan</option>
                                <option value="parepare">Cappa Ujung</option>
                                <option value="pangkep">Soreang</option>
                                <option value="maros">Bacukiki</option>
                                <option value="makassar">Ujung Bulu</option>
                            </x-select>
                        </div>
                        <div class="mb-2">
                            <x-label>Dusun / Lingkungan</x-label>
                            <x-input id="lingkungan" name="lingkungan" />
                        </div>
                    </div>
                    <div class="col-sm-6 col-12 mb-1 mb-sm-2">
                        <div class="mb-2">
                            <x-label>RT / RW</x-label>
                            <x-input id="rtrw" name="rtrw" />
                        </div>
                        <div class="mb-2">
                            <x-label>Alamat Jalan</x-label>
                            <x-input id="alamat" name="alamat" />
                        </div>
                    </div>
                </div>

                <x-separator marginY="2" />

                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-2">
                            <x-label>Nama Ibu Kandung</x-label>
                            <x-input id="ibu_kandung" name="ibu_kandung" />
                        </div>
                        <div class="mb-2">
                            <x-label>Pekerjaan</x-label>
                            <x-select class="select2 form-select">
                                <option selected disabled>Pilih Pekerjaan</option>
                                <option value="wiraswasta">wiraswasta</option>
                                <option value="pangkep">Pangkep</option>
                                <option value="maros">Maros</option>
                                <option value="makassar">Makassar</option>
                            </x-select>
                        </div>
                        <div class="mb-2">
                            <x-label>Penghasilan</x-label>
                            <x-select class="select2 form-select">
                                <option selected disabled>Pilih Penghasilan</option>
                                <option value="2">2 Juta</option>
                                <option value="4">4 Juta</option>
                                <option value="6">6 Juta</option>
                                <option value="8">8 Juta</option>
                            </x-select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-2">
                            <x-label>Nama Ayah Kandung</x-label>
                            <x-input id="ayah_kandung" name="ayah_kandung" />
                        </div>
                        <div class="mb-2">
                            <x-label>Pekerjaan</x-label>
                            <x-select class="select2 form-select">
                                <option selected disabled>Pilih Pekerjaan</option>
                                <option value="wiraswasta">wiraswasta</option>
                                <option value="pangkep">Pangkep</option>
                                <option value="maros">Maros</option>
                                <option value="makassar">Makassar</option>
                            </x-select>
                        </div>
                        <div class="mb-2">
                            <x-label>Penghasilan</x-label>
                            <x-select class="select2 form-select">
                                <option selected disabled>Pilih Penghasilan</option>
                                <option value="2">2 Juta</option>
                                <option value="4">4 Juta</option>
                                <option value="6">6 Juta</option>
                                <option value="8">8 Juta</option>
                            </x-select>
                        </div>
                    </div>
                </div>

                <x-separator marginY="2" />

                <div class="d-flex align-items-center justify-content-start gap-2">
                    <x-button color="success">Simpan Perubahan</x-button>
                    <a class="btn btn-outline-secondary " href="{{ route('siswa.index') }}">Batalkan</a>
                </div>
            </div>
        </div> --}}

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah Siswa</h4>
            </div>
            <div class="card-body">
                <form id="create-form" action="{{ route('siswa.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6 ">
                            <div class="mb-2">
                                <x-label>Nama Lengkap</x-label>
                                <x-input id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}" placeholder="Nama Siswa" />
                            </div>
                            <div class="mb-2">
                                <x-label>NISN</x-label>
                                <x-input id="nisn" name="nisn" value="{{ old('nisn') }}" placeholder="NISN Siswa" />
                            </div>
                            <div class="mb-2">
                                <x-label>Asal Sekolah</x-label>
                                <x-select class="select2 form-select" id="sekolah_asal" name="sekolah_asal" data-placeholder="Asal Sekolah Siswa">
                                    <option value=""></option>
                                    <option value="other">Lainnya</option>
                                </x-select>
                                {{-- <x-input id="asal_sekolah" name="asal_sekolah" /> --}}
                            </div>
                            <div class="mb-2" id="origin-school-code-div" style="display: none;">
                                <x-label>NPSN Asal Sekolah</x-label>
                                <x-input id="npsn_sekolah_asal" name="npsn_sekolah_asal" value="{{ old('npsn_sekolah_asal') }}" placeholder="NPSN Sekolah Asal" />
                            </div>
                            <div class="mb-2" id="origin-school-name-div" style="display: none;">
                                <x-label>Nama Asal Sekolah</x-label>
                                <x-input id="nama_sekolah_asal" name="nama_sekolah_asal" value="{{ old('nama_sekolah_asal') }}" placeholder="Nama Sekolah Asal" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-2">
                                <x-label>Jenis Kelamin</x-label>
                                <x-select class="select2 form-select" id="jenis_kelamin" name="jenis_kelamin" data-placeholder="Jenis Kelamin Siswa" data-minimum-results-for-search="-1">
                                    <option value=""></option>
                                    <option value="l" {{ old('jenis_kelamin') == 'l' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="p" {{ old('jenis_kelamin') == 'p' ? 'selected' : '' }}>Perempuan</option>
                                </x-select>
                            </div>
                            <div class="mb-2">
                                <x-label>Tempat Lahir</x-label>
                                <x-input id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}" placeholder="Tempat Lahir Siswa" />
                            </div>
                            <div class="mb-2">
                                <x-label>Tanggal Lahir</x-label>
                                <x-input id="tanggal_lahir" name="tanggal_lahir" type="date" value="{{ old('tanggal_lahir') }}" placeholder="Tanggal Lahir Siswa" />
                            </div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-start gap-2">
                        <x-button type="submit" color="success">Simpan Data</x-button>
                        <x-link type="button" href="{{ route('siswa.index') }}" variant="outline" color="secondary">Batalkan</x-link>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var oos = "{{ old('sekolah_asal') }}";
    </script>
    <script>
        $(function() {
            'use strict';

            var originSchool = $('#sekolah_asal'),
                newNpsn = $('#origin-school-code-div'),
                newSchool = $('#origin-school-name-div'),
                form = $('#create-form');

            generateOriginSchool(oos);

            if (originSchool.length) {
                originSchool.change(function() {
                    if ($(this).val() === 'other') {
                        newNpsn.show();
                        newSchool.show();
                    } else {
                        newNpsn.hide();
                        newSchool.hide();
                        $('#npsn_sekolah_asal, #nama_sekolah_asal').val('');
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

            function generateOriginSchool(old) {
                $.ajax({
                    url: '/panel/siswa/json/get-origin-school-list',
                    method: 'get',
                    dataType: 'json',
                    success: function(data) {
                        originSchool.empty().append('<option value=""></option>');

                        data.forEach(os => {
                            originSchool.append(`<option value="${os.id}|${os.npsn}|${os.nama}">${os.npsn} - ${os.nama}</option>`);
                        });

                        originSchool.append('<option value="other">Lainnya</option>');

                        originSchool.val(old).trigger('change');
                    },
                    error: function(xhr, status, error) {
                        console.error('gagal mendapatkan data.', status, error);
                    }
                });
            }
        });
    </script>
@endpush
