@extends('layouts.has-role.auth', ['title' => 'Detail Jadwal'])

@section('content')
    <x-breadcrumb title="Tahap & Jadwal">
        <x-breadcrumb-item title="Tahap & Jadwal" to="{{ route('schedules.index') }}" />
        <x-breadcrumb-active title="Lihat Detail" />
    </x-breadcrumb>

    <div class="content-body row">
        <div class="col-12">
            <div class="card">
                <div class="card-body px-0">
                    <div class="d-flex align-items-center mb-3 px-2">
                        <h5 class="card-title mb-0">Pendaftaran Tahap <span id="phase"></span></h5>

                        <x-link class="ms-auto" href="{{ route('schedules.edit.index', [$id]) }}" color="success"><x-tabler-pencil-minus style="width: 14px; height: 14px;" /> Edit Tahap</x-link>
                    </div>

                    <div class="mb-1 p-2 border-bottom">
                        <h5 class="text-primary mb-0">Jalur SMA</h5>

                        <div id="sma-list">-</div>
                    </div>

                    <div class="mb-1 p-2 border-bottom">
                        <h5 class="text-primary mb-0">Jalur SMK</h5>

                        <div id="smk-list">-</div>
                    </div>

                    {{-- registration --}}
                    <div class="mb-3">
                        <div class="d-flex align-items-center mb-1 px-2">
                            <h5 class=" text-primary mb-0">Jadwal Pendaftaran</h5>

                            <x-link class="ms-auto btn-sm" href="{{ route('schedules.edit.time', ['pendaftaran', $id]) }}" color="success" variant="outline">Edit Waktu Pendaftaran</x-link>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped border-bottom">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th class="text-end">Pukul</th>
                                    </tr>
                                </thead>
                                <tbody id="registrationTable">
                                    <tr>
                                        <td class="text-center" colspan="2"><i>loading..</i></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- verification --}}
                    <div class="mb-3">
                        <div class="d-flex align-items-center mb-1 px-2">
                            <h5 class=" text-primary mb-0">Jadwal Verifikasi Manual</h5>

                            <x-link class="ms-auto btn-sm" href="{{ route('schedules.edit.time', ['verifikasi', $id]) }}" color="success" variant="outline">Edit Waktu Verifikasi</x-link>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped border-bottom">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th class="text-end">Pukul</th>
                                    </tr>
                                </thead>
                                <tbody id="verificationTable">
                                    <tr>
                                        <td class="text-center" colspan="2"><i>loading..</i></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- announcement --}}
                    <div class="mb-3">
                        <div class="d-flex align-items-center mb-1 px-2">
                            <h5 class=" text-primary mb-0">Jadwal Pengumuman</h5>

                            <x-link class="ms-auto btn-sm" href="{{ route('schedules.edit.time', ['pengumuman', $id]) }}" color="success" variant="outline">Edit Waktu Pengumuman</x-link>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped border-bottom">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th class="text-end">Pukul</th>
                                    </tr>
                                </thead>
                                <tbody id="announcementTable">
                                    <tr>
                                        <td class="text-center" colspan="2"><i>loading..</i></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- reregistration --}}
                    <div class="mb-3">
                        <div class="d-flex align-items-center mb-1 px-2">
                            <h5 class=" text-primary mb-0">Jadwal Pendaftaran Ulang</h5>

                            <x-link class="ms-auto btn-sm" href="{{ route('schedules.edit.time', ['daftar_ulang', $id]) }}" color="success" variant="outline">Edit Waktu Daftar Ulang</x-link>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped border-bottom">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th class="text-end">Pukul</th>
                                    </tr>
                                </thead>
                                <tbody id="reRegistrationTable">
                                    <tr>
                                        <td class="text-center" colspan="2"><i>loading..</i></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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
                                            <input name="remove_id" type="hidden" value="{{ $id }}">
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
        var idData = '{{ $id }}';
    </script>
    <script>
        $(function() {
            'use strict';

            var regisTable = $('#registrationTable'),
                cb = $('#isCheck'),
                btnModal = $('#btnCheck'),
                registrationTable = $('#registrationTable'),
                verificationTable = $('#verificationTable'),
                announcementTable = $('#announcementTable'),
                reRegistrationTable = $('#reRegistrationTable'),
                tracks = {
                    "AA": "Afirmasi",
                    "AB": "Perpindahan Tugas Orang Tua",
                    "AC": "Anak Guru",
                    "AD": "Prestasi Akademik",
                    "AE": "Prestasi Non Akademik",
                    "AF": "Zonasi",
                    "AG": "Boarding School",
                    "KA": "Afirmasi",
                    "KB": "Perpindahan Tugas Orang Tua",
                    "KC": "Anak Guru",
                    "KD": "Prestasi Akademik",
                    "KE": "Prestasi Non Akademik",
                    "KF": "Domisili Terdekat",
                    "KG": "Anak DUDI"
                },
                months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
                days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];

            getData();

            function getData() {
                $.ajax({
                    url: `/panel/tahap-jadwal/json/d/${idData}/get-data`,
                    method: 'get',
                    dataType: 'json',
                    success: function(data) {
                        let d = data.data;
                        console.log(d);
                        let announce = (d.pengumuman_jam_mulai) ? d.pengumuman_jam_mulai.split(":") : false;
                        let announce_show = announce ? `${announce[0]}.${announce[1]} WITA` : '-';

                        $('#phase').text(d.tahap);

                        if (d.kode_jalur != '') {
                            $('#sma-list, #smk-list').empty();
                            let jalur = d.kode_jalur.split(', ');

                            jalur.forEach(jalur => {
                                if (jalur[0] == 'A') {
                                    $('#sma-list').append(`<span class="badge bg-primary me-sm-1 mt-sm-1">${tracks[jalur]}</span>`);
                                }

                                if (jalur[0] == 'K') {
                                    $('#smk-list').append(`<span class="badge bg-primary me-sm-1 mt-sm-1">${tracks[jalur]}</span>`);
                                }
                            });
                        }

                        checkingRow(d.pendaftaran_mulai, d.pendaftaran_selesai, d.pendaftaran_batas, registrationTable, 'success');

                        checkingRow(d.verifikasi_mulai, d.verifikasi_selesai, d.verifikasi_batas, verificationTable, 'primary');

                        announcementTable.empty();
                        announcementTable.append(generateRow(d.pengumuman, 'warning', announce_show));

                        checkingRow(d.daftar_ulang_mulai, d.daftar_ulang_selesai, d.daftar_ulang_batas, reRegistrationTable, 'info');
                    },
                    error: function(xhr, status, error) {
                        console.error('gagal mendapatkan data.', status, error);
                    }
                })
            }

            function checkingRow(s, e, data, element, color) {
                element.empty();
                let range = [];
                let start = new Date(s);
                let end = new Date(e);

                while (start <= end) {
                    range.push(new Date(start));
                    start.setDate(start.getDate() + 1);
                }

                for (let i = 0; i < range.length; i++) {
                    let dt = range[i].toISOString().split('T')[0].toString();
                    if (data.length > 0) {
                        let rangeData = data.find(function(data) {
                            return data.tanggal == dt;
                        }) || {};

                        if (Object.entries(rangeData).length > 0) {
                            let start_show = rangeData.jam_mulai.split(':');
                            let end_show = rangeData.jam_selesai.split(':');
                            element.append(generateRow(dt, color, `${start_show[0]}.${start_show[1]} - ${end_show[0]}.${end_show[1]}  WITA`));
                        } else {
                            element.append(generateRow(dt, color, '-'));
                        }
                    } else {
                        element.append(generateRow(dt, color, '-'));
                    }
                }
            }

            function generateRow(date, color, time) {
                let dt = new Date(date);

                let html = `<tr>
                                <td>
                                    <span class="bullet bullet-sm bullet-${color} me-1"></span>
                                    ${days[dt.getDay()]}, ${dt.getDate()} ${months[dt.getMonth()]} ${dt.getFullYear()}
                                </td>
                                <td class="text-end">
                                    ${time}
                                </td>
                            </tr>`;

                return html;
            }

            cb.change(function() {
                btnModal.prop('disabled', !$(this).is(':checked'));
            });
        });
    </script>
@endpush
