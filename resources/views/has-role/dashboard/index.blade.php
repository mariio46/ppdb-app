@extends('layouts.has-role.auth', ['title' => 'Dashboard'])

@section('content')
@dump($session)
@endsection
