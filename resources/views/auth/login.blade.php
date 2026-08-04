@extends('layouts.guest')

@section('content')

<div class="text-center mb-4">

    <h2 class="fw-bold">
        Selamat Datang 👋
    </h2>

    <p class="text-muted">
        Silakan login untuk masuk ke Dashboard SIGURU
    </p>

</div>

@if(session('status'))

<div class="alert alert-success">

    {{ session('status') }}

</div>

@endif

<form method="POST" action="{{ route('login') }}">

    @csrf

    <div class="mb-3">

        <label class="form-label fw-semibold">

            Email

        </label>

        <input
            type="email"
            name="email"
            class="form-control form-control-lg"
            value="{{ old('email') }}"
            required
            autofocus>

        @error('email')

            <small class="text-danger">

                {{ $message }}

            </small>

        @enderror

    </div>

    <div class="mb-4">

        <label class="form-label fw-semibold">

            Password

        </label>

        <input
            type="password"
            name="password"
            class="form-control form-control-lg"
            required>

        @error('password')

            <small class="text-danger">

                {{ $message }}

            </small>

        @enderror

    </div>

    <div class="form-check mb-4">

        <input
            class="form-check-input"
            type="checkbox"
            name="remember"
            id="remember">

        <label
            class="form-check-label"
            for="remember">

            Ingat Saya

        </label>

    </div>

    <button
        class="btn btn-primary btn-lg w-100">

        <i class="bi bi-box-arrow-in-right me-2"></i>

        Masuk ke Dashboard

    </button>

</form>

@endsection