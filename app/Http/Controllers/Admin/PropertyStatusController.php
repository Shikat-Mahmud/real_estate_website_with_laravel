<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PropertyStatus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PropertyStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $property_statuses = PropertyStatus::all();
        return view('backend.status.index', compact('property_statuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.status.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        DB::beginTransaction();
        try {
            $inputs = $request->all();
            $status = PropertyStatus::create($inputs);
            DB::commit();
            return redirect()->route('status.index')->withSuccess('Status created successfully.');
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
            $property_statuses = PropertyStatus::find($id);

            return view('backend.status.edit', compact('property_statuses'));
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
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();
        try {
            $inputs = $request->only('name');
            $property_statuses = PropertyStatus::where('id', $id)->update($inputs);
            DB::commit();
            return redirect()->route('status.index')->withSuccess('Status updated successfully.');
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
            $property_statuses = PropertyStatus::find($id);
            $property_statuses->delete();
            return redirect()->route('status.index')->withSuccess('Status deleted successfully.');
        } catch (\Exception $e) {
            dd($e);
            return back()->withError('An error occurred: ' . $e->getMessage());
        }
    }
}
