@extends('backend.dashboard')
@section('title','Property Location Section Settings Edit')
@section('body')
<div class="container mt-5">
    <form action="{{ route('prolocation-section.update', $prolocationsection->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <h3>Edit Property Location Section </h3>
                    <div class="col-md-12 mb-3 form-group">
                        <label for="title">Title: </label>
                        <input name="title" value="{{ $prolocationsection->title }}" class="form-control"
                            id="myeditorinstance">
                    </div>
                    <div class="col-md-12 mb-3 form-group">
                        <label for="subtitle">Sub Title: </label>
                        <input name="subtitle" value="{{ $prolocationsection->subtitle }}" class="form-control"
                            id="myeditorinstance">
                    </div>
                </div>
            </div>
        </div>


        <div class="card mt-3">
            <div class="card-body">
                <div class="mt_35">
                    <div class="row">
                        <div class="col-md-12 mb-3 form-group">
                            <a class="btn btn-danger" href="{{ route('prolocation-section.index') }}">Cancel</a>
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