<?php

namespace App\Http\Controllers\Admin\location;

use App\Models\Location;
use App\Models\Property;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class LocationController extends Controller
{
    public function create()
    {
        return view('backend.location.create');
    }
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'city' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back() ->withErrors($validator) ->withInput();
        }
        DB::beginTransaction();
        try {
            $inputs = $request->all();
            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('locations', 'public');
                $inputs['photo'] = $photoPath;
            }
            $locations = Location::create($inputs);
            DB::commit();
            return redirect()->route('location.index')->withSuccess('Location created successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError('An error occurred: ' . $e->getMessage());
        }
    }
    public function index()
    {
         $property_locations =Location::all();
        return view('backend.location.index',compact('property_locations')); 
    }

    public function destroy($id)
    {
        try {
            $locations = Location::find($id);

            if ($locations->photo) {
                
                \Storage::delete($locations->photo);
            }

            $locations->delete();

            return redirect()->route('location.index')->withSuccess('Location deleted successfully.');
        } catch (\Exception $e) {
            return back()->withError('An error occurred: ' . $e->getMessage());
        }
    }


    public function edit($id)
    {
        try {
            $location = Location::find($id);
            $properties = Property::all();
            return view('backend.location.edit', compact('location', 'properties'));
        } catch (\Exception $e) {
            dd($e);
            return back()->withError('An error occurred: ' . $e->getMessage());
        }
    }
    

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [

            'name' => 'required',
            'city' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back() ->withErrors($validator) ->withInput();
        }
        DB::beginTransaction();

    try {
        $locations = Location::find($id);

        // Update textual fields
        $locations->name = $request->input('name');
        $locations->city = $request->input('city');

        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Delete the old image if it exists
            if ($locations->photo) {
                Storage::delete($locations->photo);
            }

            // Upload the new image
            $photoPath = $request->file('photo')->store('locations', 'public');
            $locations->photo = $photoPath;
        }

        $locations->save();

        DB::commit();

        return redirect()->route('location.index')->withSuccess('Location updated successfully.');
    } catch (\Exception $e) {
        DB::rollback();
        return back()->withError('An error occurred: ' . $e->getMessage());
    }
    }
    
}