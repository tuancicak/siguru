<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">

    <style>

        body{

            font-family: DejaVu Sans;

            font-size:12px;

        }

        table{

            width:100%;

            border-collapse:collapse;

        }

        table,th,td{

            border:1px solid black;

        }

        th,td{

            padding:6px;

            text-align:left;

        }

        h2{

            text-align:center;

        }

    </style>

</head>

<body>

<div style="text-align:center;">

    <h2 style="margin-bottom:0;">

        {{ $pengaturan->nama_sekolah }}

    </h2>

    <p style="margin-top:5px;">

        {{ $pengaturan->alamat }}

    </p>

    <hr>

    <h3>

        LAPORAN ABSENSI GURU

    </h3>

    <p>

        Tanggal Cetak :
        {{ \Carbon\Carbon::now()->locale('id')->translatedFormat('d F Y H:i') }}

    </p>

</div>

<table>

<thead>

<tr>

<th>No</th>

<th>Guru</th>

<th>Tanggal</th>

<th>Masuk</th>

<th>Pulang</th>

<th>Status</th>

</tr>

</thead>

<tbody>

@foreach($absensis as $absensi)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $absensi->guru->nama }}</td>

<td>{{ $absensi->tanggal }}</td>

<td>{{ $absensi->jam_masuk }}</td>

<td>{{ $absensi->jam_pulang }}</td>

<td>{{ $absensi->status }}</td>

</tr>

@endforeach

</tbody>

</table>
<br><br>

<div style="text-align:right;">

    Operator,

    <br><br><br>

    _______________________

</div>

</body>

</html>