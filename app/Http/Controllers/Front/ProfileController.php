<?php

namespace App\Http\Controllers\Front;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Conversation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Property;
use App\Models\BookProperty;
use App\Http\Controllers\Controller;
use App\Models\Amenitie;
use App\Models\User;
use App\Models\Location;
use App\Models\ApplicationSetting;
use App\Http\Controllers\Front\Validator;
use App\Http\Controllers\Front\DB;
use COM;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;





class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */

    public function dashboard(Request $request)
    {
        $users = Auth::user();

        return view('profile.dashboard',  compact('users'), [
            'users' => User::all()]);
    }

    public function bookingdetails()
    {
        $users = Auth::user();
        $applicationSettings = ApplicationSetting::all(); 
        $bookProperties = BookProperty::with('user')->get();
        $propertyLocation = Location::All();

        return view('profile.booking',  compact('users','applicationSettings','bookProperties', 'propertyLocation'),[
            $properties = Property::where('user_id', $users->id)->get(),
        ]);

    }
    public function edit(Request $request): View
    {
        $users = Auth::user();
        return view('profile.edit',  compact('users'), [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
    
        // Validate the request
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust mime types and max size as needed
        ]);

        try {
        // Fetch the user from the database
        $user = User::findOrFail(Auth::user()->id);

        // Update user attributes
        $user->fill([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
        ]);

        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Delete the existing photo if it exists
            if ($user->photo) {
                Storage::disk('public')->delete($user->photo);
            }

            // Store the new photo and update the user's photo attribute
            $photoPath = $request->file('photo')->store('photos', 'public');
            $user->photo = $photoPath;
        }

        // Save the updated user profile
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    } catch (\Exception $e) {
        // Flash error message
        return redirect()->back()->with('error', 'Error updating profile. Please try again.');

    }
}


    public function BookingConversation(){
        $users = Auth::user();
        $conversations = Conversation::with('booking')
        ->where('from_user_id', auth()->user()->id)
        ->groupBy('booking_id')
        ->get();

        return view('profile.conversation', compact('conversations', 'users'));
    }

    public function chatDetails($id){
        $conversations = Conversation::with('booking')->where('booking_id', $id)->get();
        return view('profile.chat', compact('conversations', 'id'));
    }
    
    public function sendChatMessage(Request $request){
        $from = Auth::user()->id;
        $to = 1;
        $message = $request->message;
        $data = Conversation::create([
            'booking_id' => $request->booking_id,
            'from_user_id' => $from,
            'to_user_id' => $to,
            'from_user_message' => $message,
        ]);

        return response()->json(['message' => $request->booking_id]);

    }

    public function changePass(Request $request)
    {
        $users = Auth::user();
        return view('profile.changepassword',  compact('users'), [
            'user' => $request->user(),
        ]);
    }

    public function updatePass(Request $request)
    {
        $user = Auth::user(); // Assuming the user is authenticated

    
        // Validate the form data
    $request->validate([
        'current_password' => ['required', function ($attribute, $value, $fail) use ($user) {
            if (!Hash::check($value, $user->password)) {
                Session::flash('error', 'The current password does not match.');
                $fail('The current password does not match.');
            }
        }],
        'new_password' => 'required|min:8',
        'new_password_confirmation' => 'required|same:new_password',
    ]);

    // Update the password
    $user->update([
        'password' => bcrypt($request->input('new_password')),
    ]);

    // Flash success message to the session
    Session::flash('success', 'Password updated successfully.');

    return redirect()->back();
    }
}