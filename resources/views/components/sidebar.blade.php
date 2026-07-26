<div class="bg-light border-end vh-100 p-3">

    <h5 class="mb-4 fw-bold text-primary">
        MENU
    </h5>

    <div class="list-group">

        <a href="{{ route('dashboard') }}"
           class="list-group-item list-group-item-action {{ request()->routeIs('dashboard') ? 'active' : '' }}">

            🏠 Dashboard

        </a>

        <a href="{{ route('guru.index') }}"
           class="list-group-item list-group-item-action {{ request()->routeIs('guru.*') ? 'active' : '' }}">

            👨‍🏫 Data Guru

        </a>

        <a href="{{ route('absensi.index') }}"
           class="list-group-item list-group-item-action {{ request()->routeIs('absensi.*') ? 'active' : '' }}">

            📝 Absensi

        </a>

        <a href="#"
           class="list-group-item list-group-item-action">

            📊 Laporan

        </a>

        <a href="{{ route('pengaturan.index') }}"
           class="list-group-item list-group-item-action {{ request()->routeIs('pengaturan.*') ? 'active' : '' }}">

            ⚙️ Pengaturan

        </a>

    </div>

</div>