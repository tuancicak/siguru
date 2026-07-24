<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGURU</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">

    <div class="container">

        <a class="navbar-brand fw-bold" href="/">
            SIGURU
        </a>

        <div class="ms-auto">

            <span class="text-white">
                Operator
            </span>

        </div>

    </div>

</nav>

<div class="container py-4">

    @yield('content')

</div>

</body>
</html>