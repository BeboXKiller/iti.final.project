<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     public function index(){
        $products =Product::latest()->take(5)->get();
        $categories = Category::all();
        return view('website.index', compact('products', 'categories'));
    }

    public function showProducts(Category $category)
    {
        $products = $category->products; // Assuming a 'products' relationship exists in the Category model
        return view('admin.category_products', compact('category', 'products'));
    }
}
