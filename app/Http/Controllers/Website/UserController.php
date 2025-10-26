<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $products = Product::latest()->take(4)->get();
        $categories = Category::all();
        // Get user's wishlist items if authenticated
        $wishlistItems = [];
        if (Auth::check()) {
            $wishlistItems = Wishlist::where('user_id', Auth::id())
                ->pluck('product_id')
                ->toArray();
        }
        return view('website.index', compact('products', 'categories', 'wishlistItems'));
    }
    public function allProducts()
    {
        $products = Product::all();
        $wishlistItems = [];
        if (Auth::check()) {
            $wishlistItems = Wishlist::where('user_id', Auth::id())
                ->pluck('product_id')
                ->toArray();
        }
        return view('website.products', compact('products', 'wishlistItems'));
    }
    public function account()
    {
        return view('website.userAccount');
    }

    public function whishList()
    {
        return view('website.wishlist');
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
        $wishlistItems = [];
        if (Auth::check()) {
            $wishlistItems = Wishlist::where('user_id', Auth::id())
                ->pluck('product_id')
                ->toArray();
        }
        return view('website.viewProduct', compact('wishlistItems'));
    }
}
