@extends('layouts.has-role.auth', ['title' => 'Detail Operator'])

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
            <form action="#" method="POST">
                <div class="card-header">
                    <h4 class="card-title">Detail User</h4>
                </div>
                <div class="card-body pb-1">
                    <div class="row">
                        <div class="col-sm-6">
                            <table class="table table-borderless">
                                <x-three-row-info identifier="nama" label="Nama" />
                                <x-three-row-info identifier="nama_pengguna" label="Username" />
                                <x-three-row-info identifier="role" label="Role" />
                            </table>
                        </div>
                        <div class="col-sm-6">
                            <table class="table table-borderless">
                                <x-three-row-info identifier="badge-dokumen" label="Dokumen" />
                                <x-three-row-info identifier="badge-status" label="Status" />
                            </table>

                        </div>
                    </div>

                    <x-separator id="separator-id" style="display: none" marginY="2" />

                    <div id="update-status" style="display: none !important;"></div>
                </div>
            </form>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Dokumen</h4>
            </div>
            <div class="card-body">
                <div class="w-75" id="pdf-container">
                    {{-- <iframe id="dokumen" src="https://api-ppdb.labkraf.id/storage/dokumen/admin/verifikasi/dok-verif20240117-174832.pdf"></iframe> --}}
                    <embed src="https://api-ppdb.labkraf.id/storage/dokumen/admin/verifikasi/dok-verif20240117-174832.pdf" type="application/pdf" width="100%" height="100%">
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var param = '{{ $param }}';
    </script>
    <script>
        $(function() {
            'use strict';

            $.ajax({
                url: `/panel/operators/json/operator/${param}`,
                method: 'get',
                dataType: 'json',
                success: function(operator) {
                    console.log(operator);
                    $('#nama').text(operator.nama);
                    $('#nama_pengguna').text(operator.nama_pengguna);
                    $('#role').text('Operator');
                    // $('#dokumen').attr('src', operator.dokumen);
                    renderDokumenBadge(operator.dokumen);
                    renderStatusBadge(operator.status_aktif);
                    // if (operator.status_aktif !== 1) {
                    //     $('#update-status').show()
                    //     $('#separator-id').show()
                    //     renderUpdateStatusButton(operator.status_aktif)
                    // }
                },
                error: function(xhr, status, error) {
                    console.error("Failed to get data single operator.", status, error);
                }
            });

            function renderDokumenBadge(value) {
                let badge = '';
                if (value !== null) {
                    badge = ` <x-badge class="" variant="light" color="success">Ada</x-badge>`;
                } else {
                    badge = ` <x-badge class="" variant="light" color="danger">Tidak Ada</x-badge>`;
                }
                return $('#badge-dokumen').html(badge);
            }

            function renderStatusBadge(status) {
                let badge = '';
                if (status === 'v') {
                    badge = ` <x-badge class="" variant="light" color="warning">Menunggu Verifikasi</x-badge>`;
                } else if (status === 'a') {
                    badge = ` <x-badge class="" variant="light" color="success">Aktif</x-badge>`;
                } else {
                    badge = ` <x-badge class="" variant="light" color="danger">Tidak Aktif</x-badge>`;
                }
                return $('#badge-status').html(badge);
            }

            function renderUpdateStatusButton(status) {
                let button = ''

                if (status === 2) {
                    button = `<button class="btn btn-danger" >Nonaktifkan</button>`;
                } else {
                    button = `<button class="btn btn-success">Aktifkan</button>`;
                }

                return $('#update-status').html(button)
            }
        })
    </script>
@endpush
