@extends('layouts.auth', ['title' => 'Dashboard'])

@section('content')
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card text-center">
            <div class="card-header">
                Auth Layout
            </div>
            <div class="card-body">
                <h5 class="card-title">Dashboard</h5>
                <p class="card-text">You're at dashboard page using auth layouts.</p>
                <a class="btn btn-primary" href={{ route('home') }}>Go somewhere</a>
            </div>
            <div class="card-footer text-body-secondary">
                2 days ago
            </div>
        </div>
    </div>
@endsection
