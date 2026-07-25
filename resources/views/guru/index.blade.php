@extends('layouts.operator')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Data Guru</h2>

    <a href="{{ route('guru.create') }}" class="btn btn-primary">
        + Tambah Guru
    </a>
</div>

@if(session('success'))

    <div class="alert alert-success alert-dismissible fade show">

        {{ session('success') }}

        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

    </div>

@endif

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

            @if($gurus->count() > 0)

                @foreach($gurus as $guru)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $guru->nip }}</td>

                    <td>{{ $guru->nama }}</td>

                    <td>{{ $guru->jabatan }}</td>

                    <td>{{ $guru->no_hp }}</td>

                        <td>
                            <a href="{{ route('guru.edit', $guru->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </td>

                </tr>

                @endforeach

            @else

                <tr>

                    <td colspan="6" class="text-center">

                        Belum ada data guru.

                    </td>

                </tr>

            @endif

            </tbody>

        </table>

    </div>

</div>

@endsection