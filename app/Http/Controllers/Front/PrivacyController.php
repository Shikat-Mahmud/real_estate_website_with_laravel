<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Privacy;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class PrivacyController extends Controller
{
    public function privacy()
    {
        $privacy = Privacy::all();

        return view("backend.privacy.index", compact("privacy"));
    }
    public function edit()
    {
        $privacy = Privacy::firstOrFail();
        return view('backend.privacy.edit', compact('privacy'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back() ->withErrors($validator) ->withInput();
        }
        DB::beginTransaction();
        try {
            $inputs = $request->only('content');
            $privacy = Privacy::where('id', $id)->update($inputs);
            DB::commit();
            return redirect()->route('privacy.index')->withSuccess('Privacy updated successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withError('An error occurred: ' . $e->getMessage());
        }
    }


}
