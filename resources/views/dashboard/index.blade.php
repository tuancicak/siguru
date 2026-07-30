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

<div class="card mt-4">

    <div class="card-body">

        <h5 class="mb-4">

            📋 Ringkasan Hari Ini

        </h5>

        <div class="row text-center">

            <div class="col-md-4">

                <h3 class="text-primary">

                    {{ $totalGuru }}

                </h3>

                <small>Total Guru</small>

            </div>

            <div class="col-md-4">

                <h3 class="text-success">

                    {{ $totalAbsensi }}

                </h3>

                <small>Sudah Absen</small>

            </div>

            <div class="col-md-4">

                <h3 class="text-danger">

                    {{ $belumAbsen }}

                </h3>

                <small>Belum Absen</small>

            </div>

        </div>

    </div>

</div>

<div class="card shadow-sm mt-4">

    <div class="card-header bg-white">

        <h5 class="mb-0">

            📈 Grafik Kehadiran 7 Hari Terakhir

        </h5>

    </div>

    <div class="card-body">

        <canvas id="grafikAbsensi" height="100"></canvas>

    </div>

</div>

<script>

const ctx = document.getElementById('grafikAbsensi');

new Chart(ctx, {

    type: 'line',

    data: {

        labels: [

            @foreach($grafik as $item)

                "{{ \Carbon\Carbon::parse($item->tanggal)->format('d M') }}",

            @endforeach

        ],

        datasets: [{

            label: 'Jumlah Absensi',

            data: [

                @foreach($grafik as $item)

                    {{ $item->total }},

                @endforeach

            ],

            borderWidth: 3,

            tension: 0.3,

            fill: true

        }]

    },

    options: {

        responsive: true,

        plugins: {

            legend: {

                display: true

            }

        }

    }

});

</script>

<div class="card shadow-sm mt-4">

    <div class="card-header bg-white">

        <h5 class="mb-0">

            🥧 Status Kehadiran Hari Ini

        </h5>

    </div>

    <div class="card-body">

        <canvas id="statusChart" height="120"></canvas>

    </div>

</div>

<script>

const statusCtx = document.getElementById('statusChart');

new Chart(statusCtx, {

    type: 'pie',

    data: {

        labels: [

            @foreach($statusChart as $item)

                "{{ $item->status }}",

            @endforeach

        ],

        datasets: [{

            data: [

                @foreach($statusChart as $item)

                    {{ $item->total }},

                @endforeach

            ],

            backgroundColor: [

                '#28a745',
                '#ffc107',
                '#17a2b8',
                '#007bff',
                '#dc3545'

            ]

        }]

    },

    options: {

        responsive: true,

        plugins: {

            legend: {

                position: 'bottom'

            }

        }

    }

});

</script>

<div class="card shadow-sm mt-4">

    <div class="card-header bg-white">

        <h5 class="mb-0">
            👨‍🏫 Guru Belum Absen Hari Ini
        </h5>

    </div>

    <div class="card-body">

        @if($guruBelumAbsen->count())

            <ul class="list-group">

                @foreach($guruBelumAbsen as $guru)

                    <li class="list-group-item d-flex justify-content-between">

                        {{ $guru->nama }}

                        <span class="badge bg-danger">

                            Belum Absen

                        </span>

                    </li>

                @endforeach

            </ul>

        @else

            <div class="alert alert-success mb-0">

                🎉 Semua guru sudah melakukan absensi hari ini.

            </div>

        @endif

    </div>

</div>

@endsection