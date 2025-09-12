<nav class="mb-8">
    <ol class="flex items-center space-x-2 text-sm">
        <li><a href="{{ url('/') }}" class="text-primary hover:underline">Home</a></li>
        
        @php
            $currentRoute = request()->route();
            $routeName = $currentRoute ? $currentRoute->getName() : null;
            $parameters = $currentRoute ? $currentRoute->parameters() : [];
        @endphp

        @if($routeName)
            {{-- User Routes --}}
            @if(strpos($routeName, 'user.') === 0 || 
               strpos($routeName, 'account.') === 0 ||
               strpos($routeName, 'cart.') === 0 ||
               strpos($routeName, 'wishlist.') === 0 ||
               $routeName === 'checkout.store' ||
               $routeName === 'categories.products' ||
               $routeName === 'category.products')
                
                {{-- <li class="text-gray-400">/</li>
                <li>
                    @if($routeName === 'user.dashboard')
                        <span class="text-gray-600">My Account</span>
                    @else
                        <a href="{{ route('user.dashboard') }}" class="text-primary hover:underline">My Account</a>
                    @endif
                </li> --}}
                
                {{-- Account Management --}}
                @if(strpos($routeName, 'account.') === 0)
                    <li class="text-gray-400">/</li>
                    <li>
                        @if(in_array($routeName, ['account.index', 'account.create', 'account.store', 
                                                 'account.show', 'account.update', 'account.destroy', 
                                                 'account.edit', 'account.updatePassword']))
                            <span class="text-gray-600">Account Settings</span>
                        @else
                            <a href="{{ route('account.index') }}" class="text-primary hover:underline">Account Settings</a>
                        @endif
                    </li>
                    
                    @if(in_array($routeName, ['account.create']))
                        <li class="text-gray-400">/</li>
                        <li class="text-gray-600">Create</li>
                    @elseif(in_array($routeName, ['account.edit']))
                        <li class="text-gray-400">/</li>
                        <li class="text-gray-600">Edit</li>
                    @elseif(in_array($routeName, ['account.updatePassword']))
                        <li class="text-gray-400">/</li>
                        <li class="text-gray-600">Update Password</li>
                    @endif
                
                {{-- Cart --}}
                @elseif(strpos($routeName, 'cart.') === 0)
                    <li class="text-gray-400">/</li>
                    <li>
                        @if($routeName === 'cart.index')
                            <span class="text-gray-600">Shopping Cart</span>
                        @else
                            <a href="{{ route('cart.index') }}" class="text-primary hover:underline">Shopping Cart</a>
                        @endif
                    </li>
                    
                    @if(in_array($routeName, ['cart.create']))
                        <li class="text-gray-400">/</li>
                        <li class="text-gray-600">Create</li>
                    @elseif(in_array($routeName, ['cart.addAllFromWishlist']))
                        <li class="text-gray-400">/</li>
                        <li class="text-gray-600">Add from Wishlist</li>
                    @endif
                
                {{-- Wishlist --}}
                @elseif(strpos($routeName, 'wishlist.') === 0 || $routeName === 'user.wishlist')
                    <li class="text-gray-400">/</li>
                    <li class="text-gray-600">Wishlist</li>
                
                {{-- Checkout --}}
                @elseif($routeName === 'checkout.store')
                    <li class="text-gray-400">/</li>
                    <li class="text-gray-600">Checkout</li>
                
                {{-- All Products --}}
                @elseif($routeName === 'user.allproducts')
                    <li class="text-gray-400">/</li>
                    <li class="text-gray-600">All Products</li>
                
                {{-- Single Product --}}
                @elseif($routeName === 'user.product' && isset($parameters['product']))
                    <li class="text-gray-400">/</li>
                    <li>
                        <a href="{{ route('user.allproducts') }}" class="text-primary hover:underline">Products</a>
                    </li>
                    <li class="text-gray-400">/</li>
                    <li class="text-gray-600">Product Details</li>
                
                {{-- Category Products --}}
                @elseif(($routeName === 'categories.products' || $routeName === 'category.products') && isset($parameters['category']))
                    <li class="text-gray-400">/</li>
                    <li>
                        <a href="{{ route('user.allproducts') }}" class="text-primary hover:underline">Products</a>
                    </li>
                    <li class="text-gray-400">/</li>
                    <li class="text-gray-600">Category Products</li>
                
                {{-- User Dashboard --}}
                @elseif($routeName === 'user.dashboard')
                    {{-- Already handled above --}}
                @endif
            
            {{-- Admin Routes (kept from previous implementation) --}}
            @elseif(strpos($routeName, 'admin.') === 0 || strpos($routeName, 'categories.') === 0 || 
                    strpos($routeName, 'customers.') === 0 || strpos($routeName, 'products.') === 0)
                <li class="text-gray-400">/</li>
                <li><a href="{{ route('admin.dashboard') }}" class="text-primary hover:underline">Admin</a></li>
                
                {{-- Categories --}}
                @if(strpos($routeName, 'categories.') === 0)
                    <li class="text-gray-400">/</li>
                    <li>
                        @if($routeName === 'categories.index')
                            <span class="text-gray-600">Categories</span>
                        @else
                            <a href="{{ route('categories.index') }}" class="text-primary hover:underline">Categories</a>
                        @endif
                    </li>
                    
                    @if(in_array($routeName, ['categories.create']))
                        <li class="text-gray-400">/</li>
                        <li class="text-gray-600">Create</li>
                    @elseif(isset($parameters['category']) && in_array($routeName, ['categories.show', 'categories.edit']))
                        <li class="text-gray-400">/</li>
                        <li class="text-gray-600">
                            {{ $routeName === 'categories.edit' ? 'Edit' : 'View' }} Category
                        </li>
                    @endif
                
                {{-- Customers --}}
                @elseif(strpos($routeName, 'customers.') === 0)
                    <li class="text-gray-400">/</li>
                    <li>
                        @if($routeName === 'customers.index')
                            <span class="text-gray-600">Customers</span>
                        @else
                            <a href="{{ route('customers.index') }}" class="text-primary hover:underline">Customers</a>
                        @endif
                    </li>
                    
                    @if(in_array($routeName, ['customers.create']))
                        <li class="text-gray-400">/</li>
                        <li class="text-gray-600">Create</li>
                    @elseif(isset($parameters['customer']) && in_array($routeName, ['customers.show', 'customers.edit']))
                        <li class="text-gray-400">/</li>
                        <li class="text-gray-600">
                            {{ $routeName === 'customers.edit' ? 'Edit' : 'View' }} Customer
                        </li>
                    @endif
                
                {{-- Products --}}
                @elseif(strpos($routeName, 'products.') === 0)
                    <li class="text-gray-400">/</li>
                    <li>
                        @if($routeName === 'products.index')
                            <span class="text-gray-600">Products</span>
                        @else
                            <a href="{{ route('products.index') }}" class="text-primary hover:underline">Products</a>
                        @endif
                    </li>
                    
                    @if(in_array($routeName, ['products.create']))
                        <li class="text-gray-400">/</li>
                        <li class="text-gray-600">Create</li>
                    @elseif(isset($parameters['product']) && in_array($routeName, ['products.show', 'products.edit']))
                        <li class="text-gray-400">/</li>
                        <li class="text-gray-600">
                            {{ $routeName === 'products.edit' ? 'Edit' : 'View' }} Product
                        </li>
                    @endif
                
                {{-- Orders --}}
                @elseif($routeName === 'admin.dashboard.orders')
                    <li class="text-gray-400">/</li>
                    <li class="text-gray-600">Orders</li>
                
                {{-- Admin Dashboard --}}
                @elseif($routeName === 'admin.dashboard')
                    <li class="text-gray-400">/</li>
                    <li class="text-gray-600">Dashboard</li>
                @endif
            
            {{-- Auth Routes --}}
            @elseif($routeName === 'login')
                <li class="text-gray-400">/</li>
                <li class="text-gray-600">Login</li>
            @elseif($routeName === 'register')
                <li class="text-gray-400">/</li>
                <li class="text-gray-600">Register</li>
            @endif
        @else
            {{-- Fallback for routes without names --}}
            <li class="text-gray-400">/</li>
            <li class="text-gray-600">My Account</li>
        @endif
    </ol>
</nav>