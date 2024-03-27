@extends('backend.dashboard')
@section('title','Property Create')
@section('body')
<div class="container mt-5">
    <form action="{{ route('properties.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <h3>Basic Information</h3>
                    <div class="col-md-6">
                        <div class="mb-3 form-group">
                            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" value="{{ old('title') }}"
                                class="form-control" placeholder="Property Name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 form-group">
                            <label for="type" class="form-label">Property Type <span
                                    class="text-danger">*</span></label>
                            <select name="property_type_id" id="property_type_id" class="form-control" required>
                                <option value="">Select Property Type </option>
                                @foreach ($property_types as $item)
                                    <option {{ old('property_type_id') == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 form-group">
                            <label for="type" class="form-label">Location<span class="text-danger">*</span></label>
                            <select name="location_id" id="location_id" class="form-control" required>
                                <option value="">Select Location </option>
                                @foreach ($locations as $item)
                                    <option {{ old('location_id') == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 form-group">
                            <label for="type" class="form-label">Purpose<span
                                    class="text-danger">*</span></label>
                            <select name="property_status_id" id="property_status_id" class="form-control" required>
                                <option value="">Select Purpose</option>
                                @foreach ($property_status as $item)
                                    <option {{ old('property_status_id') == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 form-group">
                            <label for="type" class="form-label">Price<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="price" required
                                value="{{ old('price') }}" placeholder="Property Price">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 form-group">
                            <label for="type" class="form-label">Images<span class="text-danger">*</span></label>
                            <input type="file" class="form-control" name="property_images[]" multiple>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body">
                <div class="row">
                    <h3>Others Information</h3>
                    <div class="col-md-6">
                        <div class="mb-3 form-group">
                            <label for="type" class="form-label">Total Area(Sqft)<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="sqft"
                                value="{{ old('sqft') }}" placeholder="Property Sqft" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 form-group">
                            <label for="type" class="form-label">Total Unit<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="unit"
                                value="{{ old('unit') }}" placeholder="Unit" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 form-group">
                            <label for="type" class="form-label">Total Room<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="room"
                                value="{{ old('room') }}" placeholder="Total Room" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 form-group">
                            <label for="type" class="form-label">Total Bed Room<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="bed_room"
                                value="{{ old('bed_room') }}" placeholder="Total Bed Room" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 form-group">
                            <label for="type" class="form-label">Total Bathroom<span class="text-danger">
                                    *</span></label>
                            <input type="text" class="form-control" name="bathroom"
                                value="{{ old('bathroom') }}" placeholder="Total Bathroom" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 form-group">
                            <label for="type" class="form-label">Floor <span class="text-danger"> *</span></label>
                            <input type="text" class="form-control" name="floor"
                                value="{{ old('floor') }}" placeholder="Floor" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 form-group">
                            <label for="type" class="form-label">Total Kitchen <span class="text-danger">
                                    *</span></label>
                            <input type="text" class="form-control" name="kitchen"
                                value="{{ old('kitchen') }}" placeholder="Total Kitchen" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 form-group">
                            <label for="type" class="form-label">Total Parking Place<span class="text-danger">
                                    *</span></label>
                            <input type="text" class="form-control" name="parking"
                                value="{{ old('parking') }}" placeholder="Total Parking" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 form-group">
                            <label for="type" class="form-label">Built Year <span class="text-danger">
                                    *</span></label>
                            <input type="text" class="form-control" name="year"
                                value="{{ old('year') }}" placeholder="Built Year" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 form-group">
                            <label for="type" class="form-label">Structure <span class="text-danger">
                                    *</span></label>
                            <input type="text" class="form-control" name="structure_type"
                                value="{{ old('structure_type') }}" placeholder="Structure" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body">
                <div class="mt_35">
                    <h5>Aminities</h5>
                    <div class="row">
                        @foreach ($amenities as $item)
                            <div class="col-xl-4 col-sm-6 col-lg-4">
                                <div class="form-check">
                                    <input class="form-check-input is-check" type="checkbox" name="aminities[]"
                                           id="aminityId-{{ $item->id }}" value="{{ $item->id }}" 
                                           {{ in_array($item->id, old('aminities', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="aminityId-{{ $item->id }}">
                                        {{ $item->name }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-body">
                <div class="mt_35">
                    <h5>Nearest Locations</h5>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered" id="dynamic_field">  
                                <tr>  
                                    <td width="33.33%">
                                        <select name="nearest_places[0][place_id]" class="form-control">
                                            <option value="">Select Property Type </option>
                                            @foreach ($nearests as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>  
                                    <td width="33.33%">
                                        <input type="text" name="nearest_places[0][distance]" placeholder="Enter distance" class="form-control name_list" />
                                    </td>  

                                    <td width="33.33%"><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                                </tr>  
                            </table>  
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body">
                <div class="mt_35">
                    <h5>Property Details And Google Map</h5>
                    <div class="row">
                        <div class="col-md-12 mb-3 form-group">
                            <label for="">Map Iframe (Embed Url) </label>
                            <textarea name="map" class="form-control">{{ old('map') }}</textarea>
                        </div>
                        <div class="col-md-12 mb-3 form-group">
                            <label for="">Description <span class="text-danger">*</span></label>
                            <textarea name="description" class="form-control" id=" ">{{ old('description') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body">
                <div class="mt_35">
                    <h5>Youtube Video URL </h5>
                    <div class="row">
                        <div class="col-md-12 mb-3 form-group">
                            <input name="video_url" class="form-control" value="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body">
                <div class="mt_35">
                    <div class="row">
                        <div class="col-md-12 mb-3 form-group">
                            <label for="">Status </label>
                            <select name="status" class="form-control">
                                <option {{ old('status') == 0 ? 'selected' : '' }} value="0">Active </option>
                                <option {{ old('status') == 1 ? 'selected' : '' }} value="1">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-body">
                <div class="mt_35">
                    <div class="row">
                        <div class="col-md-12 mb-3 form-group">
                            <a class="btn btn-danger" href="{{ route('properties.index') }}">Cancel</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@push('script')
<script>
    $(document).ready(function(){
        var i=1;  


      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"> <td width="33.33%"><select name="nearest_places['+i+'][place_id]" class="form-control"><option value="">Select Property Type </option>@foreach ($nearests as $item)<option value="{{ $item->id }}">{{ $item->name }}</option>@endforeach</select></td>  <td width="33.33%"><input type="text" name="nearest_places['+i+'][distance]" placeholder="Enter distance" class="form-control name_list" /></td>   <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  


      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
    });
</script>
@endpush