@extends('backend.dashboard')
@section('title','Partner Section Settings')
@section('body')

<div class="container mt-5">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <i class="fas fa-table me-1"></i>
                Partner Section Settings
            </div>
        </div>
        
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                <tr>
                        <th>Title</th>
                        <th>Sub Title</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($partnersection as $item)
                    <tr>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->subtitle }}</td>
                        <td>
                            <a class="btn btn-info btn-sm me-2" href="{{ route('partner-section.edit', $item->id) }}">Edit</a>
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