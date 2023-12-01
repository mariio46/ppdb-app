@extends('layouts.student.auth')

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body px-5 pt-5">
          <div class="row match-height" id="cardContainer">
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script src="/js/student/pages/registration/index.js"></script>
@endpush
