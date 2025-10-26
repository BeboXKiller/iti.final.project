@extends('website.app')

@section('content')
@if(session('success'))
<div class="flex items-center bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded-md shadow-md mb-6 animate-fade-in"
    role="alert">
    <svg class="w-6 h-6 mr-2 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
    </svg>
    <span class="font-medium">{{ session('success') }}</span>
</div>
@endif

<!-- Product Section -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-16">
    <!-- Product Gallery -->
    @php
    $images = json_decode($product->images, true);
    $firstImage = $images[0] ?? null;
    @endphp

    <div x-data="{ currentImage: '{{ $firstImage ? asset('storage/' . $firstImage) : 'https://placehold.co/600x600/EFE4D2/254D70?text=No+Image' }}' }"
        class="product-gallery">
        <!-- Main Image -->
        <div class="relative rounded-2xl overflow-hidden mb-4 bg-gray-100">
            <img :src="currentImage" alt="{{ $product->name }}" class="w-full h-96 object-cover" />
            
            <!-- Stock Status Badge -->
            <div class="absolute top-4 left-4">
                @if($product->quantity > 10)
                    <span class="bg-green-500 text-white text-xs px-3 py-1 rounded-full font-medium shadow-sm">In Stock</span>
                @elseif($product->quantity > 0)
                    <span class="bg-yellow-500 text-white text-xs px-3 py-1 rounded-full font-medium shadow-sm">Low Stock</span>
                @else
                    <span class="bg-gray-500 text-white text-xs px-3 py-1 rounded-full font-medium shadow-sm">Out of Stock</span>
                @endif
            </div>
        </div>

        <!-- Thumbnails -->
        @if(!empty($images) && count($images) > 1)
        <div class="grid grid-cols-4 gap-3">
            @foreach($images as $img)
            <img src="{{ asset('storage/' . $img) }}" alt="{{ $product->name }}"
                class="w-full h-20 object-cover rounded-lg cursor-pointer border-2 hover:border-primary transition-all duration-200"
                :class="{ 'border-primary': currentImage === '{{ asset('storage/' . $img) }}', 'border-gray-200': currentImage !== '{{ asset('storage/' . $img) }}' }"
                @click currentImage ="'{{ asset('storage/' . $img) }}'">
            @endforeach
        </div>
        @endif
    </div>

    <!-- Product Details -->
    <div class="flex flex-col">
        <h1 class="text-3xl font-bold text-gray-900 mb-3">{{ $product->name }}</h1>
        
        <!-- Rating -->
        <div class="flex items-center mb-4">
            <div class="flex text-yellow-400 mr-2">
                @for($i = 1; $i <= 5; $i++)
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" 
                     fill="{{ $i <= 4 ? 'currentColor' : 'none' }}" 
                     stroke="currentColor" 
                     stroke-width="{{ $i <= 4 ? '0' : '1.5' }}">
                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2L9.19 8.63L2 9.24l5.46 4.73L5.82 21z"/>
                </svg>
                @endfor
            </div>
            <span class="text-gray-500 text-sm">(42 reviews)</span>
            <a href="#reviews" class="text-primary ml-4 hover:underline text-sm">Read reviews</a>
        </div>

        <!-- Price -->
        <div class="mb-6">
            <span class="font-bold text-3xl text-gray-900">${{ number_format($product->price, 2) }}</span>
            @if($product->compare_price)
            <span class="text-gray-500 line-through text-xl ml-2">${{ number_format($product->compare_price, 2) }}</span>
            @endif
        </div>

        <!-- Description -->
        <div class="mb-6">
            <p class="text-gray-600 leading-relaxed">
                {{ $product->description }}
            </p>
        </div>

        <!-- Quantity & Add to Cart -->
        <div class="mb-6">
            <div class="flex flex-wrap items-center gap-4">
                <!-- Quantity Selector -->
                <div class="flex items-center border border-gray-300 rounded-lg bg-white">
                    <button type="button" onclick="decrementQuantity()"
                        class="px-4 py-3 text-gray-500 hover:text-primary transition-colors">-</button>
                    <input type="number" id="quantity" name="qty" value="1" min="1" max="{{ $product->quantity }}"
                        class="w-16 text-center border-0 focus:ring-0 bg-transparent" />
                    <button type="button" onclick="incrementQuantity()"
                        class="px-4 py-3 text-gray-500 hover:text-primary transition-colors">+</button>
                </div>

                <!-- Add to Cart Button -->
                @if($product->quantity > 0)
                <form action="{{ route('cart.store') }}" method="POST" class="flex-1">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="qty" id="formQuantity" value="1">
                    <input type="hidden" name="redirect_back" value="1">
                    <button type="submit"
                        class="w-full bg-primary text-white py-3 px-8 rounded-lg font-medium hover:bg-accent transition-all duration-300 transform hover:scale-[1.02] flex items-center justify-center gap-3 shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M8.5 19a1.5 1.5 0 1 0 1.5 1.5A1.5 1.5 0 0 0 8.5 19ZM19 16H7a1 1 0 0 1 0-2h8.491a3.013 3.013 0 0 0 2.885-2.176l1.585-5.55A1 1 0 0 0 19 5H6.74A3.007 3.007 0 0 0 3.92 3H3a1 1 0 0 0 0 2h.921a1.005 1.005 0 0 1 .962.725l.155.545v.005l1.641 5.742A3 3 0 0 0 7 18h12a1 1 0 0 0 0-2Zm-1.326-9l-1.22 4.274a1.005 1.005 0 0 1-.963.726H8.754l-.255-.892L7.326 7ZM16.5 19a1.5 1.5 0 1 0 1.5 1.5a1.5 1.5 0 0 0-1.5-1.5Z" />
                        </svg>
                        Add to Cart
                    </button>
                </form>
                @else
                <button class="flex-1 bg-gray-300 text-gray-500 py-3 px-8 rounded-lg font-medium cursor-not-allowed shadow-sm"
                    disabled>
                    Out of Stock
                </button>
                @endif
            </div>
            
            <!-- Stock Message -->
            @if($product->quantity > 0 && $product->quantity <= 10)
            <p class="text-yellow-600 text-sm mt-2 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" class="mr-1">
                    <path fill="currentColor" d="M12 2L1 21h22L12 2zm0 4.5l7.5 12.5h-15L12 6.5z"/>
                    <path fill="currentColor" d="M11 10v4h2v-4h-2zm0 6v2h2v-2h-2z"/>
                </svg>
                Only {{ $product->quantity }} left in stock!
            </p>
            @endif
        </div>

        <!-- Product Actions -->
        <!-- Product Actions -->
        <div class="flex items-center space-x-6 border-t border-gray-200 py-4 mb-6">
            @php
                // Safe check for wishlist status
                $inWishlist = false;
                if (auth()->check()) {
                    // Use direct database query instead of relationship method
                    $inWishlist = \App\Models\Wishlist::where('user_id', auth()->id())
                        ->where('product_id', $product->id)
                        ->exists();
                }
            @endphp
            <button class="wishlist-toggle flex items-center text-gray-600 hover:text-red-500 transition-colors duration-200"
                    data-product-id="{{ $product->id }}"
                    data-in-wishlist="{{ $inWishlist ? 'true' : 'false' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" 
                        class="mr-2"
                        fill="{{ $inWishlist ? 'currentColor' : 'none' }}" 
                        stroke="currentColor" 
                        stroke-width="{{ $inWishlist ? '0' : '1.5' }}">
                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5C2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3C19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                </svg>
                <span id="wishlist-text">{{ $inWishlist ? 'Remove from Wishlist' : 'Add to Wishlist' }}</span>
            </button>

            <button class="flex items-center text-gray-600 hover:text-primary transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="mr-2">
                    <path fill="currentColor"
                        d="M18 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM6 4h5v8l-2.5-1.5L6 12V4z"/>
                </svg>
                Compare
            </button>
        </div>

        <!-- Product Details Accordion -->
        <div class="space-y-4">
            <div class="border border-gray-200 rounded-lg overflow-hidden">
                <button class="flex justify-between items-center w-full text-left font-medium p-4 bg-gray-50 hover:bg-gray-100 transition-colors"
                    onclick="toggleAccordion(this)">
                    <span class="font-semibold">Product Details</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        class="transform transition-transform duration-300">
                        <path fill="currentColor" d="M12 15.375L6 9.375l1.4-1.4l4.6 4.6l4.6-4.6l1.4 1.4l-6 6Z" />
                    </svg>
                </button>
                <div class="p-4 text-gray-600 hidden border-t border-gray-200">
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span class="font-medium">Product Name:</span>
                            <span>{{ $product->name }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="font-medium">Price:</span>
                            <span>${{ number_format($product->price, 2) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="font-medium">Stock Status:</span>
                            <span>
                                @if($product->quantity > 10)
                                    In Stock
                                @elseif($product->quantity > 0)
                                    Low Stock
                                @else
                                    Out of Stock
                                @endif
                            </span>
                        </div>
                        <div class="flex justify-between">
                            <span class="font-medium">Available Quantity:</span>
                            <span>{{ $product->quantity }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="border border-gray-200 rounded-lg overflow-hidden">
                <button class="flex justify-between items-center w-full text-left font-medium p-4 bg-gray-50 hover:bg-gray-100 transition-colors"
                    onclick="toggleAccordion(this)">
                    <span class="font-semibold">Shipping & Returns</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        class="transform transition-transform duration-300">
                        <path fill="currentColor" d="M12 15.375L6 9.375l1.4-1.4l4.6 4.6l4.6-4.6l1.4 1.4l-6 6Z" />
                    </svg>
                </button>
                <div class="p-4 text-gray-600 hidden border-t border-gray-200">
                    <p class="mb-3">Free standard shipping on orders over $50. Express shipping available for an additional fee.</p>
                    <p>Returns accepted within 30 days of purchase. Items must be in original condition with tags attached.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Reviews Section -->
<section class="mb-16" id="reviews">
    <h2 class="text-2xl font-bold text-gray-900 mb-6">Customer Reviews</h2>
    <div class="bg-white rounded-2xl p-6 shadow-md border border-gray-100">
        <div class="flex flex-col md:flex-row items-start gap-8">
            <div class="md:w-1/3">
                <div class="text-center">
                    <div class="text-5xl font-bold text-gray-900 mb-2">4.2</div>
                    <div class="flex justify-center text-yellow-400 mb-2">
                        @for($i = 1; $i <= 5; $i++)
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" 
                             fill="{{ $i <= 4 ? 'currentColor' : 'none' }}" 
                             stroke="currentColor" 
                             stroke-width="{{ $i <= 4 ? '0' : '1.5' }}">
                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2L9.19 8.63L2 9.24l5.46 4.73L5.82 21z"/>
                        </svg>
                        @endfor
                    </div>
                    <p class="text-gray-600">Based on 42 reviews</p>
                </div>
            </div>
            <div class="md:w-2/3">
                <!-- Review Item -->
                <div class="border-b border-gray-200 pb-4 mb-4">
                    <div class="flex items-center mb-2">
                        <div class="flex text-yellow-400 mr-2">
                            @for($i = 1; $i <= 5; $i++)
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" 
                                 fill="{{ $i <= 4 ? 'currentColor' : 'none' }}" 
                                 stroke="currentColor" 
                                 stroke-width="{{ $i <= 4 ? '0' : '1.5' }}">
                                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2L9.19 8.63L2 9.24l5.46 4.73L5.82 21z"/>
                            </svg>
                            @endfor
                        </div>
                        <span class="font-medium text-gray-900">Sarah Johnson</span>
                    </div>
                    <p class="text-gray-500 text-sm mb-2">Posted on June 15, 2023</p>
                    <p class="text-gray-600">This product exceeded my expectations! The quality is outstanding and it arrived exactly as described. Will definitely purchase again.</p>
                </div>

                <!-- Write Review Button -->
                <button class="bg-primary text-white px-6 py-3 rounded-lg font-medium hover:bg-accent transition-colors duration-200 shadow-md">
                    Write a Review
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Related Products Section -->
<section class="mb-16">
    <h2 class="text-2xl font-bold text-gray-900 mb-6">Related Products</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Related products would be dynamically loaded here -->
        <div class="text-center py-8 text-gray-500">
            <p>Related products will appear here</p>
        </div>
    </div>
</section>

<script src="//unpkg.com/alpinejs" defer></script>
<script>
    // Quantity functions
    function incrementQuantity() {
        const quantityElement = document.getElementById('quantity');
        const formQuantity = document.getElementById('formQuantity');
        const maxQuantity = {{ $product->quantity }};
        let quantity = parseInt(quantityElement.value);
        
        if (quantity < maxQuantity) {
            quantity++;
            quantityElement.value = quantity;
            formQuantity.value = quantity;
        }
    }

    function decrementQuantity() {
        const quantityElement = document.getElementById('quantity');
        const formQuantity = document.getElementById('formQuantity');
        let quantity = parseInt(quantityElement.value);
        
        if (quantity > 1) {
            quantity--;
            quantityElement.value = quantity;
            formQuantity.value = quantity;
        }
    }

    // Toggle accordion
    function toggleAccordion(button) {
        const content = button.nextElementSibling;
        const icon = button.querySelector('svg');

        content.classList.toggle('hidden');
        icon.classList.toggle('rotate-180');
    }

    // Initialize quantity in form
    document.addEventListener('DOMContentLoaded', function() {
        const quantityElement = document.getElementById('quantity');
        const formQuantity = document.getElementById('formQuantity');
        
        quantityElement.addEventListener('change', function() {
            formQuantity.value = this.value;
        });
    });
</script>

<!-- Include your wishlist.js for wishlist functionality -->
<script src="{{ asset('js/wishlist.js') }}"></script>
@endsection