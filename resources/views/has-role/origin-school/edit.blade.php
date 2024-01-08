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
                                <a href="{{ route('sekolah-asal.show', [$id]) }}">Detail Sekolah Asal</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Edit Sekolah Asal
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
                    Edit Data Sekolah
                </div>
            </div>
            <div class="card-body py-2 my-25">
                <form action="{{ route('sekolah-asal.update', [$id]) }}" method="post" id="update-form">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <x-input type="hidden" name="id" value="{{ $id }}" />
                            <div class="mb-2">
                                <x-label>Nomor Pokok Sekolah Nasional</x-label>
                                <x-input name="npsn" id="npsn" placeholder="NPSN" readonly />
                            </div>
                            <div class="mb-2">
                                <x-label>Nama Sekolah</x-label>
                                <x-input name="nama" id="nama" placeholder="cth. SMA NEGERI 1 MAKASSAR" />
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-start gap-2">
                        <x-button type="submit" color="success" id="update-btn">Simpan Perubahan</x-button>
                        <a type="button" class="btn btn-outline-secondary " href="{{ route('sekolah-asal.show', [$id]) }}">Batalkan</a>
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

                <x-button class="mt-2" data-bs-toggle="modal" data-bs-target="#delete-school" type="button" color="danger" id="modal-delete-btn" disabled>Hapus Data Sekolah</x-button>

                <x-modal modal_id="delete-school" label_by="deleteSchoolModal">
                    <x-modal.header>
                        <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                    </x-modal.header>
                    <form action="{{ route('sekolah-asal.delete', [$id]) }}" method="post" id="delete-form">
                        @csrf
                        <x-modal.body>
                            <h5 class="text-center mt-2">Hapus Sekolah</h5>
                            <x-input type="hidden" name="removeId" value="{{ $id }}" />
                            <p>Apakah Anda yakin ingin menghapus data sekolah ini? Data yang sudah di hapus tidak bisa di kembalikan kembali</p>
                        </x-modal.body>
                        <x-modal.footer class="justify-content-center mb-2">
                            <x-button type="submit" color="danger">Ya, Hapus</x-button>
                            <x-button type="button" data-bs-dismiss="modal" color="secondary">Batalkan</x-button>
                        </x-modal.footer>
                    </form>
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
    var school = '{{ $id }}';
</script>
<script>
$(function() {
    'use strict';

    var formUpdate = $('#update-form'),
        checkbox = $('#confirmation'),
        modalDeleteBtn = $('#modal-delete-btn');

    getData();

    if (formUpdate.length) {
        formUpdate.validate({
            rules: {
                nama: {
                    required: true
                },
            },
            messages: {
                nama: {
                    required: 'Harus diisi.'
                },
            }
        });
    }

    function getData() {
        $.ajax({
            url: '/panel/sekolah-asal/json/get-single/' + school,
            method: 'get',
            dataType: 'json',
            success: function(data) {
                console.log(data);
                $('#nama').val(data.name);
                $('#npsn').val(data.npsn);
            },
            error: function(xhr, status, error) {
                console.error('gagal mendapatkan data.', status, error);
            }
        });
    }

    checkbox.change(function () {
        modalDeleteBtn.prop('disabled', !checkbox.is(':checked'));
    });
});
</script>
@endpush