@extends('layouts.has-role.auth', ['title' => 'Tambah Jurusan & Kuota SMK'])

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
            <div class="card-header">
                <div class="card-title">
                    Tambah Jurusan dan Kuota Jurusan
                </div>
            </div>
            <div class="card-body">
                <form id="form-add-quota" action="{{ route('school-quota.store-smk') }}" method="POST">
                    @csrf
                    <div class="mb-2">
                        <x-label for="jurusan">Nama Jurusan</x-label>
                        <x-select class="select2 form-select" id="jurusan" name="jurusan" data-placeholder="Pilih Jurusan">
                            <x-empty-option />
                        </x-select>
                    </div>

                    <x-checkbox identifier="syarat_butawarna" label="Wajib Tidak buta warna (akan menampilkan menu tes buta warna saat verifikasi disekolah)" />
                    <x-checkbox identifier="syarat_tinggibadan" label="Tinggi Badan (Minimal 165 untuk lakilaki dan 155 untuk perempuan)" />

                    <x-alert class="mt-5">Masukkan kuota Per-Jurusan peserta didik yang ingin dierima</x-alert>

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
                                        <input class="form-control" id="kuota-jalur-afirmasi" name="inputQuotaAfirmasi" type="text" style="width: 75px" placeholder="0">
                                    </td>
                                </tr>
                                <tr class="even">
                                    <td>Jalur Perpindahan Tugas Orang Tua</td>
                                    <td class="text-center" id="persentase-jalur-mutasi"></td>
                                    <td class="text-center" id="jalur-mutasi"></td>
                                    <td class="text-center d-flex flex-column align-items-center justify-content-center">
                                        <input class="form-control" id="kuota-jalur-mutasi" name="inputQuotaMutasi" type="text" style="width: 75px" placeholder="0">
                                    </td>
                                </tr>
                                <tr class="odd">
                                    <td>Jalur Anak Guru</td>
                                    <td class="text-center" id="persentase-jalur-anak-guru"></td>
                                    <td class="text-center" id="jalur-anak-guru"></td>
                                    <td class="text-center d-flex flex-column align-items-center justify-content-center">
                                        <input class="form-control" id="kuota-jalur-anak-guru" name="inputQuotaAnakGuru" type="text" style="width: 75px" placeholder="0">
                                    </td>
                                </tr>
                                <tr class="odd">
                                    <td>Jalur Anak Dunia Usaha dan Dunia Industri</td>
                                    <td class="text-center" id="persentase-jalur-anak-dudi"></td>
                                    <td class="text-center" id="jalur-anak-dudi"></td>
                                    <td class="text-center d-flex flex-column align-items-center justify-content-center">
                                        <input class="form-control" id="kuota-jalur-anak-dudi" name="inputQuotaAnakDudi" type="text" style="width: 75px" placeholder="0">
                                    </td>
                                </tr>
                                <tr class="even">
                                    <td>Jalur Prestasi Akademik</td>
                                    <td class="text-center" id="persentase-jalur-akademik"></td>
                                    <td class="text-center" id="jalur-akademik"></td>
                                    <td class="text-center d-flex flex-column align-items-center justify-content-center">
                                        <input class="form-control" id="kuota-jalur-akademik" name="inputQuotaAkademik" type="text" style="width: 75px" placeholder="0">
                                    </td>
                                </tr>
                                <tr class="odd">
                                    <td>Jalur Prestasi Non Akademik</td>
                                    <td class="text-center" id="persentase-jalur-non-akademik"></td>
                                    <td class="text-center" id="jalur-non-akademik"></td>
                                    <td class="text-center d-flex flex-column align-items-center justify-content-center">
                                        <input class="form-control" id="kuota-jalur-non-akademik" name="inputQuotaNonAkademik" type="text" style="width: 75px" placeholder="0">
                                    </td>
                                </tr>
                                <tr class="even">
                                    <td>Jalur Domisili Terdekat</td>
                                    <td class="text-center" id="persentase-jalur-zonasi"></td>
                                    <td class="text-center" id="jalur-zonasi"></td>
                                    <td class="text-center d-flex flex-column align-items-center justify-content-center">
                                        <input class="form-control" id="kuota-jalur-zonasi" name="inputQuotaZonasi" type="text" style="width: 75px" placeholder="0">
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot class="bg-light">
                                <tr>
                                    <td class="fw-bold" id="tfoot" colspan="2">Total Kuota</td>
                                    <td class="text-center fw-bold" id="tfoot-total-estimasi"></td>
                                    <td class="text-center d-flex flex-column align-items-center justify-content-center fw-bold">
                                        <input class="form-control" id="tfoot-total-kuota" name="inputTotalQuota" type="text" style="width: 75px" placeholder="0">
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="d-flex align-items-center justify-content-start gap-2 mt-2">
                        <x-button id="form-button" type="button" color="success">Simpan</x-button>
                        <x-link color="secondary" :href="route('roles.index')">Batalkan</x-link>
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
            unit = '{{ $satuan_pendidikan }}';
    </script>
    <script>
        $(function() {
            'use strict';

            // Variable Declaration
            var table = $('.table-quota'),
                total = $('#total'),
                select = $('.select2'),
                jurusan = $('#jurusan'),
                btnCount = $('#count'),
                btnForm = $('#form-button'),
                form = $('#form-add-quota');

            select.each(function() {
                var $this = $(this);
                $this.wrap('<div class="position-relative"></div>');
                $this.select2({
                    // the following code is used to disable x-scrollbar when click in select input and
                    // take 100% width in responsive also
                    dropdownAutoWidth: true,
                    width: '100%',
                    dropdownParent: $this.parent()
                });
            });

            $.ajax({
                url: `/panel/kuota-sekolah/json/quotas/${unit}/${school_id}`,
                method: 'get',
                dataType: 'json',
                success: function(quotas) {
                    // console.log('Kuota : ', quotas);
                    if (quotas.data) {
                        let existingMajor = quotas.data.map(quota => `${quota.jurusan_id}|${quota.jurusan}`)
                        loadMajors(existingMajor)
                    } else {
                        loadMajors()
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Failed to get data.', status, error);
                }
            })

            // Form Data Major
            function loadMajors(existingMajor = '') {
                $.ajax({
                    url: '/panel/kuota-sekolah/json/majors',
                    method: 'get',
                    dataType: 'json',
                    success: function(majors) {
                        // console.log(majors);
                        jurusan.empty().append('<option value=""></option>');

                        majors.forEach(item => {
                            let value = `${item.value}|${item.label}`;
                            // let disabled = existingMajor.includes(value) ? 'disabled' : '';
                            // jurusan.append(`<option value="${value}" ${disabled}>${item.label}</option>`)
                            if (!existingMajor.includes(value)) {
                                jurusan.append(`<option value="${value}">${item.label}</option>`)
                            }
                        })
                    },
                    error: (xhr, status, error) => console.error('Failed to get data majors.', status, error),
                });
            }

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
            $('#persentase-jalur-anak-dudi').text(floatToPercentage(percentage.anak_dudi))
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

                let jalur_anak_dudi = value * percentage.anak_dudi;
                let kuota_jalur_anak_dudi = Math.round(jalur_anak_dudi);
                $('#jalur-anak-dudi').text(jalur_anak_dudi.toFixed(2));
                $('#kuota-jalur-anak-dudi').val(kuota_jalur_anak_dudi);

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

                let tfoot_total_kuota = kuota_jalur_afirmasi + kuota_jalur_mutasi + kuota_jalur_anak_guru + kuota_jalur_anak_dudi + kuota_jalur_akademik + kuota_jalur_non_akademik +
                    kuota_jalur_zonasi
                $('#tfoot-total-estimasi').text(value)
                onChangeTotalQuota()
            }

            // Tracking on change in each input kuota jalur pendaftaran
            function onChangeTotalQuota() {
                let totalQuota = parseInt($('#kuota-jalur-afirmasi').val()) + parseInt($('#kuota-jalur-mutasi').val()) + parseInt($('#kuota-jalur-anak-guru').val()) + parseInt($(
                    '#kuota-jalur-anak-dudi').val()) + parseInt($(
                    '#kuota-jalur-akademik').val()) + parseInt($('#kuota-jalur-non-akademik').val()) + parseInt($('#kuota-jalur-zonasi').val())
                let value = parseInt(total.val()) * default_value;

                $('#tfoot-total-kuota').val(totalQuota)

                value !== totalQuota ? $('#tfoot-total-kuota').addClass('text-danger').removeClass('text-success') : $('#tfoot-total-kuota').addClass('text-success').removeClass('text-danger')
            }

            // Setter single field quota
            $('#kuota-jalur-afirmasi,#kuota-jalur-mutasi,#kuota-jalur-anak-guru,#kuota-jalur-anak-dudi,#kuota-jalur-akademik,#kuota-jalur-non-akademik,#kuota-jalur-zonasi').on('keyup',
                function() {
                    onChangeTotalQuota()
                })

            // Float to Percentage Converter
            function floatToPercentage(value) {
                let result = (value * 100).toFixed(0) + '%';
                return result
            }

            // Form Validation
            if (form.length) {
                form.validate({
                    rules: {
                        jurusan: {
                            required: true,
                        },
                        inputQuotaAfirmasi: {
                            required: true,
                        },
                        inputQuotaMutasi: {
                            required: true,
                        },
                        inputQuotaAnakGuru: {
                            required: true,
                        },
                        inputQuotaAnakDudi: {
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
                    },
                    messages: {
                        jurusan: {
                            required: 'Nama jurusan tidak boleh kosong.',
                        },
                        inputQuotaAfirmasi: {
                            required: 'Harus Diisi!',
                        },
                        inputQuotaMutasi: {
                            required: 'Harus Diisi!',
                        },
                        inputQuotaAnakGuru: {
                            required: 'Harus Diisi!',
                        },
                        inputQuotaAnakDudi: {
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
                    }
                });
            }
        })
    </script>
@endpush
