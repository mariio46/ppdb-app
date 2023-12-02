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
                <a href="/pendaftaran">Pendaftaran</a>
              </li>
              <li class="breadcrumb-item active">
                Pendaftaran Tahap <span id="bcTahap"></span>
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
          {{--  --}}
          {{-- <div class="tab-pane active" id="regSmaBoardingSchool" role="tabpanel" aria-labelledby="smaBoardingSchool" aria-expanded="true">
            <div class="card">
              <div class="card-body">
                boarding
              </div>
            </div>
          </div>

          <div class="tab-pane" id="regSmaAffirmation" role="tabpanel" aria-labelledby="smaAffirmation" aria-expanded="false">
            <div class="card">
              <div class="card-body">
                afirmasi
              </div>
            </div>
          </div> --}}
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    var code = '{{ $phase_code ?? 0 }}';
  </script>
  <script src="/js/student/pages/registration/phase-v1.1.0.js"></script>
@endpush
