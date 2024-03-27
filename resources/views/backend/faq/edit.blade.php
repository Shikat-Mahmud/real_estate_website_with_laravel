@extends('backend.dashboard')
@section('title','FAQ Edit')
@section('body')
<div class="container mt-5">
    <form action="{{ route('faqs.update', $faq->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <h3>Edit faq</h3>
                    <div class="col-md-6">
                        <div class="mb-3 form-group">
                            <label for="name" class="form-label">Question <span class="text-danger">*</span></label>
                            <input type="text" name="question" value="{{ $faq->question }}"
                                class="form-control" placeholder="Question" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 form-group">
                            <label for="name" class="form-label">Answer <span class="text-danger">*</span></label>
                            <input type="text" name="answer" value="{{ $faq->answer }}"
                                class="form-control" placeholder="Answer" required>
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="mb-3 form-group">
                            <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                            <select class="form-control" id="status" name="status" required>
                            <option {{ $faq->status == 0 ? 'selected' : '' }} value="0">Active</option>
                            <option {{ $faq->status == 1 ? 'selected' : '' }} value="1">Inactive</option>
                        </select>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12 mb-3 form-group">
                        <a class="btn btn-danger" href="{{ route('faqs.index') }}">Cancel</a>
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