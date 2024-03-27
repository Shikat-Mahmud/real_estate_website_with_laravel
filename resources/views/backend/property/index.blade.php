@extends('backend.dashboard')
@section('title','Property List')
@section('body')

<div class="container mt-5">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <i class="fas fa-table me-1"></i>
                Property List
            </div>
            <div>
                <a href="{{ route('properties.create') }}" class="btn btn-primary btn-sm">Create new property</a>
            </div>
        </div>
        
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Property </th>
                        <th>Location</th>
                        <th>Property Type</th>
                        <th>Property Status</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($propertiesDetails as $item)
                    <tr>
                        <td>
                            {{ $item->title }} <br>
                        </td>
                        <td>{{ $item->location->name ?? '' }}</td>
                        <td>{{ $item->property_type->name ?? '' }}</td>
                        <td>{{ $item->property_status->name ?? '' }}</td>
                        <td>{{ formatCurrency($item->price) }}</td>
                        <td>
                            @if($item->status == 0)
                            <span class="badge bg-success">Active</span>
                            @else 
                            <span class="badge bg-danger">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex">
                                <a class="btn btn-warning btn-sm me-2" href="{{ route('properties.show', $item->id) }}">Details</a>
                                <a class="btn btn-info btn-sm me-2" href="{{ route('properties.edit', $item->id) }}">Edit</a>
                                <form action="{{route('properties.destroy', $item->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button id="btnDelete" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</button>
                                </form>
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