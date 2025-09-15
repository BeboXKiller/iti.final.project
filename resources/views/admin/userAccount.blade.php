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
                        <span
                            class="text-white text-2xl font-bold">{{ strtoupper(substr($user->first_name, 0, 1) . substr($user->last_name, 0, 1)) }}</span>
                    </div>
                    <h3 class="font-heading font-bold text-lg">{{ $user->first_name . ' ' . $user->last_name }}</h3>
                    <p class="text-gray-500 text-sm">{{ $user->email }}</p>
                </div>

                <!-- Navigation Menu -->
                <nav class="space-y-2">
                    <a href="#"
                        class="account-nav-item active flex items-center px-4 py-3 rounded-lg bg-light text-primary"
                        data-tab="profile">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            class="mr-3">
                            <path fill="currentColor"
                                d="M15.71 12.71a6 6 0 1 0-7.42 0a10 10 0 0 0-6.22 8.18a1 1 0 0 0 2 .22a8 8 0 0 1 15.9 0a1 1 0 0 0 1 .89h.11a1 1 0 0 0 .88-1.1a10 10 0 0 0-6.25-8.19ZM12 12a4 4 0 1 1 4-4a4 4 0 0 1-4 4Z" />
                        </svg>
                        Profile
                    </a>
                    <a href="#" class="account-nav-item flex items-center px-4 py-3 rounded-lg hover:bg-light"
                        data-tab="orders">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            class="mr-3">
                            <path fill="currentColor"
                                d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19a2 2 0 0 0 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11zM7 10h5v5H7z" />
                        </svg>
                        My Orders
                    </a>
                    {{-- <a href="#" class="account-nav-item flex items-center px-4 py-3 rounded-lg hover:bg-light"
                        data-tab="addresses">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            class="mr-3">
                            <path fill="currentColor"
                                d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5s2.5 1.12 2.5 2.5s-1.12 2.5-2.5 2.5z" />
                        </svg>
                        Addresses
                    </a> --}}
                    <a href="#" class="account-nav-item flex items-center px-4 py-3 rounded-lg hover:bg-light"
                        data-tab="payment">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            class="mr-3">
                            <path fill="currentColor"
                                d="M20 4H4c-1.11 0-1.99.89-1.99 2L2 18c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V6c0-1.11-.89-2-2-2zm0 14H4v-6h16v6zm0-10H4V6h16v2z" />
                        </svg>
                        Payment Methods
                    </a>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('navigation-logout-form').submit();"
                        class="account-nav-item flex items-center px-4 py-3 rounded-lg hover:bg-light text-red-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            class="mr-3">
                            <path fill="currentColor" d="M17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5z" />
                        </svg>
                        Logout
                    </a>

                    <form id="navigation-logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </nav>
            </div>
        </div>

        <!-- Main Content -->
        <div class="lg:col-span-3">
            <!-- Profile Tab -->
            <div id="profile-tab" class="tab-content">
                <div class="bg-white rounded-2xl shadow-md p-6">
                    <h2 class="text-2xl font-heading font-bold mb-6">Profile Information</h2>
                    @if (session('profile_success'))
                        <div class="bg-green-100 text-green-800 px-4 py-3 rounded-lg mb-4">
                            {{ session('profile_success') }}
                        </div>
                    @endif

                    <form novalidate method="POST" action="{{ route('account.update', $user->id) }}" class="space-y-6">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium mb-2">First Name</label>
                                <input type="text" name='first_name' value="{{ old('first_name', $user->first_name) }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                                @error('first_name')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-2">Last Name</label>
                                <input type="text" name='last_name' value="{{ old('last_name', $user->last_name) }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                                @error('last_name')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2">Email Address</label>
                            <input type="email" name='email' value="{{ old('email', $user->email) }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                            @error('email')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2">Phone Number</label>
                            <input type="tel" name='phone' value="{{ old('phone', $user->phone) }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                            @error('phone')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2">Address</label>
                            <textarea name="address"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                                rows="3">{{ old('address', $user->address) }}</textarea>
                            @error('address')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2">City</label>
                            <input type="text" name='city' value="{{ old('city', $user->city) }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                            @error('city')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit"
                            class="bg-primary text-white px-6 py-3 rounded-lg font-medium hover:bg-accent">
                            Update Profile
                        </button>
                    </form>
                </div>

                <!-- Change Password -->
                <div class="bg-white rounded-2xl shadow-md p-6 mt-6">
                    <h3 class="text-xl font-heading font-bold mb-6">Change Password</h3>
                    @if (session('password_success'))
                        <div class="bg-green-100 text-green-800 px-4 py-3 rounded-lg mb-4">
                            {{ session('password_success') }}
                        </div>
                    @endif

                    <form novalidate method="POST" action="{{ route('account.updatePassword', $user->id) }}"
                        class="space-y-6">
                        @csrf
                        <div>
                            <label class="block text-sm font-medium mb-2">Current Password</label>
                            <input type="password" name="current_password"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                                required>
                            @error('current_password')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2">New Password</label>
                            <input type="password" name="new_password"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                                required>
                            @error('new_password')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2">Confirm New Password</label>
                            <input type="password" name="new_password_confirmation"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                                required>
                            @error('new_password_confirmation')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit"
                            class="bg-secondary text-white px-6 py-3 rounded-lg font-medium hover:bg-accent">
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
                    @forelse($orders as $order)
                        <div class="border border-gray-200 rounded-lg p-4 mb-4">
                            <div class="flex justify-between items-start mb-3">
                                <div>
                                    <h3 class="font-medium text-lg">Order #{{ $order->id }}</h3>
                                    <p class="text-gray-500 text-sm">Placed on {{ $order->created_at->format('F d, Y') }}
                                    </p>
                                </div>
                                <span
                                    class="px-3 py-1 rounded-full text-sm font-medium @if ($order->status == 'completed') bg-green-100 text-green-800 @elseif($order->status == 'pending') bg-yellow-100 text-yellow-800 @else bg-gray-100 text-gray-800 @endif">{{ $order->status }}</span>
                            </div>

                            <div class="flex items-center mb-3">
                                {{-- show first item thumbnail + count of items --}}
                                @php
                                    $firstItem = $order->orderItems->first();
                                @endphp

                                @if($firstItem)
                                    <img src="{{ asset('storage/' . $firstItem->product->image) }}" alt="Order Item"
                                        class="w-12 h-15 object-cover rounded mr-3">
                                    <div class="flex-1 col-auto">
                                        <p class="font-medium">{{ $firstItem->product->name }} 
                                            @if($order->orderItems->count() > 1)
                                                + {{ $order->orderItems->count() - 1 }} more items
                                            @endif
                                        </p>
                                        <p class="text-gray-500 text-sm">Total: ${{ $order->total_amount }}</p>
                                    </div>
                                @else
                                    <p class="text-gray-500">No items for this order.</p>
                                @endif
                            </div>

                            <div class="flex space-x-3">
                                <button class="text-primary font-medium hover:underline"
                                    onclick="openOrderModal('view-order-{{ $order->id }}')">
                                    View Details
                                </button>
                                <button class="text-primary font-medium hover:underline">Track Package</button>
                                <button class="text-primary font-medium hover:underline">Reorder</button>
                            </div>
                        </div>

                        <!-- View Order Modal لكل order -->
                        <div class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50 opacity-0 pointer-events-none"
                            id="view-order-{{ $order->id }}">
                            <div class="bg-white rounded-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
                                <div class="p-6 border-b border-gray-200">
                                    <h2 class="text-xl font-heading font-bold">Order #{{ $order->id }} Details</h2>
                                </div>
                                <div class="p-6">
                                    <p><strong>Customer:</strong>
                                        {{ $order->user->first_name . ' ' . $order->user->last_name }}</p>
                                    <p><strong>Email:</strong> {{ $order->user->email }}</p>
                                    <p><strong>Total:</strong> ${{ number_format($order->total_amount, 2) }}</p>
                                    <p><strong>Status:</strong> {{ $order->status }}</p>
                                    <p><strong>Date:</strong> {{ $order->created_at->format('d M Y') }}</p>

                                    <h3 class="mt-4 font-semibold">Items:</h3>
                                    <ul class="list-disc pl-5">
                                        @foreach ($order->orderItems as $item)
                                            <li>{{ $item->product->name }} x {{ $item->quantity }} - ${{ $item->price }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="p-6 border-t border-gray-200 flex justify-end">
                                    <button class="px-4 py-2 bg-primary text-white rounded-lg font-medium hover:bg-accent"
                                        onclick="closeOrderModal('view-order-{{ $order->id }}')">Close</button>
                                </div>

                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500">You haven't placed any orders yet.</p>
                    @endforelse
                </div>
            </div>

            <!-- Addresses Tab -->
            {{-- <div id="addresses-tab" class="tab-content hidden">
                <div class="bg-white rounded-2xl shadow-md p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-heading font-bold">Saved Addresses</h2>
                        <button class="bg-primary text-white px-4 py-2 rounded-lg font-medium hover:bg-accent"
                            onclick="openAddressModal()">
                            Add New Address
                        </button>
                    </div> --}}

            <!-- Address Cards -->
            {{-- <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
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
            </div> --}}

            <!-- Payment Tab -->
            <div id="payment-tab" class="tab-content hidden">
                <div class="bg-white rounded-2xl shadow-md p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-heading font-bold">Payment Methods</h2>
                        <button class="bg-primary text-white px-4 py-2 rounded-lg font-medium hover:bg-accent"
                            onclick="openPaymentModal()">
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12z" />
                    </svg>
                </button>
            </div>

            <form class="space-y-4">
                <div>
                    <label class="block text-sm font-medium mb-2">Address Label</label>
                    <input type="text" placeholder="e.g., Home, Work"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-2">Street Address</label>
                    <input type="text" placeholder="123 Main Street"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-2">City</label>
                        <input type="text" placeholder="New York"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2">State</label>
                        <input type="text" placeholder="NY"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-2">ZIP Code</label>
                    <input type="text" placeholder="10001"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                </div>

                <div class="flex space-x-3 pt-4">
                    <button type="button" onclick="closeModal('address-modal')"
                        class="flex-1 bg-gray-200 text-gray-800 py-3 rounded-lg font-medium hover:bg-gray-300">
                        Cancel
                    </button>
                    <button type="submit"
                        class="flex-1 bg-primary text-white py-3 rounded-lg font-medium hover:bg-accent">
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

        function openOrderModal(modalId) {
            const modal = document.getElementById(modalId);
            if (!modal) return;
            modal.classList.remove('opacity-0', 'pointer-events-none');
            modal.classList.add('opacity-100');
        }

        function closeOrderModal(modalId) {
            const modal = document.getElementById(modalId);
            if (!modal) return;
            modal.classList.remove('opacity-100');
            modal.classList.add('opacity-0', 'pointer-events-none');
        }

        function closeModal(modalId) {
            const el = document.getElementById(modalId);
            if (!el) return;
            el.classList.add('hidden');
            el.classList.remove('flex');
        }

        // Form submissions
        // document.querySelectorAll('form').forEach(form => {
        //     form.addEventListener('submit', function(e) {
        //         e.preventDefault();
        //         alert('Form submitted successfully!');
        //     });
        // });
    </script>
@endsection
