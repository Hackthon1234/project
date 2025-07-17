<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('order', 'asc')->get();
        return view('categories.index', compact('categories'));
    }
    public function create()
    {
        return view('categories.create');
    }
    public function store(Request $request)
    {
       $data = $request->validate([
        'name' => 'required',
        'order' => 'required|integer',
    ]);
        Category::create($data);

        return redirect()->route('categories.index')->with('success', 'Category created successfully');
    }
    public function edit($id)
    {
        $category = Category::find($id);
        return view('categories.edit', compact('category'));
    }
    public function update(Request $request,$id)
    {
        $data = $request->validate([
        'name' => 'required',
        'order' => 'required|integer',
        ]);
        $category = Category::find($id);
        $category->update($data);
        return redirect()->route('categories.index')->with('update','Category Has Been Updated Successfully.');

    }
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('categories.index')->with('delete','Category Deleted Successfully.');

    }
}
