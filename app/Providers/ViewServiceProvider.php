<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Share wishlist count with all views
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $wishlistCount = Wishlist::getWishlistCount(Auth::id());
                $view->with('wishlistCount', $wishlistCount);
            } else {
                $view->with('wishlistCount', 0);
            }
        });
    }
}