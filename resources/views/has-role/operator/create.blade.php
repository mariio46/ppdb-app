@extends('layouts.has-role.auth', ['title' => 'Tambah Operator'])

@section('vendorStyles')
    <link type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css" rel="stylesheet">
    <link type="text/css" href="/app-assets/css/plugins/forms/form-validation.css" rel="stylesheet">
@endsection

@section('vendorScripts')
    <script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="/app-assets/vendors/js/forms/validation/additional-methods.min.js"></script>
@endsection

@section('content')
    <div class="content-body">

        <div class="card">
            <div class="card-header">
                <h6 class="card-title">Downlaod Pakta Integritas</h6>
            </div>
            <div class="card-body">
                <x-button style="display: inline-flex; align-items: center">
                    <x-tabler-download style="margin-right: 0.25rem;" />
                    Download Pakta Integritas
                </x-button>
                <x-alert variant="warning">Sebelum mendaftarkan operator, silahkan unduh pakta integritas terlebih dahulu.</x-alert>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah Operator</h4>
            </div>
            <div class="card-body">

                <form id="form-operator" action="{{ route('operators.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-2">
                                <x-label for="nama">Nama Lengkap</x-label>
                                <x-input id="nama" name="nama" placeholder="Masukkan nama lengkap" />
                            </div>
                            <div class="mb-2">
                                <x-label for="nama_pengguna">Username</x-label>
                                <x-input id="nama_pengguna" name="nama_pengguna" placeholder="Masukkan nama" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-2">
                                <x-label for="password">Password</x-label>
                                <x-input-password>
                                    <x-input id="password" name="password" type="password" autocomplete="password" placeholder="password" />
                                </x-input-password>
                            </div>
                            <div class="mb-2">
                                <x-label for="password_confirmation">Masukkan Ulang Password</x-label>
                                <x-input-password>
                                    <x-input id="password_confirmation" name="password_confirmation" type="password" autocomplete="password_confirmation" placeholder="konfirmasi password" />
                                </x-input-password>
                            </div>
                        </div>
                    </div>

                    <x-separator marginY="2" />

                    <div class="w-100">
                        <h4 class="card-title"> Dokumen </h4>
                        <div class="w-100">
                            <x-label class="btn btn-primary cursor-pointer" for="dokumen">
                                <span style="display: inline-flex; align-items: center">
                                    <x-tabler-upload style="margin-right: 0.25rem;" />
                                    Upload Pakta Integritas Baru
                                </span>
                            </x-label>
                            <x-input id="dokumen" name="dokumen" type="file" hidden required />
                        </div>
                        <div class="fw-bold text-success" id="selectedFileInfo"></div>
                        <x-alert variant="warning">Upload pakta integritas yang telah ditanda tangani dan distempel.</x-alert>
                    </div>

                    <div class="d-flex align-items-center justify-content-start gap-2 mt-2">
                        <x-button type="submit" color="success">Simpan Perubahan</x-button>
                        <x-link href="{{ route('operators.index') }}" color="secondary">Batalkan</x-link>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            'use strict';

            var form = $('#form-operator');

            // Custom Validation For Username
            $.validator.addMethod('noSpace', (value, element) => value.indexOf(" ") < 0 && value != "");

            // Form Validation
            if (form.length) {
                form.validate({
                    ignore: [],
                    rules: {
                        nama: {
                            required: true,
                            minlength: 3,
                        },
                        nama_pengguna: {
                            required: true,
                            minlength: 3,
                            noSpace: true,
                        },
                        password: {
                            required: true,
                            minlength: 6,
                        },
                        password_confirmation: {
                            required: true,
                            minlength: 6,
                            equalTo: '#password'
                        },
                        dokumen: {
                            required: true,
                            extension: "pdf",
                            maxsize: 500 * 1024,
                        }
                    },
                    messages: {
                        nama: {
                            required: 'Nama tidak boleh kosong.',
                            minlength: 'Nama harus lebih dari 6 karakter.',
                        },
                        nama_pengguna: {
                            required: 'Nama Pengguna tidak boleh kosong.',
                            minlength: 'Nama Pengguna harus lebih dari 6 karakter.',
                            noSpace: 'Nama Pengguna tidak mengandung spasi.',
                        },
                        password: {
                            required: 'Password tidak boleh kosong.',
                            minlength: 'Panjang Password minimal 6 Karater.',
                        },
                        password_confirmation: {
                            required: 'Password tidak boleh kosong.',
                            minlength: 'Panjang Password minimal 6 Karater.',
                            equalTo: 'Password tidak sama dengan Konfirmasi Password.',
                        },
                        dokumen: {
                            required: 'Dokumen tidak boleh kosong.',
                            extension: "Hanya menerima dokumen dengan format pdf.",
                            maxsize: "*Ukuran dokumen tidak boleh lebih dari 500 KB.",
                        },
                    },
                })
            }

            $('#dokumen').on('change', function() {
                var fileName = $(this).val().split('\\').pop(); // Get the file name
                $('#selectedFileInfo').text('Selected file: ' + fileName);
            });
        })
    </script>
@endpush
