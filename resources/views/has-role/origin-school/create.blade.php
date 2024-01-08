@extends('layouts.has-role.auth', ['title' => 'Tambah Sekolah'])

@section('vendorStyles')
    <link type="text/css" href="/app-assets/css/plugins/forms/form-validation.css" rel="stylesheet">
@endsection

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Sekolah Asal</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('sekolah-asal.index') }}">Sekolah Asal</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Tambah Sekolah Asal
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
            <div class="card-title">Tambah Sekolah</div>
        </div>
        <div class="card-body">
            <form action="{{ route('sekolah-asal.store') }}" method="post" id="create-form">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-2">
                            <x-label>Nomor Pokok Sekolah Nasional (NPSN)</x-label>
                            <x-input id="npsn" name="npsn" placeholder="Masukkan NPSN.." value="{{ old('npsn') }}" />
                        </div>
                        <div class="mb-2">
                            <x-label>Nama Sekolah</x-label>
                            <x-input id="nama_sekolah" name="nama_sekolah" placeholder="cth. SMA Negeri 1 Makassar" value="{{ old('nama_sekolah') }}" />
                        </div>
                    </div>
                </div>

                <div class="d-flex align-items-center justify-content-start gap-2">
                    <x-button id="submit-btn" type="submit" color="success">Tambah Sekolah</x-button>
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

        var postForm = $('#create-form'),
            submitbtn = $('#submit-btn');

        if (postForm.length) {
            postForm.validate({
                rules: {
                    npsn: {
                        required: true,
                        digits: true,
                        minlength: 8,
                        maxlength: 8,
                    },
                    nama_sekolah: {
                        required: true
                    },
                },
                messages: {
                    npsn: {
                        required: 'Harus diisi.',
                        digits: 'NPSN harus angka.',
                        minlength: 'NPSN harus 8 digit.',
                        maxlength: 'NPSN harus 8 digit.',

                    },
                    nama_sekolah: {
                        required: 'Harus diisi.'
                    },
                }
            });
        }
    });
</script>
@endpush