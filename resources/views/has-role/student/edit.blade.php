@extends('layouts.has-role.auth', ['title' => 'Edit Data Siswa'])

@section('vendorStyles')
    <link type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css" rel="stylesheet">
    <link type="text/css" href="/app-assets/css/plugins/forms/form-validation.css" rel="stylesheet">
@endsection

@section('styles')
    <style>
        /* Style your loader here */
        .loader {
            border: 8px solid #f3f3f3;
            border-top: 8px solid #3498db;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
@endsection

@section('content')
    {{-- breadcrumbs --}}
    <x-breadcrumb title="Akun Siswa">
        <x-breadcrumb-item title="Akun Siswa" to="{{ route('siswa.index') }}" />
        <x-breadcrumb-item title="Detail Siswa" to="{{ route('siswa.show', [$id]) }}" />
        <x-breadcrumb-active title="Edit Data Siswa" />
    </x-breadcrumb>

    {{-- content --}}
    <div class="content-body row">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah Siswa</h4>
            </div>
            <div class="card-body">
                <form id="create-form" action="{{ route('siswa.update', [$id]) }}" method="post">
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
                                <x-select class="select2 form-select" id="sekolah_asal" name="sekolah_asal" data-placeholder="Loading...">
                                    <option value=""></option>
                                    <option value="other">Lainnya</option>
                                </x-select>
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
                        <x-button type="submit" color="success" id="submitbtn" disabled>Simpan Perubahan</x-button>
                        <x-link type="button" href="{{ route('siswa.show', [$id]) }}" variant="outline" color="secondary">Batalkan</x-link>
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
        var id = "{{ $id }}";
    </script>
    <script>
        $(function() {
            'use strict';

            var select = $('.select2'), 
                originSchool = $("#sekolah_asal");

            if (select) {
                select.each(function() {
                    var $this = $(this);
                    $this.wrap('<div class="position-relative"></div>');
                    $this.select2({
                        // the following code is used to disable x-scrollbar when click in select input and
                        // take 100% width in responsive also
                        dropdownAutoWidth: true,
                        width: '100%',
                        dropdownParent: $this.parent()
                    });
                });
            }

            getData();

            function getData() {
                $.ajax({
                    url: `/panel/siswa/json/get-single/${id}`,
                    method: 'get',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        let d = data.data;

                        $("#nama_lengkap").val(d.nama);
                        $("#nisn").val(d.nisn);
                        generateOriginSchool(`${d.id_sekolah_asal}|${d.sekolah_asal}`);
                        $("#jenis_kelamin").val(d.jenis_kelamin).trigger("change");
                        $("#tempat_lahir").val(d.tempat_lahir);
                        $("#tanggal_lahir").val(d.tanggal_lahir);
                    },
                    error: function(xhr, status, error) {
                        console.error('gagal mendapatkan data.', status, error);
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

                        data.data.forEach(os => {
                            originSchool.append(`<option value="${os.id}|${os.nama}">${os.npsn} - ${os.nama}</option>`);
                        });

                        originSchool.append('<option value="other">Lainnya</option>');

                        originSchool.val(old).trigger('change');

                        $('#submitbtn').removeAttr("disabled");
                    },
                    error: function(xhr, status, error) {
                        console.error('gagal mendapatkan data.', status, error);
                    }
                });
            }
        });
    </script>
@endpush
