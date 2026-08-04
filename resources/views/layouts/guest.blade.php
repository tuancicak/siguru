<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SIGURU - Sistem Informasi Guru</title>

    <link rel="preconnect" href="https://fonts.bunny.net">

    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet"/>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body class="font-sans antialiased min-h-screen"
      style="background:linear-gradient(135deg,#2563eb,#1e3a8a);">

    @php
        $pengaturan = \App\Models\Pengaturan::first();
    @endphp

    <div class="min-vh-100 d-flex justify-content-center align-items-center
        style="background:linear-gradient(135deg,#2563eb,#1e3a8a);">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-md-5">

                    <div class="text-center mb-4 text-white">

                        @if($pengaturan && $pengaturan->logo)

                            <img
                                src="{{ asset('storage/'.$pengaturan->logo) }}"
                                width="90"
                                class="mb-3 rounded-circle shadow">

                        @endif

                        <h2 class="fw-bold">

                            {{ $pengaturan->nama_sekolah ?? 'SIGURU' }}

                        </h2>

                        <p class="mb-0 opacity-75">

                            Sistem Informasi Absensi Guru

                        </p>

                    </div>

                    <div class="card border-0 shadow-lg rounded-4">

                        <div class="card-body p-5">

                            @yield('content')

                        </div>

                    </div>

                    <div class="text-center text-white mt-4">

                        <small>

                            © {{ date('Y') }} SIGURU

                        </small>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>