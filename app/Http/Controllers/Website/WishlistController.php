<?php

namespace App\Http\Controllers\Website;

use App\Models\Wishlist;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Gloudemans\Shoppingcart\Facades\Cart;

class WishlistController extends Controller
{
    /**
     * Display a listing of the wishlist items.
     */
    public function index()
    {
        $wishlists = Wishlist::with('product')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        $wishlistItems = [];
        if (Auth::check()) {
            $wishlistItems = Wishlist::where('user_id', Auth::id())
                ->pluck('product_id')
                ->toArray();
        }
        return view('website.wishlist', compact('wishlists', 'wishlistItems'));
    }

    /**
     * Store a newly created wishlist item.
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'product_id' => 'required|exists:products,id'
        ]);

        try {
            $wishlist = Wishlist::firstOrCreate([
                'user_id' => Auth::id(),
                'product_id' => $request->product_id
            ]);

            if ($wishlist->wasRecentlyCreated) {
                $product = Product::find($request->product_id);
                return response()->json([
                    'success' => true,
                    'message' => $product->name . ' added to wishlist!',
                    'wishlist_count' => Auth::user()->wishlist_count,
                    'action' => 'added'
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Item already in wishlist',
                    'action' => 'exists'
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to add item to wishlist'
            ], 500);
        }
    }

    /**
     * Remove the specified wishlist item.
     */
    public function destroy($productId): JsonResponse
    {
        try {
            $deleted = Wishlist::where('user_id', Auth::id())
                ->where('product_id', $productId)
                ->delete();

            if ($deleted) {
                $product = Product::find($productId);
                return response()->json([
                    'success' => true,
                    'message' => $product->name . ' removed from wishlist!',
                    'wishlist_count' => Auth::user()->wishlist_count,
                    'action' => 'removed'
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'Item not found in wishlist'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to remove item from wishlist'
            ], 500);
        }
    }

    /**
     * Toggle wishlist item (add/remove).
     */
    public function toggle(Request $request): JsonResponse
    {
        $request->validate([
            'product_id' => 'required|exists:products,id'
        ]);

        try {
            $wishlist = Wishlist::where('user_id', Auth::id())
                ->where('product_id', $request->product_id)
                ->first();

            if ($wishlist) {
                // Remove from wishlist
                $wishlist->delete();
                $product = Product::find($request->product_id);
                return response()->json([
                    'success' => true,
                    'message' => $product->name . ' removed from wishlist!',
                    'wishlist_count' => Auth::user()->wishlist_count,
                    'action' => 'removed',
                    'in_wishlist' => false
                ]);
            } else {
                // Add to wishlist
                Wishlist::create([
                    'user_id' => Auth::id(),
                    'product_id' => $request->product_id
                ]);
                $product = Product::find($request->product_id);
                return response()->json([
                    'success' => true,
                    'message' => $product->name . ' added to wishlist!',
                    'wishlist_count' => Auth::user()->wishlist_count,
                    'action' => 'added',
                    'in_wishlist' => true
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred'
            ], 500);
        }
    }

    /**
     * Get wishlist count for authenticated user.
     */
    /**
 * Get wishlist count for authenticated user.
 */
    public function count(): JsonResponse
    {
        $count = Wishlist::where('user_id', Auth::id())->count();
        
        return response()->json([
            'count' => $count
        ]);
    }

    /**
     * Clear all wishlist items for authenticated user.
     */
    public function clear(): JsonResponse
    {
        try {
            $deleted = Wishlist::where('user_id', Auth::id())->delete();

            return response()->json([
                'success' => true,
                'message' => 'Wishlist cleared successfully!',
                'deleted_count' => $deleted,
                'wishlist_count' => 0
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to clear wishlist'
            ], 500);
        }
    }
}