@extends('backend.dashboard')
@section('title','FAQ Section Settings')
@section('body')

<div class="container mt-5">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <i class="fas fa-table me-1"></i>
                FAQ Section Settings
            </div>
        </div>
        
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                <tr>
                        <th>Title</th>
                        <th>Sub Title</th>
                        <th>Photo</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($faqsection as $item)
                    <tr>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->subtitle }}</td>
                        <td>
                        @if($item->photo)
                                    <img src="{{ asset('storage/'.$item->photo) }}" style="height: 50px" alt="FAQ Photo">
                                @else
                                    <img src="https://placehold.co/50" alt>
                                @endif
                        </td>
                        <td>
                            <a class="btn btn-info btn-sm me-2" href="{{ route('faq-section.edit', $item->id) }}">Edit</a>
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