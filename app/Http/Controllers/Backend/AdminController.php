<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Property;
use App\Models\BookProperty;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;



class AdminController extends Controller
{
    public function adminDashboard()
    {
        return view("backend.admin.dashboard");
    }

    public function adminHome()
    {
        return view("backend.home");
    }

    public function adminRegister()
    {
        return view("backend.register");
    }


    public function showTotal()
    {
        $totalUsers = User::where('role', 'customer')->count();

        $totalProperties = Property::count();
        $totalBookProperties = BookProperty::count();

        return view('backend.admin.dashboard', compact('totalProperties', 'totalUsers', 'totalBookProperties'));
    }

    public function adminEdit(Request $request)
    {
        $user = Auth::user();
        return view('backend.admin.profile',  compact('user'), [
            'user' => $request->user(),
        ]);
    }

    public function adminUpdate(Request $request)
    {
    
        // Validate the request
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
        // Fetch the user from the database
        $user = User::findOrFail(Auth::user()->id);

        // Update user attributes
        $user->fill([
            'name' => $request->input('name'),
            'email' => $request->input('email'),

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

        return redirect()->back()->with('success', 'Admin Profile updated successfully!');
    } catch (\Exception $e) {
        // Flash error message
        return redirect()->back()->with('error', 'Error updating profile. Please try again.');

    }
}


}
