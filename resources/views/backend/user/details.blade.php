@extends('backend.dashboard')
@section('title','User Details List')
@section('body')

<div class="container mt-5">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <i class="fas fa-table me-1"></i>
                User List
            </div>

        </div>

        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                    @if ($item->role !=='admin')
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $item->name }} <br></td>
                        <td> {{ $item->email }} <br></td>
                        <td> {{ $item->phone }} <br></td>
                       

                        <td>
                            <div class="d-flex">
                                <a class="btn btn-warning btn-sm me-2" href="{{ route('user.details.show', $item->id) }}">Details</a>
                                <a class="btn btn-info btn-sm me-2" href="{{route('user.edit', $item->id) }}">Edit</a>
                                <a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"  href="{{ route('user.delete', $item->id) }}">Delete</a>
                            </div>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('script')

@endpush