@extends('layouts.student.auth')

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Pendaftaran</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb breadcrumb-slash">
                            <li class="breadcrumb-item">
                                <a href="{{ route('student.regis') }}">Pendaftaran</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Pendaftaran Tahap {{ $phase }}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-body">
        <div id="phaseAlert"></div>

        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="faq-navigation d-flex justify-content-between flex-column mb-2 mb-md-0">
                            <ul class="nav nav-pills nav-left flex-column" id="tabList" role="tablist"></ul>

                            <ul class="nav nav-pills nav-left flex-column" id="smkTabList" role="tablist">
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12">
                <div class="tab-content" id="tabContent">
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var code = '{{ $phase_code ?? 0 }}',
            isRegis = "{{ session()->get('stu_is_regis') ? 'y' : 'n' }}";
    </script>
    {{-- <script src="/js/student/pages/registration/phase-v1.1.5.js"></script> --}}
    <script>
        $(function() {
            'use stricts';

            var bcTahap = $('#bcTahap'),
                alert = $('#phaseAlert'),
                tabList = $('#tabList'),
                tabContent = $('#tabContent'),
                months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                icons = new Map([
                ['AA',
                    '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-heart" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>'
                ],
                ['AB',
                    '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-ticket" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 5l0 2" /><path d="M15 11l0 2" /><path d="M15 17l0 2" /><path d="M5 5h14a2 2 0 0 1 2 2v3a2 2 0 0 0 0 4v3a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-3a2 2 0 0 0 0 -4v-3a2 2 0 0 1 2 -2" /></svg>'
                ],
                ['AC',
                    '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>'
                ],
                ['AD',
                    '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bookmark" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 7v14l-6 -4l-6 4v-14a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4z" /></svg>'
                ],
                ['AE',
                    '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trophy" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 21l8 0" /><path d="M12 17l0 4" /><path d="M7 4l10 0" /><path d="M17 4v8a5 5 0 0 1 -10 0v-8" /><path d="M5 9m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M19 9m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /></svg>'
                ],
                ['AF',
                    '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 7l6 -3l6 3l6 -3v13l-6 3l-6 -3l-6 3v-13" /><path d="M9 4v13" /><path d="M15 7v13" /></svg>'
                ],
                ['AG',
                    '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-friends" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 5m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M5 22v-5l-1 -1v-4a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4l-1 1v5" /><path d="M17 5m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M15 22v-4h-2l2 -6a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1l2 6h-2v4" /></svg>'
                ],
                ['KA',
                    '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-heart" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>'
                ],
                ['KB',
                    '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-ticket" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 5l0 2" /><path d="M15 11l0 2" /><path d="M15 17l0 2" /><path d="M5 5h14a2 2 0 0 1 2 2v3a2 2 0 0 0 0 4v3a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-3a2 2 0 0 0 0 -4v-3a2 2 0 0 1 2 -2" /></svg>'
                ],
                ['KC',
                    '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>'
                ],
                ['KD',
                    '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bookmark" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 7v14l-6 -4l-6 4v-14a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4z" /></svg>'
                ],
                ['KE',
                    '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trophy" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 21l8 0" /><path d="M12 17l0 4" /><path d="M7 4l10 0" /><path d="M17 4v8a5 5 0 0 1 -10 0v-8" /><path d="M5 9m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M19 9m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /></svg>'
                ],
                ['KF',
                    '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 7l6 -3l6 3l6 -3v13l-6 3l-6 -3l-6 3v-13" /><path d="M9 4v13" /><path d="M15 7v13" /></svg>'
                ],
                ['KG',
                    '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-cog" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h2.5" /><path d="M19.001 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M19.001 15.5v1.5" /><path d="M19.001 21v1.5" /><path d="M22.032 17.25l-1.299 .75" /><path d="M17.27 20l-1.3 .75" /><path d="M15.97 17.25l1.3 .75" /><path d="M20.733 20l1.3 .75" /></svg>'
                ],
                ]);

            $.ajax({
                url: '/json/registration/get-schedule-by-phase-code/' + code,
                method: 'get',
                dataType: 'json',
                success: function(data) {
                    let d = data.data;
                    console.log(d);
                    let isNotExpired = (isCurrentTimeInRange(d.jam_mulai, d.jam_selesai));
                    let n = 0;
                    let start = new Date(d.mulai);
                    let end = new Date(d.selesai);

                    bcTahap.text(d.phase);

                    if (!isNotExpired) {
                        alert.html(`<div class="alert alert-info p-1">
                            <p class="mb-0 text-center">Pendaftaran hari ini telah ditutup.</p>
                        </div>`);
                    }

                    if (d.sma != null && d.sma.length) {
                        tabList.append('<h4>SMA</h4>');

                        d.sma.forEach(sma => {
                            let abb = 'sma' + sma.jalur.replace(/ +/g, "");
    
                            var smaTab = generateTabListHtml(n == 0, abb, sma.kode, sma.jalur);
                            var tab = generateTabContentHtml(n == 0, abb, sma.jalur, sma.info, start.getDate(), start.getMonth(), end.getDate(), end.getMonth(), end.getFullYear(), isNotExpired, sma.slug);
    
                            tabList.append(smaTab);
                            tabContent.append(tab);
                            n++;
                        });
                    }

                    if (d.smk != null && d.smk.length) {
                        tabList.append('<h4 class="mt-2">SMK</h4>');

                        d.smk.forEach(smk => {
                            let abb = 'smk' + smk.jalur.replace(/ +/g, "");
    
                            var smkTab = generateTabListHtml(n == 0, abb, smk.kode, smk.jalur);
                            var tab = generateTabContentHtml(n == 0, abb, smk.jalur, smk.info, start.getDate(), start.getMonth(), end.getDate(), end.getMonth(), end.getFullYear(), isNotExpired, smk.slug);
    
                            tabList.append(smkTab);
                            tabContent.append(tab);
                            n++;
                        });
                    }
                },
                error: function(xhr, status, error) {
                console.error('Failed to get data.', status, error);
                }
            });

            function isCurrentTimeInRange(startTime, endTime) {
                var currentTime = new Date();
            
                var startHours = parseInt(startTime.split(":")[0]);
                var startMinutes = parseInt(startTime.split(":")[1]);
            
                var endHours = parseInt(endTime.split(":")[0]);
                var endMinutes = parseInt(endTime.split(":")[1]);
            
                var startDate = new Date();
                startDate.setHours(startHours, startMinutes);
            
                var endDate = new Date();
                endDate.setHours(endHours, endMinutes);
            
                return currentTime >= startDate && currentTime <= endDate;
            }  

            function generateTabListHtml(n, abb, code, track) {
                return `
                <li class="nav-item">
                <a class="nav-link ${n ? 'active' : ''}" id="${abb}" data-bs-toggle="pill" href="#reg${abb}" role="tab" aria-expanded="${n == 0 ? 'true' : 'false'}">
                    ${icons.get(code)}
                    <span class="fw-bold">${track}</span>
                </a>
                </li>`;
            }

            function generateTabContentHtml(n, abb, track, body, sdate, smonth, edate, emonth, eyear, isNotExpired, slug) {
                let btn = '';

                if (isRegis === 'n') {
                if (isNotExpired) {
                    btn = `<a href="/pendaftaran/jalur/${slug}" class="btn btn-success">Daftar jalur ini</a>`;
                } else {
                    btn = `<button class="btn btn-outline-secondary disabled">Daftar jalur ini</button>`;
                }
                }

                return `
                <div class="tab-pane ${n ? 'active' : ''}" id="reg${abb}" role="tabpanel" aria-labelledby="${abb}" aria-expanded="${n ? 'true' : ''}">
                <div class="card">
                    <div class="card-body">
                    <h3 class="mb-2">Apa itu Jalur ${track}?</h3>

                    ${body}
                    </div>
                    <div class="card-footer border-top-0">
                    <div class="d-flex align-items-center">
                        <p class="text-warning mb-0 me-auto">Jadwal: ${sdate} ${months[smonth]} - ${edate} ${months[emonth]} ${eyear}</p>
                        
                        ${btn}
                    </div>
                    </div>
                </div>
                </div>`;
            }
            });
    </script>
@endpush