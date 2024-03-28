@extends('backend.dashboard')
@section('title','Location Update')
@section('body')

<div class="container mt-5">
    <form action="{{ route('location.update', $location->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
     
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <h3>Edit Location</h3>
                    <div class="col-md-6">
                        <div class="mb-3 form-group">
                        <label for="" class="col-md-4">Name<span class="text-danger">*</span></label>
                            <div class="col-md-12">
                                <input type="text" name="name" value="{{ $location->name }}" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 form-group">
                        <label for="" class="col-md-4">City<span class="text-danger">*</span></label>
                            <div class="col-md-12">
                                <input type="text" name="city" value="{{ $location->city }}" class="form-control" />
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="mb-3 form-group">
                        <label for="" class="col-md-4">Image</label>
                            <div class="col-md-12">
                                <input type="file" name="photo" class="form-control" accept="image/*" />
                                @if($location->photo)
                                <img src="{{ asset('storage/photos/locations/' . $location->photo) }}" alt="" style="height: 80px;"><br>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12 mb-3 form-group">
                        <a class="btn btn-danger" href="{{ route('location.index') }}">Cancel</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>

@endsection


@push('script')
<script>
    $(document).ready(function() {
        var i = 1;


        $('#add').click(function() {
            i++;
            {
                {
                    //    {{--$('#dynamic_field').append('<tr id="row' + i + '" class="dynamic-added"> <td width="33.33%"><select name="nearest_places[' + i + '][place_id]" class="form-control"><option value="">Select Property Type </option>@foreach ($nearests as $item)<option value="{{ $item->id }}">{{ $item->name }}</option>@endforeach</select></td>  <td width="33.33%"><input type="text" name="nearest_places[' + i + '][distance]" placeholder="Enter distance" class="form-control name_list" /></td>   <td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
                    //     --}} 
                }
            }
        });


        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });
    });
</script>
@endpush