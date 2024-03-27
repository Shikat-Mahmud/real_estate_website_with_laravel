@extends('backend.dashboard')
@section('title','Terms and Condition Edit')
@section('body')
<div class="container mt-5">
    <form action="{{ route('term.update', $terms->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <h3>Edit Terms and Condition</h3>
                    <div class="col-md-12 mb-3 form-group">
                            <label for="">Description <span class="text-danger">*</span></label>
                            <textarea name="paragraph" class="form-control" id="myeditorinstance">{{ $terms->paragraph }}</textarea>
                        </div>
                </div>
            </div>
        </div>

        
        <div class="card mt-3">
            <div class="card-body">
                <div class="mt_35">
                    <div class="row">
                        <div class="col-md-12 mb-3 form-group">
                            <a class="btn btn-danger" href="{{ route('term.index') }}">Cancel</a>
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