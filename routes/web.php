<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Website\{UserController, AccountController, WishlistController, CartController};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{AccountController as AdminAccountController, CustomerController, AdminController, ProductController, CategoryController};
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
// ====== Public / Unsigned Routes ======
Route::get('/', [HomeController::class, 'index'])->name('styleMart');


// ====== Authentication Routes ======
// /login, /register, /logout, /password/reset

// ====== User Routes ======
Route::prefix('/user')->middleware(['auth', 'isUser'])->group(function () {
    Route::resource('cart', CartController::class);
    Route::post('cart/add-all-from-wishlist', [CartController::class, 'addAllFromWishlist'])->name('cart.addAllFromWishlist');
    Route::post('/checkout', [CartController::class, 'placeOrder'])->name('checkout.store');
    Route::get('/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('/whishlist', [UserController::class, 'whishList'])->name('user.wishlist');
    Route::resource('account', AccountController::class);
    Route::post('account/{id}/updatepassword', [AccountController::class, 'updatePassword'])
        ->name('account.updatePassword');
    Route::get('/allproducts', [UserController::class, 'allProducts'])->name('user.allproducts');
    Route::get('/product/{product}', [ProductController::class, 'show'])->name('user.product');
    Route::get('/whishlist', [UserController::class, 'whishList'])->name('user.wishlist');
    Route::get('/category/{category}/products', [CategoryController::class, 'showProductscategories'])->name('category.products');
    Route::get('/categories/{category}/products', [CategoryController::class, 'showProducts'])->name('categories.products');

    Route::controller(WishlistController::class)->group(function () {
        Route::get('/wishlist', 'index')->name('wishlist.index');
        Route::post('/wishlist/toggle', 'toggle')->name('wishlist.toggle');
        Route::delete('/wishlist/{product}', 'destroy')->name('wishlist.destroy');
        Route::delete('/wishlist', 'clear')->name('wishlist.clear');
        Route::get('/wishlist/count', 'count')->name('wishlist.count');
    });

    // Add other user routes here
});

// ====== Admin Routes ======
Route::prefix('/admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::post('categories/store', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/dashboard/orders', [AdminController::class, 'orders'])->name('admin.dashboard.orders');
    Route::put('/dashboard/orders/{order}', [AdminController::class, 'updateOrder'])->name('admin.dashboard.orders.update');
    Route::resource('customers', CustomerController::class);
    Route::resource('aaccount', AdminAccountController::class);
    Route::post('aaccount/{id}/updatepassword', [AdminAccountController::class, 'updatePassword'])
        ->name('aaccount.updatePassword');
});

// ====== Default Redirect ======
Route::get('/home', function () {
    if (auth()->check()) {
        $role = auth()->user()->role;
        if ($role === 'admin') return redirect()->route('admin.dashboard');
        else return redirect()->route('user.dashboard');
    }
    return redirect('/stylemart');
})->name('home');
