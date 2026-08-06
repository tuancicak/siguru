@extends('layouts.operator')

@section('content')

<div class="card shadow">

    <div class="card-header">

        <h4>

            Detail Absensi Guru

        </h4>

    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-md-4 text-center">

                @if($absensi->selfie)

                    <img
                        src="{{ asset('storage/'.$absensi->selfie) }}"
                        class="img-fluid rounded shadow">

                @endif

            </div>

            <div class="col-md-8">

                <table class="table">

                    <tr>

                        <th>Nama Guru</th>

                        <td>{{ $absensi->guru->nama }}</td>

                    </tr>

                    <tr>

                        <th>Tanggal</th>

                        <td>{{ $absensi->tanggal }}</td>

                    </tr>

                    <tr>

                        <th>Status</th>

                        <td>{{ $absensi->status }}</td>

                    </tr>

                    <tr>

                        <th>Jam Masuk</th>

                        <td>{{ $absensi->jam_masuk }}</td>

                    </tr>

                    <tr>

                        <th>Jam Pulang</th>

                        <td>{{ $absensi->jam_pulang ?? '-' }}</td>

                    </tr>

                    <tr>

                        <th>Latitude</th>

                        <td>{{ $absensi->latitude }}</td>

                    </tr>

                    <tr>

                        <th>Longitude</th>

                        <td>{{ $absensi->longitude }}</td>

                    </tr>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection