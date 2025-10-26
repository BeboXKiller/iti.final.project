<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\Wishlist;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
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
        
        // Get raw numbers without formatting first
        $rawSubtotal = (float) Cart::subtotal(2, '.', '');
        $rawTax = (float) Cart::tax(2, '.', '');
        $rawTotal = (float) Cart::total(2, '.', '');
        $count = Cart::count();
        
        // Format for display
        $subtotal = number_format($rawSubtotal, 2, '.', ',');
        $tax = number_format($rawTax, 2, '.', ',');
        $total = number_format($rawTotal, 2, '.', ',');
        
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

        // Prevent adding more than available stock
        $qty = min($qty, $product->quantity);

        $images = json_decode($product->images, true);
        $firstImage = $images[0] ?? null;

        // Ensure price is properly formatted as float
        $price = (float) $product->price;

        Cart::add(
            $product->id,
            $product->name,
            $qty,
            $price, // Use the properly casted price
            0,
            [
                'image'   => $firstImage,
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

    public function addAllFromWishlist(Request $request)
    {
        try {
            $wishlistItems = Wishlist::with('product')
                ->where('user_id', Auth::id())
                ->get();

            $addedCount = 0;
            $outOfStockCount = 0;

            foreach ($wishlistItems as $wishlistItem) {
                $product = $wishlistItem->product;
                
                if ($product && $product->quantity > 0) {
                    $existingCartItem = Cart::search(function ($cartItem, $rowId) use ($product) {
                        return $cartItem->id == $product->id;
                    });

                    if ($existingCartItem->isEmpty()) {
                        $images = json_decode($product->images, true);
                        $firstImage = $images[0] ?? null;

                        // Ensure price is properly cast to float
                        $price = (float) $product->price;

                        Cart::add(
                            $product->id,
                            $product->name,
                            1,
                            $price, // Use the properly casted price
                            0,
                            [
                                'image'   => $firstImage,
                                'details' => $product->description,
                            ]
                        );
                        $addedCount++;
                    }
                } else {
                    $outOfStockCount++;
                }
            }

            // if ($addedCount > 0) {
            //     Wishlist::where('user_id', Auth::id())->delete();
            // }

            $message = "{$addedCount} items added to cart successfully!";
            if ($outOfStockCount > 0) {
                $message .= " {$outOfStockCount} items were out of stock.";
            }

            return redirect()->route('cart.index')->with('success', $message);

        } catch (\Exception $e) {
            \Log::error('Add all from wishlist error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to add items to cart. Please try adding them individually.');
        }
    }
    /**
     * Get the first product image
     */
    private function getFirstProductImage($product)
    {
        $images = json_decode($product->images, true);
        return $images[0] ?? null;
    }


    public function placeOrder(Request $request)
    {
        // Get the raw total without formatting
        $rawTotal = (float) Cart::total(2, '.', '');
        
        $order = Order::create([
            'user_id'      => Auth::id(),
            'total_amount' => $rawTotal, // Use the raw float value
            'status'       => 'pending',
        ]);

        foreach (Cart::content() as $item) {
            OrderItem::create([
                'order_id'   => $order->id,
                'product_id' => $item->id,
                'quantity'   => $item->qty,
                'price'      => (float) $item->price, // Ensure price is float
            ]);
        }

        Cart::destroy();

        return redirect()->route('home')->with('success', 'Order placed successfully!');
    }
}
