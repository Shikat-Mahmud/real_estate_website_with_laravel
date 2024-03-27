@extends('backend.dashboard')
@section('title','Location List')
@section('body')

<div class="container mt-5">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <i class="fas fa-table me-1"></i>
                Location List
            </div>
            <div>
                <a href="{{ route('location.create') }}" class="btn btn-primary btn-sm">Create new Location</a>
            </div>
        </div>

        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Name </th>
                        <th>City </th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($property_locations as $item)
                    <tr>
                        <td>
                            {{ $item->name }} <br>
                        </td>
                        <td>
                            {{ $item->city }} <br>
                        </td>
                        <td>
                                @if($item->photo)
                                    <img src="{{ asset('storage/'.$item->photo) }}" style="height: 50px" alt="icon">
                                @else
                                    <img src="https://placehold.co/50" alt>
                                @endif
                            </td>

                        <td>
                            <div class="d-flex">
                                <a class="btn btn-info btn-sm me-2" href="{{route('location.edit', $item->id) }}">Edit</a>
                                <a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"  href="{{ route('location.delete', $item->id) }}">Delete</a>
                            </div>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('script')

@endpush
