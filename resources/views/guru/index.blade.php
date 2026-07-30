@extends('layouts.operator')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-1">

            <i class="bi bi-people-fill text-primary"></i>

            Data Guru

        </h2>

        <small class="text-muted">

            Kelola seluruh data guru yang terdaftar.

        </small>

    </div>

    <a href="{{ route('guru.create') }}"
       class="btn btn-primary shadow-sm rounded-pill px-4">

        <i class="bi bi-plus-circle me-2"></i>

        Tambah Guru

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

        <table class="table table-hover align-middle">

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
                            <a href="{{ route('guru.edit', $guru->id) }}" class="btn btn-outline-warning btn-sm rounded-pill">
                                Edit
                            </a>
                            
                            <a href="{{ route('guru.qrcode', $guru->id) }}" class="btn btn-outline-primary btn-sm rounded-pill">

                                QR Code

                            </a>

                            <form action="{{ route('guru.destroy', $guru->id) }}"
                                method="POST"
                                class="d-inline"
                                onsubmit="return confirm('Yakin ingin menghapus guru ini?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill">
                                    Hapus
                                </button>

                                <a href="{{ route('guru.qrcode', $guru->id) }}"


                            </form>
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