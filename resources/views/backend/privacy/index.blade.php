@extends('backend.dashboard')
@section('title','Privacy Policy')
@section('body')

<div class="container mt-5">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <i class="fas fa-table me-1"></i>
                Privacy Policy
            </div>

        </div>
        
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                <tr>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($privacy as $item)
                    <tr>
                        <td>{!! ($item->content) !!}</td>
                        <td>
                            <div class="d-flex">
                                <a class="btn btn-info btn-sm me-2" href="{{ route('privacy.edit', $item->id) }}">Edit</a>
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