<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FeturePropertySection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class FeturePropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $feturepropertysection = FeturePropertySection::all();
        return view('backend.title settings.fetureproperty_section.index', compact('feturepropertysection'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
            $feturepropertysection = FeturePropertySection::find($id);

            return view('backend.title settings.fetureproperty_section.edit', compact('feturepropertysection'));
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
            'title' => 'required',
            'subtitle' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back() ->withErrors($validator) ->withInput();
        }
        DB::beginTransaction();
        try {
            $inputs = $request->only('title', 'subtitle');
            $feturepropertysection = FeturePropertySection::where('id', $id)->update($inputs);
            DB::commit();
            return redirect()->route('fetureproperty-section.index')->withSuccess('Feture Property Section updated successfully.');
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
        //
    }
}
