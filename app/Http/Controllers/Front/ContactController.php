<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function contactForm(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'country' => 'required',
            'description' => 'required',
        ]);

        // Store the data in the contact_table
        Contact::create($request->all());

        // You can add any additional logic or redirection here
        return redirect()->route('contact')->with('success', 'Message sent successfully!');
    }

    public function contactMessage(){

        $contactmessage = Contact::All();

        return view('backend.contactmessage.index', compact('contactmessage'));
    }
    
}