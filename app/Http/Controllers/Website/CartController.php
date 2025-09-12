<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderItem;
use Gloudemans\Shoppingcart\Facades\Cart;
use app\Http\Controllers\Website\WishlistController;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cartItems = Cart::content();
        $subtotal = Cart::subtotal(2, '.', ',');
        $tax = Cart::tax(2, '.', ',');
        $total = Cart::total(2, '.', ',');
        $count = Cart::count();
        return view('website.userCart', compact('cartItems', 'subtotal', 'tax', 'total', 'count'));
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
        $qty = (int) $request->input('qty', 1);

        // Optional: prevent adding more than available stock
        $qty = min($qty, $product->quantity);
        Cart::add(
            $product->id,
            $product->name,
            $qty,
            $product->price,
            0,
            [
                'image'   => $product->image,
                'details' => $product->description,
            ]
        );
        if ($request->has('redirect_back')) {
            return redirect()->back()->with('success', 'Added To Cart successfully');
        }
        return redirect()->route('styleMart')->with('success', 'Added To Cart successfully');
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
        return redirect()->back()->with('success', 'Cart Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Cart::remove($id);
        return redirect()->back()->with('success', 'Product Removed');
    }

    public function addAllFromWishlist()
    {
        $wishlistItems = auth()->user()->wishlists()->get();
        $added = 0;
        foreach ($wishlistItems as $wishlistItem) {
            $product = $wishlistItem->product;

            if ($product && $product->quantity > 0) {
                Cart::add(
                    $product->id,
                    $product->name,
                    1,
                    $product->price,
                    0,
                    [
                        'image' => $product->images
                            ? json_decode($product->images, true)[0] ?? null
                            : null,
                        'description' => $product->description,
                    ]
                );
                $added++;
            }
        }

        if ($added === 0) {
            return redirect()->back()->with('error', 'No available items to add to cart.');
        }

        return redirect()->back()->with('success', "$added item(s) have been added to your cart.");
    }


    public function placeOrder(Request $request)
    {
        $total = Cart::total(2, '.', ',');

        $order = Order::create([
            'user_id'      => auth()->user()->id,
            'total_amount' => $total,
            'status'       => 'pending',
        ]);

        foreach (Cart::content() as $item) {
            OrderItem::create([
                'order_id'   => $order->id,
                'product_id' => $item->id,
                'quantity'   => $item->qty,
                'price'      => $item->price,
            ]);
        }

        Cart::destroy();

        return redirect()->route('styleMart')->with('success',  'Order placed successfully!');
    }
}
