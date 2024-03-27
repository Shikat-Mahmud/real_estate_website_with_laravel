@extends('backend.dashboard')

@section('body')

<style>
    /* style for admin profile photo (saikat) */
    .admin-photo {
        height: 120px; 
        width: 120px; 
        padding: 2px; 
        border: 3px solid #1A7F37; 
        border-radius: 50%; 
        object-fit: cover;
    }
</style>

<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Profile Update</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin-update') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="col-md-12 mb-3 text-center">
                            @if(isset($user->photo))
                            <img class="admin-photo" src="{{ asset('storage/' . $user->photo) }}" alt="Admin Photo">
                            @endif
                        </div>


                        <div class="form-group mb-3">
                            <label for="current_password">Name </label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="new_password">Email</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}"
                                required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="new_password_confirmation">Profile Picture </label>
                            <input type="file" id="photo" name="photo" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    Update Profile
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection