@extends('backend.dashboard')
@section('title', 'Property Details')
@section('body')
<style>
    .text-bold {
        font-weight: bold;
    }
</style>
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h3>Property Details</h3>
            <br>
            <div class="card-body">
                <div class="row">
                    <div class="card">
                        <div class="row" style="padding: 15px;">

                            <div class="col-md-6">
                                <label class="text-bold">Title:</label>
                                <p>{{ $property->title }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="text-bold">Slug:</label>
                                <p>{{ $property->slug }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="text-bold">Bathroom:</label>
                                <p>{{ $property->bathroom }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="text-bold">Sqft:</label>
                                <p>{{ $property->sqft }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="text-bold">Room:</label>
                                <p>{{ $property->room }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="text-bold">Bed Room:</label>
                                <p>{{ $property->bed_room }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="text-bold">Unit:</label>
                                <p>{{ $property->unit }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="text-bold">Floor:</label>
                                <p>{{ $property->floor }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="text-bold">Kitchen:</label>
                                <p>{{ $property->kitchen }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="text-bold">Parking:</label>
                                <p>{{ $property->parking }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="text-bold">Rent Type:</label>
                                <p>{{ $property->rent_type }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="text-bold">Floor Plan:</label>
                                <p>{{ $property->floor_plan }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="text-bold">Year:</label>
                                <p>{{ $property->year }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="text-bold">Structure Type:</label>
                                <p>{{ $property->structure_type }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <label class="text-bold">Description:</label>
                        <p>{!! $property->description !!}</p>
                    </div>
                    <div class="col-md-12 mt-3">
                        <label class="text-bold">Map:</label>
                        <p>{{ $property->map }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="text-bold">Price:</label>
                        <p>{{ $property->price }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="text-bold">Video URL:</label>
                        <p>{{ $property->video_url }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="text-bold">Status:</label>
                        <p>{{ $property->status == 0 ? 'Active' : 'Inactive' }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="text-bold">User ID:</label>
                        <p>{{ $property->user_id }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="text-bold">Location:</label>
                        <p>{{ $property->location->name }}</p>
                    </div>


                    <div class="col-md-12 mt-3">
                        <label class="text-bold">Property Images:</label>
                        <div class="row">
                            @if($property->property_images && is_string($property->property_images))
                            @php
                            $imagesArray = json_decode($property->property_images);
                            @endphp
                            @if(is_array($imagesArray))
                            @foreach($imagesArray as $image)
                            <div class="col-md-3 mb-3">
                                <img src="{{ asset('storage/' . $image) }}" alt="Property Image" class="img-fluid">
                            </div>
                            @endforeach
                            @else
                            <img src="https://placehold.co/50" alt="" srcset="">
                            @endif
                            @endif
                        </div>
                    </div>


                    <div class="col-md-6">
                        <label class="text-bold">Amenities:</label>
                        <span>
                            @if($property->amenities && is_string($property->amenities))
                            @php
                            $amenitiesArray = json_decode($property->amenities, true);
                            @endphp
                            @if(is_array($amenitiesArray))
                            @foreach($amenitiesArray as $key => $value)
                            <span>{{ getAmenitieName($value) }}</span>,
                            @endforeach
                            @endif
                            @endif
                        </span>
                    </div>





                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    $(document).ready(function() {
        var i = 0;


        $('#add').click(function() {
            i++;
            $('#dynamic_field').append('<tr id="row' + i + '" class="dynamic-added"> <td width="33.33%"><select name="nearest_places[' + i + '][place_id]" class="form-control"><option value="">Select Property Type </option>@foreach ($nearests as $item)<option value="{{ $item->id }}">{{ $item->name }}</option>@endforeach</select></td>  <td width="33.33%"><input type="text" name="nearest_places[' + i + '][distance]" placeholder="Enter distance" class="form-control name_list" /></td>   <td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
        });


        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });
    });
</script>

<script>
    $(document).ready(function() {

        $('.btn_remove').on('click', function() {
            var key = $(this).data('key');
            $('tr[data-key="' + key + '"]').remove();
        });
    });
</script>
@endpush