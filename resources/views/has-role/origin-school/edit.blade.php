@extends('layouts.has-role.auth', ['title' => "Edit Sekolah Asal"])

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
                            <li class="breadcrumb-item">
                                <a href="{{ route('sekolah-asal.show', [$id]) }}">Detail Sekolah</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Edit Sekolah
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
                <div class="card-title">
                    Edit Informasi Sekolah Asal
                </div>
            </div>
            <div class="card-body my-25">
                <form action="{{ route('sekolah-asal.update') }}" method="post" id="update-form">
                    @csrf
                    <x-input type="hidden" name="id" value="{{ $id }}" />
                    <div class="row">
                        <div class="col-sm-6 col-12">
                            <div class="mb-2">
                                <x-label>Nomor Pokok Sekolah Nasional (NPSN)</x-label>
                                <x-input name="npsn" id="npsn" placeholder="Masukkan NPSN.." value="{{ old('npsn') }}" />
                            </div>
                            <div class="mb-2">
                                <x-label>Nama Sekolah</x-label>
                                <x-input name="nama" id="nama" placeholder="Masukkan Nama Sekolah.." value="{{ old('nama') }}" />
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-start gap-2">
                        <x-button type="submit" color="success">Simpan Perubahan</x-button>
                        <x-link type="button" href="{{ route('sekolah-asal.show', [$id]) }}" variant="outline" color="secondary">Batalkan</x-link>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Hapus Data Sekolah</h5>
            </div>
            <div class="card-body">
                <div class="alert alert-danger alert-dismissible fade show my-2" role="alert">
                    <div class="alert-body p-2">
                        <span>Apakah anda yakin ingin menghapus data sekolah ini?</span>
                    </div>
                </div>

                <x-checkbox class="form-check-danger" identifier="confirmation" label="Saya yakin untuk menghapus data sekolah ini" variant="danger" />

                <x-button class="mt-2" data-bs-toggle="modal" data-bs-target="#delete-school" type="button" color="danger" id="delete-btn" disabled>Hapus Data Sekolah</x-button>

                <x-modal modal_id="delete-school" label_by="deleteSchoolModal">
                    <x-modal.header>
                        <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                    </x-modal.header>
                    <x-modal.body>
                        <h5 class="text-center mt-2">Hapus Sekolah</h5>
                        <p>Apakah Anda yakin ingin menghapus data sekolah ini? Data yang sudah di hapus tidak bisa di kembalikan kembali</p>
                    </x-modal.body>
                    <x-modal.footer class="justify-content-center mb-2">
                        <form action="{{ route('sekolah-asal.delete') }}" method="post" id="delete-form">
                            @csrf
                            <x-input type="hidden" name="delete-btn" value="{{ $id }}" />
                            <x-button type="submit" color="danger">Ya, Hapus</x-button>
                        </form>
                        <x-button data-bs-dismiss="modal" color="secondary">Batalkan</x-button>
                    </x-modal.footer>
                </x-modal>
            </div>
        </div>
    </div>
@endsection

@section('vendorScripts')
    <script src="/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
@endsection

@push('scripts')
    <script>
        var id = "{{ $id }}";
    </script>
    <script>
        $(function() {
            'use strict';

            var form = $('#update-form'),
                checkbox = $('#confirmation'),
                deletebtn = $('#delete-btn');

            getData();

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

            if (deletebtn.length) {
                checkbox.change(function () {
                    deletebtn.prop('disabled', !checkbox.is(':checked'));
                });
            }

            function getData() {
                $.ajax({
                    url: `/panel/sekolah-asal/json/get-single-data/${id}`,
                    method: 'get',
                    dataType: 'json',
                    success: function(data) {
                        $('#npsn').val(data.npsn);
                        $('#nama').val(data.name);
                    },
                    error: function(xhr, status, error) {
                        console.error('gagal mendapatkan data.', status, error);
                    }
                });
            }
        });
    </script>
@endpush