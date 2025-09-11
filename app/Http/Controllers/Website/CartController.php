<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cartItems = Cart::content();
        $subtotal = Cart::subtotal(2,'.',',');
        $tax = Cart::tax(2,'.',',');
        $total = Cart::total(2,'.',',');
        return view('website.userCart', compact('cartItems','subtotal','tax','total'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        Cart::add(
            $product->id,
            $product->name,
            1,
            $product->price,
            0,
            [
                'image'   => $product->image,
                'details' => $product->description,
            ]
        );
        return redirect()->route('styleMart')->with('success','Added To Cart successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $qty = max(1, (int) $request->qty);
        Cart::update($id, $qty);
        return redirect()->back()->with('success','Cart Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Cart::remove($id);
        return redirect()->back()->with('success','Product Removed');
    }
}
