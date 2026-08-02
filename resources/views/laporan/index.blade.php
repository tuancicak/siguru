@extends('layouts.operator')

@section('content')

<div class="card shadow border-0">

    <div class="card-header bg-primary text-white">

        <h4 class="mb-0">
            📊 Laporan Absensi Guru
        </h4>

    </div>

    <div class="card-body">

        <form method="GET" action="{{ route('laporan.index') }}">

            <div class="row">

                <div class="col-md-4 mb-3">

                    <label class="form-label">

                        Bulan

                    </label>

                    <input
                        type="month"
                        name="bulan"
                        class="form-control"
                        value="{{ request('bulan') }}">

                </div>

                <div class="col-md-4 mb-3">

                    <label class="form-label">

                        Guru

                    </label>

                    <select name="guru" class="form-select">

                        <option value="">

                            Semua Guru

                        </option>

                        @foreach($gurus as $guru)

                            <option
                                value="{{ $guru->id }}"
                                {{ request('guru') == $guru->id ? 'selected' : '' }}>

                                {{ $guru->nama }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="col-md-4 d-flex align-items-end">

                    <button
                        class="btn btn-primary w-100">

                        🔍 Tampilkan

                    </button>

                </div>

            </div>

        </form>

        <hr>

        <div class="row mt-4">

            <div class="col-md-2 mb-3">

                <div class="card shadow border-0 border-start border-4 border-primary">

                    <div class="card-body text-center">

                        <h6 class="text-muted mb-2">

                            👨 Total Guru

                        </h6>

                        <h2 class="fw-bold text-primary">

                            {{ $totalGuru }}

                        </h2>

                    </div>

                </div>

            </div>

            <div class="col-md-2 mb-3">

                <div class="card shadow border-0 border-start border-4 border-secondary">

                    <div class="card-body text-center">

                        <h6 class="text-muted mb-2">

                            📅 Total Absensi

                        </h6>

                        <h2 class="fw-bold text-secondary">

                            {{ $totalAbsensi }}

                        </h2>

                    </div>

                </div>

            </div>

            <div class="col-md-2 mb-3">

                <div class="card shadow border-0 border-start border-4 border-success">

                    <div class="card-body text-center">

                        <h6 class="text-muted mb-2">

                            ✅ Hadir

                        </h6>

                        <h2 class="fw-bold text-success">

                            {{ $totalHadir }}

                        </h2>

                    </div>

                </div>

            </div>

            <div class="col-md-3 mb-3">

                <div class="card shadow border-0 border-start border-4 border-warning">

                    <div class="card-body text-center">

                        <h6 class="text-muted mb-2">

                            ⏰ Terlambat

                        </h6>

                        <h2 class="fw-bold text-warning">

                            {{ $totalTerlambat }}

                        </h2>

                    </div>

                </div>

            </div>

            <div class="col-md-3 mb-3">

                <div class="card shadow border-0 border-start border-4 border-danger">

                    <div class="card-body text-center">

                        <h6 class="text-muted mb-2">

                            🏥 Izin / Sakit

                        </h6>

                        <h2 class="fw-bold text-danger">

                            {{ $totalIzin }}

                        </h2>

                    </div>

                </div>

            </div>

        </div>

        <div class="card shadow border-0 mb-4">

            <div class="card-header bg-white">

                <h5 class="mb-0">

                    📊 Grafik Statistik Kehadiran

                </h5>

            </div>

            <div class="card-body">

                <canvas id="chartAbsensi" height="100"></canvas>

            </div>

        </div>

        <div class="alert alert-info">

            Pilih bulan kemudian tekan
            <strong>Tampilkan</strong>

        </div>
        @if(isset($absensis) && $absensis->count())

        <a href="{{ route('laporan.pdf', request()->query()) }}" class="btn btn-danger mb-3">

                📄 Export PDF

        </a>

        <table class="table table-bordered table-striped mt-4">

            <thead class="table-dark">

                <tr>

                    <th>Tanggal</th>

                    <th>Guru</th>

                    <th>Status</th>

                    <th>Jam Masuk</th>

                    <th>Jam Pulang</th>

                </tr>

            </thead>

            <tbody>

                @foreach($absensis as $item)

                <tr>

                    <td>{{ $item->tanggal }}</td>

                    <td>{{ $item->guru->nama }}</td>

                    <td>{{ $item->status }}</td>

                    <td>{{ $item->jam_masuk }}</td>

                    <td>{{ $item->jam_pulang }}</td>

                </tr>

                @endforeach

            </tbody>

        </table>

        @endif

    </div>

</div>

<script>

const ctx = document.getElementById('chartAbsensi');

new Chart(ctx, {

    type: 'pie',

    data: {

        labels: [

            'Hadir',

            'Terlambat',

            'Izin / Sakit'

        ],

        datasets: [{

            data: [

                {{ $totalHadir }},

                {{ $totalTerlambat }},

                {{ $totalIzin }}

            ],

            backgroundColor: [

                '#198754',

                '#ffc107',

                '#dc3545'

            ],

            borderWidth: 1

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

@endsection