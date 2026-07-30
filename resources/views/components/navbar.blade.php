<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">

    <div class="container-fluid">

        <div>

            <h4 class="mb-0 fw-bold text-primary">

                SIGURU

            </h4>

            <small class="text-muted">

                Sistem Informasi Guru

            </small>

        </div>

        <div class="ms-auto text-end">

            <div class="fw-semibold">

                👋 Selamat datang,

                {{ Auth::user()->name }}

            </div>

            <small class="text-muted">

                {{ now()->translatedFormat('l, d F Y') }}

            </small>

        </div>

    </div>

</nav>