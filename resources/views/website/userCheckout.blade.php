@extends('website.app')

@section('content')
<main class="py-8">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-heading font-bold mb-8">Checkout</h1>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            {{-- Checkout Form --}}
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-md p-6">
                    <form id="checkout-form" action="{{ route('checkout.store') }}" method="POST"
                          class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                        @csrf

                        {{-- Customer Info --}}
                        <div class="md:col-span-2">
                            <label>Email</label>
                            <input type="email" name="email" class="w-full px-3 py-2 border rounded-lg" required>
                        </div>
                        <div>
                            <label>First Name</label>
                            <input type="text" name="first_name" class="w-full px-3 py-2 border rounded-lg" required>
                        </div>
                        <div>
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="w-full px-3 py-2 border rounded-lg" required>
                        </div>
                        <div class="md:col-span-2">
                            <label>Address</label>
                            <input type="text" name="address" class="w-full px-3 py-2 border rounded-lg" required>
                        </div>
                        <div>
                            <label>City</label>
                            <input type="text" name="city" class="w-full px-3 py-2 border rounded-lg" required>
                        </div>
                        <div class="md:col-span-2">
                            <label>Phone</label>
                            <input type="tel" name="phone" class="w-full px-3 py-2 border rounded-lg" required>
                        </div>

                        {{-- Payment --}}
                        <h2 class="text-xl font-heading font-bold mb-6 md:col-span-2">Payment Method</h2>

                        <div class="space-y-4 md:col-span-2">
                            {{-- Credit Card --}}
                            <label class="flex items-center p-4 border rounded-lg cursor-pointer">
                                <input type="radio" name="payment" value="card" id="credit-card" class="mr-3" checked>
                                <span class="flex-1 font-medium">Credit Card</span>
                                <div class="flex space-x-2">
                                    <span class="bg-gray-100 px-2 py-1 rounded text-xs">VISA</span>
                                    <span class="bg-gray-100 px-2 py-1 rounded text-xs">MasterCard</span>
                                </div>
                            </label>

                            {{-- PayPal --}}
                            <label class="flex items-center p-4 border rounded-lg cursor-pointer">
                                <input type="radio" name="payment" value="paypal" id="paypal" class="mr-3">
                                <span class="flex-1 font-medium">PayPal</span>
                                <span class="bg-gray-100 px-2 py-1 rounded text-xs">PayPal</span>
                            </label>

                            {{-- Cash --}}
                            <label class="flex items-center p-4 border rounded-lg cursor-pointer">
                                <input type="radio" name="payment" value="cash" id="cash" class="mr-3">
                                <span class="flex-1 font-medium">Cash on Delivery</span>
                                <span class="bg-gray-100 px-2 py-1 rounded text-xs">Cash</span>
                            </label>
                        </div>

                        {{-- Credit Card Form --}}
                        <div id="credit-card-form" class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4 md:col-span-2">
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium mb-2">Card Number</label>
                                <input type="text" name="card_number"
                                    class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-primary"
                                    placeholder="1234 5678 9012 3456">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-2">Name on Card</label>
                                <input type="text" name="card_name"
                                    class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-primary"
                                    placeholder="John Doe">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-2">Expiration Date</label>
                                <input type="text" name="expiry"
                                    class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-primary"
                                    placeholder="MM/YY">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-2">Security Code</label>
                                <input type="text" name="cvv"
                                    class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-primary"
                                    placeholder="CVV">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Order Summary --}}
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl shadow-md p-6 sticky top-24">
                    <h3 class="text-xl font-heading font-bold mb-6">Order Summary</h3>

                    @foreach($cartItems as $item)
                        <div class="flex items-center mb-4">
                            <img src="{{ $item->options->image ?? 'https://placehold.co/60x80' }}"
                                class="w-12 h-16 rounded-lg">
                            <div class="flex-1 ml-4">
                                <h4>{{ $item->name }}</h4>
                                <p class="text-gray-500 text-sm">Qty: {{ $item->qty }}</p>
                            </div>
                            <span>${{ $item->subtotal() }}</span>
                        </div>
                    @endforeach

                    <div class="mt-4 space-y-2">
                        <div class="flex justify-between"><span>Subtotal</span><span>${{ $subtotal }}</span></div>
                        <div class="flex justify-between"><span>Tax</span><span>${{ $tax }}</span></div>
                        <div class="flex justify-between"><span>Shipping</span><span class="text-green-600">Free</span></div>
                        <hr class="border-gray-200">
                        <div class="flex justify-between font-bold text-lg">
                            <span>Total</span><span>${{ $total }}</span>
                        </div>
                    </div>
                    <form action="{{route('checkout.store')}}" method="post">
                        @csrf
                        <button type="submit" form="checkout-form"
                        class="w-full mt-6 bg-secondary text-white py-3 rounded-lg hover:bg-accent">
                            Place Your Order
                        </button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</main>

{{-- Toggle Payment UI --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const paymentRadios = document.querySelectorAll('input[name="payment"]');
        const cardForm = document.getElementById('credit-card-form');

        function toggleCardForm() {
            const selected = document.querySelector('input[name="payment"]:checked').value;
            cardForm.style.display = (selected === 'card') ? 'grid' : 'none';
        }

        toggleCardForm(); // init
        paymentRadios.forEach(radio => radio.addEventListener('change', toggleCardForm));
    });
</script>
@endsection