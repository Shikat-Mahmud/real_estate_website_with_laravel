@extends('backend.dashboard')
@section('title','Amenitie Create')
@section('body')
<div class="container mt-5">
    <form action="{{ route('amenities.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <h3>Add Amenitie</h3>
                    <div class="col-md-6">
                        <div class="mb-3 form-group">
                            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                class="form-control" placeholder="Amenitie Name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 form-group">
                            <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                            <select class="form-control" id="status" name="status" required>
                            <option value="1">Avaiable</option>
                            <option value="0">Not avaiable</option>
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
                            <button type="submit" class="btn btn-primary">Submit</button>
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