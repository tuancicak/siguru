<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGURU</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav class="navbar navbar-dark bg-primary">
        <div class="container">
            <span class="navbar-brand mb-0 h1">SIGURU</span>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="text-center">
            <h1>Selamat Datang</h1>

            <p class="text-muted">
                Sistem Informasi Guru
            </p>
        </div>

        <div class="row mt-5">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-body text-center">
                        <h5>Guru</h5>
                        <h2>20</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-body text-center">
                        <h5>Hadir</h5>
                        <h2>18</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-body text-center">
                        <h5>Belum Hadir</h5>
                        <h2>2</h2>
                    </div>
                </div>
            </div>

        </div>

    </div>
    
</body>
</html>