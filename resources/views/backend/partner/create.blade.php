
@extends('backend.dashboard')
@section('title','Partner Create')
@section('body')
    <div class="container mt-5">
        <form action="{{ route('partners.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Add Partner</h3>
                </div>
                <div class="card-body">
                    <span class="text-success">{{Session::has('success') ? Session::get('success') : ''}}</span>
                    <form action="{{route('partners.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-3">
                            <label for="" class="col-md-4"> Name <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="text" name="name" class="form-control"/>
                            </div>
                        </div>

                        <div class="row mt-3">
                                    <label for="" class="col-md-4">Image<span class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <input type="file" name="photo" class="form-control" accept="image/*"/>
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

        </form>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function(){
            var i=1;


            $('#add').click(function(){
                i++;
                {{--$('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"> <td width="33.33%"><select name="nearest_places['+i+'][place_id]" class="form-control"><option value="">Select Property Type </option>@foreach ($nearests as $item)<option value="{{ $item->id }}">{{ $item->name }}</option>@endforeach</select></td>  <td width="33.33%"><input type="text" name="nearest_places['+i+'][distance]" placeholder="Enter distance" class="form-control name_list" /></td>   <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');--}}
            });


            $(document).on('click', '.btn_remove', function(){
                var button_id = $(this).attr("id");
                $('#row'+button_id+'').remove();
            });
        });
    </script>
@endpush
