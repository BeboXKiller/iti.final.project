@extends('website.app')

@section('content')
    <main class="py-8">
        <div class="container mx-auto px-4">
            <!-- Breadcrumb -->
            <nav class="mb-8">
                <ol class="flex items-center space-x-2 text-sm">
                    <li><a href="{{ url('/') }}" class="text-primary hover:underline">Home</a></li>
                    <li class="text-gray-400">/</li>
                    <li class="text-gray-600">Shopping Cart</li>
                </ol>
            </nav>

            <!-- Page Title -->
            <h1 class="text-3xl font-heading font-bold mb-8">Shopping Cart</h1>
            @if(session('success'))
                <div class="flex items-center bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded-md shadow-md mb-6 animate-fade-in"
                    role="alert">
                    <!-- Icon -->
                    <svg class="w-6 h-6 mr-2 text-green-600" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            @endif


            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Cart Items -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl shadow-md p-6">

                        @forelse ($cartItems as $item)
                            <div class="flex items-center border-b border-gray-200 pb-6 mb-6">
                                <img src="{{ $item->options->image}}"
                                    alt="{{ $item->name }}" class="w-24 h-30 object-cover rounded-lg">
                                <div class="flex-1 ml-6">
                                    <h3 class="font-medium text-lg mb-1">{{ $item->name }}</h3>
                                    <p class="text-gray-500 text-sm mb-2">{{ Str::limit($item->options->description, 50) }}</p>

                                    <form action="{{ route('cart.update', $item->rowId) }}" method="POST"
                                        class="flex items-center space-x-4">
                                        @csrf
                                        @method('PUT')
                                        <div class="flex items-center border border-gray-300 rounded-lg">
                                            <button type="submit" name="qty" value="{{ $item->qty - 1 }}"
                                                class="p-2 hover:bg-gray-100" @if($item->qty <= 1) disabled @endif>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 24 24">
                                                    <path fill="currentColor" d="M19 13H5v-2h14v2z" />
                                                </svg>
                                            </button>
                                            <span class="px-4 py-2 min-w-12 text-center">{{ $item->qty }}</span>
                                            <button type="submit" name="qty" value="{{ $item->qty + 1 }}"
                                                class="p-2 hover:bg-gray-100">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 24 24">
                                                    <path fill="currentColor" d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </form>

                                    <form action="{{ route('cart.destroy', $item->rowId ) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-500 hover:text-red-700 p-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M7 21q-.825 0-1.412-.587Q5 19.825 5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413Q17.825 21 17 21ZM17 6H7v13h10ZM9 17h2V8H9Zm4 0h2V8h-2ZM7 6v13Z" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                                <div class="text-right">
                                    <p class="font-heading font-bold text-lg">${{ $item->subtotal() }}</p>
                                    <p class="text-gray-500 text-sm">${{ $item->price }} each</p>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-500">Your cart is empty.</p>
                        @endforelse

                        <!-- Continue Shopping -->
                        <div class="text-center mt-8">
                            <a href="{{ url('/') }}"
                                class="text-primary font-medium inline-flex items-center hover:underline">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                    class="mr-2">
                                    <path fill="currentColor"
                                        d="M7.33 24l-2.83-2.829l9.339-9.175l-9.339-9.167l2.83-2.829l12.17 11.996z" />
                                </svg>
                                Continue Shopping
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-md p-6 sticky top-24">
                        <h3 class="text-xl font-heading font-bold mb-6">Order Summary</h3>

                        <div class="space-y-4 mb-6">
                            <div class="flex justify-between">
                                <span>Subtotal ({{ $count }} items)</span>
                                <span class="subtotal-amount">${{ $subtotal }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Shipping</span>
                                <span class="text-green-600">Free</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Tax</span>
                                <span class="tax-amount">${{ $tax }}</span>
                            </div>
                            <hr class="border-gray-200">
                            <div class="flex justify-between font-heading font-bold text-lg">
                                <span>Total</span>
                                <span class="total-amount">${{ $total }}</span>
                            </div>
                        </div>

                        <!-- Checkout Button -->
                        <form action="{{route ('checkout.store')}}" method="post">
                            @csrf
                            <button type="submit" 
                                    onclick="return confirm('Are you sure you want to place this order?')"
                                    class="w-full mt-6 bg-secondary text-white py-3 rounded-lg hover:bg-accent">
                                Place Your Order
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection