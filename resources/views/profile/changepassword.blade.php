@extends('frontend.master')
@section('title', 'Change Password')
@section('content')


<div class="container" style="margin-top: 40px; margin-bottom: 40px;">
    <div class="main-body">
        <div class="row">

            @include('profile.partials.profile-sidebar')

            <div class="col-lg-8">
                <form method="post" action="{{ url('/update_password') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                    
                            <div class="row mt-3">
                                <label for="current_password" class="col-md-4"> Current Password <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input name="current_password" type="password" class="form-control" required />
                                </div>
                            </div>
                    
                            <div class="row mt-3">
                                <label for="new_password" class="col-md-4"> New Password <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input name="new_password" type="password" class="form-control" required />
                                </div>
                            </div>
                    
                            <div class="row mt-3">
                                <label for="new_password_confirmation" class="col-md-4"> Confirm Password <span
                                        class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input name="new_password_confirmation" type="password" class="form-control" required />
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