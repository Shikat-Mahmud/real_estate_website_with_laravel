<div class="col-lg-4">
    <div class="card">
        <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center">
                @if(auth()->user()->photo)
                <img src="{{ asset('storage/' . $users->photo) }}"  class="rounded-circle p-1 bg-primary" style="width: 110px; height: 110px; object-fit: cover;">
                @else
                <img src="https://lh3.googleusercontent.com/proxy/FMdpK8RXpwmgJy-GPX7yJDHMvu_RvWqWRVf0xBdmeROkG-6z90M9XJm5RQFdglx47XvWsCzo5w"  class="rounded-circle p-1 bg-primary" style="width: 110px; height: 110px; object-fit: cover;">
                @endif
                <!-- <img src="{{ asset('storage/' . $users->photo) }}" alt="Photo" class="rounded-circle p-1 bg-primary" style="width: 110px; height: 110px; object-fit: cover;"> -->
                <div class="mt-3">
                    <h4>{{$users->name}}</h4>
                    <p>{{$users->email}}</p>
                </div>
            </div>
            <hr class="my-4">
            <ul class="list-group list-group-flush">
                <a href="{{ route('user-dashboard') }}" class="btn btn-outline-primary">Profile Details</a>
                <br> <a href="{{ url('booking_profile') }}" class="btn btn-outline-primary">Booking Details</a>
                <br> <a href="{{ url('booking-conversation') }}" class="btn btn-outline-primary">Booking Conversation</a>
            </ul>
        </div>
    </div>
</div>