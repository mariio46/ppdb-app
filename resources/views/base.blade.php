<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ? $title . ' / ' . config('app.name') : config('app.name') }}</title>

        {{-- Font --}}
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

        {{-- Vendor CSS --}}
        <link type="text/css" href="/app-assets/vendors/css/vendors.min.css" rel="stylesheet">
        <link type="text/css" href="/app-assets/vendors/css/extensions/toastr.min.css" rel="stylesheet">
        @yield('vendorStyles')

        {{-- Theme CSS --}}
        <link type="text/css" href="/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="/css/bootstrap-extended.min.css" rel="stylesheet">
        <link type="text/css" href="/css/colors.min.css" rel="stylesheet">
        <link type="text/css" href="/css/components.min.css" rel="stylesheet">

        {{-- Page CSS --}}
        <link type="text/css" href="/app-assets/css/core/menu/menu-types/vertical-menu.min.css" rel="stylesheet">
        <link type="text/css" href="/app-assets/css/plugins/extensions/ext-component-toastr.css" rel="stylesheet">
        @yield('styles')

        {{-- Custom CSS --}}
        <link type="text/css" href="/css/style.css" rel="stylesheet">
        <link type="text/css" href="/css/student/style.css" rel="stylesheet">

        <!-- Vite Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">
        <!-- Page -->
        @yield('body')
        <!-- /Page -->

        {{-- Vendor JS --}}
        <script src="/app-assets/vendors/js/vendors.min.js"></script>
        <script src="/app-assets/vendors/js/extensions/toastr.min.js"></script>

        {{-- Page Vendor JS --}}
        @yield('vendorScripts')

        {{-- Theme JS --}}
        <script src="/app-assets/js/core/app-menu.min.js"></script>
        <script src="/app-assets/js/core/app.min.js"></script>
        <script src="/js/student/global.js"></script>

        @stack('scripts')

        <script>
            $(window).on('load', function() {
                var stat = "{{ session()->get('stat') }}",
                    msg = "{{ session()->get('msg') }}",
                    toast_title = '';

                if (feather) {
                    feather.replace();
                }

                if (stat !== "") {
                    if (stat == 'success') {
                        toast_title = 'Sukses!';
                    } else if (stat == 'error') {
                        toast_title = 'Gagal!';
                    } else {
                        toast_title = 'Perhatian!';
                    }

                    toastr[stat](msg, toast_title, {
                        positionClass: 'toast-top-right',
                    });
                }
            })
        </script>
    </body>

</html>
