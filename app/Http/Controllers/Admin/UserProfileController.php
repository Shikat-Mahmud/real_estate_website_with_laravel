<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserProfileController extends Controller
{
    public function profileEdit(){
        $user = auth()->user();
        return view('backend.admin.profile', compact('user'));
    }

    public function updateProfile(Request $request){
        $user = auth()->user();

        $request->validate([
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
        ]);

        DB::beginTransaction();
        try {

            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $path = $file->store('uploads', 'public');
                $user->photo = $path;
                $user->save();
            }

            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
            DB::commit();
            return redirect()->route('admin-dashboard')->withSuccess('Profile updated successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('admin-dashboard')->withError('An error occurred: ' . $e->getMessage());
        }

    }
}