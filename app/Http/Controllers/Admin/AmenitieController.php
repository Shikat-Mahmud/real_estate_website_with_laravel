<?php

namespace App\Http\Controllers\Admin;

use App\Models\Amenitie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class AmenitieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $amenities = Amenitie::all();
        return view('backend.amenitie.index', compact('amenities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.amenitie.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back() ->withErrors($validator) ->withInput();
        }
        DB::beginTransaction();
        try {
            $inputs = $request->all();
            $amenitie = Amenitie::create($inputs);
            DB::commit();
            return redirect()->route('amenities.index')->withSuccess('Amenitie created successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError('An error occurred: ' . $e->getMessage());
        }

    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $amenitie = Amenitie::find($id);

            return view('backend.amenitie.edit', compact('amenitie'));
        } catch (\Exception $e) {

            dd($e);
            return back()->withError('An error occurred: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back() ->withErrors($validator) ->withInput();
        }
        DB::beginTransaction();
        try {
            $inputs = $request->only('name', 'status');
            $amenitie = Amenitie::where('id', $id)->update($inputs);
            DB::commit();
            return redirect()->route('amenities.index')->withSuccess('Amenitie updated successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError('An error occurred: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $amenitie = Amenitie::find($id);
            $amenitie->delete();
            return redirect()->route('amenities.index')->withSuccess('Amenitie deleted successfully.');
        } catch (\Exception $e) {
            dd($e);
            return back()->withError('An error occurred: ' . $e->getMessage());
        }
    }
}