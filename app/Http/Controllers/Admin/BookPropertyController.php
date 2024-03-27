<?php

namespace App\Http\Controllers\Admin;

use App\Models\Conversation;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookProperty;
use App\Models\Property;
use App\Models\Location;
use App\Models\User;
use App\Models\AgentMessage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BookPropertyController extends Controller
{
    public function storeData(Request $request)
    {
        // Check if the user is authenticated (logged in)
        if (!Auth::check()) {
            // User is not logged in, redirect to the login page
            return redirect()->route('login')->with('error', 'Please log in to book a property.');
        }

        DB::beginTransaction();

        try {
            $request->validate([
                'property_id' => 'required',
                'book_status' => 'required',
            ]);

            // Get the user ID of the currently authenticated user
            $userId = auth()->user()->id;
            $propertyId = $request->property_id;

            // Check if the user has already booked the property
            $existingBooking = BookProperty::where('user_id', $userId)
                ->where('property_id', $propertyId)
                ->exists();

            if ($existingBooking) {

                $request->merge(['user_id' => $userId]);
                $bookProperty = BookProperty::create($request->all());
                $this->startConversation($bookProperty->id);

                DB::commit();
                // User has already booked the property, set a warning message
                $warningMessage = 'You have already booked this property. Are you sure you want to book it again?';
                $messages = [
                    'warning1' => $warningMessage,
                    'warning' => 'Again Property booked successfully',
                ];

                return redirect()->back()->with($messages);

            }


            // If not, proceed with the booking
            $request->merge(['user_id' => $userId]);
            $bookProperty = BookProperty::create($request->all());
            $this->startConversation($bookProperty->id);

            DB::commit();
            return redirect()->back()->with('success', 'Property booked successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }


    public function bookingDetails()
{
    $bookProperties = BookProperty::with('user')->get();

    $propertyLocation = Location::all();

    return view('backend.booking.index', compact('bookProperties', 'propertyLocation'));
}



    public function editBooking(string $id)
    {
        try {
            $bookProperty = BookProperty::find($id);

            return view('backend.booking.edit', compact('bookProperty'));
        } catch (\Exception $e) {

            dd($e);
            return back()->withError('An error occurred: ' . $e->getMessage());
        }
    }

    public function updateBooking(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'book_status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back() ->withErrors($validator) ->withInput();
        }
        DB::beginTransaction();
        try {
            $inputs = $request->only('book_status');
            $bookProperty = BookProperty::where('id', $id)->update($inputs);
            DB::commit();
            return redirect()->route('booking.details')->withSuccess('Booking updated successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError('An error occurred: ' . $e->getMessage());
        }
    }

    public function destroyBooking(string $id)
    {
        try {
            $bookProperty = BookProperty::find($id);
            $bookProperty->delete();
            return redirect()->route('booking.details')->withSuccess('Booking deleted successfully.');
        } catch (\Exception $e) {
            dd($e);
            return back()->withError('An error occurred: ' . $e->getMessage());
        }
    }

    public function bookDetailsUser(){
        $bookPropertyUser = User::all();
        return view('backend.booking.index', compact('bookPropertyUser'));
    }

    public function bookDetailsProperty(){
        $bookProperties = Property::all();
        return view('backend.booking.index', compact('bookProperties'));
    }

    public function agentMessage(){

        $agentmessage = AgentMessage::All();
        $property = Property::All();

        return view('backend.agentmessage.index', compact('agentmessage','property'));
    }


    public function startConversation($pid){
        $from = Auth::user()->id;
        $to = 1;
        $message = 'Thanks for booking.';

        $data = Conversation::create([
            'booking_id' => $pid,
            'from_user_id' => $from,
            'to_user_id' => $to,
            'from_user_message' => $message,
        ]);

        return $data;

    }
}
