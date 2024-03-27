@extends('frontend.master')
@section('title', 'Conversation')
@section('content')

<style>
    .chat-box {
        height: 300px;
        overflow-y: auto;
    }

    .message {
        padding: 8px;
        margin-bottom: 10px;
        border-radius: 8px;
    }

    .user-1 {
        background-color: #e6e6e6;
        text-align: left;
    }

    .user-2 {
        background-color: #007bff;
        color: #fff;
        text-align: right;
    }
</style>
<div class="container">
    <div class="main-body">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header text-center">
                        Bookings 
                    </div>
                    <hr>
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <ul class="list-group list-group-flush" style="width: 100%">
                                @forelse ($conversations as $item)
                                    <a data-property-id="{{ $item->booking_id }}" type="button" class="btn btn-outline-dark btn_modal mt-2">
                                        {{ Str::limit(getPropertyTitle($item->booking_id), 30) }}
                                    </a> 
                                    <br>
                                @empty
                                @endforelse
                            </ul>
                            <div style="margin-top: 10px; width: 100%">
                                <a href="{{ route('user-dashboard') }}" class="btn-primary btn-block btn-sm">
                                    <i class="fas fa-arrow-left" style="padding-right: 10px;"></i> Back to Profile
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h6>Conversations </h6>
                    </div>
                    <hr>
                    <div id="chat" class="card-body peopleConversation align-items-center justify-content-center">
                        <div style="text-align:center;">
                            <i style="font-size:40px; color:blue;" class="fas fa-comments"></i>
                            <p>No Conversations</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('script')
<script>
    $(document).ready(function () {
        // Attach a click event handler to the chat link
        $(document).on("click", ".btn_modal", function (e) {
            e.preventDefault();
            var propertyId = $(this).data('property-id');
 
            $.ajax({
                type: 'GET',
                url: '/get-chat-details/'+propertyId,
                dataType: 'html',
                success: function (data) {
                    $('#chat').html(data);
                },
                error: function (xhr, status, error) {
                    // Handle the error response
                    console.error(xhr.responseText);
                }
            });
        });


        function getChatDetails(id){
            $.ajax({
                type: 'GET',
                url: '/get-chat-details/'+id,
                dataType: 'html',
                success: function (data) {
                    $('#chat').html(data);
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
        
        $(document).on("submit", "#chatForm", function (e) {
            e.preventDefault();
            var formData = $('#chatForm').serialize();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: '/send-chat-message',
                data: formData,
                success: function (data) {
                    getChatDetails(data.message);
                },
                error: function (xhr, status, error) {
                    // Handle the error response
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
@endpush
