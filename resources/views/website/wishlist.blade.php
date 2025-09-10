@extends('website.app')

@section('content')
    <style>
        .product-item:hover {
            transform: translateY(-5px);
        }
    </style>

    <div class="container mx-auto px-4 py-8">
        <!-- Page Header -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-heading font-bold">My Wishlist</h1>
                <p class="text-gray-600 mt-2">
                    <span class="wishlist-count">{{ $wishlists->count() }}</span> 
                    {{ Str::plural('item', $wishlists->count()) }} saved for later
                </p>
            </div>
            @if($wishlists->count() > 0)
                <div class="flex space-x-3">
                    <button class="wishlist-clear bg-gray-200 text-gray-700 px-4 py-2 rounded-lg font-medium hover:bg-gray-300">
                        Clear All
                    </button>
                    <button class="bg-primary text-white px-4 py-2 rounded-lg font-medium hover:bg-accent" onclick="shareWishlist()">
                        Share Wishlist
                    </button>
                </div>
            @endif
        </div>

        @if($wishlists->count() > 0)
            <div class="wishlist-grid grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($wishlists as $wishlist)
                    @php
                        $product = $wishlist->product;
                        $images = json_decode($product->images, true);
                        $firstImage = $images[0] ?? null;
                    @endphp
                    <div class="product-item wishlist-item bg-white rounded-2xl p-4 shadow-md transition-all duration-300">
                        <div class="relative overflow-hidden rounded-xl mb-4">
                            @if($firstImage)
                                <img src="{{ asset('storage/' . $firstImage) }}" alt="{{ $product->name }}" class="w-full h-64 object-cover">
                            @else
                                <img src="https://placehold.co/300x400/EFE4D2/254D70?text=No+Image" alt="{{ $product->name }}" class="w-full h-64 object-cover">
                            @endif
                            
                            <div class="absolute top-3 right-3">
                                <button class="wishlist-remove bg-red-500 text-white rounded-full p-2 shadow-md hover:bg-red-600" 
                                        data-product-id="{{ $product->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5C2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3C19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                    </svg>
                                </button>
                            </div>
                            
                            <div class="absolute top-3 left-3">
                                @if($product->stock > 10)
                                    <span class="bg-green-500 text-white text-xs px-2 py-1 rounded">In Stock</span>
                                @elseif($product->stock > 0)
                                    <span class="bg-yellow-500 text-white text-xs px-2 py-1 rounded">Low Stock</span>
                                @else
                                    <span class="bg-gray-500 text-white text-xs px-2 py-1 rounded">Out of Stock</span>
                                @endif
                            </div>
                        </div>
                        
                        <h3 class="font-medium mb-2">{{ $product->name }}</h3>
                        
                        {{-- Optional: Add ratings if you have them
                        <div class="flex items-center mb-2">
                            <div class="flex text-secondary">
                                @for($i = 1; $i <= 5; $i++)
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                        <path fill="currentColor" d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327l4.898.696c.441.062.612.636.283.95l-3.523 3.356l.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                @endfor
                            </div>
                            <span class="text-xs text-gray-500 ml-1">({{ rand(10, 50) }})</span>
                        </div>
                        --}}
                        
                        <div class="flex justify-between items-center mb-3">
                            <span class="font-heading font-bold text-lg">${{ number_format($product->price, 2) }}</span>
                            <span class="text-sm text-gray-500">Added {{ $wishlist->created_at->diffForHumans() }}</span>
                        </div>
                        
                        <div class="flex space-x-2">
                            @if($product->quantity > 0)
                                <button class="add-to-cart flex-1 bg-primary text-white py-2 rounded-lg font-medium hover:bg-accent" 
                                        data-product-id="{{ $product->id }}">
                                    Add to Cart
                                </button>
                            @else
                                <button class="flex-1 bg-gray-300 text-gray-500 py-2 rounded-lg font-medium cursor-not-allowed" disabled>
                                    Out of Stock
                                </button>
                            @endif
                            
                            <button class="bg-gray-200 text-gray-700 p-2 rounded-lg hover:bg-gray-300" 
                                    onclick="quickView({{ $product->id }}, '{{ $product->name }}')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5s5 2.24 5 5s-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3s3-1.34 3-3s-1.34-3-3-3z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Bulk Actions -->
            <div class="mt-8 bg-white rounded-2xl shadow-md p-6">
                <h3 class="text-xl font-heading font-bold mb-4">Wishlist Actions</h3>
                <div class="flex flex-wrap gap-4">
                    <button class="add-all-to-cart bg-secondary text-white px-6 py-3 rounded-lg font-medium hover:bg-accent">
                        Add All to Cart
                    </button>
                    <button class="bg-primary text-white px-6 py-3 rounded-lg font-medium hover:bg-accent" 
                            onclick="moveToNewList()">
                        Create New List
                    </button>
                    <button class="bg-gray-200 text-gray-700 px-6 py-3 rounded-lg font-medium hover:bg-gray-300" 
                            onclick="exportWishlist()">
                        Export Wishlist
                    </button>
                </div>
            </div>
        @else
            <!-- Empty State -->
            <div id="empty-wishlist" class="text-center py-16">
                <div class="max-w-md mx-auto">
                    <div class="w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" class="text-gray-400">
                            <path fill="currentColor" d="M20.16 4.61A6.27 6.27 0 0 0 12 4a6.27 6.27 0 0 0-8.16 9.48l7.45 7.45a1 1 0 0 0 1.42 0l7.45-7.45a6.27 6.27 0 0 0 0-8.87Zm-1.41 7.46L12 18.81l-6.75-6.74a4.28 4.28 0 0 1 3-7.3a4.25 4.25 0 0 1 3 1.25a1 1 0 0 0 1.42 0a4.27 4.27 0 0 1 6 6.05Z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-heading font-bold mb-2">Your wishlist is empty</h3>
                    <p class="text-gray-600 mb-6">Save items you love by clicking the heart icon</p>
                    <a href="{{ route('home') }}" class="bg-primary text-white px-6 py-3 rounded-lg font-medium inline-block hover:bg-accent">
                        Start Shopping
                    </a>
                </div>
            </div>
        @endif
    </div>

    <script>
        // Additional functions for wishlist page
        function shareWishlist() {
            if (navigator.share) {
                navigator.share({
                    title: 'My StyleMart Wishlist',
                    text: 'Check out my favorite items from StyleMart!',
                    url: window.location.href
                });
            } else {
                // Fallback - copy to clipboard
                navigator.clipboard.writeText(window.location.href).then(() => {
                    window.wishlistManager.showNotification('Wishlist link copied to clipboard!', 'success');
                });
            }
        }

        function quickView(productId, productName) {
            // You can implement a modal or redirect to product page
            window.wishlistManager.showNotification(`Quick view for ${productName} would open here`, 'info');
            // Example: window.open(`/products/${productId}`, '_blank');
        }

        function moveToNewList() {
            const listName = prompt('Enter name for new wishlist:');
            if (listName) {
                window.wishlistManager.showNotification(`New wishlist "${listName}" created!`, 'success');
            }
        }

        function exportWishlist() {
            const items = Array.from(document.querySelectorAll('.wishlist-item h3')).map(h3 => h3.textContent);
            const csvContent = "data:text/csv;charset=utf-8," + items.join('\n');
            const link = document.createElement("a");
            link.setAttribute("href", encodeURI(csvContent));
            link.setAttribute("download", "my_wishlist.csv");
            link.click();
            window.wishlistManager.showNotification('Wishlist exported successfully!', 'success');
        }

        // Add to cart functionality (integrate with your existing cart system)
        $(document).on('click', '.add-to-cart', function() {
            const productId = $(this).data('product-id');
            const button = $(this);
            
            // Replace this with your actual add to cart implementation
            button.prop('disabled', true).text('Adding...');
            
            // Simulate API call
            setTimeout(() => {
                button.removeClass('bg-primary').addClass('bg-green-500').text('Added!');
                window.wishlistManager.showNotification('Item added to cart!', 'success');
                
                setTimeout(() => {
                    button.addClass('bg-primary').removeClass('bg-green-500').text('Add to Cart').prop('disabled', false);
                }, 2000);
            }, 500);
        });
    </script>
@endsection