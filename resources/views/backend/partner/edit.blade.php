@extends('backend.dashboard')
@section('title','Partner Update')
@section('body')
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Edit Partner</h3>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('partners.update', $partner->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mt-3">
                                <label for="" class="col-md-4">Name<span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" name="name" value="{{ $partner->name }}" class="form-control" />
                                </div>
                            </div>

                            <div class="row mt-3">
                                <label for="" class="col-md-4">Image<span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="file" name="photo" class="form-control" accept="image/*" />
                                    <br>
                                    @if($partner->photo)
                                    <img src="{{ asset('storage/' . $partner->photo) }}" alt="" style="height: 80px;"><br>
                                    @endif
                                </div>
                            </div>

                            <div class="card mt-3">
                                <div class="card-body">
                                    <div class="mt_35">
                                        <div class="row">
                                            <div class="col-md-12 mb-3 form-group">
                                                <a class="btn btn-danger" href="{{ route('partners.index') }}">Cancel</a>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

