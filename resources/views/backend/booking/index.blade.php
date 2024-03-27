@extends('backend.dashboard')
@section('title','Booking List')
@section('body')

<div class="container mt-5">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <i class="fas fa-table me-1"></i>
                Booking List
            </div>
            <!-- <div>
                <a href="{{ route('status.create') }}" class="btn btn-primary btn-sm">Create new book</a>
            </div> -->
        </div>

        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>User Name</th>
                        <th>Property Id</th>
                        <th>Property Title</th>
                        <th>Property Location</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookProperties as $booking)
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->user->name }}</td>
                        <td>{{ $booking->property->propertyid }}</td>
                        <td>{{ $booking->property->title }}</td>

                        @foreach($propertyLocation as $location)
                        @if($location->id == $booking->property->location_id)
                        <td>{{ $location->name }}</td>
                        @endif
                        @endforeach

                        <td>
                            @if($booking->book_status == 'Pending')
                            <span class="badge bg-warning">Pending</span>
                            @elseif($booking->book_status == 'Accepted')
                            <span class="badge bg-success">Accepted</span>
                            @else
                            <span class="badge bg-danger">Rejected</span>
                            @endif
                        </td>

                        <td>
                            <div class="d-flex">
                                <a class="btn btn-info btn-sm me-2"
                                    href="{{ route('booking.edit', $booking->id) }}">Edit Status</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
@endsection

@push('script')

@endpush