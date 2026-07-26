@extends('layouts.operator')

@section('content')

<div class="container">

    <h2 class="mb-4">
        Dashboard Guru
    </h2>

    <div class="card">

        <div class="card-body">

            <h4>Selamat Datang, {{ auth()->user()->name }} 👋</h4>

            <p class="mb-0">
                Silakan melakukan absensi hari ini.
            </p>

        </div>

    </div>

</div>

@endsection