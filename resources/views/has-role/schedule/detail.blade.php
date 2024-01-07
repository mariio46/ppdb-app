@extends('layouts.has-role.auth', ['title' => 'Detail Jadwal'])

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Tahap & Jadwal</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('schedules.index') }}">
                                    Tahap & Jadwal
                                </a>
                            </li>
                            <li class="breadcrumb-item active">
                                Lihat Detail
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

    <div class="content-body row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <h5 class="card-title mb-0">Pendaftaran Tahap n</h5>
                    </div>

                    <div>
                        <p class="text-center text-muted"><i>Belum fiks</i></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-body row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Hapus Tahap dan Jadwal</h5>

                    <div class="alert alert-warning p-1 mb-2">
                        <p class="mb-0">Apakah anda yakin ingin menghapus data ini?</p>
                    </div>

                    <div class="mb-2">
                        <x-checkbox identifier="isCheck" label="Saya yakin untuk menghapus data ini" variant="danger" />
                    </div>

                    <x-button id="btnCheck" data-bs-toggle="modal" data-bs-target="#modalRemove" color="danger" disabled>Hapus Data</x-button>
                    {{-- modal --}}
                    <div class="modal fade text-start" id="modalRemove" aria-labelledby="modalLabel" aria-hidden="true" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-white">
                                    <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h3 class="text-center my-2">Hapus Tahap dan Jadwal</h3>

                                    <p class="px-5">Apakah Anda yakin ingin menghapus data ini? Data yang sudah di hapus tidak bisa di kembalikan kembali.</p>

                                    <div class="d-flex justify-content-center mb-2">
                                        <form action="{{ route('schedules.remove') }}" method="post">
                                            @csrf
                                            <input name="removeId" type="hidden" value="{{ $id }}">
                                            <x-button class="m-1" type="submit" color="danger">Ya, Hapus</x-button>
                                        </form>
                                        <x-button class="m-1" data-bs-dismiss="modal" type="button" color="secondary" variant="outline">Batalkan</x-button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            'use strict';

            var cb = $('#isCheck'),
                btnModal = $('#btnCheck');

            cb.change(function() {
                if ($(this).is(':checked')) {
                    btnModal.prop('disabled', false);
                } else {
                    btnModal.prop('disabled', true);
                }
            });
        });
    </script>
@endpush
