@extends('layouts.operator')

@section('content')

<div class="bg-primary text-white rounded-4 p-4 shadow mb-4">

    <div class="d-flex justify-content-between align-items-center">

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
             <div class="text-end">

                <h3 class="fw-bold mb-0" id="clock"></h3>

                <small id="today"></small>

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

<div class="row mt-4">

    <div class="col-lg-8">

        <div class="card shadow-sm h-100">

            <div class="card-header bg-white">

                <h5 class="mb-0">
                    📈 Grafik Kehadiran 7 Hari Terakhir
                </h5>

            </div>

            <div class="card-body">

                <canvas id="grafikAbsensi" height="100"></canvas>

            </div>

        </div>

    </div>

    <div class="col-lg-4">

        <div class="card shadow-sm h-100">

            <div class="card-header bg-white">

                <h5 class="mb-0">
                    🥧 Status Kehadiran Hari Ini
                </h5>

            </div>

            <div class="card-body">

                <canvas id="statusChart"></canvas>

            </div>

        </div>

    </div>

</div>

<div class="row mt-4">

    <div class="col-lg-6">

        <div class="card shadow-sm h-100">

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

    </div>

    <div class="col-lg-6">

        <div class="card shadow-sm h-100">

            <div class="card-header bg-white">

                <h5 class="mb-0">
                    📋 Aktivitas Hari Ini
                </h5>

            </div>

            <div class="card-body">

                @if($aktivitasHariIni->count())

                    <div class="list-group list-group-flush">

                        @foreach($aktivitasHariIni as $item)

                            <div class="list-group-item">

                                <div class="d-flex justify-content-between">

                                    <div>

                                        @if($item->status == 'Terlambat')

                                            🟡

                                        @else

                                            🟢

                                        @endif

                                        <strong>{{ $item->guru->nama }}</strong>

                                        <br>

                                        <small class="text-muted">

                                            {{ $item->status }}

                                        </small>

                                    </div>

                                    <small>

                                        {{ substr($item->jam_masuk,0,5) }}

                                    </small>

                                </div>

                            </div>

                        @endforeach

                    </div>

                @else

                    <div class="alert alert-light mb-0">

                        Belum ada aktivitas hari ini.

                    </div>

                @endif

            </div>

        </div>

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

<script>

function updateClock(){

    const now = new Date();

    document.getElementById('clock').innerHTML =
        now.toLocaleTimeString('id-ID');

    document.getElementById('today').innerHTML =
        now.toLocaleDateString('id-ID',{
            weekday:'long',
            day:'numeric',
            month:'long',
            year:'numeric'
        });

}

updateClock();

setInterval(updateClock,1000);

</script>

@endsection