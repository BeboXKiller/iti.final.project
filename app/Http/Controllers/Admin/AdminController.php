<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function dashboard()
    {

        return view('admin.dashboard');
    }
    public function products()
    {

        return view('admin.products');
    }



    public function customers()
    {

        return view('admin.customers');
    }

    public function categories()
    {

        return view('admin.categories');
    }

    public function orders()
    {

        return view('admin.orders');
    }

    public function analytics()
    {

        return view('admin.analytics');
    }

    public function reports()
    {

        return view('admin.reports');
    }

    public function settings()
    {

        return view('admin.settings');
    }
}
