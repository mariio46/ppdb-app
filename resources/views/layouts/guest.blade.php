@extends('base', ['title' => $title ?? 'Guest'])

@section('body')
    <main>
        @yield('content')
    </main>
@endsection
