@extends('backend.dashboard')
@section('title','Property Purpose Edit')
@section('body')
<div class="container mt-5">
    <form action="{{route('status.update',['id'=>$property_statuses->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <h3>Edit Purpose</h3>
                    <div class="col-md-12">
                        <div class="mb-3 form-group">
                        <label for="" class="col-md-4">Name<span class="text-danger">*</span></label>
                        <input type="text" name="name" value="{{  $property_statuses->name }}" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-3 form-group">
                        <a class="btn btn-danger" href="{{ route('status.index') }}">Cancel</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>


@endsection

@push('script')

@endpush