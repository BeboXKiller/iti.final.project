
@extends('website.app')
    <style>
        .swiper-pagination-bullet-active {
            background-color: #954C2E !important;
        }

        .preloader {
            animation: animation 1.2s infinite ease-in-out;
        }

        .preloader:before,
        .preloader:after {
            animation: animation 1.2s infinite ease-in-out;
        }

        @keyframes animation {

            0%,
            80%,
            100% {
                box-shadow: 0 2em 0 -1em #954C2E;
            }

            40% {
                box-shadow: 0 2em 0 0 #954C2E;
            }
        }

        .product-item:hover {
            transform: translateY(-5px);
        }

        .category-item:hover {
            transform: translateY(-5px);
        }
    </style>
@section('content')
        
            

            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-md p-6">
                        <!-- Profile Info -->
                        <div class="text-center mb-6">
                            <div class="w-20 h-20 bg-primary rounded-full flex items-center justify-center mx-auto mb-3">
                                <span class="text-white text-2xl font-bold">JD</span>
                            </div>
                            <h3 class="font-heading font-bold text-lg">John Doe</h3>
                            <p class="text-gray-500 text-sm">john.doe@email.com</p>
                        </div>

                        <!-- Navigation Menu -->
                        <nav class="space-y-2">
                            <a href="#" class="account-nav-item active flex items-center px-4 py-3 rounded-lg bg-light text-primary" data-tab="profile">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="mr-3"><path fill="currentColor" d="M15.71 12.71a6 6 0 1 0-7.42 0a10 10 0 0 0-6.22 8.18a1 1 0 0 0 2 .22a8 8 0 0 1 15.9 0a1 1 0 0 0 1 .89h.11a1 1 0 0 0 .88-1.1a10 10 0 0 0-6.25-8.19ZM12 12a4 4 0 1 1 4-4a4 4 0 0 1-4 4Z"/></svg>
                                Profile
                            </a>
                            <a href="#" class="account-nav-item flex items-center px-4 py-3 rounded-lg hover:bg-light" data-tab="orders">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="mr-3"><path fill="currentColor" d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19a2 2 0 0 0 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11zM7 10h5v5H7z"/></svg>
                                My Orders
                            </a>
                            <a href="#" class="account-nav-item flex items-center px-4 py-3 rounded-lg hover:bg-light" data-tab="addresses">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="mr-3"><path fill="currentColor" d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5s2.5 1.12 2.5 2.5s-1.12 2.5-2.5 2.5z"/></svg>
                                Addresses
                            </a>
                            <a href="#" class="account-nav-item flex items-center px-4 py-3 rounded-lg hover:bg-light" data-tab="payment">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="mr-3"><path fill="currentColor" d="M20 4H4c-1.11 0-1.99.89-1.99 2L2 18c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V6c0-1.11-.89-2-2-2zm0 14H4v-6h16v6zm0-10H4V6h16v2z"/></svg>
                                Payment Methods
                            </a>
                            <a href="#" class="account-nav-item flex items-center px-4 py-3 rounded-lg hover:bg-light text-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="mr-3"><path fill="currentColor" d="M17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5z"/></svg>
                                Logout
                            </a>
                        </nav>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="lg:col-span-3">
                    <!-- Profile Tab -->
                    <div id="profile-tab" class="tab-content">
                        <div class="bg-white rounded-2xl shadow-md p-6">
                            <h2 class="text-2xl font-heading font-bold mb-6">Profile Information</h2>
                            
                            <form class="space-y-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-medium mb-2">First Name</label>
                                        <input type="text" value="John" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium mb-2">Last Name</label>
                                        <input type="text" value="Doe" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                                    </div>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium mb-2">Email Address</label>
                                    <input type="email" value="john.doe@email.com" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium mb-2">Phone Number</label>
                                    <input type="tel" value="+1 (555) 123-4567" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium mb-2">Date of Birth</label>
                                    <input type="date" value="1990-01-01" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium mb-2">Gender</label>
                                    <select class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                                        <option>Male</option>
                                        <option>Female</option>
                                        <option>Other</option>
                                        <option>Prefer not to say</option>
                                    </select>
                                </div>
                                
                                <button type="submit" class="bg-primary text-white px-6 py-3 rounded-lg font-medium hover:bg-accent">
                                    Update Profile
                                </button>
                            </form>
                        </div>

                        <!-- Change Password -->
                        <div class="bg-white rounded-2xl shadow-md p-6 mt-6">
                            <h3 class="text-xl font-heading font-bold mb-6">Change Password</h3>
                            
                            <form class="space-y-6">
                                <div>
                                    <label class="block text-sm font-medium mb-2">Current Password</label>
                                    <input type="password" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium mb-2">New Password</label>
                                    <input type="password" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium mb-2">Confirm New Password</label>
                                    <input type="password" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                                </div>
                                
                                <button type="submit" class="bg-secondary text-white px-6 py-3 rounded-lg font-medium hover:bg-accent">
                                    Change Password
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Orders Tab -->
                    <div id="orders-tab" class="tab-content hidden">
                        <div class="bg-white rounded-2xl shadow-md p-6">
                            <h2 class="text-2xl font-heading font-bold mb-6">Order History</h2>
                            
                            <!-- Order Item -->
                            <div class="border border-gray-200 rounded-lg p-4 mb-4">
                                <div class="flex justify-between items-start mb-3">
                                    <div>
                                        <h3 class="font-medium text-lg">Order #SM001234</h3>
                                        <p class="text-gray-500 text-sm">Placed on August 15, 2023</p>
                                    </div>
                                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">Delivered</span>
                                </div>
                                
                                <div class="flex items-center mb-3">
                                    <img src="https://placehold.co/60x75/254D70/EFE4D2?text=Item" alt="Order Item" class="w-12 h-15 object-cover rounded mr-3">
                                    <div class="flex-1">
                                        <p class="font-medium">Classic White Shirt + 2 more items</p>
                                        <p class="text-gray-500 text-sm">Total: $149.97</p>
                                    </div>
                                </div>
                                
                                <div class="flex space-x-3">
                                    <button class="text-primary font-medium hover:underline">View Details</button>
                                    <button class="text-primary font-medium hover:underline">Track Package</button>
                                    <button class="text-primary font-medium hover:underline">Reorder</button>
                                </div>
                            </div>

                            <!-- More orders... -->
                            <div class="border border-gray-200 rounded-lg p-4 mb-4">
                                <div class="flex justify-between items-start mb-3">
                                    <div>
                                        <h3 class="font-medium text-lg">Order #SM001233</h3>
                                        <p class="text-gray-500 text-sm">Placed on August 10, 2023</p>
                                    </div>
                                    <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">Shipped</span>
                                </div>
                                
                                <div class="flex items-center mb-3">
                                    <img src="https://placehold.co/60x75/954C2E/EFE4D2?text=Item" alt="Order Item" class="w-12 h-15 object-cover rounded mr-3">
                                    <div class="flex-1">
                                        <p class="font-medium">Blue Denim Jeans + 1 more item</p>
                                        <p class="text-gray-500 text-sm">Total: $129.98</p>
                                    </div>
                                </div>
                                
                                <div class="flex space-x-3">
                                    <button class="text-primary font-medium hover:underline">View Details</button>
                                    <button class="text-primary font-medium hover:underline">Track Package</button>
                                    <button class="text-primary font-medium hover:underline">Reorder</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Addresses Tab -->
                    <div id="addresses-tab" class="tab-content hidden">
                        <div class="bg-white rounded-2xl shadow-md p-6">
                            <div class="flex justify-between items-center mb-6">
                                <h2 class="text-2xl font-heading font-bold">Saved Addresses</h2>
                                <button class="bg-primary text-white px-4 py-2 rounded-lg font-medium hover:bg-accent" onclick="openAddressModal()">
                                    Add New Address
                                </button>
                            </div>
                            
                            <!-- Address Cards -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="border border-gray-200 rounded-lg p-4 relative">
                                    <div class="absolute top-3 right-3">
                                        <span class="bg-primary text-white text-xs px-2 py-1 rounded">Default</span>
                                    </div>
                                    <h3 class="font-medium mb-2">Home Address</h3>
                                    <p class="text-gray-600 text-sm">
                                        123 Main Street<br>
                                        New York, NY 10001<br>
                                        United States
                                    </p>
                                    <div class="flex space-x-3 mt-4">
                                        <button class="text-primary font-medium hover:underline">Edit</button>
                                        <button class="text-red-600 font-medium hover:underline">Delete</button>
                                    </div>
                                </div>
                                
                                <div class="border border-gray-200 rounded-lg p-4">
                                    <h3 class="font-medium mb-2">Work Address</h3>
                                    <p class="text-gray-600 text-sm">
                                        456 Business Ave<br>
                                        New York, NY 10002<br>
                                        United States
                                    </p>
                                    <div class="flex space-x-3 mt-4">
                                        <button class="text-primary font-medium hover:underline">Edit</button>
                                        <button class="text-red-600 font-medium hover:underline">Delete</button>
                                        <button class="text-primary font-medium hover:underline">Set as Default</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Tab -->
                    <div id="payment-tab" class="tab-content hidden">
                        <div class="bg-white rounded-2xl shadow-md p-6">
                            <div class="flex justify-between items-center mb-6">
                                <h2 class="text-2xl font-heading font-bold">Payment Methods</h2>
                                <button class="bg-primary text-white px-4 py-2 rounded-lg font-medium hover:bg-accent" onclick="openPaymentModal()">
                                    Add New Card
                                </button>
                            </div>
                            
                            <!-- Payment Cards -->
                            <div class="space-y-4">
                                <div class="border border-gray-200 rounded-lg p-4 flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="w-12 h-8 bg-blue-600 rounded flex items-center justify-center mr-4">
                                            <span class="text-white text-xs font-bold">VISA</span>
                                        </div>
                                        <div>
                                            <p class="font-medium">**** **** **** 1234</p>
                                            <p class="text-gray-500 text-sm">Expires 12/25</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-3">
                                        <span class="bg-primary text-white text-xs px-2 py-1 rounded">Default</span>
                                        <button class="text-primary font-medium hover:underline">Edit</button>
                                        <button class="text-red-600 font-medium hover:underline">Remove</button>
                                    </div>
                                </div>
                                
                                <div class="border border-gray-200 rounded-lg p-4 flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="w-12 h-8 bg-red-600 rounded flex items-center justify-center mr-4">
                                            <span class="text-white text-xs font-bold">MC</span>
                                        </div>
                                        <div>
                                            <p class="font-medium">**** **** **** 5678</p>
                                            <p class="text-gray-500 text-sm">Expires 08/26</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-3">
                                        <button class="text-primary font-medium hover:underline">Edit</button>
                                        <button class="text-red-600 font-medium hover:underline">Remove</button>
                                        <button class="text-primary font-medium hover:underline">Set as Default</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    

    <!-- Address Modal -->
    <div id="address-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-2xl p-6 w-full max-w-md mx-4">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-heading font-bold">Add New Address</h3>
                <button onclick="closeModal('address-modal')" class="text-gray-400 hover:text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12z"/></svg>
                </button>
            </div>
            
            <form class="space-y-4">
                <div>
                    <label class="block text-sm font-medium mb-2">Address Label</label>
                    <input type="text" placeholder="e.g., Home, Work" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-2">Street Address</label>
                    <input type="text" placeholder="123 Main Street" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-2">City</label>
                        <input type="text" placeholder="New York" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2">State</label>
                        <input type="text" placeholder="NY" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-2">ZIP Code</label>
                    <input type="text" placeholder="10001" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                </div>
                
                <div class="flex space-x-3 pt-4">
                    <button type="button" onclick="closeModal('address-modal')" class="flex-1 bg-gray-200 text-gray-800 py-3 rounded-lg font-medium hover:bg-gray-300">
                        Cancel
                    </button>
                    <button type="submit" class="flex-1 bg-primary text-white py-3 rounded-lg font-medium hover:bg-accent">
                        Save Address
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        // Tab functionality
        document.querySelectorAll('.account-nav-item').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Remove active class from all nav items
                document.querySelectorAll('.account-nav-item').forEach(nav => {
                    nav.classList.remove('active', 'bg-light', 'text-primary');
                });
                
                // Add active class to clicked item
                this.classList.add('active', 'bg-light', 'text-primary');
                
                // Hide all tab contents
                document.querySelectorAll('.tab-content').forEach(tab => {
                    tab.classList.add('hidden');
                });
                
                // Show selected tab
                const tabId = this.dataset.tab + '-tab';
                document.getElementById(tabId).classList.remove('hidden');
            });
        });

        // Modal functions
        function openAddressModal() {
            document.getElementById('address-modal').classList.remove('hidden');
            document.getElementById('address-modal').classList.add('flex');
        }

        function openPaymentModal() {
            // Similar modal for payment methods
            alert('Payment modal would open here');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
            document.getElementById(modalId).classList.remove('flex');
        }

        // Form submissions
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                alert('Form submitted successfully!');
            });
        });
    </script>
@endsection

