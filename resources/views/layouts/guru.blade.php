<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>SIGURU - Guru</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body class="bg-light">

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-2 p-0">

                @include('layouts.sidebar-guru')

            </div>

            <div class="col-md-10">

                <nav class="navbar navbar-light bg-white shadow-sm px-4">

                    <span class="fw-bold fs-5">
                        Dashboard Guru
                    </span>

                    <div class="d-flex align-items-center gap-3">

                        <span class="fw-semibold">
                            👋 {{ auth()->user()->name }}
                        </span>

                        <form action="{{ route('logout') }}" method="POST" class="m-0">
                            @csrf

                            <button type="submit" class="btn btn-danger btn-sm">
                                🚪 Logout
                            </button>
                        </form>

                    </div>

                </nav>

                <div class="p-4">

                    @yield('content')

                </div>

            </div>

                <div class="card-body text-center">

                    <h5 class="mb-3">
                        📊 Statistik Saya
                    </h5>

                    <h3 class="text-success mb-0">
                        {{ $totalHadir }}
                    </h3>

                    <small class="text-muted">
                        Total Hadir
                    </small>

                    <hr>

                    <h3 class="text-warning mb-0">
                        {{ $totalTerlambat }}
                    </h3>

                    <small class="text-muted">
                        Total Terlambat
                    </small>

                </div>

            </div>

        </div>

        </div>

    </div>

    <style>

    .card{
        transition:.25s;
    }

    .card:hover{
        transform:translateY(-5px);
        box-shadow:0 .7rem 1.4rem rgba(0,0,0,.15)!important;
    }

    </style>

</body>
</html>