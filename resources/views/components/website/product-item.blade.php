@props(['product', 'inWishlist' => false])

@php
    $images = json_decode($product->images, true);
    $firstImage = $images[0] ?? null;
    
@endphp

<div class="product-item bg-white rounded-2xl shadow-md transition-all duration-300 hover:shadow-lg overflow-hidden flex flex-col h-full">
    <!-- Product Image Section -->
    <div class="relative">
        <a href="{{ route('user.product', $product->id) }}" class="block">
            <div class="relative overflow-hidden aspect-w-1 aspect-h-1 bg-gray-100">
                @if($firstImage)
                    <img src="{{ asset('storage/' . $firstImage) }}" alt="{{ $product->name }}"
                         class="w-full h-90 object-fit transition-transform duration-300 hover:scale-105">
                @else
                    <img src="https://placehold.co/300x400/EFE4D2/254D70?text=No+Image" alt="{{ $product->name }}"
                         class="w-full h-64 object-cover">
                @endif
            </div>
        </a>

        <!-- Wishlist Button -->
        <div class="absolute top-3 right-3">
            <button class="wishlist-toggle {{ $inWishlist ? 'text-red-500 bg-red-50' : 'bg-white text-gray-400' }} rounded-full p-2 shadow-md hover:bg-red-500 hover:text-white transition-all duration-300 transform hover:scale-110" 
                data-product-id="{{ $product->id }}"
                data-in-wishlist="{{ $inWishlist ? 'true' : 'false' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" 
                     fill="{{ $inWishlist ? 'currentColor' : 'none' }}" 
                     stroke="currentColor" 
                     stroke-width="{{ $inWishlist ? '0' : '2' }}">
                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5C2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3C19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                </svg>
            </button>
        </div>

        <!-- Stock Status -->
        <div class="absolute top-3 left-3">
            @if($product->quantity > 10)
                <span class="bg-green-500 text-white text-xs px-2 py-1 rounded-full font-medium shadow-sm">In Stock</span>
            @elseif($product->quantity > 0)
                <span class="bg-yellow-500 text-white text-xs px-2 py-1 rounded-full font-medium shadow-sm">Low Stock</span>
            @else
                <span class="bg-gray-500 text-white text-xs px-2 py-1 rounded-full font-medium shadow-sm">Out of Stock</span>
            @endif
        </div>
    </div>

    <!-- Product Info Section -->
    <div class="p-4 flex-1 flex flex-col">
        <!-- Product Name -->
        <a href="{{ route('user.product', $product->id) }}" class="group">
            <h3 class="text-lg font-semibold text-gray-900 mb-2 line-clamp-2 group-hover:text-primary transition-colors duration-200">
                {{ $product->name }}
            </h3>
        </a>

        <!-- Price -->
        <div class="mt-auto">
            <div class="flex items-center justify-between mb-3">
                <span class="text-2xl font-bold text-gray-900">${{ number_format($product->price, 2) }}</span>
                
                <!-- Quick View Button -->
                <a href="{{ route('user.product', $product->id) }}" 
                   class="bg-gray-100 text-gray-600 p-2 rounded-lg hover:bg-gray-200 hover:text-gray-800 transition-colors duration-200"
                   title="Quick View">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5s5 2.24 5 5s-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3s3-1.34 3-3s-1.34-3-3-3z" />
                    </svg>
                </a>
            </div>

            <!-- Add to Cart Button -->
            @if($product->quantity > 0)
                <form action="{{ route('cart.store') }}" method="POST" class="w-full">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="redirect_back" value="1">
                    <button type="submit"
                        class="w-full bg-primary text-white py-3 px-4 rounded-lg font-medium hover:bg-accent transition-all duration-300 transform hover:scale-[1.02] flex items-center justify-center gap-2 shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M8.5 19a1.5 1.5 0 1 0 1.5 1.5A1.5 1.5 0 0 0 8.5 19ZM19 16H7a1 1 0 0 1 0-2h8.491a3.013 3.013 0 0 0 2.885-2.176l1.585-5.55A1 1 0 0 0 19 5H6.74A3.007 3.007 0 0 0 3.92 3H3a1 1 0 0 0 0 2h.921a1.005 1.005 0 0 1 .962.725l.155.545v.005l1.641 5.742A3 3 0 0 0 7 18h12a1 1 0 0 0 0-2Zm-1.326-9l-1.22 4.274a1.005 1.005 0 0 1-.963.726H8.754l-.255-.892L7.326 7ZM16.5 19a1.5 1.5 0 1 0 1.5 1.5a1.5 1.5 0 0 0-1.5-1.5Z" />
                        </svg>
                        <span>Add to Cart</span>
                    </button>
                </form>
            @else
                <button class="w-full bg-gray-300 text-gray-500 py-3 px-4 rounded-lg font-medium cursor-not-allowed shadow-sm"
                    disabled>
                    Out of Stock
                </button>
            @endif
        </div>
    </div>
</div>