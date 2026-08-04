@php
    $pengaturan = \App\Models\Pengaturan::first();
@endphp

<div class="bg-dark text-white d-flex flex-column vh-100 shadow-lg p-4">

    {{-- Logo --}}
    <div class="text-center mb-4">

        @if($pengaturan && $pengaturan->logo)

            <img
                src="{{ asset('storage/'.$pengaturan->logo) }}"
                width="75"
                class="rounded-circle shadow border border-2 border-light mb-3">

        @endif

        <h5 class="fw-bold text-warning mb-1">
            {{ $pengaturan->nama_sekolah ?? 'SIGURU' }}
        </h5>

        <small class="text-secondary">
            Sistem Informasi Guru
        </small>

    </div>

    {{-- User --}}
    <div class="bg-secondary bg-opacity-25 rounded-4 p-3 mb-4">

        <div class="d-flex align-items-center">

            <div class="bg-primary rounded-circle d-flex justify-content-center align-items-center"
                style="width:50px;height:50px;">

                <i class="bi bi-person-fill fs-4"></i>

            </div>

            <div class="ms-3">

                <small class="text-secondary">

                    Login sebagai

                </small>

                <div class="fw-bold">

                    {{ Auth::user()->name }}

                </div>

            </div>

        </div>

    </div>

    {{-- Menu --}}
    <div class="list-group list-group-flush flex-grow-1">

        <a href="{{ route('dashboard') }}"
            class="list-group-item list-group-item-action border-0 rounded-3 mb-2 {{ request()->routeIs('dashboard') ? 'active' : 'bg-dark text-white' }}">

            <i class="bi bi-grid-fill me-2"></i>

            Dashboard

        </a>

        <a href="{{ route('guru.index') }}"
            class="list-group-item list-group-item-action border-0 rounded-3 mb-2 {{ request()->routeIs('guru.*') ? 'active' : 'bg-dark text-white' }}">

            <i class="bi bi-people-fill me-2"></i>

            Data Guru

        </a>

        <a href="{{ route('absensi.index') }}"
            class="list-group-item list-group-item-action border-0 rounded-3 mb-2 {{ request()->routeIs('absensi.*') ? 'active' : 'bg-dark text-white' }}">

            <i class="bi bi-calendar-check-fill me-2"></i>

            Absensi

        </a>

        <a href="{{ route('laporan.index') }}"
            class="list-group-item list-group-item-action border-0 rounded-3 mb-2 {{ request()->routeIs('laporan.*') ? 'active' : 'bg-dark text-white' }}">

            <i class="bi bi-bar-chart-fill me-2"></i>

            Laporan

        </a>

        <a href="{{ route('pengaturan.index') }}"
            class="list-group-item list-group-item-action border-0 rounded-3 mb-2 {{ request()->routeIs('pengaturan.*') ? 'active' : 'bg-dark text-white' }}">

            <i class="bi bi-gear-fill me-2"></i>

            Pengaturan

        </a>

    </div>

    {{-- Footer --}}
    <div class="mt-4">

        <small class="text-secondary d-block text-center mb-3">

            SIGURU v1.0

        </small>

        <form action="{{ route('logout') }}" method="POST">

            @csrf

            <button class="btn btn-outline-danger w-100 rounded-3">

                <i class="bi bi-box-arrow-right me-2"></i>

                Logout

            </button>

        </form>

    </div>

</div>