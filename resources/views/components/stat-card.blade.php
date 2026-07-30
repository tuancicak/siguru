<div class="col-lg-4 col-md-6 mb-4">

    <div class="card h-100">

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <small class="text-muted">

                        {{ $title }}

                    </small>

                    <h2 class="fw-bold mt-2">

                        {{ $value }}

                    </h2>

                    <small class="text-{{ $color }}">

                        {{ $subtitle }}

                    </small>

                </div>

                <i class="bi bi-{{ $icon }}
                    text-{{ $color }}"
                    style="font-size:55px;"></i>

            </div>

        </div>

    </div>

</div>