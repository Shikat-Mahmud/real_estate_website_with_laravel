<?php

namespace App\Http\Controllers\Admin;

use App\Models\Amenitie;
use App\Models\Location;
use App\Models\Property;
use App\Models\User;
use App\Models\BookProperty;
use Illuminate\Support\Str;
use App\Models\NearestPlace;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use App\Models\PropertyStatus;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Auth;

class PropertyManageController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $propertiesDetails = Property::orderBy('id', 'desc')->get();
        return view('backend.property.index', compact('propertiesDetails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $locations = Location::all();
        $property_types = PropertyType::all();
        $property_status = PropertyStatus::all();
        $amenities = Amenitie::whereStatus(1)->get();
        $nearests = NearestPlace::all();

        return view('backend.property.create', compact('locations', 'property_types', 'property_status', 'amenities', 'nearests'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        DB::beginTransaction();
        try {
            $inputs = $request->all();

            if ($request->hasFile('property_images')) {
                $images = $this->imageUpload($request);
                $inputs['property_images'] = json_encode($images);
            }
            $inputs['nearest_places'] = json_encode($request->nearest_places);
            $inputs['amenities'] = json_encode($request->aminities);
            $inputs['slug'] = Str::slug($request->title);
            $inputs['propertyid'] = Str::random(9);
            $inputs['user_id'] = Auth::id();
            $property = Property::create($inputs);
            DB::commit();
            return redirect()->route('properties.index')->withSuccess('Property added successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('properties.index')->withError('An error occurred: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $locations = Location::all();
        $property_types = PropertyType::all();
        $property_status = PropertyStatus::all();
        $amenities = Amenitie::all();
        $nearests = NearestPlace::all();
        $property = Property::find($id);
        // $property = Property::with(['location', 'amenities', 'nearestPlaces.place'])->find($id);


        return view('backend.property.show', compact('locations', 'property_types', 'property_status', 'amenities', 'nearests', 'property'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $locations = Location::all();
        $property_types = PropertyType::all();
        $property_status = PropertyStatus::all();
        $amenities = Amenitie::whereStatus(1)->get();
        $nearests = NearestPlace::all();
        $property = Property::find($id);

        return view('backend.property.edit', compact('locations', 'property_types', 'property_status', 'amenities', 'nearests', 'property'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        DB::beginTransaction();
        try {
            $inputs = $request->except('_token', '_method', 'aminities', 'nearest_places');

            if ($request->hasFile('property_images')) {
                $images = $this->imageUpload($request);
                $inputs['property_images'] = json_encode($images);
            }
            $inputs['nearest_places'] = json_encode($request->nearest_places);
            $inputs['amenities'] = json_encode($request->aminities);
            $inputs['slug'] = Str::slug($request->title);
            $inputs['propertyid'] = Str::random(9);
            $property = Property::where('id', $id)->update($inputs);
            DB::commit();
            return redirect()->route('properties.index')->withSuccess('Property updated successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('properties.index')->withError('An error occurred: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $property = Property::find($id);
            $property->delete();
            return redirect()->route('properties.index')->withSuccess('Property deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('properties.index')->withError('An error occurred: ' . $e->getMessage());
        }

    }

    public function imageUpload($request)
    {
        if ($request->hasFile('property_images')) {
            $images = [];
            foreach ($request->file('property_images') as $image) {
                $path = $image->store('images', 'public');
                $images[] = $path;
            }

            return $images;
        }
    }

}