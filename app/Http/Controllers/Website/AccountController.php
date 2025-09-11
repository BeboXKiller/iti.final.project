<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Order;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $orders = $user->orders()->latest()->get();
        return view('website.userAccount' , compact('user' , 'orders'));
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
        //
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
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'first_name' => ['required' , 'regex:/^[\pL\s]+$/u' , 'max:100'],
            'last_name'  => ['required' , 'regex:/^[\pL\s]+$/u' , 'max:100'],
            'email'      => 'required|email|unique:users,email,'.$user->id,
            'phone'      => 'string|max:20',
            'address'    => 'nullable|string|max:255',
            'city'       => 'nullable|string|max:100',
        ]);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->save();

        return back()->with('profile_success', 'Profile updated successfully!');
    }

    public function updatePassword(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
        'current_password' => 'required',
        'new_password'     => 'required|string|min:6',
        'new_password_confirmation' => 'required|string|min:6',
    ]);

    if ($request->new_password !== $request->new_password_confirmation) {
        return back()->withErrors([
            'new_password_confirmation' => 'The confirmation password does not match.'
        ]);
    }

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('password_success', 'Password updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
