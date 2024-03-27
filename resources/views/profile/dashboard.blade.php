@extends('frontend.master')
@section('title', 'User Dashboard')
@section('content')


<div class="container">
    <div class="main-body">
        <div class="row">


            @include('profile.partials.profile-sidebar')

            <div class="col-lg-8">
                <div class="card">
                <h5 style="margin: 10px; text-align:center; color: #6C60FE; font-weight:700;">Account Settings</h5>
                    <div class="card-body">
                        <div class="row mt-3">
                            <label for="" class="col-md-4"> Name</label>
                            <div class="col-md-8">
                                <p for="name">{{$users->name}}</p>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <label for="" class="col-md-4"> Email</label>
                            <div class="col-md-8">
                                <p for="email">{{$users->email}}</p>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label for="" class="col-md-4"> Phone</label>
                            <div class="col-md-8">
                                <p for="phone">{{$users->phone}}</p>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label for="" class="col-md-4"> Address</label>
                            <div class="col-md-8">
                                <p for="address">{{$users->address}}</p>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-6"></div>
                            <div class="col-sm-9 text-secondary">
                                <a class="btn btn-primary" href="{{route('profile.edit', $users->id) }}">Edit Profile</a>
                                <a class="btn btn-primary" href="{{route('change.password', $users->id) }}">Change Password</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


@endsection