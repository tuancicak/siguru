<!DOCTYPE html>
<html>

    <head>

        <meta charset="UTF-8">

        <style>

            body{

                font-family: DejaVu Sans, sans-serif;
                font-size:12px;

            }

            .header{

                text-align:center;
                margin-bottom:20px;

            }

            .logo{

                width:70px;
                margin-bottom:10px;

            }

            h2{

                margin:0;

            }

            table{

                width:100%;
                border-collapse:collapse;
                margin-top:15px;

            }

            table,th,td{

                border:1px solid black;

            }

            th{

                background:#f2f2f2;

            }

            th,td{

                padding:6px;

            }

            .footer{

                margin-top:40px;
                text-align:right;

            }

        </style>

    </head>

    <body>

        <div class="header">

            @if($pengaturan && $pengaturan->logo)

            <img
            src="{{ public_path('storage/'.$pengaturan->logo) }}"
            class="logo">

            @endif

            <h2>

            {{ $pengaturan->nama_sekolah ?? 'SIGURU' }}

            </h2>

            <p>

            {{ $pengaturan->alamat ?? '' }}

            </p>

            <hr>

            <h3>

            LAPORAN ABSENSI GURU

            </h3>

            <br>

            <table style="border:none; width:100%; margin-bottom:15px;">

                <tr style="border:none;">

                <td style="border:none;">

                <b>Periode</b>

                </td>

                <td style="border:none;">

                :

                {{ request('bulan') ?: 'Semua Data' }}

                </td>

                </tr>

                <tr style="border:none;">

                <td style="border:none;">

                <b>Tanggal Cetak</b>

                </td>

                <td style="border:none;">

                :

                {{ now()->translatedFormat('d F Y') }}

                </td>

                </tr>

            </table>

        </div>

        <table style="width:45%; margin-bottom:20px;">

            <tr>
                <td><b>Total Guru</b></td>
                <td>{{ $totalGuru }}</td>
            </tr>

            <tr>
                <td><b>Total Absensi</b></td>
                <td>{{ $totalAbsensi }}</td>
            </tr>

            <tr>
                <td><b>Hadir</b></td>
                <td>{{ $totalHadir }}</td>
            </tr>

            <tr>
                <td><b>Terlambat</b></td>
                <td>{{ $totalTerlambat }}</td>
            </tr>

            <tr>
                <td><b>Izin / Sakit</b></td>
                <td>{{ $totalIzin }}</td>
            </tr>

        </table>

        <table>

            <thead>

                <tr>

                <th>No</th>

                <th>Tanggal</th>

                <th>Guru</th>

                <th>Status</th>

                <th>Jam Masuk</th>

                <th>Jam Pulang</th>

            </tr>

            </thead>

            <tbody>

                @foreach($absensis as $item)

                <tr>

                <td>{{ $loop->iteration }}</td>

                <td>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</td>

                <td>{{ $item->guru->nama }}</td>

                <td>{{ $item->status }}</td>

                <td>{{ $item->jam_masuk }}</td>

                <td>{{ $item->jam_pulang }}</td>

                </tr>

                @endforeach

            </tbody>

        </table>

        <div class="footer">

            Nganjuk,

            {{ now()->translatedFormat('d F Y') }}

            <br><br><br><br>

            <b>

            {{ auth()->user()->name }}

            </b>

            <br>

            Operator

        </div>

    </body>

</html>