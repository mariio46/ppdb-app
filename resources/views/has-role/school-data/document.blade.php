@extends('layouts.has-role.auth', ['title' => 'Info Kuota Sekolah'])

@section('vendorStyles')
    <link type="text/css" href="/app-assets/css/pages/page-profile.css" rel="stylesheet">
    <link type="text/css" href="/app-assets/css/plugins/forms/form-validation.css" rel="stylesheet">
@endsection

@section('vendorScripts')
    <script src="/app-assets/js/scripts/pages/page-profile.js"></script>
    <script src="/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="/app-assets/vendors/js/forms/validation/additional-methods.min.js"></script>
@endsection

@section('content')
    <div class="content-body">

        {{-- Header Profile --}}
        @include('has-role.school-data.partials.header')

        {{-- Tab Menu --}}
        @include('has-role.school-data.partials.tab')

        <div class="card">
            <div class="card-body">
                <section class="w-100">
                    <div class="d-inline-flex gap-1 align-items-center">
                        <h3 class="mb-0">Dokumen Pakta Integritas</h3>
                        <p class="mt-1" id="badge-status-dokumen-pakta-integritas"></p>
                    </div>
                    <div class="my-2 w-100">
                        <x-button class="mb-1" data-bs-toggle="modal" data-bs-target="#upload-pakta-integritas" type="button" color="primary">Upload Pakta Integritas Baru</x-button>
                        <x-modal modal_id="upload-pakta-integritas" label_by="uploadPaktaIntegritas" align="modal-dialog-centered">
                            <x-modal.header>
                                <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                            </x-modal.header>
                            <x-modal.body>
                                <h5 class="text-center mt-2">Upload Dokumen Pakta Integritas Baru?</h5>
                                <p class="text-center mb-1">Jika mengunggah dokumen baru, dokumen lama akan dihapus. Yakin melanjutkan?</p>
                                <form id="form-upload-pakta-integritas" enctype="multipart/form-data" action="{{ route('school-data.firstDocument', $sekolah_id) }}" method="POST">
                                    @csrf
                                    <x-input id="pakta_integritas" name="pakta_integritas" type="file" required />
                                    <x-modal.footer class="justify-content-center my-1">
                                        <x-button color="success">Ya, Upload</x-button>
                                        <x-button data-bs-dismiss="modal" color="secondary">Batalkan</x-button>
                                    </x-modal.footer>
                                </form>
                            </x-modal.body>
                        </x-modal>
                        <div class="w-75">
                            <iframe id="dokumen-pakta-integritas"></iframe>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <section class="w-100">
                    <div class="d-inline-flex gap-1 align-items-center">
                        <h3 class="mb-0">Dokumen SK PPDB</h3>
                        <p class="mt-1" id="badge-status-dokumen-sk-ppdb"></p>
                    </div>
                    <div class="my-2 w-100">
                        <x-button class="mb-1" data-bs-toggle="modal" data-bs-target="#upload-sk-ppdb" type="button" color="primary">Upload SK PPDB Baru</x-button>
                        <x-modal modal_id="upload-sk-ppdb" label_by="uploadSKPPDB" align="modal-dialog-centered">
                            <x-modal.header>
                                <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                            </x-modal.header>
                            <x-modal.body>
                                <h5 class="text-center mt-2">Upload SK PPDB Baru?</h5>
                                <p class="text-center mb-1">Jika mengunggah dokumen baru, dokumen lama akan dihapus. Yakin melanjutkan?</p>
                                <form id="form-upload-sk-ppdb" enctype="multipart/form-data" action="{{ route('school-data.secondDocument', $sekolah_id) }}" method="POST">
                                    @csrf
                                    <x-input id="sk_ppdb" name="sk_ppdb" type="file" required />
                                    <x-modal.footer class="justify-content-center my-1">
                                        <x-button color="success">Ya, Upload</x-button>
                                        <x-button data-bs-dismiss="modal" color="secondary">Batalkan</x-button>
                                    </x-modal.footer>
                                </form>
                            </x-modal.body>
                        </x-modal>
                        <div class="w-75">
                            <iframe id="dokumen-sk-ppdb" frameborder="0"></iframe>
                        </div>
                    </div>
                </section>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script>
        var school_id = '{{ $sekolah_id }}';
    </script>
    <script>
        $(function() {
            'use strict';

            var formFirstDocument = $('#form-upload-pakta-integritas'),
                badgePaktaIntegritas = $('#badge-status-dokumen-pakta-integritas'),
                badgeSkPpdb = $('#badge-status-dokumen-sk-ppdb'),
                formSecondDocument = $('#form-upload-sk-ppdb');

            $.ajax({
                url: `/panel/data-sekolah/json/school/${school_id}`,
                method: 'get',
                dataType: 'json',
                success: function(school) {
                    console.log('Sekolah : ', school);
                    if (school.logo) $('#logo-sekolah').attr('src', school.logo);

                    loadPaktaIntegritas(school.pakta_integritas);
                    loadSkPpdb(school.sk_ppdb);

                },
                error: function(xhr, status, error) {
                    console.error('Failed to get data.', status, error);
                }
            })

            // Load Dokumen Pakta Integritas
            function loadPaktaIntegritas(document) {
                if (document) {
                    $('#dokumen-pakta-integritas').attr('src', document);
                    $('#dokumen-pakta-integritas').addClass('w-100 min-vh-100');
                    badgePaktaIntegritas.html(function() {
                        return `<span class="badge bg-light-success">Terupload</span>`
                    })
                } else {
                    badgePaktaIntegritas.html(function() {
                        return `<span class="badge bg-light-warning">Belum upload</span>`
                    })
                }
            }

            function loadSkPpdb(document) {
                if (document) {
                    $('#dokumen-sk-ppdb').attr('src', document);
                    $('#dokumen-sk-ppdb').addClass('w-100 min-vh-100');
                    badgeSkPpdb.html(function() {
                        return `<span class="badge bg-light-success">Terupload</span>`
                    })
                } else {
                    badgeSkPpdb.html(function() {
                        return `<span class="badge bg-light-warning">Belum upload</span>`
                    })
                }
            }

            // Form Validation for Pakta Integritas
            if (formFirstDocument.length) {
                formFirstDocument.validate({
                    rules: {
                        pakta_integritas: {
                            required: true,
                            extension: "pdf",
                            maxsize: 500 * 1024,
                        }
                    },
                    messages: {
                        pakta_integritas: {
                            required: 'Tolong unggah dokumen Pakta Integritas!',
                            extension: "Hanya menerima dokumen dengan format pdf.",
                            maxsize: "Ukuran dokumen tidak boleh lebih dari 500 KB.",
                        }
                    },
                })
            }

            // Form Validation for SK PPDB
            if (formSecondDocument.length) {
                formSecondDocument.validate({
                    rules: {
                        sk_ppdb: {
                            required: true,
                            extension: "pdf",
                            maxsize: 500 * 1024,
                        }
                    },
                    messages: {
                        sk_ppdb: {
                            required: 'Tolong unggah dokumen SK PPDB!',
                            extension: "Hanya menerima dokumen dengan format pdf.",
                            maxsize: "Ukuran dokumen tidak boleh lebih dari 500 KB.",
                        }
                    },
                })
            }
        })
    </script>
@endpush
