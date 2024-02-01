@extends('layouts.student.auth')

@section('content')
    <div class="content-body">
        <x-loader key="loader" />

        <section id="statusSection">
            <div class="row">
                <div class="col-12" id="cardSection">
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    {{-- <script src="/js/student/pages/status/index.js"></script> --}}
    <script>
        var tracks = {!! json_encode($tracks) !!};
    </script>
    <script>
        $(function() {
            'use strict';

            var cardSection = $('#cardSection'),
                months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

            getData();

            function getData() {
                $.ajax({
                    url: '/json/status/get-status',
                    method: 'get',
                    dataType: 'json',
                    success: function(status) {
                        console.log(status);
                        if (status.statusCode == 200) {
                            status.data.forEach(s => {
                                let stat = '';

                                switch (s.status) {
                                    case 'mendaftar':
                                        stat = registered(s.nama, s.nisn, tracks[s.kode_jalur], s.sekolah_verif_nama);
                                        break;
                                    case 'verifikasi':
                                        stat = verified(s.nama, s.nisn, tracks[s.kode_jalur], s.pengumuman);
                                        break;
                                    case 'declined':
                                        stat = declined(s.nama, s.nisn, tracks[s.kode_jalur]);
                                        break;
                                    case 'accepted':
                                        stat = accepted(s.nama, s.nisn, tracks[s.kode_jalur], s.sekolah_lulus, s.re_registration_date, s.kode_jalur.charAt(0) == 'K' ? true :
                                            false,
                                            s.jurusan_lulus);
                                        break;
                                    case 'completed':
                                        stat = completed(s.nama, s.nisn, tracks[s.kode_jalur], s.sekolah_lulus, s.kode_jalur.charAt(0) == 'K' ? true : false, s.jurusan_lulus);
                                        break;
                                    case '':
                                        stat = unregister();
                                        break;
                                    default:
                                        break;
                                }

                                cardSection.append(generateCard(s.tahap, stat, getTimeStatus(s.pendaftaran_mulai, s.daftar_ulang_selesai) != 'pre' ? true : false,
                                    getTimeStatus(s.pendaftaran_mulai, s.daftar_ulang_selesai) == 'now' ? true : false));

                            });
                        } else {
                            cardSection.append(empty())
                        }

                        $('#loader').addClass('d-none');
                    },
                    error: function(xhr, status, error) {
                        console.error("Gagal mendapatkan data: ", status, error);
                        $('#loader').addClass('d-none');
                    }
                });
            }

            /**
             * function to generate base card
             * @param {number} n - number id
             * @param {string} stat - section status
             * @param {boolean} isCollapse - collapsed card or no
             * @returns string
             */
            function generateCard(n, stat, inTime = false, isCollapse = false) {
                return `
                <div class="card">
                <div class="card-body px-0">
                    <div class="d-flex align-items-center px-2">
                    <h4 class="mb-0 ${!inTime ? 'text-secondary' : ''}">${inTime ? 'Status pendaftaran tahap ' + n : 'Pendaftaran tahap ' + n + ' belum dibuka'}</h4>

                    <button class="btn btn-primary ms-auto me-1 ${!inTime ? 'disabled' : ''} ${isCollapse ? 'collapsed' : ''}" data-bs-toggle="collapse" data-bs-target="#colStatus${n}" type="button" aria-expanded="${isCollapse ? 'true' : 'false'}" aria-controls="colStatus${n}">
                        Lihat Status
                    </button>
                    </div>
                    <div class="collapse ${isCollapse ? 'show' : ''}" id="colStatus${n}">
                    <div class="px-2 pt-2 mt-1 border-top">
                        ${stat}
                    </div>
                    </div>
                </div>
                </div>`;
            }

            /**
             * generate registered status section
             * @param {string} name - student's name
             * @param {number} nisn - student's id
             * @param {string} track - choosen track
             * @param {string} schoolVerif - name of the school where verification is taking place
             * @returns string
             */
            function registered(name, nisn, track, schoolVerif) {
                return `
                <div id="registered">
                <div class="rounded bg-secondary p-2 mb-0 w-100">
                    <table class="table table-borderless text-white">
                    <tr>
                        <td class="col-auto px-0" style="width: 30%;">Nama Lengkap</td>
                        <td class="col-auto">:</td>
                        <td class="col-auto px-0" style="width: 65%;">${name}</td>
                    </tr>
                    <tr>
                        <td class="col-auto px-0">NISN</td>
                        <td class="col-auto">:</td>
                        <td class="col-auto px-0">${nisn}</td>
                    </tr>
                    <tr>
                        <td class="col-auto px-0">Jalur Pilihan</td>
                        <td class="col-auto">:</td>
                        <td class="col-auto px-0">${track}</td>
                    </tr>
                    <tr>
                        <td class="px-0" colspan="3">Mohon segera melakukan veriifikasi dengan membawa berkas yang diperlukan di:</td>
                    </tr>
                    <tr>
                        <td class="col-auto px-0">Sekolah Verifikasi</td>
                        <td class="col-auto">:</td>
                        <td class="col-auto px-0">${schoolVerif}</td>
                    </tr>
                    </table>
                </div>
                </div>`;
            }

            /**
             * generate string card status information if student is verified
             * @param {string} name - student name
             * @param {number} nisn - student id
             * @param {string} track - track name
             * @param {date} admissionResultDate - (ind) tanggal pengumuman
             */
            function verified(name, nisn, track, admissionResultDate) {
                let d = new Date(admissionResultDate);

                return `
                <div id="verified">
                <div class="rounded bg-warning p-2 mb-0 w-100">
                    <table class="table table-borderless text-white">
                    <tr>
                        <td class="col-auto px-0" style="width: 30%;">Nama Lengkap</td>
                        <td class="col-auto">:</td>
                        <td class="col-auto px-0" style="width: 65%;">${name}</td>
                    </tr>
                    <tr>
                        <td class="col-auto px-0">NISN</td>
                        <td class="col-auto">:</td>
                        <td class="col-auto px-0">${nisn}</td>
                    </tr>
                    <tr>
                        <td class="col-auto px-0">Jalur Pilihan</td>
                        <td class="col-auto">:</td>
                        <td class="col-auto px-0">${track}</td>
                    </tr>
                    <tr>
                        <td class="px-0" colspan="3">Verifikasi berkas kamu telah selesai, jadwal kelulusan pada tanggal ${d.getDate()} ${months[d.getMonth()]} ${d.getFullYear()}.</td>
                    </tr>
                    </table>
                </div>
                </div>`;
            }

            /**
             * generate declined status section
             * @param {string} name - student's name
             * @param {number} nisn - student's id
             * @param {string} track - selected registration track
             * @returns string
             */
            function declined(name, nisn, track) {
                // check time
                return `
                <div id="declined">
                <div class="rounded bg-danger p-2 mb-0 w-100">
                    <table class="table table-borderless text-white">
                    <tr>
                        <td class="col-auto px-0" style="width: 30%;">Nama Lengkap</td>
                        <td class="col-auto">:</td>
                        <td class="col-auto px-0" style="width: 65%;">${name}</td>
                    </tr>
                    <tr>
                        <td class="col-auto px-0">NISN</td>
                        <td class="col-auto">:</td>
                        <td class="col-auto px-0">${nisn}</td>
                    </tr>
                    <tr>
                        <td class="col-auto px-0">Jalur Pilihan</td>
                        <td class="col-auto">:</td>
                        <td class="col-auto px-0">${track}</td>
                    </tr>
                    <tr>
                        <td class="px-0" colspan="3">Mohon Maaf, Kamu dinyatakan <span class="fs-3 fw-bold">TIDAK LULUS</span> pada tahap ini. Jangan menyerah.</td>
                    </tr>
                    </table>
                </div>
                </div>`;
            }

            /**
             * generate accepted status section
             * @param {string} name - student's name
             * @param {number} nisn - student's id
             * @param {string} track - selected registration track
             * @param {string} school - admission's school
             * @param {date} reRegistrationDate - date to re-registration
             * @param {boolean} isSMK - check school type
             * @param {string} department - name of selected school department (if SMK)
             * @returns string
             */
            function accepted(name, nisn, track, school, reRegistrationDate, isSMK = false, department = null) {
                let d = new Date(reRegistrationDate);

                // check time first

                const departmentRow = isSMK ?
                    `<tr>
                    <td class="col-auto px-0">Jurusan</td>
                    <td class="col-auto">:</td>
                    <td class="col-auto px-0">${department}</td>
                </tr>` : '';

                return `
                <div id="accepted">
                <div class="rounded bg-success p-2 mb-0 w-100">
                    <table class="table table-borderless text-white">
                    <tr>
                        <td class="col-auto px-0" style="width: 30%;">Nama Lengkap</td>
                        <td class="col-auto">:</td>
                        <td class="col-auto px-0" style="width: 65%;">${name}</td>
                    </tr>
                    <tr>
                        <td class="col-auto px-0">NISN</td>
                        <td class="col-auto">:</td>
                        <td class="col-auto px-0">${nisn}</td>
                    </tr>
                    <tr>
                        <td class="px-0" colspan="3">Selamat, Kamu dinyatakan <strong class="fs-3">LULUS</strong> PPDB 2024 pada:</td>
                    </tr>
                    <tr>
                        <td class="col-auto px-0">Jalur Pendaftaran</td>
                        <td class="col-auto">:</td>
                        <td class="col-auto px-0">${track}</td>
                    </tr>
                    <tr>
                        <td class="col-auto px-0">Nama Sekolah</td>
                        <td class="col-auto">:</td>
                        <td class="col-auto px-0">${school}</td>
                    </tr>
                    ${departmentRow}
                    </table>
                </div>

                <div class="alert alert-success p-2 mt-1">
                    <p>Silakan melakukan pendaftaran ulang di sekolah tempat kamu diterima sebelum tanggal ${d.getDate()} ${months[d.getMonth()]} ${d.getFullYear()} dengan membawa berkas-berkas berikut:</p>
                    <ol>
                    <li>Bukti pendaftaran yang dapat diunduh <a href="#">di sini</a></li>
                    <li>Rapor SMP</li>
                    <li>Transkrip Nilai SMP</li>
                    <li>apa lagi</li>
                    </ol>
                    <p>Jika kamu tidak melakukan pendaftaran ulang sebelum waktu yang sudah ditentukan, maka kamu dinyatakan mengundurkan diri pada pendaftaran tahap ini.</p>
                </div>
                </div>`;
            }

            /**
             * generate completed status section
             * @param {string} name - student's name
             * @param {number} nisn - student's id
             * @param {string} track - selected registration track
             * @param {string} school - admission school
             * @param {boolean} isSMK - check the admission school type
             * @param {string} department - name of admission school department (if SMK)
             * @returns string
             */
            function completed(name, nisn, track, school, isSMK = false, department = null) {
                const departmentRow = isSMK ?
                    `<tr>
                    <td class="col-auto px-0">Jalur Pilihan</td>
                    <td class="col-auto">:</td>
                    <td class="col-auto px-0">${department}</td>
                </tr>` : '';

                return `
                <div id="completed">
                <div class="rounded bg-primary p-2 mb-0 w-100">
                    <table class="table table-borderless text-white">
                    <tr>
                        <td class="col-auto px-0" style="width: 30%;">Nama Lengkap</td>
                        <td class="col-auto">:</td>
                        <td class="col-auto px-0" style="width: 65%;">${name}</td>
                    </tr>
                    <tr>
                        <td class="col-auto px-0">NISN</td>
                        <td class="col-auto">:</td>
                        <td class="col-auto px-0">${nisn}</td>
                    </tr>
                    <tr>
                        <td class="px-0" colspan="3">Selamat, Kamu sudah resmi menjadi siswa/siswa pada:</td>
                    </tr>
                    <tr>
                        <td class="col-auto px-0">Jalur Pilihan</td>
                        <td class="col-auto">:</td>
                        <td class="col-auto px-0">${track}</td>
                    </tr>
                    <tr>
                        <td class="col-auto px-0">Nama Sekolah</td>
                        <td class="col-auto">:</td>
                        <td class="col-auto px-0">${school}</td>
                    </tr>
                    ${departmentRow}
                    </table>
                </div>
                </div>`;
            }

            function unregister() {
                return `<p class="text-center">Kamu belum melakukan pendaftaran.</p>`;
            }

            function empty() {
                return `<div class="card">
                    <div class="card-body">
                        <p class="text-center mb-0">Data gagal ditemukan. Mohon coba lagi nanti.</p>
                    </div>
                </div>`;
            }

            /**
             * checking the status of date now
             * @param {date} startDateStr - start date
             * @param {date} endDateStr - end date
             * @returns string pre|now|post
             */
            function getTimeStatus(startDateStr, endDateStr) {
                // Change date string to Date object
                const startDate = new Date(startDateStr);
                const endDate = new Date(endDateStr);

                // get current date
                const currentDate = new Date();

                // Check time status
                if (currentDate < startDate) {
                    return 'pre'; // Time before date range
                } else if (currentDate >= startDate && currentDate <= endDate) {
                    return 'now'; // Time between date range
                } else {
                    return 'post'; // Time after date range
                }
            }
        });
    </script>
@endpush
