@extends('backend.dashboard')
@section('title','Privacy Edit')
@section('body')
<div class="container mt-5">

<form action="{{ route('privacy.update', $privacy->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('patch')
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <h3>Edit Privacy and Policy</h3>
                    <div class="col-md-12 mb-3 form-group">
                            <label for="content">Description <span class="text-danger">*</span></label>
                            <textarea name="content" class="form-control" id="myeditorinstance">{{ $privacy->content }}</textarea>
                        </div>
                </div>
            </div>
        </div>

    
        <div class="card mt-3">
            <div class="card-body">
                <div class="mt_35">
                    <div class="row">
                        <div class="col-md-12 mb-3 form-group">
                            <a class="btn btn-danger" href="{{ route('privacy.index') }}">Cancel</a>
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