@extends('frontend.master')
@section('title', 'Edit Profile')
@section('content')


<div class="container">
    <div class="main-body">
        <div class="row">

            @include('profile.partials.profile-sidebar')

            <div class="col-lg-8">
                <form method="post" action="{{ url('/profile_update') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="row mt-3">
                                <label for="name" class="col-md-4"> Name <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input name="name" type="text" value="{{$users->name}}" class="form-control" required />
                                </div>
                            </div>

                            <div class="row mt-3">
                                <label for="email" class="col-md-4"> Email <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input name="email" type="email" value="{{$users->email}}" class="form-control" required />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="" class="col-md-4"> Phone</label>
                                <div class="col-md-8">
                                    <input type="phone" name="phone" class="form-control"  value="{{$users->phone}}"/>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <label for="photo" class="col-md-4"> Photo</label>
                                <div class="col-md-8">
                                    <input type="file" name="photo" class="form-control" accept="image/*"/>
                                </div>
                            </div>
                            <div class="row mt-3">
                            <label for="" class="col-md-4"> Address</label>
                            <div class="col-md-8">
                            <input type="address" name="address" class="form-control"  value="{{$users->address}}"/>
                            </div>
                        </div>

                            <br>
                            <div class="row">
                                <div class="col-sm-6"></div>
                                <div class="col-sm-9 text-secondary">
                                    <a class="btn btn-danger" href="{{ route('user-dashboard') }}">Cancel</a>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                </form>
            </div>

            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif

        </div>
    </div>
</div>
</div>

@endsection