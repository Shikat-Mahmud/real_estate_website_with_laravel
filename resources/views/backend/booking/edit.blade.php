@extends('backend.dashboard')
@section('title','Property Booking Edit')
@section('body')
<div class="container mt-5">
    <form action="{{ route('booking.update', $bookProperty->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <h3>Edit Booking List</h3>
                
                    <div class="col-mt-3">
                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <select class="form-control" id="book_status" name="book_status" required>
                                <option value="Pending" {{ $bookProperty->status === 'Pending' ? 'selected' : '' }}>Pending
                                </option>
                                <option value="Accepted" {{ $bookProperty->status === 'Accepted' ? 'selected' : '' }}>Accepted
                                </option>
                                <option value="Rejected" {{ $bookProperty->status === 'Rejected' ? 'selected' : '' }}>Rejected
                                </option>
                                </select>
                            </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="card mt-3">
            <div class="card-body">
                <div class="mt_35">
                    <div class="row">
                        <div class="col-md-12 mb-3 form-group">
                            <a class="btn btn-danger" href="{{ route('booking.details') }}">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@push('script')

@endpush