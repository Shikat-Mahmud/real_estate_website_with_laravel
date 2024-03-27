@extends('backend.dashboard')
@section('title', 'User Details')
@section('body')

<style>
    .text-bold {
        font-weight: bold;
    }
</style>
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h3>Customer Details</h3>
            <br>
            <div class="card-body">
                <div class="row">
                    <div class="card">
                        <div class="row" style="padding: 15px;">

                            <div class="row mt-3">
                                <label for="" class="col-md-4"> Name</label>
                                <div class="col-md-8">
                                    <p for="name">{{ $user->name }}</p>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <label for="" class="col-md-4"> Email</label>
                                <div class="col-md-8">
                                    <p for="email">{{ $user->email }}</p>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="" class="col-md-4"> Phone</label>
                                <div class="col-md-8">
                                    <p for="phone">{{ $user->phone }}</p>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="" class="col-md-4"> Address</label>
                                <div class="col-md-8">
                                    <p for="address">{{ $user->address }}</p>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="" class="col-md-4"> Photo</label>
                                <div class="col-md-8">
                                    <img src="{{ asset('storage/' . $user->photo) }}" alt="Photo">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="row" style="padding: 15px;">

                            @foreach ($bookProperties as $booking)
                            <div class="row">
                                <div class="row mt-3">
                                    <label for="" class="col-md-4"> Property Title</label>
                                    <div class="col-md-8">
                                        <p for="title">{{ $booking->property->title }}</p>
                                    </div>
                                </div>

                                @php
                                $locationDisplayed = false;
                                @endphp

                                @foreach($propertyLocation as $location)
                                @if($location->id == $booking->property->location_id && !$locationDisplayed)
                                <div class="row mt-3">
                                    <label for="" class="col-md-4"> Property Location</label>
                                    <div class="col-md-8">
                                        <p for="location">{{ $location->name }}</p>
                                    </div>
                                </div>
                                @php
                                $locationDisplayed = true;
                                @endphp
                                @endif
                                @endforeach

                                <div class="row mt-3">
                                    <label for="" class="col-md-4"> Booking Status</label>
                                    <div class="col-md-8">
                                        @if($booking->book_status == 'Pending')
                                        <span class="badge bg-warning">Pending</span>
                                        @elseif($booking->book_status == 'Accepted')
                                        <span class="badge bg-success">Accepted</span>
                                        @else
                                        <span class="badge bg-danger">Rejected</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@push('script')

@endpush