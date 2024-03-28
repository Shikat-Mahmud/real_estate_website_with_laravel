@extends('backend.dashboard')
@section('title','Admin Dashboard')
@section('body')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card" style="color: #fff; background: #dd7f2c;">
                <div class="card-body overview" style="margin: 20px;">
                    <div class="card-box dash-card dcard-1">
                        <div>
                            <div>
                                <h1 class="card--title">{{ $totalProperties }}</h1>
                                <h5>Total Properties</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card" style="color: #fff; background: #2865e0;">
                <div class="card-body overview" style="margin: 20px;">
                    <div class="card-box dash-card dcard-2">
                        <div>
                            <div>
                                <h1 class="card--title">{{ $totalUsers }}</h1>
                                <h5>Total Customers</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card" style="color: #fff; background: #397e74;">
                <div class="card-body overview" style="margin: 20px;">
                    <div class="card-box dash-card dcard-3">
                        <div>
                            <div>
                                <h1 class="card--title">{{ $totalBookProperties }}</h1>
                                <h5>Total Booking</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@push('scripts')
    <!-- Link your CSS file -->
    <link rel="stylesheet" href="{{ asset('backend/css/styles.css') }}">

    <!-- Link your JS file -->
    <script src="{{ asset('backend/js/scripts.js') }}"></script>
@endpush
