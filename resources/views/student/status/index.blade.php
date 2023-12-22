@extends('layouts.student.auth')

@section('content')
    <section id="statusSection">
        <div class="row">
            <div class="col-12" id="cardSection">
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="/js/student/pages/status/index.js"></script>
@endpush
