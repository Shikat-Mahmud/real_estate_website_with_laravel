<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class FaqSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqsection = FaqSection::all();
        return view('backend.title settings.faq_section.index', compact('faqsection'));
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
            $faqsection = FaqSection::find($id);

            return view('backend.title settings.faq_section.edit', compact('faqsection'));
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
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120', 
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    DB::beginTransaction();
    try {
        $inputs = $request->only('title', 'subtitle');
        
        // Check if 'photo' field is present in the request before updating
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoPath = $photo->store('photos', 'public'); // Store the photo and update the path as needed
            $inputs['photo'] = $photoPath;
        }

        $faqsection = FaqSection::where('id', $id)->update($inputs);

        DB::commit();
        return redirect()->route('faq-section.index')->withSuccess('FAQ Section updated successfully.');
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
