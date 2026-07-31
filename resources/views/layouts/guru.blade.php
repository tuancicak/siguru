<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>SIGURU - Guru</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

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

    </div>

</div>

</body>
</html>