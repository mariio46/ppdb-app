@extends('layouts.has-role.auth', ['title' => 'Tahap & Jadwal'])

@section('content')
    @if (session()->get('msg'))
        <div class="alert alert-success p-1">
            <p class="mb-0 text-center">{{ session()->get('msg') }}</p>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body px-0">
                    <div class="d-flex align-items-center px-2">
                        <h4 class="card-title mb-0">Tahap & Jadwal</h4>

                        <a class="btn btn-success ms-auto" href="{{ route('schedules.create.index') }}">
                            <x-tabler-plus style="width: 14px; height: 14px;" />
                            Tambah Tahap
                        </a>
                    </div>

                    <div class="table-responsive mt-2">
                        <table class="table border-bottom">
                            <thead>
                                <tr>
                                    <th class="col align-middle text-center">Tahap</th>
                                    <th class="col align-middle">Pendaftaran</th>
                                    <th class="col align-middle">Verifikasi</th>
                                    <th class="col align-middle text-center">Pengumuman</th>
                                    <th class="col align-middle">Daftar Ulang</th>
                                    <th class="col align-middle">Jalur SMA</th>
                                    <th class="col align-middle">Jalur SMK</th>
                                    <th class="col align-middle text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="tableData">
                                <tr>
                                    <td class="text-center py-1" colspan="8"><i>Tidak ada data ditemukan.</i></td>
                                </tr>
                            </tbody>
                        </table>
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

            var table = $('#tableData'),
                months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

            getData();

            function getData() {
                $.ajax({
                    url: '/panel/tahap-jadwal/json/get-data',
                    method: 'get',
                    dataType: 'json',
                    success: function(response) {
                        console.log(response.data);
                        let data = response.data;

                        if (response.statusCode == 200) {
                            table.html('');
                            data.forEach(d => {
                                let ds = new Date(d.pendaftaran_mulai);
                                let de = new Date(d.pendaftaran_selesai);
                                let dr =
                                    `${ds.getDate()} ${(ds.getMonth() !== de.getMonth()) ? months[ds.getMonth()] : ''} - ${de.getDate()} ${months[de.getMonth()]} ${de.getFullYear()}`;

                                let vs = new Date(d.verifikasi_mulai);
                                let ve = new Date(d.verifikasi_selesai);
                                let vr =
                                    `${vs.getDate()}  ${(vs.getMonth() !== ve.getMonth()) ? months[vs.getMonth()] : ''} -  ${ve.getDate()} ${months[ve.getMonth()]} ${ve.getFullYear()}`;

                                let p = new Date(d.pengumuman);
                                let pr = `${p.getDate()} ${months[p.getMonth()]} ${p.getFullYear()}`;

                                let us = new Date(d.daftar_ulang_mulai);
                                let ue = new Date(d.daftar_ulang_selesai);
                                let ur =
                                    `${us.getDate()} ${(us.getMonth() !== ue.getMonth()) ? months[us.getMonth()] : ''} - ${ue.getDate()} ${months[ue.getMonth()]} ${ue.getFullYear()}`;

                                table.append(generateRow(d.tahap, dr, vr, pr, ur, d.sma, d.smk, d.tahap_id));
                            });
                        } else {
                            table.html('');
                            table.append('<tr><td class="text-center py-1" colspan="6"><i>Tidak ada data ditemukan.</i></td></tr>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("failed to getting data.", status, error);
                    }
                })
            }

            function generateRow(phase, registration, verification, announcement, reregistration, sma, smk, id) {
                let sma_html = '',
                    smk_html = '';
                // console.log('sma', sma);
                if (sma != null) {
                    sma.forEach(a => {
                        sma_html += `<span class="badge bg-primary">${a.jalur.replace('SMA ', '')}</span><br />`;
                    });
                }

                // console.log('smk', sma);
                if (smk != null) {
                    smk.forEach(k => {
                        smk_html += `<span class="badge bg-info">${k.jalur.replace("SMK ", '')}</span><br />`;
                    });
                }

                return `
                <tr>
                    <td class="py-1 text-center">${phase}</td>
                    <td class="py-1 text-success">${registration}</td>
                    <td class="py-1 text-success">${verification}</td>
                    <td class="py-1 text-success text-center">${announcement}</td>
                    <td class="py-1 text-success">${reregistration}</td>
                    <td class="px-1">${sma_html}</td>
                    <td class="px-1">${smk_html}</td>
                    <td class="py-1 text-center">
                        <a href="/panel/tahap-jadwal/d/${id}" class="btn btn-primary">
                            Lihat Detail
                        </a>
                    </td>
                </tr>`;
            }
        });
    </script>
@endpush
