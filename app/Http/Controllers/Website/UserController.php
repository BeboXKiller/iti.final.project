<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class UserController extends Controller
{
     public function index(){
        $products =Product::latest()->take(5)->get();
        $categories = Category::all();
        return view('website.index', compact('products', 'categories'));
    }

    public function account()
    {
        return view('website.userAccount');
    }

    public function whishList()
    {
        return view('website.whishList');
    }

    public function userCart()
    {
        return view('website.userCart');
    }

    public function VeiwCategory()
    {
        return view('website.viewCategory');
    }

    public function VeiwProduct()
    {
        return view('website.viewProduct');
    }
}
