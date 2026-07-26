@extends('layouts.operator')

@section('content')

<h2 class="mb-4">Data Absensi Guru</h2>

<div class="card">
    <div class="card-body">

        <table class="table table-bordered">

            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Nama Guru</th>
                    <th>Tanggal</th>
                    <th>Jam Masuk</th>
                    <th>Jam Pulang</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>

                @forelse($absensis as $absensi)

                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $absensi->guru->nama }}</td>
                        <td>{{ $absensi->tanggal }}</td>
                        <td>{{ $absensi->jam_masuk }}</td>
                        <td>{{ $absensi->jam_pulang }}</td>
                        <td>{{ $absensi->status }}</td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="6" class="text-center">
                            Belum ada data absensi.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>
</div>

@endsection