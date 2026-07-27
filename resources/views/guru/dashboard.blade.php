@extends('layouts.guru')

@section('content')

<div class="container">

    <h2 class="mb-4">

        Dashboard Guru

    </h2>

    <h5 class="mb-4">

        Selamat datang,
        <strong>{{ auth()->user()->name }}</strong> 👋

    </h5>

    <div class="row">

        <div class="col-md-4 mb-3">

            <div class="card shadow-sm">

                <div class="card-body text-center">

                    <h5>📅 Hari Ini</h5>

                    <h4>

                        {{ now()->translatedFormat('l, d F Y') }}

                    </h4>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-3">

            <div class="card shadow-sm">

                <div class="card-body text-center">

                    <h5>🕒 Jam Sekarang</h5>

                    <h2 id="clock"></h2>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-3">

            <div class="card shadow-sm">

                <div class="card-body text-center">

                    <h5>📋 Status Absensi</h5>

                    @if($absensiHariIni)

                        @if($absensiHariIni->status == 'Hadir')

                            <h4 class="text-success">

                                ✅ Hadir

                            </h4>

                        @elseif($absensiHariIni->status == 'Terlambat')

                            <h4 class="text-warning">

                                ⏰ Terlambat

                            </h4>

                        @else

                            <h4>

                                {{ $absensiHariIni->status }}

                            </h4>

                        @endif

                    @else

                        <h4 class="text-danger">

                            Belum Absen

                        </h4>

                    @endif

                    @if($absensiHariIni)

                        <hr>

                        <p class="mb-1">

                            <strong>🕒 Jam Masuk :</strong><br>

                            {{ $absensiHariIni->jam_masuk }}

                        </p>

                        @if($absensiHariIni->jam_pulang)

                            <p class="mb-0">

                                <strong>🏁 Jam Pulang :</strong><br>

                                {{ $absensiHariIni->jam_pulang }}

                            </p>

                        @endif

                    @endif

                </div>

            </div>

        </div>

    </div>

    <div class="text-center mt-4">

        @if(session('success'))

            <div class="alert alert-success">

                {{ session('success') }}

            </div>

        @endif

        @if(session('error'))

            <div class="alert alert-danger">

                {{ session('error') }}

            </div>

        @endif

        @if(!$absensiHariIni)

        <form action="{{ route('guru.absen-masuk') }}" method="POST">

            @csrf

            <button class="btn btn-success btn-lg">

                🟢 Absen Masuk

            </button>

        </form>

        @elseif(!$absensiHariIni->jam_pulang)

        <form action="{{ route('guru.absen-pulang') }}" method="POST">

            @csrf

            <button class="btn btn-danger btn-lg">

                🔴 Absen Pulang

            </button>

        </form>

        @else

        <button class="btn btn-secondary btn-lg" disabled>

            ✔ Absensi Hari Ini Selesai

        </button>

        @endif

    </div>

</div>

<script>

function updateClock(){

    const now = new Date();

    document.getElementById("clock").innerHTML =
        now.toLocaleTimeString('id-ID');

}

setInterval(updateClock,1000);

updateClock();

</script>

@endsection