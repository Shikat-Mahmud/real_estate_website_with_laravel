@extends('backend.dashboard')
@section('title','Create Property Purpose')
@section('body')
<div class="container mt-5">
    <form action="{{ route('status.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <h3>Add Property Purpose</h3>
                    <div class="col-md-6">
                        <div class="mb-3 form-group">
                        <label for="" class="col-md-4"> Name<span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body">
                <div class="mt_35">
                    <div class="row">
                        <div class="col-md-12 mb-3 form-group d-flex gap-1 btnpy">
                            <a class="btn btn-danger" href="{{ route('status.index') }}">Cancel</a>
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