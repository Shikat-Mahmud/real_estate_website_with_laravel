<?php

namespace App\Http\Controllers\Admin\property;

use App\Models\PropertyType;
use App\Models\Property;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\NearestPlace;


class PropertytypeController extends Controller
{

    
    public function create()
    {
        $nearest_places =NearestPlace::all();

        return view('backend.propertytype.create')->with('nearest_places', $nearest_places);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back() ->withErrors($validator) ->withInput();
        }
        DB::beginTransaction();
        try {
            $inputs = $request->all();
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $path = $image->store('propertytype', 'public');
                $inputs['image'] = $path;
            }
            $property_types = PropertyType::create($inputs);
            DB::commit();
            return redirect()->route('propertyType.index')->withSuccess('Property type created successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError('An error occurred: ' . $e->getMessage());
        }
    }
    public function index()
    {
        $property_types =PropertyType::all();
        $properties=Property::all();
        return view('backend.propertytype.index',compact('property_types'));
    }
    public function destroy($id)
    {
        try {
            $property_types = PropertyType::find($id);

            if ($property_types->image) {
                // Delete the image file from the storage
                \Storage::delete($property_types->image);
            }
    $property_types->delete();
            return redirect()->route('propertyType.index')->withSuccess('Property type deleted successfully.');
        } catch (\Exception $e) {
            return back()->withError('An error occurred: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {

        try {
            $property_types = PropertyType::find($id);
            return view('backend.propertytype.edit', compact('property_types'));
        } catch (\Exception $e) {
            dd($e);
            return back()->withError('An error occurred: ' . $e->getMessage());
        }
    }


    public function update(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    DB::beginTransaction();

    try {
        $propertyType = PropertyType::find($id);
        $inputs = $request->only('name');

        // Check if the property type has an associated image
        if ($propertyType->image) {
            // Delete the existing image file from storage
            Storage::delete($propertyType->image);
        }

        // Upload the new image file to storage
        if ($request->hasFile('image')) {
                $image = $request->file('image');
                $path = $image->store('propertytype', 'public');
                $inputs['image'] = $path;
            }

        // Update the property type record with the new data
        $propertyType->update($inputs);

        DB::commit();

        return redirect()->route('propertyType.index')->withSuccess('Property type updated successfully.');
    } catch (\Exception $e) {
        DB::rollback();
        return back()->withError('An error occurred: ' . $e->getMessage());
    }
}
}