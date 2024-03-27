<?php

namespace App\Http\Controllers\Admin;

use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PartnerController extends Controller
{
    public function create()
    {
        return view('backend.partner.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back() ->withErrors($validator) ->withInput();
        }
        DB::beginTransaction();
        try {
            $inputs = $request->all();
            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('partner', 'public');
                $inputs['photo'] = $photoPath;
            }
            $locations = Partner::create($inputs);
            DB::commit();
            return redirect()->route('partners.index')->withSuccess('Partner created successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError('An error occurred: ' . $e->getMessage());
        }
    }
    public function index()
    {
        $partners =Partner::all();
        return view('backend.partner.index',compact('partners')); 
    }

    public function destroy($id)
    {
        try {
            $partner = Partner::find($id);

            if ($partner->photo) {
                // Use instance method to delete the file
                \Storage::delete($partner->photo);
            }

            $partner->delete();

            return redirect()->route('partners.index')->withSuccess('Partner deleted successfully.');
        } catch (\Exception $e) {
            return back()->withError('An error occurred: ' . $e->getMessage());
        }
    }


    public function edit($id)
    {
        try {
            $partner = Partner::find($id);
            return view('backend.partner.edit', compact('partner'));
        } catch (\Exception $e) {
            return back()->withError('An error occurred: ' . $e->getMessage());
        }
    }

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back() ->withErrors($validator) ->withInput();
        }
        DB::beginTransaction();

    try {
        $partner = Partner::find($id);
        $partner->name = $request->input('name');

        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Delete the old image if it exists
            if ($partner->photo) {
                Storage::delete($partner->photo);
            }

            // Upload the new image
            $photoPath = $request->file('photo')->store('partner', 'public');
            $partner->photo = $photoPath;
        }
        $partner->save();
        DB::commit();
        return redirect()->route('partners.index')->withSuccess('Partner updated successfully.');
    } catch (\Exception $e) {
        DB::rollback();
        return back()->withError('An error occurred: ' . $e->getMessage());
    }
    }
}