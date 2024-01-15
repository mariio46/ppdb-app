@extends('layouts.has-role.auth', ['title' => 'Edit Maps Verifikasi Manual'])

@section('styles')
    <link type="text/css" href="/app-assets/css/plugins/forms/form-validation.css" rel="stylesheet">
@endsection

@section('content')
    <x-breadcrumb title="Verifikasi Manual">
        <x-breadcrumb-item title="Verifikasi Manual" to="{{ route('verifikasi.manual') }}" />
        <x-breadcrumb-item title="Lihat Detail Siswa" to="{{ route('verifikasi.manual.detail', [$id]) }}" />
        <x-breadcrumb-active title="Edit Titik Ruma Siswa" />
    </x-breadcrumb>

    <div class="content-body row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Sesuaikan Titik Rumah Siswa</h1>
                </div>
                <div class="card-body">
                    <div class="bg-secondary mb-2" style="width: 100%; height: 10rem;"></div>

                    <form id="form" action="" method="post">
                        <div class="row">
                            <div class="mb-2 col-lg-4 col-12">
                                <x-label for="lintang">Lintang</x-label>
                                <x-input id="lintang" name="lintang" type="text" placeholder="lintang.." readonly></x-input>
                            </div>
                            <div class="mb-2 col-lg-4 col-12">
                                <x-label for="bujur">Bujur</x-label>
                                <x-input id="bujur" name="bujur" type="text" placeholder="bujur.." readonly></x-input>
                            </div>
                        </div>
                        <div class="mb-2">
                            <x-button type="submit" color="success">Simpan Koordinat</x-button>
                            <x-link href="{{ route('verifikasi.manual.detail', [$id]) }}" variant="outline" color="secondary">Kembali</x-link>
                        </div>
                    </form>
                </div>
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

            var form = $('#form');

            if (form.length) {
                form.validate({
                    rules: {
                        lintang: {
                            required: true
                        },
                        bujur: {
                            required: true
                        }
                    },
                    messages: {
                        lintang: {
                            required: 'Harus terisi.'
                        },
                        bujur: {
                            required: "Harus terisi."
                        }
                    }
                });
            }
        });
    </script>
@endpush
