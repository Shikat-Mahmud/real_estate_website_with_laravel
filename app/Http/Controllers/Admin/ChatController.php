<?php

namespace App\Http\Controllers\Admin;

use App\Models\Conversation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ChatController extends Controller
{
    public function getConversation(Request $request){
     
        $users = User::all();
        $conversations = Conversation::with('booking')
            ->where('to_user_id', auth()->user()->id)
            ->groupBy('booking_id')
            ->get();
        
        return view('backend.chat.conversation', compact('conversations', 'users'));
        
    }

    public function adminChatDetails($id){
        $conversations = Conversation::with('booking')->where('booking_id', $id)->get();
        return view('backend.chat.chat', compact('conversations', 'id'));
    }
}