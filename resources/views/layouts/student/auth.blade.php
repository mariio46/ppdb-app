@extends('base', ['title' => $title ?? 'Auth'])

@section('body')
    @include('layouts.student.partials.header')

    @include('layouts.student.partials.sidebar')

    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            @yield('content')
        </div>
    </div>

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0">
            <span class="float-md-start d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2024<a class="ms-25" href="/" target="_blank">Labkraf.id</a>
                <span class="d-none d-sm-inline-block">, All rights Reserved</span>
            </span>
            <span class="float-md-end d-none d-md-block">versi 2.0.0</span>
        </p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->
@endsection
