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
                <div class="card-body px-0">
                    <div class="d-flex align-items-center mb-3 px-2">
                        <h5 class="card-title mb-0">Pendaftaran Tahap <span id="phase"></span></h5>

                        <x-link class="ms-auto" href="{{ route('schedules.edit.index', [$id]) }}" color="success" withIcon="true"><x-tabler-pencil-minus /> Edit Tahap</x-link>
                    </div>

                    {{-- registration --}}
                    <div class="mb-3">
                        <div class="d-flex align-items-center mb-1 px-2">
                            <h5 class=" text-primary mb-0">Jadwal Pendaftaran</h5>

                            <x-link class="ms-auto btn-sm" href="{{ route('schedules.edit.regis', [$id]) }}" color="success" variant="outline">Edit Waktu Pendaftaran</x-link>
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
                                    {{-- <tr>
                                    <td><span class="bullet bullet-sm bullet-success me-1"></span> Senin, 01 Januari 2024</td>
                                    <td class="text-end">07.00 WITA - 17.00 WITA</td>
                                </tr>
                                <tr>
                                    <td><span class="bullet bullet-sm bullet-success me-1"></span> Selasa, 02 Januari 2024</td>
                                    <td class="text-end">07.00 WITA - 17.00 WITA</td>
                                </tr>
                                <tr>
                                    <td><span class="bullet bullet-sm bullet-success me-1"></span> Rabu, 03 Januari 2024</td>
                                    <td class="text-end">07.00 WITA - 17.00 WITA</td>
                                </tr>
                                <tr>
                                    <td><span class="bullet bullet-sm bullet-success me-1"></span> Kamis, 04 Januari 2024</td>
                                    <td class="text-end">07.00 WITA - 12.00 WITA</td>
                                </tr> --}}
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- verification --}}
                    <div class="mb-3">
                        <div class="d-flex align-items-center mb-1 px-2">
                            <h5 class=" text-primary mb-0">Jadwal Verifikasi Manual</h5>

                            <x-link class="ms-auto btn-sm" href="{{ route('schedules.edit.verif', [$id]) }}" color="success" variant="outline">Edit Waktu Verifikasi</x-link>
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
                                    {{-- <tr>
                                    <td><span class="bullet bullet-sm bullet-primary me-1"></span> Senin, 01 Januari 2024</td>
                                    <td class="text-end">07.00 WITA - 17.00 WITA</td>
                                </tr>
                                <tr>
                                    <td><span class="bullet bullet-sm bullet-primary me-1"></span> Selasa, 02 Januari 2024</td>
                                    <td class="text-end">07.00 WITA - 17.00 WITA</td>
                                </tr>
                                <tr>
                                    <td><span class="bullet bullet-sm bullet-primary me-1"></span> Rabu, 03 Januari 2024</td>
                                    <td class="text-end">07.00 WITA - 17.00 WITA</td>
                                </tr>
                                <tr>
                                    <td><span class="bullet bullet-sm bullet-primary me-1"></span> Kamis, 04 Januari 2024</td>
                                    <td class="text-end">07.00 WITA - 17.00 WITA</td>
                                </tr> --}}
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- announcement --}}
                    <div class="mb-3">
                        <div class="d-flex align-items-center mb-1 px-2">
                            <h5 class=" text-primary mb-0">Jadwal Pengumuman</h5>

                            <x-link class="ms-auto btn-sm" href="{{ route('schedules.edit.announce', [$id]) }}" color="success" variant="outline">Edit Waktu Pengumuman</x-link>
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
                                    {{-- <tr>
                                    <td><span class="bullet bullet-sm bullet-warning me-1"></span> <span id="announcementDate"></span></td>
                                    <td class="text-end"><span id="announcementTime"></span> WITA</td>
                                </tr> --}}
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- reregistration --}}
                    <div class="mb-3">
                        <div class="d-flex align-items-center mb-1 px-2">
                            <h5 class=" text-primary mb-0">Jadwal Pendaftaran Ulang</h5>

                            <x-link class="ms-auto btn-sm" href="{{ route('schedules.edit.reregis', [$id]) }}" color="success" variant="outline">Edit Waktu Daftar Ulang</x-link>
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
                                    {{-- <tr>
                                    <td><span class="bullet bullet-sm bullet-info me-1"></span> Jumat, 05 Januari 2024</td>
                                    <td class="text-end">09.00 WITA - 17.00 WITA</td>
                                </tr>
                                <tr>
                                    <td><span class="bullet bullet-sm bullet-info me-1"></span> Sabtu, 06 Januari 2024</td>
                                    <td class="text-end">07.00 WITA - 17.00 WITA</td>
                                </tr> --}}
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
                months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
                days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];

            getData();

            function getData() {
                $.ajax({
                    url: '/panel/tahap-jadwal/d/' + idData + '/get-data',
                    method: 'get',
                    dataType: 'json',
                    success: function(data) {
                        let d = data.data;
                        console.log(d);

                        $('#phase').text(d.tahap);

                        checkingRow(d.pendaftaran_mulai, d.pendaftaran_selesai, d.pendaftaran_batas, registrationTable, 'success');

                        checkingRow(d.verifikasi_mulai, d.verifikasi_selesai, d.verifikasi_batas, verificationTable, 'primary');

                        announcementTable.append(generateRow(d.pengumuman, 'warning', d.pengumuman_jam_mulai + ' WITA'));

                        checkingRow(d.daftar_ulang_mulai, d.daftar_ulang_selesai, d.daftar_ulang_batas, reRegistrationTable, 'info');
                    },
                    error: function(xhr, status, error) {
                        console.error('gagal mendapatkan data.', status, error);
                    }
                })
            }
            
            function checkingRow(s, e, data, element, color) {
                let range = [];
                let start = new Date(s);
                let end = new Date(e);

                while (start <= end) {
                    range.push(new Date(start));
                    start.setDate(start.getDate() + 1);
                }

                for (let i = 0; i < range.length; i++) {
                    let dt = range[i].toISOString().split('T')[0].toString();
                    console.log('dt:', range.length);
                    if (data.length > 0) {
                        let rangeData = data.find(function(data) {
                            return data.tanggal == dt;
                        }) || [];

                        if (rangeData.length > 0) {
                            element.append(generateRow(dt, color, rangeData.jam_mulai + ' - ' + rangeData.jam_selesai + ' WITA'));
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
                let showDate = days[dt.getDay()] + ', ' + dt.getDate() + ' ' + months[dt.getMonth()] + ' ' + dt.getFullYear();

                let html = `<tr><td><span class="bullet bullet-sm bullet-${color} me-1"></span>`;
                html += showDate;
                html += '</td><td class="text-end">';
                html += time;
                html += '</td></tr>';

                return html;
            }

            cb.change(function() {
                btnModal.prop('disabled', !$(this).is(':checked'));
            });
        });
    </script>
@endpush
