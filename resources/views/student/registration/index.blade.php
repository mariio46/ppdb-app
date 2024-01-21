@extends('layouts.student.auth')

@section('content')
    <div class="row">
        <div class="col-12">
            @if (!session()->get('stu_is_locked'))
                <div class="alert alert-danger p-1">
                    <p class="text-center"><x-tabler-shield-lock style="width: 36px; height: 36px;" /></p>
                    <p class="mb-0 text-center">Kamu belum mengunci data pribadi. Lakukan penguncian data terlebih dahulu untuk melakukan pendaftaran jalur.</p>
                </div>
            @else
                <div class="card d-none" id="proof_card">
                    <div class="card-body p-2">
                        <div class="d-md-flex align-items-center">
                            <h4 class="my-1">Lihat Bukti Pendaftaran</h4>
                            <a class="btn btn-success ms-auto" id="registration_proof_button" href="">Lihat Detail</a>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body px-5 pt-5">
                        <div class="row match-height" id="card_container">
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@push('scripts')
    {{-- <script src="/js/student/pages/registration/index-v1.0.1.js"></script> --}}
    <script>
        $(function() {
            'use strict';

            var cardContainer = $('#card_container'),
                cardProof = $('#proof_card'),
                regisProofBtn = $('#registration_proof_button'),
                months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                colors = ['primary', 'success', 'warning', 'info', 'danger'];

            $.ajax({
                url: '/json/registration/get-schedules',
                method: 'get',
                dataType: 'json',
                success: function(schedules) {
                    console.log(schedules);
                    displayDataInCards(schedules.data);
                },
                error: function(xhr, status, error) {
                    console.error('Gagal mengambil data:', status, error);
                }
            });

            function displayDataInCards(schedules) {
                schedules.forEach(schedule => {
                    let start = new Date(schedule.mulai);
                    let end = new Date(schedule.selesai);
                    let btnHtml = '';
                    let cdr = '';

                    switch (checkDateRange(schedule.mulai, schedule.selesai)) {
                        case 'pre':
                            btnHtml = `<button class="btn btn-outline-secondary disabled" disabled>Tahap ${schedule.tahap} Belum Dibuka</button>`;
                            cdr = 'pre';
                            break;
                        case 'now':
                            btnHtml = `<a class="btn btn-primary" href="/pendaftaran/tahap/${schedule.tahap}_${schedule.tahap_id}">Lihat Tahap ${schedule.tahap}</a>`;
                            cdr = 'now';
                            cardProof.removeClass("d-none");
                            regisProofBtn.attr('href', `/pendaftaran/bukti/${schedule.tahap}_${schedule.tahap_id}`);
                            break;
                        case 'post':
                            btnHtml = `<button class="btn btn-outline-secondary disabled">Tahap ${schedule.tahap} Sudah Ditutup</button>`;
                            cdr = 'post';
                            cardProof.addClass("d-none");
                            break;
                        default:
                            break;
                    }

                    var cardHtml = `
                    <div class="col">
                        <div class="card border border-1 ${cdr == 'now' ? 'border-primary' : ''} shadow-lg" style="border-width: ${cdr == 'now' ? '2px !important' : '1px'} ;">
                        <div class="card-header d-flex align-items-center flex-column border-bottom">
                            <div class="d-flex align-items-center">
                            <div class="bg-light-${colors[schedule.tahap]} rounded p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil-minus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" /><path d="M13.5 6.5l4 4" /><path d="M16 19h6" /></svg>
                            </div>
                            <div class="ms-1">
                                <h3 class="mb-0">Pendaftaran Tahap ${schedule.tahap}</h3>
                            </div>
                            </div>
                            <p class="text-warning mt-3">Jadwal: ${start.getDate()} ${months[start.getMonth()]} - ${end.getDate()} ${months[end.getMonth()]} ${end.getFullYear()}</p>
                        </div>
                        <div class="card-body">
                            ${generateListItems('SMA', schedule.sma || [])}

                            ${generateListItems('SMK', schedule.smk || [])}
                        </div>
                        <div class="card-footer border-top-0">
                            <div class="row">
                            <div class="d-grid">
                                ${btnHtml}
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>`;

                    cardContainer.append(cardHtml);
                });
            }

            function generateListItems(school, items) {
                if (items != null && items.length > 0) {
                    let html = items.map(item => `<li class="pb-1">Jalur ${item.jalur}</li>`).join('');

                    return `<h4 class="mt-2">${school}</h4>
                            <ul>
                                ${html}
                            </ul>`;
                } else {
                    return '';
                }
            }

            function checkDateRange(startDate, endDate) {
                // Mendapatkan tanggal sekarang
                var currentDate = new Date();
                currentDate.setHours(0, 0, 0, 0); // set waktu menjadi 0

                // Mengonversi tanggal mulai dan tanggal selesai ke objek Date
                var startDateObj = new Date(startDate);
                startDateObj.setHours(0, 0, 0, 0); // set waktu menjadi 0
                var endDateObj = new Date(endDate);
                endDateObj.setHours(0, 0, 0, 0); // set waktu menjadi 0

                // Memeriksa apakah tanggal sekarang berada dalam rentang waktu
                if (currentDate >= startDateObj && currentDate <= endDateObj) {
                    return "now";
                } else if (currentDate < startDateObj) {
                    return "pre";
                } else {
                    return "post";
                }
            }
        });
    </script>
@endpush
