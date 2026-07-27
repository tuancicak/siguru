@extends('layouts.operator')

@section('content')

<h2 class="mb-4">
    Dashboard
</h2>

<div class="alert alert-success">

    Selamat datang,
    <strong>{{ Auth::user()->name }}</strong> 👋

</div>

@if($pengaturan)

<div class="alert alert-primary">

    🏫 <strong>{{ $pengaturan->nama_sekolah }}</strong>

</div>

@endif

<div class="row">

    <div class="col-md-4 mb-3">

        <div class="card shadow-sm border-start border-primary border-4">

            <div class="card-body">

                <h6 class="text-muted">👨‍🏫 Total Guru</h6>

                <h2>{{ $totalGuru }}</h2>

            </div>

        </div>

    </div>

    <div class="col-md-4 mb-3">

        <div class="card shadow-sm border-start border-success border-4">

            <div class="card-body">

                <h6 class="text-muted">📝 Absensi Hari Ini</h6>

                <h2>{{ $totalAbsensi }}</h2>

            </div>

        </div>

    </div>

    <div class="col-md-4 mb-3">

        <div class="card shadow-sm border-start border-danger border-4">

            <div class="card-body">

                <h6 class="text-muted">⏰ Terlambat</h6>

                <h2>{{ $totalTerlambat }}</h2>

            </div>

        </div>

    </div>

    <div class="col-md-4 mb-3">

        <div class="card shadow-sm border-start border-info border-4">

            <div class="card-body">

                <h6 class="text-muted">🏁 Sudah Pulang</h6>

                <h2>{{ $totalPulang }}</h2>

            </div>

        </div>

    </div>

    <div class="col-md-4 mb-3">

        <div class="card shadow-sm border-start border-warning border-4">

            <div class="card-body">

                <h6 class="text-muted">🏫 Masih di Sekolah</h6>

                <h2>{{ $masihDiSekolah }}</h2>

            </div>

        </div>

    </div>

</div>

@endsection