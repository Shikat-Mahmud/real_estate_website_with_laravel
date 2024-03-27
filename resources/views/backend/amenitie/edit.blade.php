@extends('backend.dashboard')
@section('title','Amenitie Edit')
@section('body')
<div class="container mt-5">
    <form action="{{ route('amenities.update', $amenitie->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <h3>Edit Amenitie</h3>
                    <div class="col-md-6">
                        <div class="mb-3 form-group">
                            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $amenitie->name }}" required>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3 form-group">
                            <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                            <select class="form-control" id="status" name="status" required>
                            <option value="1" {{ $amenitie->status === '1' ? 'selected' : '' }}>Avaiable</option>
                            <option value="0" {{ $amenitie->status === '0' ? 'selected' : '' }}>Not avaiable</option>
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
                            <a class="btn btn-danger" href="{{ route('amenities.index') }}">Cancel</a>
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