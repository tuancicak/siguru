@extends('layouts.operator')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Data Guru</h2>

    <a href="{{ route('guru.create') }}" class="btn btn-primary">
        + Tambah Guru
    </a>
</div>

<div class="card">

    <div class="card-body">

        <table class="table table-bordered table-hover">

            <thead class="table-primary">

                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>No HP</th>
                    <th width="180">Aksi</th>
                </tr>

            </thead>

            <tbody>

                <tr>

                    <td colspan="6" class="text-center">

                        Belum ada data guru.

                    </td>

                </tr>

            </tbody>

        </table>

    </div>

</div>

@endsection