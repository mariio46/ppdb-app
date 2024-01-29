@extends('layouts.has-role.auth', ['title' => 'Edit Sekolah Asal'])

@section('vendorStyles')
    <link type="text/css" href="/app-assets/css/plugins/forms/form-validation.css" rel="stylesheet">
@endsection

@section('content')
    <x-breadcrumb title="Sekolah Asal">
        <x-breadcrumb-item to="{{ route('sekolah-asal.index') }}" title="Sekolah Asal" />
        <x-breadcrumb-item to="{{ route('sekolah-asal.show', [$id]) }}" title="Detail Sekolah Asal" />
        <x-breadcrumb-active title="Edit Sekolah Asal" />
    </x-breadcrumb>

    <div class="content-body">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Edit Informasi Sekolah Asal
                </div>
            </div>
            <div class="card-body my-25">
                <form id="update-form" action="{{ route('sekolah-asal.update') }}" method="post">
                    @csrf
                    <x-input name="id" type="hidden" value="{{ $id }}" />
                    <div class="row">
                        <div class="col-sm-6 col-12">
                            <div class="mb-2">
                                <x-label>Nomor Pokok Sekolah Nasional (NPSN)</x-label>
                                <x-input id="npsn" name="npsn" value="{{ old('npsn') }}" placeholder="Masukkan NPSN.." />
                            </div>
                            <div class="mb-2">
                                <x-label>Nama Sekolah</x-label>
                                <x-input id="nama" name="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama Sekolah.." />
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

                <x-button class="mt-2" id="delete-btn" data-bs-toggle="modal" data-bs-target="#delete-school" type="button" color="danger" disabled>Hapus Data Sekolah</x-button>

                <x-modal modal_id="delete-school" label_by="deleteSchoolModal">
                    <x-modal.header>
                        <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                    </x-modal.header>
                    <x-modal.body>
                        <h5 class="text-center mt-2">Hapus Sekolah</h5>
                        <p>Apakah Anda yakin ingin menghapus data sekolah ini? Data yang sudah di hapus tidak bisa di kembalikan kembali</p>
                    </x-modal.body>
                    <x-modal.footer class="justify-content-center mb-2">
                        <form id="delete-form" action="{{ route('sekolah-asal.delete') }}" method="post">
                            @csrf
                            <x-input name="delete-btn" type="hidden" value="{{ $id }}" />
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
                checkbox.change(function() {
                    deletebtn.prop('disabled', !checkbox.is(':checked'));
                });
            }

            function getData() {
                $.ajax({
                    url: `/panel/sekolah-asal/json/get-single-data/${id}`,
                    method: 'get',
                    dataType: 'json',
                    success: function(data) {
                        $('#npsn').val(data.data.npsn);
                        $('#nama').val(data.data.nama);
                    },
                    error: function(xhr, status, error) {
                        console.error('gagal mendapatkan data.', status, error);
                    }
                });
            }
        });
    </script>
@endpush
