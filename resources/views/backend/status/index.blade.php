@extends('backend.dashboard')
@section('title','Purpose List')
@section('body')

<div class="container mt-5">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <i class="fas fa-table me-1"></i>
                Purpose List
            </div>
            <div>
                <a href="{{ route('status.create') }}" class="btn btn-primary btn-sm">Create new Purpose</a>
            </div>
        </div>
        
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($property_statuses as $status)
                    <tr>
                        <td>{{ $status->id }}</td>
                        <td>{{ $status->name }}</td>
                        <td>
                            <div class="d-flex">
                                <a class="btn btn-info btn-sm me-2" href="{{ route('status.edit', $status->id) }}">Edit</a>
                                <a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')" href="{{ route('status.destroy', $status->id)}}">Delete</a>
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

