<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGURU</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">

        <a class="navbar-brand fw-bold" href="#">
            SIGURU
        </a>

        <div class="ms-auto text-white">
            {{ Auth::user()->name }}
        </div>

    </div>
</nav>

<div class="container-fluid">

    <div class="row">

        <div class="col-md-2 bg-light border-end min-vh-100 p-3">

            <h5>Menu</h5>

            <hr>

            <a href="{{ route('dashboard') }}" class="d-block mb-2">
                Dashboard
            </a>

            <a href="#" class="d-block mb-2">
                Data Guru
            </a>

            <a href="#" class="d-block mb-2">
                Absensi
            </a>

            <a href="#" class="d-block mb-2">
                Laporan
            </a>

        </div>

        <div class="col-md-10 p-4">

            @yield('content')

        </div>

    </div>

</div>

</body>
</html>