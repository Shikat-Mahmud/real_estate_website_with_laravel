<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\BookProperty;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Location;


class UserController extends Controller
{

   public function details(){
    $users = User::all();
    return view('backend.user.details',compact('users'));
   }

   public function show(string $id)
   {
       $user = User::find($id);
   
       // Retrieve only the bookings associated with the specific user
       $bookProperties = $user->bookProperties()->with('property.location')->get();
       $propertyLocation = Location::all();
   
       return view('backend.user.detailsshow', compact('user', 'bookProperties', 'propertyLocation'));
   }
   


   public function destroy($id)
   {
       $users = User::find($id);
       $users->delete();
    //    return redirect()->back()->with('success','User Deleted Successfully.');
    return redirect()->route('user.details')->withSuccess('User deleted successfully.');
   }
   public function edit($id)
   {    $users = User::find($id);
       return view('backend.user.edit',compact('users'));
   }
   public function update(Request $request,$id)
   {
    $users = User::find($id);

    
    $users->update($request->all());
   
    return redirect()->route('user.details')->withSuccess('User updated successfully.');
   }


   
}