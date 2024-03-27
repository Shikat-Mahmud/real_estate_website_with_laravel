@extends('backend.dashboard')
@section('title','Agent Message')
@section('body')

<div class="container mt-5">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <i class="fas fa-table me-1"></i>
                Agent Messages
            </div>
        </div>
        
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                <tr>
                        <th>Id</th>
                        <th>Property Id</th>
                        <th>Agent Name</th>
                        <th>Email</th>
                        <th>Phone No</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($agentmessage as $agent)
                    <tr>
                        <td>{{ $agent->id }}</td>
                        <td>{{ $agent->property->propertyid }}</td>
                        <td>{{ $agent->name }}</td>
                        <td>{{ $agent->email }}</td>
                        <td>{{ $agent->phone }}</td>
                        <td>{{ $agent->message }}</td>
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