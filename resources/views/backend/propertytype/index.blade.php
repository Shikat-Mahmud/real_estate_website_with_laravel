@extends('backend.dashboard')
@section('title','Property Type List')
@section('body')

<div class="container mt-5">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <i class="fas fa-table me-1"></i>
                Property Type List
            </div>
            <div>
                <a href="{{ route('propertyType.create') }}" class="btn btn-primary btn-sm">Create new property Type</a>
            </div>
        </div>

        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Name </th>
                        <th>Image </th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($property_types as $item)
                        <tr>
                            <td>
                                {{ $item->name }} <br>
                            </td>
                            <td>
                                @if($item->image)
                                    <img src="{{ asset('storage/'.$item->image) }}" style="height: 50px" alt="icon">
                                @else
                                    <img src="https://placehold.co/50" alt>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a class="btn btn-info btn-sm me-2"
                                        href="{{ route('propertyType.edit', $item->id) }}">Edit</a>
                                    <a class="btn btn-danger btn-sm"onclick="return confirm('Are you sure?')"
                                        href="{{ route('propertyType.delete', $item->id) }}">Delete</a>
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
