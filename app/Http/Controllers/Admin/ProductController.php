<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->get();
        $categories = Category::all();
        return view('admin.products', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.createProduct', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|min:3|max:100|alpha_dash:ascii',
        'price' => 'required|numeric|decimal:2',
        'description' => 'required|min:3|max:500|string',
        'category_id' => 'required|exists:categories,id',
        'quantity' => 'required|integer|max:9999',
        'image.*' => 'image|mimes:png,jpg,heic,svg|max:2048', // لاحظ image.*
    ]);

    $photoPaths = [];

    if ($request->hasFile('image')) {
        foreach ($request->file('image') as $file) {
            $photoPaths[] = $file->store('uploads/products', 'public');
        }
    }

  
    $validatedData['images'] = json_encode($photoPaths);

    Product::create($validatedData);

    return redirect()->route('products.index')->with('success', 'Product created successfully.');
}


   
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.editProduct', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:100|alpha_dash:ascii',
            'price' => 'required|numeric|decimal:2',
            'description' => 'required|min:3|max:500|string',
            'category_id' => 'required|exists:categories,id',
            'quantity' => 'required|integer|max:9999',
            'image' => 'nullable|image|mimes:png,jpg,heic,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')
                ->store('uploads/products', 'public');
        }

        // Update the existing product 
        $product->update($validatedData);

        return redirect()
            ->route('products.index')
            ->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back()
            ->with('success', 'product moved to trash.');
    }
}
