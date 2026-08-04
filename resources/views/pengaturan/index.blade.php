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

                <hr class="my-4">

                <h5 class="fw-bold mb-3">
                    🔐 Keamanan Absensi
                </h5>

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Latitude Sekolah

                        </label>

                        <input
                            type="text"
                            name="latitude"
                            class="form-control"
                            value="{{ old('latitude',$pengaturan->latitude) }}">

                        <button type="button" class="btn btn-outline-primary mt-2" onclick="ambilLokasi()">

                        📍 Ambil Lokasi Sekolah

                        </button>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label">

                            Longitude Sekolah

                        </label>

                        <input
                            type="text"
                            name="longitude"
                            class="form-control"
                            value="{{ old('longitude',$pengaturan->longitude) }}">

                    </div>

                </div>

                <div class="mb-4">

                    <label class="form-label">

                        Radius Absensi (Meter)

                    </label>

                    <input
                        type="number"
                        name="radius"
                        class="form-control"
                        value="{{ old('radius',$pengaturan->radius ?? 100) }}">

                </div>

                <div class="form-check form-switch mb-2">

                    <input
                        class="form-check-input"
                        type="checkbox"
                        name="use_gps"
                        {{ $pengaturan->use_gps ? 'checked' : '' }}>

                    <label class="form-check-label">

                        Gunakan GPS

                    </label>

                </div>

                <div class="form-check form-switch mb-2">

                    <input
                        class="form-check-input"
                        type="checkbox"
                        name="use_selfie"
                        {{ $pengaturan->use_selfie ? 'checked' : '' }}>

                    <label class="form-check-label">

                        Wajib Selfie Saat Absen

                    </label>

                </div>

                <div class="form-check form-switch mb-2">

                    <input
                        class="form-check-input"
                        type="checkbox"
                        name="use_device"
                        {{ $pengaturan->use_device ? 'checked' : '' }}>

                    <label class="form-check-label">

                        Validasi Device

                    </label>

                </div>

                <div class="form-check form-switch mb-4">

                    <input
                        class="form-check-input"
                        type="checkbox"
                        name="use_working_hours"
                        {{ $pengaturan->use_working_hours ? 'checked' : '' }}>

                    <label class="form-check-label">

                        Gunakan Jam Kerja

                    </label>

                </div>

                <button class="btn btn-primary">

                    💾 Simpan

                </button>

            </form>

        </div>

    </div>

</div>

<script>

function ambilLokasi(){

    if(!navigator.geolocation){

        alert('Browser tidak mendukung GPS');

        return;

    }

    navigator.geolocation.getCurrentPosition(

        function(position){

            document.querySelector('[name=latitude]').value =
                position.coords.latitude;

            document.querySelector('[name=longitude]').value =
                position.coords.longitude;

            alert('Lokasi berhasil diambil.');

        },

        function(){

            alert('Gagal mengambil lokasi.');

        }

    );

}

</script>

@endsection