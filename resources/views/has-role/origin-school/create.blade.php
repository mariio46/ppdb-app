@extends('layouts.has-role.auth', ['title' => 'Tambah Sekolah'])

@section('vendorStyles')
    <link type="text/css" href="/app-assets/css/plugins/forms/form-validation.css" rel="stylesheet">
@endsection

@section('content')
    <x-breadcrumb title="Sekolah Asal">
        <x-breadcrumb-item title="Sekolah Asal" to="{{ route('sekolah-asal.index') }}" />
        <x-breadcrumb-active title="Tambah Sekolah Asal" />
    </x-breadcrumb>

    <div class="content-body">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Tambah Sekolah</div>
            </div>
            <div class="card-body">
                <form id="create-form" action="{{ route('sekolah-asal.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-2">
                                <x-label>Nomor Pokok Sekolah Nasional (NPSN)</x-label>
                                <x-input id="npsn" name="npsn" placeholder="Masukkan NPSN" />
                            </div>
                            <div class="mb-2">
                                <x-label>Nama Sekolah</x-label>
                                <x-input id="nama" name="nama" placeholder="Masukkan Nama Sekolah" />
                            </div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-start gap-2">
                        <x-button type="submit" color="success">Simpan Perubahan</x-button>
                        <x-link type="button" href="{{ route('sekolah-asal.index') }}" color="secondary" variant="outline">Batalkan</x-link>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('vendorScripts')
    <script src="/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
@endsection

@push('scripts')
    <script>
        $(function() {
            'use strict';

            var form = $('#create-form');

            if (form.length) {
                form.validate({
                    rules: {
                        npsn: {
                            required: true,
                            digits: true,
                            minlength: 8,
                            maxlength: 8,
                        },
                        nama: {
                            required: true
                        }
                    },
                    messages: {
                        npsn: {
                            required: 'Harus diisi.',
                            digits: 'NPSN harus dalam bentuk angka.',
                            minlength: 'NPSN harus 8 digit',
                            maxlength: 'NPSN harus 8 digit.'
                        },
                        nama: {
                            required: 'Harus diisi.'
                        }
                    }
                });
            }
        });
    </script>
@endpush
