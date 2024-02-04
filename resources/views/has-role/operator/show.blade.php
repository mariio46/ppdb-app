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

        <div class="row match-height">
            <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                <div class="card">
                    <div class="card-body">
                        <div class="user-avatar-section">
                            <div class="d-flex align-items-center flex-column placeholder-glow" id="heading-info">
                                <img class="img-fluid rounded mt-3 mb-2 placeholder" id="heading-picture" src="{{ Storage::url('images/static/default-upload.png') }}" alt="User avatar" height="110"
                                    width="110" />
                                <div class="d-flex flex-column user-info align-items-center w-100">
                                    <h4 class="fw-bolder text-primary placeholder col-8" id="heading-name"></h4>
                                    <span class="placeholder col-4" id="heading-role"></span>
                                </div>
                            </div>
                        </div>
                        <h4 class="fw-bolder border-bottom pb-50 mb-1 mt-2">Details</h4>
                        <div class="info-container">
                            <ul class="list-unstyled  placeholder-glow" id="detail-info">
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Nama :</span>
                                    <span class="placeholder col-7 placeholder-sm" id="name"></span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Username :</span>
                                    <span class="placeholder col-6 placeholder-sm" id="username"></span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Nama Sekolah :</span>
                                    <span class="placeholder col-5 placeholder-sm" id="school-name"></span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Role :</span>
                                    <span class="placeholder col-7 placeholder-sm" id="role"></span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Status :</span>
                                    <span class="placeholder col-7 placeholder-sm" id="status"></span>
                                </li>
                                <li class="mb-75">
                                    <span class="fw-bolder me-25">Status Dokumen :</span>
                                    <span class="placeholder col-4 placeholder-sm" id="document-status"></span>
                                </li>
                            </ul>
                            <div class="d-flex justify-content-center gap-2 pt-2 placeholder-glow" id="footer-info">
                                <x-link class="placeholder col-4" id="back-button" :href="route('operators.index')" color="secondary"></x-link>
                                <div id="operator-actions" style="display: none;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
                <div class="card">
                    <div class="card-body">
                        <div class="h-100 placeholder-glow" id="pdf-container">
                            <div class="d-flex h-100 placeholder justify-content-center align-items-center">
                                <h5 class="text-white">Memuat Dokumen</h5>
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
        var id = '{{ $id }}';
        var key = '{{ $key }}';
    </script>
    <script>
        $(() => {
            'use strict';

            var operator_actions = $('#operator-actions')

            $.ajax({
                url: `/panel/operators/json/operator/${id}`,
                method: 'get',
                dataType: 'json',
                beforeSend: () => {
                    placeholderActionOnOperatorDetail('onLoad');
                },
                success: (operator) => {
                    console.log(operator);

                    placeholderActionOnOperatorDetail('onSuccess');
                    showOperatorDetail(operator);
                    showOperatorAction(key, operator);
                },
                error: (xhr, status, error) => {
                    console.error("Failed to get data single operator.", xhr.status, error);
                }
            });

            function showOperatorDetail(operator) {
                $('#heading-name,#name').text(operator.nama);
                $('#heading-role').text('Operator').addClass('badge bg-light-secondary');
                $('#heading-picture').attr('src', 'http://ppdb.test/storage/images/static/operator-avatar.jpg');

                $('#username').text(operator.nama_pengguna);
                $('#role').text('Operator');
                $('#school-name').text(() => {
                    if (operator.nama_sekolah === null) {
                        return 'Sekolah tidak ditemukan!'
                    }
                    return operator.nama_sekolah
                }).addClass(() => {
                    if (operator.nama_sekolah === null) {
                        return 'fw-bold text-danger'
                    }
                    return ''
                })
                $('#status').text(() => {
                    if (operator.status_aktif === 'a') {
                        return 'Aktif'
                    }
                    if (operator.status_aktif === 'v') {
                        return 'Menunggu Verifikasi'
                    }
                    if (operator.status_aktif === 'n') {
                        return 'Tidak Aktif'
                    }
                    return 'Unknown'
                }).addClass(() => {
                    if (operator.status_aktif === 'a') {
                        return 'badge bg-light-success'
                    }
                    if (operator.status_aktif === 'v') {
                        return 'badge bg-light-warning'
                    }
                    if (operator.status_aktif === 'n') {
                        return 'badge bg-light-danger'
                    }
                    return 'badge bg-light-danger'
                })
                $('#document-status').text(() => {
                    if (operator.dokumen === null || operator.dokumen === '') {
                        return 'Belum Upload Dokumen';
                    }
                    return 'Dokumen sudah terupload';
                }).addClass(() => {
                    if (operator.dokumen === null || operator.dokumen === '') {
                        return 'badge bg-light-warning';
                    }
                    return 'badge bg-light-success';

                })

                $('#back-button').text('Kembali')
                if (operator.dokumen) {
                    $('#pdf-container').html(() => {
                        return `<embed class="h-100 w-100" src="${operator.dokumen}" type="application/pdf">`
                    })
                }
            }

            function placeholderActionOnOperatorDetail(type) {
                switch (type) {
                    case 'onLoad':
                        $('#heading-info,#detail-info,#footer-info,#pdf-container').addClass('placeholder-glow');
                        $('#heading-picture').addClass('placeholder');
                        $('#heading-name').addClass('placeholder col-8');
                        $('#heading-role').addClass('placeholder col-4');

                        $('#name').addClass('placeholder placeholder-sm col-7');
                        $('#username').addClass('placeholder placeholder-sm col-6');
                        $('#school-name').addClass('placeholder placeholder-sm col-5');
                        $('#role').addClass('placeholder placeholder-sm col-7');
                        $('#status').addClass('placeholder placeholder-sm col-7');
                        $('#document-status').addClass('placeholder placeholder-sm col-4');

                        $('#back-button').addClass('placeholder col-4');
                        break;

                    case 'onSuccess':
                        $('#heading-info,#detail-info,#footer-info,#pdf-container').removeClass('placeholder-glow');
                        $('#heading-picture').removeClass('placeholder');
                        $('#heading-name').removeClass('placeholder col-8');
                        $('#heading-role').removeClass('placeholder col-4');

                        $('#name').removeClass('placeholder placeholder-sm col-7');
                        $('#username').removeClass('placeholder placeholder-sm col-6');
                        $('#school-name').removeClass('placeholder placeholder-sm col-5');
                        $('#role').removeClass('placeholder placeholder-sm col-7');
                        $('#status').removeClass('placeholder placeholder-sm col-7');
                        $('#document-status').removeClass('placeholder placeholder-sm col-4');

                        $('#back-button').removeClass('placeholder col-4');
                        break;

                    default:
                        $('#heading-info,#detail-info,#footer-info,#pdf-container').addClass('placeholder-glow');
                        $('#heading-picture').addClass('placeholder');
                        $('#heading-name').addClass('placeholder col-8');
                        $('#heading-role').addClass('placeholder col-4');

                        $('#name').addClass('placeholder placeholder-sm col-7');
                        $('#username').addClass('placeholder placeholder-sm col-6');
                        $('#school-name').addClass('placeholder placeholder-sm col-5');
                        $('#role').addClass('placeholder placeholder-sm col-7');
                        $('#status').addClass('placeholder placeholder-sm col-7');
                        $('#document-status').addClass('placeholder placeholder-sm col-4');

                        $('#back-button').addClass('placeholder col-4');
                        break;
                }
            }

            function showOperatorAction(keyType, operator) {
                if (keyType === 'cabdin_id') {
                    operatorActionForAgencyAdmin(operator)
                }

                if (keyType === 'sekolah_id') {
                    operatorActionForSchoolAdmin(operator)
                }

                return '';
            }

            function operatorActionForAgencyAdmin(operator) {
                if (operator.status_aktif === 'v') {
                    operator_actions.show().html(() => {
                        return `
                        <form action="/panel/operators/${id}/verify" method="post">
                            @csrf
                            <button type="submit" class="btn btn-info">Verifikasi</button>
                        </form>
                        `;
                    })
                }

                return false;
            }

            function operatorActionForSchoolAdmin(operator) {

                if (operator.status_aktif === 'a') {
                    operator_actions.show().html(() => {
                        return `
                        <form action="/panel/operators/${id}/update" method="post">
                            @csrf
                            <input type="hidden" name="status" value="n">
                            <button type="submit" class="btn btn-danger">Nonaktifkan</button>
                        </form>
                        `;
                    })
                }

                if (operator.status_aktif === 'n') {
                    operator_actions.show().html(() => {
                        return `
                        <form action="/panel/operators/${id}/update" method="post">
                            @csrf
                            <input type="hidden" name="status" value="a">
                            <button type="submit" class="btn btn-success">Aktifkan</button>
                        </form>
                        `;
                    })
                }

                return false;
            }

        })
    </script>
@endpush
