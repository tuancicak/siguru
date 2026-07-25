@extends('layouts.operator')

@section('content')

<h2 class="mb-4">
    Dashboard
</h2>

<div class="alert alert-success">

    Selamat datang,
    <strong>{{ Auth::user()->name }}</strong> 👋

</div>

<div class="row">

    <div class="col-md-4 mb-3">

        <div class="card shadow-sm">

            <div class="card-body">

                <h5>Total Guru</h5>

                <h1>0</h1>

            </div>

        </div>

    </div>

    <div class="col-md-4 mb-3">

        <div class="card shadow-sm">

            <div class="card-body">

                <h5>Hadir Hari Ini</h5>

                <h1>0</h1>

            </div>

        </div>

    </div>

    <div class="col-md-4 mb-3">

        <div class="card shadow-sm">

            <div class="card-body">

                <h5>Belum Hadir</h5>

                <h1>0</h1>

            </div>

        </div>

    </div>

</div>

@endsection