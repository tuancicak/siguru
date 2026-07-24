<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGURU</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    @include('components.navbar')

    <div class="container-fluid">

        <div class="row">

            <div class="col-md-2 p-0">

                @include('components.sidebar')

            </div>

            <div class="col-md-10 p-4">

                @yield('content')

                @include('components.footer')

            </div>

        </div>

    </div>

</body>
</html>