@extends('layouts.operator')

@section('content')

<h2 class="mb-4">Data Absensi Guru</h2>

<form method="GET"
      action="{{ route('absensi.index') }}"
      class="row g-3 mb-4">

    <div class="col-md-3">

        <input
            type="date"
            name="tanggal"
            class="form-control"
            value="{{ request('tanggal') }}">

    </div>

    <div class="col-md-4">

        <input
            type="text"
            name="nama"
            class="form-control"
            placeholder="Cari nama guru..."
            value="{{ request('nama') }}">

    </div>

    <div class="col-md-2">

        <button class="btn btn-primary w-100">

            🔍 Filter

        </button>

    </div>

    <div class="col-md-2">

        <a href="{{ route('absensi.index') }}"
           class="btn btn-secondary w-100">

            Reset

        </a>

    </div>

</form>

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
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($absensis as $absensi)

                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $absensi->guru->nama }}</td>
                        <td>
                            {{ \Carbon\Carbon::parse($absensi->tanggal)->translatedFormat('d F Y') }}
                        </td>
                        <td>{{ $absensi->jam_masuk }}</td>
                        <td>
                            {{ $absensi->jam_pulang ?? '-' }}
                        </td>
                        <td>
                            @if($absensi->status == 'Hadir')

                                <span class="badge bg-success">
                                    Hadir
                                </span>

                            @elseif($absensi->status == 'Terlambat')

                                <span class="badge bg-warning text-dark">
                                    Terlambat
                                </span>

                            @elseif($absensi->status == 'Izin')

                                <span class="badge bg-info">
                                    Izin
                                </span>

                            @elseif($absensi->status == 'Sakit')

                                <span class="badge bg-primary">
                                    Sakit
                                </span>

                            @else

                                <span class="badge bg-danger">
                                    Alfa
                                </span>

                            @endif

                        </td>

                        <td>

                            <a href="{{ route('absensi.edit', $absensi) }}"
                            class="btn btn-primary btn-sm">

                                ✏ Edit

                            </a>

                        </td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="7" class="text-center">
                            Belum ada data absensi.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>
</div>

@endsection