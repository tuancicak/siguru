<div class="bg-dark text-white vh-100 shadow-lg p-3">

    <div class="text-center mb-4">

        @php
            $pengaturan = \App\Models\Pengaturan::first();
        @endphp

        @if($pengaturan && $pengaturan->logo)

            <img
                src="{{ asset('storage/'.$pengaturan->logo) }}"
                width="80"
                class="rounded-circle shadow mb-3">

        @endif

        <h5 class="fw-bold text-warning mb-1">

            {{ $pengaturan->nama_sekolah ?? 'SIGURU' }}

        </h5>

        <small class="text-secondary">

            Sistem Informasi Guru

        </small>

    </div>

    <hr class="border-secondary">

    <div class="text-center text-white mb-3">

        <small>

            Login sebagai

        </small>

        <h6 class="mb-0">

            {{ Auth::user()->name }}

        </h6>

    </div>

    <div class="list-group list-group-flush">

        <a href="{{ route('dashboard') }}"
           class="list-group-item list-group-item-action border-0 rounded mb-2
           {{ request()->routeIs('dashboard') ? 'active' : 'bg-dark text-white' }}">

            <i class="bi bi-house-door-fill me-2"></i>
                Dashboard

        </a>

        <a href="{{ route('guru.index') }}"
           class="list-group-item list-group-item-action border-0 rounded mb-2
           {{ request()->routeIs('guru.*') ? 'active' : 'bg-dark text-white' }}">

            <i class="bi bi-people-fill me-2"></i>
                Data Guru

        </a>

        <a href="{{ route('absensi.index') }}"
           class="list-group-item list-group-item-action border-0 rounded mb-2
           {{ request()->routeIs('absensi.*') ? 'active' : 'bg-dark text-white' }}">

            <i class="bi bi-clipboard-check-fill me-2"></i>
                Absensi

        </a>

        <a href="#"
           class="list-group-item list-group-item-action border-0 rounded mb-2 bg-dark text-white">

            <i class="bi bi-bar-chart-fill me-2"></i>
                Laporan

        </a>

        <a href="{{ route('pengaturan.index') }}"
           class="list-group-item list-group-item-action border-0 rounded mb-2
           {{ request()->routeIs('pengaturan.*') ? 'active' : 'bg-dark text-white' }}">

            <i class="bi bi-gear-fill me-2"></i>
                Pengaturan

        </a>

    </div>

    <div class="mt-5">

        <form action="{{ route('logout') }}" method="POST">

            @csrf

            <button class="btn btn-danger w-100">

                <i class="bi bi-box-arrow-right me-2"></i>

                Logout

            </button>

        </form>

    </div>

</div>