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

           <form action="{{ route('pengaturan.store') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                <div class="mb-3">
                    <label class="form-label">🏫 Nama Sekolah</label>

                    <input type="text"
                        name="nama_sekolah"
                        class="form-control"
                        value="{{ old('nama_sekolah', $pengaturan->nama_sekolah ?? '') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">📍 Alamat</label>

                    <textarea
                        name="alamat"
                        class="form-control"
                        rows="3">{{ old('alamat', $pengaturan->alamat ?? '') }}</textarea>
                </div>

                <div class="row">

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">☎ Telepon</label>

                            <input type="text"
                                name="telepon"
                                class="form-control"
                                value="{{ old('telepon', $pengaturan->telepon ?? '') }}">

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="mb-3">

                            <label class="form-label">📧 Email</label>

                            <input type="email"
                                name="email"
                                class="form-control"
                                value="{{ old('email', $pengaturan->email ?? '') }}">

                        </div>

                    </div>

                </div>

                <div class="mb-3">

                    <label class="form-label">🌐 Website</label>

                    <input type="text"
                        name="website"
                        class="form-control"
                        value="{{ old('website', $pengaturan->website ?? '') }}">

                </div>

                <div class="row">

                    <div class="col-md-4">

                        <div class="mb-3">

                            <label class="form-label">🕘 Jam Masuk</label>

                            <input type="time"
                                name="jam_masuk"
                                class="form-control"
                                value="{{ old('jam_masuk', $pengaturan->jam_masuk ?? '') }}">

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="mb-3">

                            <label class="form-label">🕓 Jam Pulang</label>

                            <input type="time"
                                name="jam_pulang"
                                class="form-control"
                                value="{{ old('jam_pulang', $pengaturan->jam_pulang ?? '') }}">

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="mb-3">

                            <label class="form-label">⏰ Batas Terlambat</label>

                            <input type="time"
                                name="batas_terlambat"
                                class="form-control"
                                value="{{ old('batas_terlambat', $pengaturan->batas_terlambat ?? '') }}">

                        </div>

                    </div>

                </div>
                <div class="mb-3">

                    <label class="form-label">

                        🖼 Logo Sekolah

                    </label>

                    <input
                        type="file"
                        name="logo"
                        class="form-control">

                    @if(!empty($pengaturan?->logo))

                    <div class="mt-3">

                        <img src="{{ asset('storage/' . $pengaturan->logo) }}"
                            alt="Logo Sekolah"
                            width="120"
                            class="img-thumbnail">

                    </div>

                     @endif

                </div>
                <button class="btn btn-primary">

                    💾 Simpan

                </button>

            </form>

        </div>

    </div>

</div>

@endsection