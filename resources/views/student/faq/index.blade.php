@extends('layouts.student.auth')

@section('styles')
    <link type="text/css" href="/app-assets/css/pages/page-faq.css" rel="stylesheet">
@endsection

@section('content')
    <div class="content-body">
        {{-- search header --}}
        <section id="faq-search-filter">
            <div class="card faq-search" style="background-image: url('../../../app-assets/images/banner/banner.png')">
                <div class="card-body text-center">

                    {{-- search input --}}
                    <form class="faq-search-input">
                        <div class="input-group input-group-merge">
                            <div class="input-group-text">
                                <x-tabler-search style="width: 16px; height: 16px;" />
                            </div>
                            <input class="form-control" id="search" name="search" type="text" placeholder="Cari pertanyaan kamu di sini..." />
                            <x-button id="searchBtn" type="button">Cari</x-button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        {{-- /search header --}}

        {{-- icon and header --}}
        <div class="d-flex align-items-center">
            <div class="avatar avatar-tag bg-light-primary me-1" style="width: 3.5rem; height: 3.5rem;">
                <x-tabler-pencil-minus />
            </div>
            <div>
                <h4 class="mb-0"><span class="d-none d-md-block">Frequently Asked Questions</span><span class="d-sm-none">FAQ</span></h4>
                <span class="d-md-block d-none">Daftar pertanyaan dan jawaban yang sering ditanyakan pada masa PPDB Sulawesi Selatan 2024</span>
            </div>
        </div>

        {{-- loader --}}
        <x-loader key="loader" />
        
        {{-- frequent answer and question  collapse --}}
        <div class="accordion accordion-margin my-2" id="accordionSection"></div>
    </div>
@endsection

@push('scripts')
    {{-- <script src="/js/student/pages/faq/index.js"></script> --}}
    <script>
        $(function() {
            'use strict';

            var searchBtn = $('#searchBtn'),
                loader = $('#loader'),
                section = $('#accordionSection');

            function getData(search) {
                loader.show();
                $.ajax({
                    url: '/faq/get-data',
                    method: 'GET',
                    data: {
                        search: search
                    },
                    dataType: 'json',
                    success: function(data) {
                        displayData(data.data);
                        loader.addClass('d-none');
                    },
                    error: function(xhr, status, error) {
                        console.error('Failed get data.', status, error);
                        loader.addClass('d-none');
                    }
                });
            }

            function generateHtml(n, q, a) {
                return `
                <div class="card accordion-item">
                    <h2 class="accordion-header" id="faq${n}">
                        <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq-${n}" role="button" aria-expanded="false" aria-controls="faq-${n}">
                            ${q}
                        </button>
                    </h2>

                    <div class="collapse accordion-collapse" id="faq-${n}" aria-labelledby="faq${n}" data-bs-parent="#accordionSection">
                        <div class="accordion-body">
                            ${a}
                        </div>
                    </div>
                </div>`;
            }

            function displayData(data) {
                let n = 1;
                section.html('');
                if (data.length) {
                data.forEach(d => {
                    section.append(generateHtml(n++, d.question, d.answer));
                });
                } else {
                    section.html('<p class="text-center">Tidak ada data ditemukan.</p>')
                }
            }

            getData('');

            searchBtn.click(function() {
                let search = $('#search').val();
                getData(search);
            });

            $('#search').keypress(function(event) {
                if (event.which === 13) {
                event.preventDefault();

                searchBtn.click();
                }
            });
        });
    </script>
@endpush
