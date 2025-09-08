<?php

use App\Http\Controllers\Admin\ProductController;
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
    Route::get('/', [UserController::class, 'index'])->name('styleMart');
// });

// ====== Authentication Routes ======
Auth::routes(); // /login, /register, /logout, /password/reset

// ====== User Routes ======
Route::prefix('/user')->middleware(['auth', 'isUser'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    // Add other user routes here
});

// ====== Admin Routes ======
Route::prefix('/home')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('products', ProductController::class);
    // Add other admin routes here
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
