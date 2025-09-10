<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Website\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    CustomerController,
    AdminController,
    ProductController,
    CategoryController
};

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
    Route::get('/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('/whishlist', [UserController::class, 'whishList'])->name('user.wishlist');
    Route::get('/category/{category}/products', [CategoryController::class, 'showProductscategories'])->name('category.products');
    Route::get('/categories/{category}/products', [CategoryController::class, 'showProducts'])->name('categories.products');
    // Add other user routes here
});

// ====== Admin Routes ======
Route::prefix('/admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::get('/dashboard/orders', [AdminController::class, 'orders'])->name('admin.dashboard.orders');
    Route::put('/dashboard/orders/{order}', [AdminController::class, 'updateOrder'])->name('admin.dashboard.orders.update');
    Route::resource('customers', CustomerController::class);
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
