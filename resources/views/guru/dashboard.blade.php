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

                    <h4 class="text-danger">

                        Belum Absen

                    </h4>

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

        <form action="{{ route('guru.absen-masuk') }}" method="POST">

            @csrf

            <button class="btn btn-success btn-lg">

                🟢 Absen Masuk

            </button>

        </form>

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