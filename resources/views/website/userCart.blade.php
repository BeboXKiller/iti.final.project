@extends('website.app')

@section('content')
<!-- Page Title -->
    <h1 class="text-3xl font-heading font-bold mb-8">Shopping Cart</h1>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Cart Items -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl shadow-md p-6">
                <!-- Cart Item 1 -->
                <div class="flex items-center border-b border-gray-200 pb-6 mb-6">
                    <img src="https://placehold.co/120x150/254D70/EFE4D2?text=Shirt" alt="Classic White Shirt"
                        class="w-24 h-30 object-cover rounded-lg">
                    <div class="flex-1 ml-6">
                        <h3 class="font-medium text-lg mb-1">Classic White Shirt</h3>
                        <p class="text-gray-500 text-sm mb-2">Color: White | Size: M</p>
                        <div class="flex items-center space-x-4">
                            <div class="flex items-center border border-gray-300 rounded-lg">
                                <button class="p-2 hover:bg-gray-100 quantity-btn" data-action="decrease">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M19 13H5v-2h14v2z" />
                                    </svg>
                                </button>
                                <span class="px-4 py-2 min-w-12 text-center quantity-value">2</span>
                                <button class="p-2 hover:bg-gray-100 quantity-btn" data-action="increase">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z" />
                                    </svg>
                                </button>
                            </div>
                            <button class="text-red-500 hover:text-red-700 p-2" onclick="removeItem(this)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M7 21q-.825 0-1.412-.587Q5 19.825 5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413Q17.825 21 17 21ZM17 6H7v13h10ZM9 17h2V8H9Zm4 0h2V8h-2ZM7 6v13Z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="font-heading font-bold text-lg">$99.98</p>
                        <p class="text-gray-500 text-sm">$49.99 each</p>
                    </div>
                </div>

                <!-- Cart Item 2 -->
                <div class="flex items-center border-b border-gray-200 pb-6 mb-6">
                    <img src="https://placehold.co/120x150/954C2E/EFE4D2?text=Jeans" alt="Blue Denim Jeans"
                        class="w-24 h-30 object-cover rounded-lg">
                    <div class="flex-1 ml-6">
                        <h3 class="font-medium text-lg mb-1">Blue Denim Jeans</h3>
                        <p class="text-gray-500 text-sm mb-2">Color: Blue | Size: L</p>
                        <div class="flex items-center space-x-4">
                            <div class="flex items-center border border-gray-300 rounded-lg">
                                <button class="p-2 hover:bg-gray-100 quantity-btn" data-action="decrease">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M19 13H5v-2h14v2z" />
                                    </svg>
                                </button>
                                <span class="px-4 py-2 min-w-12 text-center quantity-value">1</span>
                                <button class="p-2 hover:bg-gray-100 quantity-btn" data-action="increase">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z" />
                                    </svg>
                                </button>
                            </div>
                            <button class="text-red-500 hover:text-red-700 p-2" onclick="removeItem(this)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M7 21q-.825 0-1.412-.587Q5 19.825 5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413Q17.825 21 17 21ZM17 6H7v13h10ZM9 17h2V8H9Zm4 0h2V8h-2ZM7 6v13Z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="font-heading font-bold text-lg">$79.99</p>
                        <p class="text-gray-500 text-sm">$79.99 each</p>
                    </div>
                </div>

                <!-- Continue Shopping -->
                <div class="text-center mt-8">
                    <a href="index.html" class="text-primary font-medium inline-flex items-center hover:underline">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="mr-2">
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
                        <span>Subtotal (3 items)</span>
                        <span class="subtotal-amount">$179.97</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Shipping</span>
                        <span class="text-green-600">Free</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Tax</span>
                        <span class="tax-amount">$14.40</span>
                    </div>
                    <hr class="border-gray-200">
                    <div class="flex justify-between font-heading font-bold text-lg">
                        <span>Total</span>
                        <span class="total-amount">$194.37</span>
                    </div>
                </div>

                <!-- Promo Code -->
                <div class="mb-6">
                    <label class="block text-sm font-medium mb-2">Promo Code</label>
                    <div class="flex">
                        <input type="text" placeholder="Enter code"
                            class="flex-1 px-3 py-2 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-primary">
                        <button class="bg-primary text-white px-4 py-2 rounded-r-lg hover:bg-accent">Apply</button>
                    </div>
                </div>

                <!-- Checkout Button -->
                <button
                    class="w-full bg-secondary text-white py-3 rounded-lg font-medium hover:bg-accent transition-colors mb-4">
                    Proceed to Checkout
                </button>

                <!-- Payment Methods -->
                <div class="text-center">
                    <p class="text-sm text-gray-500 mb-3">Secure payment with</p>
                    <div class="flex justify-center space-x-3">
                        <div class="bg-gray-100 p-2 rounded">
                            <svg width="32" height="20" viewBox="0 0 32 20" fill="none">
                                <rect width="32" height="20" rx="4" fill="#1434CB" />
                                <text x="16" y="14" font-family="Arial" font-size="8" fill="white"
                                    text-anchor="middle">VISA</text>
                            </svg>
                        </div>
                        <div class="bg-gray-100 p-2 rounded">
                            <svg width="32" height="20" viewBox="0 0 32 20" fill="none">
                                <rect width="32" height="20" rx="4" fill="#EB001B" />
                                <circle cx="12" cy="10" r="6" fill="#FF5F00" />
                                <circle cx="20" cy="10" r="6" fill="#F79E1B" />
                            </svg>
                        </div>
                        <div class="bg-gray-100 p-2 rounded">
                            <svg width="32" height="20" viewBox="0 0 32 20" fill="none">
                                <rect width="32" height="20" rx="4" fill="#003087" />
                                <text x="16" y="14" font-family="Arial" font-size="6" fill="white"
                                    text-anchor="middle">PayPal</text>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- You might also like -->
    <section class="mt-12">
        <h2 class="text-2xl font-heading font-bold mb-6">You might also like</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white rounded-2xl p-4 shadow-md">
                <div class="relative overflow-hidden rounded-xl mb-4">
                    <img src="https://placehold.co/300x400/131D4F/EFE4D2?text=Sweater" alt="Cozy Sweater" class="w-full">
                    <button
                        class="absolute top-3 right-3 bg-white rounded-full p-2 shadow-md hover:bg-secondary hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M20.16 4.61A6.27 6.27 0 0 0 12 4a6.27 6.27 0 0 0-8.16 9.48l7.45 7.45a1 1 0 0 0 1.42 0l7.45-7.45a6.27 6.27 0 0 0 0-8.87Zm-1.41 7.46L12 18.81l-6.75-6.74a4.28 4.28 0 0 1 3-7.3a4.25 4.25 0 0 1 3 1.25a1 1 0 0 0 1.42 0a4.27 4.27 0 0 1 6 6.05Z" />
                        </svg>
                    </button>
                </div>
                <h3 class="font-medium mb-1">Cozy Sweater</h3>
                <div class="flex justify-between items-center">
                    <span class="font-heading font-bold text-lg">$59.99</span>
                    <button class="bg-primary text-white p-2 rounded-lg hover:bg-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>


    <script>
        // Cart functionality
        let cartTotal = 179.97;
        let taxRate = 0.08;

        // Quantity controls
        document.querySelectorAll('.quantity-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                const action = this.dataset.action;
                const quantityElement = this.parentElement.querySelector('.quantity-value');
                let quantity = parseInt(quantityElement.textContent);

                if (action === 'increase') {
                    quantity++;
                } else if (action === 'decrease' && quantity > 1) {
                    quantity--;
                }

                quantityElement.textContent = quantity;
                updateCartTotals();
            });
        });

        // Remove item function
        function removeItem(button) {
            if (confirm('Are you sure you want to remove this item?')) {
                button.closest('.flex').remove();
                updateCartTotals();
                updateCartCount();
            }
        }

        // Update cart totals
        function updateCartTotals() {
            const items = document.querySelectorAll('.quantity-value');
            let subtotal = 0;

            items.forEach((item, index) => {
                const quantity = parseInt(item.textContent);
                const prices = [49.99, 79.99]; // Product prices
                subtotal += quantity * prices[index];
            });

            const tax = subtotal * taxRate;
            const total = subtotal + tax;

            document.querySelector('.subtotal-amount').textContent = `$${subtotal.toFixed(2)}`;
            document.querySelector('.tax-amount').textContent = `$${tax.toFixed(2)}`;
            document.querySelector('.total-amount').textContent = `$${total.toFixed(2)}`;
        }

        // Update cart count in header
        function updateCartCount() {
            const items = document.querySelectorAll('.quantity-value');
            let totalItems = 0;
            items.forEach(item => {
                totalItems += parseInt(item.textContent);
            });
            document.querySelector('header .bg-secondary').textContent = totalItems;
        }
    </script>
@endsection