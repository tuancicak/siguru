@extends('layouts.operator')

@section('content')

<div class="bg-primary text-white rounded-4 p-4 shadow mb-4">

    <div class="d-flex align-items-center">

        @if($pengaturan && $pengaturan->logo)

            <img
                src="{{ asset('storage/'.$pengaturan->logo) }}"
                width="80"
                class="me-3 rounded">

        @endif

        <div>

            <h2 class="mb-1">

                Dashboard Operator

                <small class="d-block mt-2 fs-6">

                    Ringkasan aktivitas absensi guru hari ini.

                </small>

            </h2>

            <h5 class="mb-0">

                {{ $pengaturan->nama_sekolah ?? 'SIGURU' }}

            </h5>

        </div>

    </div>

</div>

<div class="row">

    <x-stat-card
        title="Total Guru"
        :value="$totalGuru"
        subtitle="Guru Terdaftar"
        icon="people-fill"
        color="primary"/>

    <x-stat-card
        title="Absensi Hari Ini"
        :value="$totalAbsensi"
        subtitle="Guru Sudah Absen"
        icon="clipboard-check-fill"
        color="success"/>

    <x-stat-card
        title="Guru Terlambat"
        :value="$totalTerlambat"
        subtitle="Hari Ini"
        icon="alarm-fill"
        color="danger"/>

</div>

@endsection