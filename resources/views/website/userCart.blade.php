@extends('website.app')

@section('content')
<main class="py-8">
    <div class="container mx-auto px-4">
        <!-- Page Title -->
        <h1 class="text-3xl font-heading font-bold mb-8">Shopping Cart</h1>
        
        @if(session('success'))
        <div class="flex items-center bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded-md shadow-md mb-6 animate-fade-in"
            role="alert">
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
                        <x-cart-item :item="$item" />
                    @empty
                    <div class="text-center py-12">
                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" class="mx-auto text-gray-400 mb-4">
                            <path fill="currentColor" d="M7 22q-.825 0-1.412-.587Q5 20.825 5 20q0-.825.588-1.413Q6.175 18 7 18t1.412.587Q9 19.175 9 20q0 .825-.588 1.413Q7.825 22 7 22Zm10 0q-.825 0-1.412-.587Q15 20.825 15 20q0-.825.588-1.413Q16.175 18 17 18t1.413.587Q19 19.175 19 20q0 .825-.587 1.413Q17.825 22 17 22ZM6.15 6l2.4 5h7l2.75-5ZM5.2 4h14.75q.575 0 .875.512q.3.513.025 1.038l-3.55 6.4q-.275.5-.738.775Q16.1 13 15.55 13H8.1L7 15h12v2H7q-1.125 0-1.7-.988q-.575-.987-.05-1.962L6.6 11.6L3 4H1V2h3.25Zm3.35 7h7Z"/>
                        </svg>
                        <h3 class="text-xl font-semibold text-gray-600 mb-2">Your cart is empty</h3>
                        <p class="text-gray-500 mb-6">Start shopping to add items to your cart</p>
                        <a href="{{ url('/') }}" 
                           class="inline-flex items-center bg-primary text-white px-6 py-3 rounded-lg font-medium hover:bg-accent transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="mr-2">
                                <path fill="currentColor" d="M11 9h2V6h3V4h-3V1h-2v3H8v2h3v3Zm-4 9q-.825 0-1.412-.587Q5 16.825 5 16q0-.825.588-1.413Q6.175 14 7 14t1.412.587Q9 15.175 9 16q0 .825-.588 1.413Q7.825 18 7 18Zm10 0q-.825 0-1.412-.587Q15 16.825 15 16q0-.825.588-1.413Q16.175 14 17 14t1.413.587Q19 15.175 19 16q0 .825-.587 1.413Q17.825 18 17 18ZM7 17q.75 0 1.425-.387Q9.2 16.225 9.5 15.5h6.3q.275.725.95 1.113q.675.387 1.425.387q.75 0 1.425-.387Q20 16.225 20.3 15.5h.2q.425 0 .712-.288q.288-.287.288-.712t-.288-.712Q21.125 13.5 20.7 13.5h-1.15l-3.075-5.5H8.6l-.9-1.5H3.4v2h2.95l3.5 6.075l-1.3 2.325q-.225.4-.037.825q.188.425.638.425H17.5v-2H7.75q-.075 0-.137-.05q-.063-.05-.088-.125l-.025-.075Z"/>
                            </svg>
                            Start Shopping
                        </a>
                    </div>
                    @endforelse

                    <!-- Continue Shopping (only show if cart has items) -->
                    @if(count($cartItems) > 0)
                    <div class="text-center mt-8 pt-6 border-t border-gray-200">
                        <a href="{{ url('/home') }}"
                            class="text-primary font-medium inline-flex items-center hover:underline transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                class="mr-2">
                                <path fill="currentColor"
                                    d="M7.33 24l-2.83-2.829l9.339-9.175l-9.339-9.167l2.83-2.829l12.17 11.996z" />
                            </svg>
                            Continue Shopping
                        </a>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Order Summary -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl shadow-md p-6 sticky top-24 border border-gray-100">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Order Summary</h3>

                    <div class="space-y-4 mb-6">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Subtotal ({{ $count }} items)</span>
                            <span class="font-medium text-gray-900">${{ number_format((float)$subtotal, 2) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Shipping</span>
                            <span class="text-green-600 font-medium">Free</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Tax</span>
                            <span class="font-medium text-gray-900">${{ number_format((float)$tax, 2) }}</span>
                        </div>
                        <hr class="border-gray-200">
                        <div class="flex justify-between font-bold text-lg">
                            <span class="text-gray-900">Total</span>
                            <span class="text-primary">${{ number_format((float)$total, 2) }}</span>
                        </div>
                    </div>
                    <!-- Checkout Button -->
                    @if(count($cartItems) > 0)
                    <form action="{{ route('checkout.store') }}" method="post">
                        @csrf
                        <button type="submit"
                            class="w-full bg-primary text-white py-3 px-4 rounded-lg font-medium hover:bg-accent transition-all duration-300 transform hover:scale-[1.02] shadow-md">
                            Place Your Order
                        </button>
                    </form>
                    @else
                    <button disabled
                        class="w-full bg-gray-300 text-gray-500 py-3 px-4 rounded-lg font-medium cursor-not-allowed shadow-sm">
                        Cart is Empty
                    </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
