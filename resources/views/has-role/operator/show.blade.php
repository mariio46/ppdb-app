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
                    <x-link :href="route('operators.edit', $username)">Edit Operator</x-link>
                </div>
                <div class="card-body p-0 pb-1">
                    <div class="row">
                        <div class="col-sm-6">
                            <table class="table table-borderless">
                                <x-three-row-info identifier="name" label="Nama" />
                                <x-three-row-info identifier="username" label="Username" />
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

                    <div class="d-flex align-items-center justify-content-start gap-2 ps-2 pb-0" id="update-status" style="display: none !important;"> </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var username = '{{ $username }}';
    </script>
    <script>
        $(function() {
            'use strict';

            $.ajax({
                url: `/panel/operators/json/singleOperator/${username}`,
                method: 'get',
                dataType: 'json',
                success: function(operator) {
                    $('#name').text(operator.name);
                    $('#username').text(operator.username);
                    $('#role').text(operator.role);
                    renderDokumenBadge(operator.dokumen);
                    renderStatusBadge(operator.status_aktif);
                    if (operator.status_aktif !== 1) {
                        $('#update-status').show()
                        $('#separator-id').show()
                        renderUpdateStatusButton(operator.status_aktif)
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Failed to get data single operator.", status, error);
                }
            });

            function renderDokumenBadge(value) {
                let badge = '';
                if (value === 1) {
                    badge = ` <x-badge class="" variant="light" color="success">Ada</x-badge>`;
                } else {
                    badge = ` <x-badge class="" variant="light" color="danger">Tidak Ada</x-badge>`;
                }
                return $('#badge-dokumen').html(badge);
            }

            function renderStatusBadge(status) {
                let badge = '';
                if (status === 1) {
                    badge = ` <x-badge class="" variant="light" color="warning">Menunggu Verifikasi</x-badge>`;
                } else if (status === 2) {
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
