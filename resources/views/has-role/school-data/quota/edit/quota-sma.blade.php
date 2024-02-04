@extends('layouts.has-role.auth', ['title' => 'Edit Kuota SMA'])

@section('vendorStyles')
    <link type="text/css" href="/app-assets/css/plugins/forms/form-validation.css" rel="stylesheet">
@endsection

@section('vendorScripts')
    <script src="/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
@endsection

@section('content')
    <div class="content-body">
        <div class="card">
            <div class="card-header mb-0">
                <div class="card-title">
                    Tambah Kuota Sekolah
                </div>
            </div>
            <div class="card-body">
                <x-alert>Masukkan kuota Per-Jalur peserta didik yang ingin diterima.</x-alert>
                <form id="form-add-quota" action="{{ route('school-quota.update-sma', $quota_id) }}" method="POST">
                    @csrf

                    @if ($satuan_pendidikan == 'sma' || $satuan_pendidikan == 'hbs')
                        <div class="mb-2">
                            <x-label for="total" value="Jumlah Rombongan Belajar" />
                            <div class="d-flex align-items-center gap-2">
                                <x-input class="w-25" id="total" name="total" type="number" placeholder="0" />
                                <x-button id="count" type="button">Total</x-button>
                            </div>
                        </div>

                        <div class="mb-2">
                            <table class="table table-quota">
                                <thead>
                                    <tr>
                                        <th>JALUR PENDAFTARAN</th>
                                        <th class="text-center">PERSENTASE KUOTA</th>
                                        <th class="text-center">ESTIMASI KUOTA</th>
                                        <th class="text-center">KUOTA</th>
                                    </tr>
                                </thead>
                                {{-- <tbody></tbody> --}}
                                <tbody>
                                    <tr class="odd">
                                        <td>Jalur Afirmasi</td>
                                        <td class="text-center" id="persentase-jalur-afirmasi"></td>
                                        <td class="text-center" id="jalur-afirmasi"></td>
                                        <td class="text-center d-flex flex-column align-items-center justify-content-center">
                                            <input class="form-control" id="kuota-jalur-afirmasi" name="inputQuotaAfirmasi" type="number" style="width: 75px" placeholder="0">
                                        </td>
                                    </tr>
                                    <tr class="even">
                                        <td>Jalur Perpindahan Tugas Orang Tua</td>
                                        <td class="text-center" id="persentase-jalur-mutasi"></td>
                                        <td class="text-center" id="jalur-mutasi"></td>
                                        <td class="text-center d-flex flex-column align-items-center justify-content-center">
                                            <input class="form-control" id="kuota-jalur-mutasi" name="inputQuotaMutasi" type="number" style="width: 75px" placeholder="0">
                                        </td>
                                    </tr>
                                    <tr class="odd">
                                        <td>Jalur Anak Guru</td>
                                        <td class="text-center" id="persentase-jalur-anak-guru"></td>
                                        <td class="text-center" id="jalur-anak-guru"></td>
                                        <td class="text-center d-flex flex-column align-items-center justify-content-center">
                                            <input class="form-control" id="kuota-jalur-anak-guru" name="inputQuotaAnakGuru" type="number" style="width: 75px" placeholder="0">
                                        </td>
                                    </tr>
                                    <tr class="even">
                                        <td>Jalur Prestasi Akademik</td>
                                        <td class="text-center" id="persentase-jalur-akademik"></td>
                                        <td class="text-center" id="jalur-akademik"></td>
                                        <td class="text-center d-flex flex-column align-items-center justify-content-center">
                                            <input class="form-control" id="kuota-jalur-akademik" name="inputQuotaAkademik" type="number" style="width: 75px" placeholder="0">
                                        </td>
                                    </tr>
                                    <tr class="odd">
                                        <td>Jalur Prestasi Non Akademik</td>
                                        <td class="text-center" id="persentase-jalur-non-akademik"></td>
                                        <td class="text-center" id="jalur-non-akademik"></td>
                                        <td class="text-center d-flex flex-column align-items-center justify-content-center">
                                            <input class="form-control" id="kuota-jalur-non-akademik" name="inputQuotaNonAkademik" type="number" style="width: 75px" placeholder="0">
                                        </td>
                                    </tr>
                                    <tr class="even">
                                        <td>Jalur Zonasi</td>
                                        <td class="text-center" id="persentase-jalur-zonasi"></td>
                                        <td class="text-center" id="jalur-zonasi"></td>
                                        <td class="text-center d-flex flex-column align-items-center justify-content-center">
                                            <input class="form-control" id="kuota-jalur-zonasi" name="inputQuotaZonasi" type="number" style="width: 75px" placeholder="0">
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot class="bg-light">
                                    <tr>
                                        <td class="fw-bold" id="tfoot" colspan="2">Total Kuota</td>
                                        <td class="text-center fw-bold" id="tfoot-total-estimasi"></td>
                                        <td class="text-center d-flex flex-column align-items-center justify-content-center fw-bold">
                                            <input class="form-control" id="tfoot-total-kuota" name="inputTotalQuota" type="number" style="width: 75px" placeholder="0">
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    @endif

                    @if ($satuan_pendidikan == 'fbs' || $satuan_pendidikan == 'hbs')
                        <div class="mb-2">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>JALUR BOARDING</th>
                                        <th class="text-center">TOTAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Boarding Lakilaki</td>
                                        <td class="text-center d-flex flex-column align-items-center justify-content-center">
                                            <x-input id="bs_lakilaki" name="bs_lakilaki" type="number" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Boarding Perempuan</td>
                                        <td class="text-center d-flex flex-column align-items-center justify-content-center">
                                            <x-input id="bs_perempuan" name="bs_perempuan" type="number" />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @endif

                    <div class="d-flex align-items-center justify-content-start gap-2 mt-2">
                        <x-button id="form-button" type="button" color="success">Simpan</x-button>
                        <x-link color="secondary" :href="route('school-quota.index')">Batalkan</x-link>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var default_value = '{{ $default }}';
        var percentage = JSON.parse('{!! $percentage !!}');
        var school_id = '{{ $sekolah_id }}',
            quota_id = '{{ $quota_id }}',
            satuan_pendidikan = '{{ $satuan_pendidikan }}',
            unit = '{{ $unit }}';
    </script>
    <script>
        $(function() {
            'use strict';

            // Variable Declaration
            var table = $('.table-quota'),
                total = $('#total'),
                btnCount = $('#count'),
                btnForm = $('#form-button'),
                form = $('#form-add-quota');

            // Disabled Button Total
            btnCount.prop('disabled', total.val() === '');
            total.on('input', function() {
                btnCount.prop('disabled', total.val() === '');
            });

            // Button Submit Form
            btnForm.on('click', function() {
                if (form.valid()) {
                    form.submit()
                }
            })

            // Display percentage in view
            $('#persentase-jalur-afirmasi').text(floatToPercentage(percentage.afirmasi))
            $('#persentase-jalur-mutasi').text(floatToPercentage(percentage.mutasi))
            $('#persentase-jalur-anak-guru').text(floatToPercentage(percentage.anak_guru))
            $('#persentase-jalur-akademik').text(floatToPercentage(percentage.akademik))
            $('#persentase-jalur-non-akademik').text(floatToPercentage(percentage.non_akademik))
            $('#persentase-jalur-zonasi').text(floatToPercentage(percentage.zonasi))

            // Tracking on change in input Total Rombongan Belajar
            total.on('keyup', function() {
                let result = parseInt(total.val()) * default_value;
                if (!result) result = 0
                totalQuotaOperator(result, percentage)
            })

            // Setter for input field Kuota in every Jalur Pendaftaran
            function totalQuotaOperator(value, percentage) {
                let jalur_afirmasi = value * percentage.afirmasi;
                let kuota_jalur_afirmasi = Math.round(jalur_afirmasi);
                $('#jalur-afirmasi').text(jalur_afirmasi.toFixed(2));
                $('#kuota-jalur-afirmasi').val(kuota_jalur_afirmasi);

                let jalur_mutasi = value * percentage.mutasi;
                let kuota_jalur_mutasi = Math.round(jalur_mutasi);
                $('#jalur-mutasi').text(jalur_mutasi.toFixed(2));
                $('#kuota-jalur-mutasi').val(kuota_jalur_mutasi);

                let jalur_anak_guru = value * percentage.anak_guru;
                let kuota_jalur_anak_guru = Math.round(jalur_anak_guru);
                $('#jalur-anak-guru').text(jalur_anak_guru.toFixed(2));
                $('#kuota-jalur-anak-guru').val(kuota_jalur_anak_guru);

                let jalur_akademik = value * percentage.akademik;
                let kuota_jalur_akademik = Math.round(jalur_akademik);
                $('#jalur-akademik').text(jalur_akademik.toFixed(2));
                $('#kuota-jalur-akademik').val(kuota_jalur_akademik);

                let jalur_non_akademik = value * percentage.non_akademik;
                let kuota_jalur_non_akademik = Math.round(jalur_non_akademik);
                $('#jalur-non-akademik').text(jalur_non_akademik.toFixed(2));
                $('#kuota-jalur-non-akademik').val(kuota_jalur_non_akademik);

                let jalur_zonasi = value * percentage.zonasi;
                let kuota_jalur_zonasi = Math.round(jalur_zonasi);
                $('#jalur-zonasi').text(jalur_zonasi.toFixed(2));
                $('#kuota-jalur-zonasi').val(kuota_jalur_zonasi);

                let tfoot_total_kuota = kuota_jalur_afirmasi + kuota_jalur_mutasi + kuota_jalur_anak_guru + kuota_jalur_akademik + kuota_jalur_non_akademik + kuota_jalur_zonasi
                $('#tfoot-total-estimasi').text(value)
                onChangeTotalQuota()
            }

            // Tracking on change in each input kuota jalur pendaftaran
            function onChangeTotalQuota() {
                let totalQuota = parseInt($('#kuota-jalur-afirmasi').val()) + parseInt($('#kuota-jalur-mutasi').val()) + parseInt($('#kuota-jalur-anak-guru').val()) + parseInt($(
                    '#kuota-jalur-akademik').val()) + parseInt($('#kuota-jalur-non-akademik').val()) + parseInt($('#kuota-jalur-zonasi').val())
                let value = parseInt(total.val()) * default_value;

                $('#tfoot-total-kuota').val(totalQuota)

                value !== totalQuota ? $('#tfoot-total-kuota').addClass('text-danger').removeClass('text-success') : $('#tfoot-total-kuota').addClass('text-success').removeClass('text-danger')
            }

            // Setter single field quota
            $('#kuota-jalur-afirmasi,#kuota-jalur-mutasi,#kuota-jalur-anak-guru,#kuota-jalur-akademik,#kuota-jalur-non-akademik,#kuota-jalur-zonasi').on('keyup', function() {
                onChangeTotalQuota()
            })

            // Float to Percentage Converter
            function floatToPercentage(value) {
                let result = (value * 100).toFixed(0) + '%';
                return result
            }

            $.ajax({
                url: `/panel/kuota-sekolah/json/quotas/${unit}/${quota_id}/quota`,
                method: 'get',
                dataType: 'json',
                success: function(quota) {
                    console.log('Kuota : ', quota);
                    if (satuan_pendidikan === 'sma' || satuan_pendidikan === 'hbs') {
                        if (quota.data.total_kuota) {
                            let totalDividing = quota.data.total_kuota / default_value;
                            let totalMultiplie = Math.round(totalDividing) * default_value;

                            total.val(Math.round(totalDividing));
                            totalQuotaOperator(Math.round(totalMultiplie), percentage)
                        }
                    }
                    if (satuan_pendidikan === 'fbs' || satuan_pendidikan === 'hbs') {
                        $('#bs_lakilaki').val(quota.data.bs_lakilaki)
                        $('#bs_perempuan').val(quota.data.bs_perempuan)
                    }

                },
                error: function(xhr, status, error) {
                    console.error("Failed to get data single school.", status, error, xhr);
                }
            })

            // Form Validation
            if (form.length) {
                form.validate({
                    rules: {
                        inputQuotaAfirmasi: {
                            required: true,
                        },
                        inputQuotaMutasi: {
                            required: true,
                        },
                        inputQuotaAnakGuru: {
                            required: true,
                        },
                        inputQuotaAkademik: {
                            required: true,
                        },
                        inputQuotaNonAkademik: {
                            required: true,
                        },
                        inputQuotaZonasi: {
                            required: true,
                        },
                        inputTotalQuota: {
                            required: true,
                        },
                        bs_lakilaki: {
                            required: true,
                        },
                        bs_perempuan: {
                            required: true,
                        },
                    },
                    messages: {
                        inputQuotaAfirmasi: {
                            required: 'Harus Diisi!',
                        },
                        inputQuotaMutasi: {
                            required: 'Harus Diisi!',
                        },
                        inputQuotaAnakGuru: {
                            required: 'Harus Diisi!',
                        },
                        inputQuotaAkademik: {
                            required: 'Harus Diisi!',
                        },
                        inputQuotaNonAkademik: {
                            required: 'Harus Diisi!',
                        },
                        inputQuotaZonasi: {
                            required: 'Harus Diisi!',
                        },
                        inputTotalQuota: {
                            required: 'Harus Diisi!',
                        },
                        bs_lakilaki: {
                            required: 'Harus Diisi!',
                        },
                        bs_perempuan: {
                            required: 'Harus Diisi!',
                        },
                    }
                });
            }
        })
    </script>
@endpush
