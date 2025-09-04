<?php

use App\Http\Controllers\Website\UserController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('/stylemart')->group(function(){

    Route::get('/', [UserController::class, 'index'])->name('StyleMart');
    // Account Route
    Route::get('/account',[UserController::class, 'account'])->name('Account');
    // WhishList Route
    Route::get('/whishlist',[UserController::class, 'whishlist'])->name('WhishList');
    // Cart Route
    Route::get('/cart',[UserController::class, 'userCart'])->name('Cart');

    Route::get('/categories',[UserController::class, 'veiwCategory'])->name('Category');

    Route::get('/product',[UserController::class, 'veiwProduct'])->name('Product');

    Route::prefix('/admin')->group(function(){ 

        Route::get('/',[AdminController::class, 'dashboard'])->name('Dashboard');

        Route::get('/products',[AdminController::class, 'products'])->name('Products');

        Route::get('/customers',[AdminController::class, 'customers'])->name('Customers');

        Route::get('/orders',[AdminController::class, 'orders'])->name('Orders');

        Route::get('/categories',[AdminController::class, 'categories'])->name('Categories');

        Route::get('/analytics',[AdminController::class, 'analytics'])->name('Analytics');

        Route::get('/reports',[AdminController::class, 'reports'])->name('Reports');

        Route::get('/settings',[AdminController::class, 'settings'])->name('Settings');


    });

})->name('StyleMart'); 






