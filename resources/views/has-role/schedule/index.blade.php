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
                                    <th class="text-center">Tahap</th>
                                    <th>Pendaftaran</th>
                                    <th>Verifikasi</th>
                                    <th class="text-center">Pengumuman</th>
                                    <th>Daftar Ulang</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="tableData">
                                <tr>
                                    <td class="text-center py-1" colspan="6"><i>Tidak ada data ditemukan.</i></td>
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
                months = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"];

            getData();

            function getData() {
                $.ajax({
                    url: '/panel/tahap-jadwal/get-data',
                    method: 'get',
                    dataType: 'json',
                    success: function(response) {
                        let data = response.data;

                        if (response.statusCode == 200) {
                            table.html('');
                            data.forEach(d => {
                                let ds = new Date(d.pendaftaran_mulai);
                                let de = new Date(d.pendaftaran_selesai);
                                let dr = ds.getDate() + ' ' + months[ds.getMonth()] + ' - ' + de.getDate() + ' ' + months[de.getMonth()] + ' ' + de.getFullYear();

                                let vs = new Date(d.verifikasi_mulai);
                                let ve = new Date(d.verifikasi_selesai);
                                let vr = vs.getDate() + ' ' + months[vs.getMonth()] + ' - ' + ve.getDate() + ' ' + months[ve.getMonth()] + ' ' + ve.getFullYear();

                                let p = new Date(d.pengumuman);
                                let pr = p.getDate() + ' ' + months[p.getMonth()];

                                let us = new Date(d.daftar_ulang_mulai);
                                let ue = new Date(d.daftar_ulang_selesai);
                                let ur = us.getDate() + ' ' + months[us.getMonth()] + ' - ' + ue.getDate() + ' ' + months[ue.getMonth()] + ' ' + ue.getFullYear();

                                table.append(generateRow(d.tahap, dr, vr, pr, ur, d.tahap_id));
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

            function generateRow(phase, registration, verification, announcement, reregistration, id) {
                return `
                <tr>
                    <td class="py-1 text-center">${phase}</td>
                    <td class="py-1 text-success">${registration}</td>
                    <td class="py-1 text-success">${verification}</td>
                    <td class="py-1 text-success text-center">${announcement}</td>
                    <td class="py-1 text-success">${reregistration}</td>
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
