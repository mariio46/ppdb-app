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
                <i data-feather="search"></i>
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

    {{-- frequent answer and question  collapse --}}
    <div class="accordion accordion-margin my-2" id="accordionSection"></div>
  </div>
@endsection

@push('scripts')
  <script src="/js/student/pages/faq/index.js"></script>
@endpush
