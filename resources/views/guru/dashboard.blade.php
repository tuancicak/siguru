@extends('layouts.guru')

@section('content')

<div class="container">

    <div class="bg-primary text-white rounded-4 p-4 shadow mb-4">

        <div class="card-body text-white p-4"
            style="background: linear-gradient(135deg,#2563eb,#1d4ed8);">

            <div class="row align-items-center">

                <div class="col-md-9">

                    <h2 class="fw-bold mb-2">
                        👋 Halo, {{ auth()->user()->name }}
                    </h2>

                    <p class="mb-2">
                        Selamat datang di Sistem Informasi Guru (SIGURU)
                    </p>

                    <small class="opacity-75">
                        {{ now()->translatedFormat('l, d F Y') }}
                    </small>

                </div>

                <div class="col-md-3 text-end">

                    <i class="bi bi-person-workspace"
                    style="font-size:70px;"></i>

                </div>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-md-4 mb-3">

            <div class="card shadow-sm border-0 border-start border-4 border-primary">

                <div class="card-body text-center">

                    <h5>
                        <i class="bi bi-calendar-event-fill text-primary"></i>
                        Hari Ini
                    </h5>

                    <h4>

                        {{ now()->translatedFormat('l, d F Y') }}

                    </h4>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-3">

            <div class="card shadow-sm border-0 border-start border-4 border-success">

                <div class="card-body text-center">

                    <h5>
                        <i class="bi bi-clock-fill text-success"></i>
                        Jam Sekarang
                    </h5>

                    <h2 id="clock"></h2>

                </div>

            </div>

        </div>

        <div class="col-md-4 mb-3">

            <div class="card shadow-sm border-0 border-start border-4 border-warning">

                <div class="card-body text-center">

                    <h5>
                        <i class="bi bi-clipboard-check-fill text-warning"></i>
                        Status Absensi
                    </h5>

                    @if($absensiHariIni)

                        @if($absensiHariIni->status == 'Hadir')

                            <span class="badge bg-success fs-6 px-4 py-2">
                                <i class="bi bi-check-circle-fill"></i>
                                Hadir
                            </span>

                        @elseif($absensiHariIni->status == 'Terlambat')

                            <span class="badge bg-warning text-dark fs-6 px-4 py-2">
                                <i class="bi bi-alarm-fill"></i>
                                Terlambat
                            </span>

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

<form id="absenForm"
      action="{{ route('guru.absen-masuk') }}"
      method="POST">

    @csrf

    <input type="hidden" name="latitude" id="latitude">
    <input type="hidden" name="longitude" id="longitude">
    <input type="hidden" name="selfie" id="selfie">

    <button
        type="button"
        id="btnAbsen"
        class="btn btn-success btn-lg w-100 rounded-4 shadow py-3">

        🟢 Absen Masuk

    </button>

</form>

        @elseif(!$absensiHariIni->jam_pulang)

        <form action="{{ route('guru.absen-pulang') }}" method="POST">

            @csrf

            <button class="btn btn-danger btn-lg w-100 rounded-4 shadow py-3">

                🔴 Absen Pulang

            </button>

        </form>

        @else

        <button class="btn btn-secondary btn-lg w-100">

            ✔ Absensi Hari Ini Selesai

        </button>

        @endif

    </div>

        <div class="card shadow-sm mt-5">

        <div class="card-header bg-white">

            <i class="bi bi-clock-history"></i>
            Riwayat Absensi Terakhir

        </div>

        <div class="card-body">

            @forelse($riwayat as $item)

                <div class="d-flex justify-content-between border-bottom py-2">

                    <div>

                        <strong>

                            {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}

                        </strong>

                        <br>

                        <small>

                            {{ $item->status }}

                        </small>

                    </div>

                    <div class="text-end">

                        <small>

                            {{ $item->jam_masuk }}

                        </small>

                        <br>

                        <small>

                            {{ $item->jam_pulang ?? '-' }}

                        </small>

                    </div>

                </div>

            @empty

                <p class="text-muted mb-0">

                    Belum ada riwayat absensi.

                </p>

            @endforelse

        </div>

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

<script>

const form = document.getElementById("formAbsen");

if(form){

    form.addEventListener("submit",function(e){

        e.preventDefault();

        if(!navigator.geolocation){

            alert("Browser tidak mendukung GPS");

            return;

        }

        navigator.geolocation.getCurrentPosition(function(position){

            document.getElementById("latitude").value =
                position.coords.latitude;

            document.getElementById("longitude").value =
                position.coords.longitude;

            form.submit();

        },function(){

            alert("Aktifkan GPS terlebih dahulu.");

        });

    });

}

</script>

<div class="modal fade" id="cameraModal" tabindex="-1">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">

                    📷 Selfie Absensi

                </h5>

            </div>

            <div class="modal-body text-center">

                <video
                    id="video"
                    autoplay
                    playsinline
                    class="w-100 rounded">
                </video>

                <canvas
                    id="canvas"
                    class="d-none">
                </canvas>

            </div>

            <div class="modal-footer">

                <button
                    class="btn btn-primary"
                    id="capture">

                    📸 Ambil Foto

                </button>

            </div>

        </div>

    </div>

</div>

<script>

const modal = new bootstrap.Modal(document.getElementById('cameraModal'));

const video = document.getElementById('video');

const canvas = document.getElementById('canvas');

let stream;

document.getElementById('btnAbsen').onclick = async function(){

    modal.show();

    stream = await navigator.mediaDevices.getUserMedia({

        video:{
            facingMode:"user"
        }

    });

    video.srcObject = stream;

}

</script>

<script>

document.getElementById('capture').onclick = function(){

    const context = canvas.getContext('2d');

    canvas.width = video.videoWidth;

    canvas.height = video.videoHeight;

    context.drawImage(video,0,0);

    const image = canvas.toDataURL('image/jpeg',0.8);

    document.getElementById('selfie').value = image;

    stream.getTracks().forEach(track=>track.stop());

    modal.hide();

    ambilLokasi();

}

</script>

<script>

function ambilLokasi(){

    if(!navigator.geolocation){

        alert("Browser tidak mendukung GPS");

        return;

    }

    navigator.geolocation.getCurrentPosition(

        function(pos){

            document.getElementById('latitude').value =
                pos.coords.latitude;

            document.getElementById('longitude').value =
                pos.coords.longitude;

            document.getElementById('absenForm').submit();

        },

        function(){

            alert("GPS tidak dapat diakses.");

        }

    );

}

</script>

@endsection