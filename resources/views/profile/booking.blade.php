@extends('frontend.master')
@section('title', 'My Bookings')
@section('content')


<div class="container">
    <div class="main-body">
        <div class="row">

            @include('profile.partials.profile-sidebar')

            <div class="col-lg-8">
                <div class="card">
                    <h5 style="margin: 10px; text-align:center; color: #6C60FE; font-weight:700;">My Booking Details</h5>

                    <div class="card-body">

                        <table id="myTable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Property Title</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Location</th>
                                    <!-- <th scope="col">Purpose</th> -->
                                    <th scope="col">Amenities</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bookProperties as $booking)
                                @if($booking->user_id == $users->id)
                                <tr>
                                    <td>{{ $booking->property->title }}</td>
                                    <td>{{ formatCurrency($booking->property->price) }}</td>

                                    @foreach($propertyLocation as $location)
                                    @if($location->id == $booking->property->location_id)
                                    <td>{{ $location->name }}</td>
                                    @endif
                                    @endforeach

                                    

                                    <!-- <td>{{ $booking->property->property_status_id }}</td> -->
                                    <td>
                                        <span>
                                            @php
                                            $amenities = json_decode($booking->property->amenities);
                                            @endphp
                                        </span>
                                        @foreach ($amenities ?? [] as $key => $value)
                                            <ul class="amenities-list">
                                                <li>{{getAmenitieName($value) }}</li>
                                            </ul>
                                        @endforeach
                                    </td>

                                    <td>
                                        @if($booking->book_status == 'Pending')
                                        <span class="badge bg-warning">Pending</span>
                                        @elseif($booking->book_status == 'Accepted')
                                        <span class="badge bg-success">Accepted</span>
                                        @else
                                        <span class="badge bg-danger">Rejected</span>
                                        @endif
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection