@extends('backend.dashboard')
@section('title','Conversation')
@section('body')

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
<div class="container mt-5">
    <div class="main-body">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="d-flex justify-content-between messaging card-header">
                        <div class="">
                            <h6>Bookings </h6>
                        </div>
                    </div>
                    <div class="card-body peopleadd" style="min-height: 74vh;">
                        <div class="d-flex flex-column align-items-center text-center">
                            <ul class="list-group list-group-flush messageGroup">
                                @forelse ($conversations as $item)
                                <a data-booking-id="{{ $item->booking_id }}" type="button" class="btn btn-outline-dark btn_modal mt-2">{{ Str::limit(getPropertyTitle($item->booking_id), 30) }}</a>
                                <br>
                                @empty

                                @endforelse

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card" style="min-height: 80vh;">
                    <div class="d-flex justify-content-between messaging card-header">
                    <h6>Conversations </h6>
                    </div>
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
    $(document).ready(function() {
        // Attach a click event handler to the chat link
        $(document).on("click", ".btn_modal", function(e) {
            e.preventDefault();
            var id = $(this).data('booking-id');
            $.ajax({
                type: 'GET',
                url: '/application-setting/admin-chat-details/' + id,
                dataType: 'html',
                success: function(data) {
                    $('#chat').html(data);
                },
                error: function(xhr, status, error) {
                    // Handle the error response
                    console.error(xhr.responseText);
                }
            });
        });

        function getChatDetails(id) {
            $.ajax({
                type: 'GET',
                url: '/application-setting/admin-chat-details/' + id,
                dataType: 'html',
                success: function(data) {
                    $('#chat').html(data);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }

        $(document).on("submit", "#chatForm", function(e) {
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
                success: function(data) {
                    getChatDetails(data.message);
                },
                error: function(xhr, status, error) {
                    // Handle the error response
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
@endpush