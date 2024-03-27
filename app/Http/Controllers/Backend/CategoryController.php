<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $category;
    public function create()
    {
        return view('backend.category.create');
    }
    public function store(Request $request)
    {
        Category::createCategory($request);
        return redirect()->back()->with('success','Category Create Successfully');
    }
    public function index()
    {
        return view('backend.category.index',[
            'categories' => Category::all()
        ]);
    }
}
