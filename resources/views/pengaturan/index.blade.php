@extends('layouts.operator')

@section('content')

<div class="container">

    <h2 class="mb-4">
        ⚙️ Pengaturan Sekolah
    </h2>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <div class="card shadow-sm">

        <div class="card-body">

            <form action="{{ route('pengaturan.store') }}" method="POST">

                @csrf

                <div class="mb-3">

                    <label>Nama Sekolah</label>

                    <input
                        type="text"
                        name="nama_sekolah"
                        class="form-control"
                        value="{{ old('nama_sekolah', $pengaturan->nama_sekolah ?? '') }}"
                    >

                </div>

                <div class="mb-3">

                    <label>Jam Masuk</label>

                    <input
                        type="time"
                        name="jam_masuk"
                        class="form-control"
                        value="{{ old('jam_masuk', $pengaturan->jam_masuk ?? '') }}"
                    >

                </div>

                <div class="mb-3">

                    <label>Jam Pulang</label>

                    <input
                        type="time"
                        name="jam_pulang"
                        class="form-control"
                        value="{{ old('jam_pulang', $pengaturan->jam_pulang ?? '') }}"
                    >

                </div>

                <div class="mb-3">

                    <label>Batas Terlambat</label>

                    <input
                        type="time"
                        name="batas_terlambat"
                        class="form-control"
                        value="{{ old('batas_terlambat', $pengaturan->batas_terlambat ?? '') }}"
                    >

                </div>

                <button class="btn btn-primary">

                    💾 Simpan

                </button>

            </form>

        </div>

    </div>

</div>

@endsection