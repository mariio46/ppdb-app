@extends('layouts.has-role.auth', ['title' => 'Dashboard'])

@section('content')
    @dump($session)
    {{-- {{ session()->get() }} --}}
    {{-- @dump($role) --}}
@endsection
