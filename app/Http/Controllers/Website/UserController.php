<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('website.index');
    }

    public function account(){
        return view('website.userAccount');
    }

    public function whishList(){
        return view('website.whishList');
    }

    public function userCart(){
        return view('website.userCart');
    }

    public function VeiwCategory(){
        return view('website.viewCategory');
    }

    public function VeiwProduct(){
        return view('website.viewProduct');
    }
}
