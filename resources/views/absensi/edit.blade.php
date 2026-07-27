@extends('layouts.operator')

@section('content')

<h2 class="mb-4">
    Edit Absensi Guru
</h2>

<div class="card shadow-sm">

    <div class="card-body">

        <form action="{{ route('absensi.update', $absensi) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label class="form-label">Nama Guru</label>

                <input
                    type="text"
                    class="form-control"
                    value="{{ $absensi->guru->nama }}"
                    readonly>

            </div>

            <div class="mb-3">

                <label class="form-label">Tanggal</label>

                <input
                    type="text"
                    class="form-control"
                    value="{{ \Carbon\Carbon::parse($absensi->tanggal)->translatedFormat('d F Y') }}"
                    readonly>

            </div>

            <div class="mb-3">

                <label class="form-label">Jam Masuk</label>

                <input
                    type="time"
                    name="jam_masuk"
                    class="form-control"
                    value="{{ $absensi->jam_masuk }}">

            </div>

            <div class="mb-3">

                <label class="form-label">Jam Pulang</label>

                <input
                    type="time"
                    name="jam_pulang"
                    class="form-control"
                    value="{{ $absensi->jam_pulang }}">

            </div>

            <div class="mb-3">

                <label class="form-label">Status</label>

                <select
                    name="status"
                    class="form-select">

                    @foreach (['Hadir','Terlambat','Izin','Sakit','Alfa'] as $status)

                        <option
                            value="{{ $status }}"
                            {{ $absensi->status == $status ? 'selected' : '' }}>

                            {{ $status }}

                        </option>

                    @endforeach

                </select>

            </div>

            <button class="btn btn-success">

                💾 Simpan Perubahan

            </button>

            <a href="{{ route('absensi.index') }}"
               class="btn btn-secondary">

                Batal

            </a>

        </form>

    </div>

</div>

@endsection