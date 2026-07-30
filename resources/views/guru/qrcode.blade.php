@extends('layouts.operator')

@section('content')

<div class="container">

    <div class="card shadow">

        <div class="card-body text-center">

            <h3>{{ $guru->nama }}</h3>

            <p>{{ $guru->nip }}</p>

            <hr>

            {!! QrCode::size(250)->generate($guru->qr_code) !!}

            <div class="mt-4">

                <a href="{{ route('guru.index') }}"
                   class="btn btn-secondary">

                    Kembali

                </a>

            </div>

        </div>

    </div>

</div>

@endsection