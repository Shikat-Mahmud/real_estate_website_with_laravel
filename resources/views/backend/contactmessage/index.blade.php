@extends('backend.dashboard')
@section('title','Contact Message')
@section('body')

<div class="container mt-5">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <i class="fas fa-table me-1"></i>
                Contact Messages
            </div>
        </div>
        
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                <tr>
                        <th>Id</th>
                        <th>Customer Name</th>
                        <th>Phone No</th>
                        <th>Email</th>
                        <th>Email</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contactmessage as $contact)
                    <tr>
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->country }}</td>
                        <td>{{ $contact->description }}</td>
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