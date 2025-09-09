<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Website\UserController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// ====== Public / Unsigned Routes ======
// Route::prefix('/stylemart')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('styleMart');
// });

// ====== Authentication Routes ======
Auth::routes(); // /login, /register, /logout, /password/reset

// ====== User Routes ======
Route::prefix('/user')->middleware(['auth', 'isUser'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    // Add other user routes here
});

// ====== Admin Routes ======
Route::prefix('/admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    // Add other admin routes here

    // orders page
    Route::get('/dashboard/orders', [AdminController::class, 'orders'])->name('admin.dashboard.orders');
    Route::put('/dashboard/orders/{order}', [AdminController::class, 'updateOrder'])->name('admin.dashboard.orders.update');

});

// ====== Default Redirect ======
// Optional: redirect /home to user's dashboard
Route::get('/home', function () {
    if (auth()->check()) {
        $role = auth()->user()->role;
        if ($role === 'admin') return redirect()->route('admin.dashboard');
        else return redirect()->route('user.dashboard');
    }
    return redirect('/stylemart');
})->name('home');
