@extends('backend.dashboard')
@section('title', 'General Setting')
@section('body')
<section class="container mt-3">
    <form action="{{ route('setting-update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3 mt-3">
                            <label for="inputText" class="col-sm-12 col-form-label">Business Name <span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-12">
                                <input type="text" placeholder="Enter Title" class="form-control" name="business_name"
                                    required="" value="{{ $general->business_name ?? ''}}">
                            </div>
                        </div>

                        <div class="row mb-3 mt-3">
                            <label for="inputText" class="col-sm-12 col-form-label">Business Address: <span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-12">
                                <input type="address" placeholder="Enter Address" class="form-control"
                                    name="business_address" required="" value="{{ $general->business_address ?? ''}}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-12 col-form-label">Business Phone
                                Number: <span
                                class="text-danger">*</span> </label>
                            <div class="col-sm-12">
                                <input type="tel" placeholder="Enter Number" class="form-control" name="business_number"
                                    required="" value="{{ $general->business_number ?? ''}}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-12 col-form-label">Business Whatsapp
                                Number: <span
                                class="text-danger">*</span> </label>
                            <div class="col-sm-12">
                                <input type="tel" placeholder="Enter Number" class="form-control" name="business_whatsapp"
                                    required="" value="{{ $general->business_whatsapp ?? ''}}">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-12 col-form-label">Business Email: <span
                                class="text-danger">*</span></label>
                            <div class="col-sm-12">
                                <input type="email" placeholder="Enter email" class="form-control" name="business_email"
                                    required="" value="{{ $general->business_email ?? ''}}">
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-body">
                    <div class="row mb-5 mt-3">
                        <label class="col-sm-4 col-form-label"> Logo </label>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="input-group">
                                        <input type="file" name="logo" accept="image/png, image/jpg, image/gif, image/jpeg" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    @if(isset($general->logo))
                                    <img src="{{ asset('storage/' . $general->logo) }}" alt="" style="height: 50px">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-5 mt-3">
                        <label class="col-sm-4 col-form-label"> FavIcon </label>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="input-group">
                                        <input type="file" name="favicon" accept="image/png, image/jpg, image/gif, image/jpeg" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    @if(isset($general->favicon))
                                    <img src="{{ asset('storage/' . $general->favicon) }}" alt="" style="height: 50px">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-5 mt-3">
                        <label class="col-sm-4 col-form-label"> Banner Image </label>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="input-group">
                                        <input type="file" name="banner_image" accept="image/png, image/jpg, image/gif, image/jpeg" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    @if(isset($general->banner_image))
                                    <img src="{{ asset('storage/' . $general->banner_image) }}" alt="" style="height: 50px">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                        <div class="row mb-5 mt-5">
                            <div class="col-sm-12">
                                <div class="input-group mb-3">
                                    <a class="btn btn-danger" style="margin-right: 10px"
                                        href="{{ route('admin-dashboard') }}">Cancel </a>
                                    <button class="btn btn-info" type="submit">Save </button>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </form>
</section>

@endsection

@push('custom-script')
<script>
@foreach($errors->all() as $error)
toastr.error("{{ $error }}");
@endforeach

$(document).ready(function() {
    $('.select2').select2();
});

$(document).ready(function () {
    $('#stripe_payment-checkbox').change(function () {
        $('.myDiv').toggle(this.checked);
    });

    // Initial state check
    if ($('#stripe_payment-checkbox').is(':checked')) {
        $('.myDiv').show();
    } else {
        $('.myDiv').hide();
    } 
});
</script>
@endpush