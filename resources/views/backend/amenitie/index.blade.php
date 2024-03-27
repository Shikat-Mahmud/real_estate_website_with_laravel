@extends('backend.dashboard')
@section('title','Amenitie List')
@section('body')

<div class="container mt-5">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <i class="fas fa-table me-1"></i>
                Amenities List
            </div>
            <div>
                <a href="{{ route('amenities.create') }}" class="btn btn-primary btn-sm">Create new amenitie</a>
            </div>
        </div>

        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($amenities as $amenitie)
                    <tr>
                        <td>{{ $amenitie->id }}</td>
                        <td>{{ $amenitie->name }}</td>
                        <td>
                            @if($amenitie->status == '0')
                            <span class="badge bg-danger">Not avaiable</span>
                            @elseif($amenitie->status == '1')
                            <span class="badge bg-success">Available</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex">
                                <a class="btn btn-info btn-sm me-2" href="{{ route('amenities.edit', $amenitie->id) }}">Edit</a>

                                <form action="{{route('amenities.destroy', $amenitie->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button id="btnDelete" onclick="return confirm('Are you sure?')"
                                        class="btn btn-danger btn-sm">Delete</button>
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