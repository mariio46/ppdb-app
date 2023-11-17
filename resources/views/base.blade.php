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

        {{-- Theme CSS --}}
        <link type="text/css" href="/app-assets/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="/app-assets/css/bootstrap-extended.min.css" rel="stylesheet">
        <link type="text/css" href="/app-assets/css/colors.min.css" rel="stylesheet">
        <link type="text/css" href="/app-assets/css/components.min.css" rel="stylesheet">

        {{-- Page CSS --}}
        <link type="text/css" href="/app-assets/css/core/menu/menu-types/vertical-menu.min.css" rel="stylesheet">
        @yield('styles')

        {{-- Custom CSS --}}
        <link type="text/css" href="/css/style.css" rel="stylesheet">
        <link type="text/css" href="/app-assets/css/custom-style.css" rel="stylesheet">

        <!-- Vite Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">
        <!-- Page -->
        @yield('body')
        <!-- /Page -->

        {{-- Vendor JS --}}
        <script src="/app-assets/vendors/js/vendors.min.js"></script>

        {{-- Page Vendor JS --}}
        @yield('vendorScripts')

        {{-- Theme JS --}}
        <script src="/app-assets/js/core/app-menu.min.js"></script>
        <script src="/app-assets/js/core/app.min.js"></script>

        @stack('scripts')

        <script>
            $(window).on('load', function() {
                if (feather) {
                    feather.replace();
                }
            })
        </script>
    </body>

</html>
