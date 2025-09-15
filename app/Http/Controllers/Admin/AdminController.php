<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{

     public function dashboard()
    {
        // Total Sales (هنا اجمالي السعر من جدول الأوردرات)
        $totalSales = Order::sum('total_amount'); 

        // Orders count
        $ordersCount = Order::count();

        // Customers count
        $customersCount = User::count();

        // Products count
        $productsCount = Product::count();

        return view('admin.dashboard', compact(
            'totalSales',
            'ordersCount',
            'customersCount',
            'productsCount'
        ));
    }


    
    public function products()
    {

        return view('admin.products');
    }



    public function categories()
    {

        return view('admin.categories');
    }

    public function orders()
    {
        $orders = Order::with('user' , 'orderItems')->get();
        return view('admin.orders',compact('orders'));
    }
    public function updateOrder(Request $request, Order $order)
    {
        $order->status = $request->status;
        $order->save();
        return redirect()->back()->with('success', 'Order updated successfully!');
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
