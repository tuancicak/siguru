<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGURU</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body class="bg-light">

    @include('components.navbar')

    <div class="container-fluid">

        <div class="row g-0">

            <div class="col-lg-2">

                @include('components.sidebar')

            </div>

            <div class="col-lg-10">

                <main class="p-4">

                    @yield('content')

                </main>

                @include('components.footer')

            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>
</html>