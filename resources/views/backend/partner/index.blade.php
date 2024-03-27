@extends('backend.dashboard')
@section('title','Partner List')
@section('body')

<div class="container mt-5">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <i class="fas fa-table me-1"></i>
                Partner List
            </div>
            <div>
                <a href="{{ route('partners.create') }}" class="btn btn-primary btn-sm">Add New Partner</a>
            </div>
        </div>

        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Name </th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($partners as $item)
                    <tr>
                        <td>
                            {{ $item->name }} <br>
                        </td>
                        <td>
                            <img src="{{ asset('storage/' . $item->photo) }}" alt="" style="height: 80px;"><br>
                        </td>

                        <td>
                            <div class="d-flex">
                                <a class="btn btn-info btn-sm me-2" href="{{route('partners.edit', $item->id) }}">Edit</a>
                                <form action="{{route('partners.destroy', $item->id)}}" method="post">
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