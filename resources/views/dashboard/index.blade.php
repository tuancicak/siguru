@extends('layouts.app')

@section('content')

<h2 class="mb-4 fw-bold">
    Dashboard
</h2>

<div class="row g-4">

    <div class="col-md-4">

        <div class="card border-0 shadow-sm">

            <div class="card-body">

                <h6 class="text-muted">
                    Total Guru
                </h6>

                <h1>
                    0
                </h1>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card border-0 shadow-sm">

            <div class="card-body">

                <h6 class="text-muted">
                    Hadir Hari Ini
                </h6>

                <h1>
                    0
                </h1>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card border-0 shadow-sm">

            <div class="card-body">

                <h6 class="text-muted">
                    Belum Hadir
                </h6>

                <h1>
                    0
                </h1>

            </div>

        </div>

    </div>

</div>

@endsection