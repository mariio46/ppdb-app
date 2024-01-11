@extends('layouts.has-role.auth', ['title' => 'Tambah Permission'])

@section('vendorStyles')
    <link type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css" rel="stylesheet">
    <link type="text/css" href="/app-assets/css/plugins/forms/form-validation.css" rel="stylesheet">
@endsection

@section('vendorScripts')
    <script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
@endsection

@section('content')
    <div class="content-body">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Tambah Permission
                </div>
            </div>
            <div class="card-body">
                <form id="form-permission" action="#" method="POST">
                    <div class="mb-2">
                        <x-label for="name" value="Nama Permission" />
                        <x-input id="name" name="name" placeholder="Masukkan Nama Permission" />
                    </div>
                    <div class="mb-2">
                        <x-label for="keterangan" value="Keterangan" />
                        <x-input id="keterangan" name="keterangan" placeholder="Masukkan keterangan permission" />
                    </div>
                    <div class="d-flex align-items-center justify-content-start gap-2 mt-2">
                        <x-button color="success">Tambah Permission</x-button>
                        <x-link color="secondary" :href="route('permissions.index')">Batalkan</x-link>
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
            var form = $('#form-permission');

            if (form.length) {
                form.validate({
                    rules: {
                        name: {
                            required: true,
                            minlength: 3,
                        },
                        keterangan: {
                            required: true,
                            minlength: 10,
                        },
                    },
                    messages: {
                        name: {
                            required: 'Nama permission tidak boleh kosong.',
                            minlength: 'Nama permission harus lebih dari 3 karakter.',
                        },
                        keterangan: {
                            required: 'Keterangan permission tidak boleh kosong.',
                            minlength: 'Keterangan permission harus lebih dari 10 karakter.',
                        },
                    }
                });
            }
        })
    </script>
@endpush
