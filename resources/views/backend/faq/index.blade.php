@extends('backend.dashboard')
@section('title','FAQ List')
@section('body')

<div class="container mt-5">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <i class="fas fa-table me-1"></i>
                FAQ List
            </div>
            <div>
                <a href="{{ route('faqs.create') }}" class="btn btn-primary btn-sm">Create new FAQ </a>
            </div>
        </div>
        
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                <tr>
                        <th>Id</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($faqs as $faq)
                    <tr>
                        <td>{{ $faq->id }}</td>
                        <td>{{ $faq->question }}</td>
                        <td>{{ $faq->answer }}</td>
                        <td>
                            @if($faq->status == 0)
                            <span class="badge bg-success">Active</span>
                            @else 
                            <span class="badge bg-danger">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex">
                                <a class="btn btn-info btn-sm me-2" href="{{ route('faqs.edit', $faq->id) }}">Edit</a>

                                <form action="{{route('faqs.destroy', $faq->id)}}" method="post">
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