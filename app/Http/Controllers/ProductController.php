<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::orderBy('order', 'asc')->get();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'discounted_price' => 'nullable|numeric',
            'description' => 'nullable|string',
            'category_id' => 'required|integer',
            'stock' => 'required|integer',
            'photopath' => 'required|image|mimes:jpeg,png,jpg,gif|max:20480'
        ]);

        $file = $request->file('photopath');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images/products'), $filename);
        $data['photopath'] = $filename;

        Product::create($data);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function edit($id) 
    {
        $product=Product::findOrFail($id);
        $categories = Category::orderBy('order','asc')->get();
        return view('products.edit', compact('product', 'categories')); 
    }

    public function update(Request $request, $id) 
    {
                $data = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'discounted_price' => 'nullable|numeric',
            'description' => 'nullable|string',
            'category_id' => 'required|integer',
            'stock' => 'required|integer',
            'photopath' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480'
        ]);

          $product=Product::findOrFail($id);

        if($request->hasFile('photopath'))
        {

        $file = $request->file('photopath');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images/products'), $filename);
        $data['photopath'] = $filename;


        $oldphotopath = public_path('images/products'.$product->photopath);

        if(file_exists($oldphotopath))
        {

            unlink($oldphotopath);
        }

        }
        $product->update($data);
        return redirect()->route('products.index')->with('update','Product Updated successfully.');
    }


    public function destroy($id) 
    {
       $product = Product::findOrFail($id);
        $oldphotopath = public_path('images/products/' . $product->photopath);

        if (file_exists($oldphotopath)) {
            unlink($oldphotopath);
        }

        $product->delete();
        return redirect()->route('products.index')->with('delete', 'Product deleted successfully.'); 
    }
}
