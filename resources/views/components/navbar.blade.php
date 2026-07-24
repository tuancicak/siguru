<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">

    <div class="container-fluid">

        <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">
            SIGURU
        </a>

        <div class="ms-auto d-flex align-items-center">

            <span class="text-white me-3">
                Halo, {{ Auth::user()->name }}
            </span>

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button class="btn btn-light btn-sm">
                    Logout
                </button>

            </form>

        </div>

    </div>

</nav>