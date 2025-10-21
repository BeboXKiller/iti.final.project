@extends('website.app')
<style>
    .swiper-pagination-bullet-active {
        background-color: #954C2E !important;
    }

    .preloader {
        animation: animation 1.2s infinite ease-in-out;
    }

    .swiper-slide img {

        shadow: none;
        margin-top: 50px;
    }

    .main-swiper {

        height: 855px;
        padding-top: 40px ;
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

<!-- Sign Up Modal -->
<div class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50 opacity-0 pointer-events-none transition-all duration-300"
    id="signup-modal">
    <div class="bg-white rounded-2xl w-full max-w-md">
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-xl font-heading font-bold">Create Your Account</h2>
        </div>
        <div class="p-6">
            <form class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                        <input type="text"
                            class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                        <input type="text"
                            class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                    <input type="email"
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password"
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                    <input type="password"
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="terms" class="h-4 w-4 text-primary border-gray-300 rounded">
                    <label for="terms" class="ml-2 block text-sm text-gray-700">
                        I agree to the <a href="#" class="text-primary hover:underline">Terms of Service</a> and <a
                            href="#" class="text-primary hover:underline">Privacy Policy</a>
                    </label>
                </div>
            </form>
        </div>
        <div class="p-6 border-t border-gray-200 flex flex-col space-y-3">
            <button
                class="w-full bg-primary text-white py-3 rounded-lg font-medium hover:bg-accent transition-colors">Create
                Account</button>
            <div class="text-center text-sm text-gray-600">
                Already have an account? <a href="#" class="text-primary font-medium hover:underline"
                    onclick="showSignIn()">Sign In</a>
            </div>
        </div>
    </div>
</div>

<!-- Hero Section with Swiper -->
@if(session('success'))
<div class="flex items-center bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded-md shadow-md mb-6 animate-fade-in"
    role="alert">
    <!-- Icon -->
    <svg class="w-6 h-6 mr-2 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
    </svg>
    <span class="font-medium">{{ session('success') }}</span>
</div>
@endif

<section class="py-6 bg-primary">
    <div class="swiper main-swiper container mx-auto rounded-2xl overflow-hidden">
        <div class="swiper-wrapper" >
            <x-website.swiper.slide 
                badge="NEW ARRIVAL"
                title="Spring Collection 2024"
                description="Discover our new seasonal collection with fresh styles and colors"
                buttonText="Shop Now"
                buttonLink="/products/new-arrivals"
                image="{{ asset('assets/images/pexels-karolina-grabowska-4041392.jpg') }}"
                imageAlt="Spring Collection"
            />

            <x-website.swiper.slide 
                badge="LIMITED OFFER"
                title="Up to 50% Off Sale"
                description="Don’t miss our biggest sale of the season. Limited stock available!"
                buttonText="Shop Now"
                buttonLink="/products/new-arrivals"
                image="{{ asset('assets/images/pexels-laryssa-suaid-798122-1667088.jpg') }}"
                imageAlt="Spring Collection"
            />
        </div>

        <!-- Pagination -->
        <div class="swiper-pagination"></div>
    </div>
</section>


<!-- Categories Section -->
<section class="py-12 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-heading font-bold text-center mb-10">Shop by Category</h2>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <a href="{{ route('category.products', ['category' => 6]) }}"
                class="category-item group bg-light rounded-2xl p-6 text-center transition-all duration-300 shadow-md hover:shadow-xl">
                <div
                    class="bg-white rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4 group-hover:bg-accent transition-colors">
                    <img src="https://placehold.co/60x60/254D70/EFE4D2?text=W" alt="Women"
                        class="w-14 h-14 rounded-full">
                </div>
                <h3 class="font-medium text-lg">Men</h3>
                <p class="text-sm text-gray-500 mt-1">Spring collection</p>
            </a>

            <a href="{{ route('category.products', ['category' => 7]) }}"
                class="category-item group bg-light rounded-2xl p-6 text-center transition-all duration-300 shadow-md hover:shadow-xl">
                <div
                    class="bg-white rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4 group-hover:bg-accent transition-colors">
                    <img src="https://placehold.co/60x60/254D70/EFE4D2?text=M" alt="Men" class="w-14 h-14 rounded-full">
                </div>
                <h3 class="font-medium text-lg">women</h3>
                <p class="text-sm text-gray-500 mt-1">New arrivals</p>
            </a>

            <a href="{{ route('category.products', ['category' => 8]) }}"
                class="category-item group bg-light rounded-2xl p-6 text-center transition-all duration-300 shadow-md hover:shadow-xl">
                <div
                    class="bg-white rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4 group-hover:bg-accent transition-colors">
                    <img src="https://placehold.co/60x60/254D70/EFE4D2?text=K" alt="Kids"
                        class="w-14 h-14 rounded-full">
                </div>
                <h3 class="font-medium text-lg">Kids</h3>
                <p class="text-sm text-gray-500 mt-1">Summer collection</p>
            </a>

            <a href="{{ route('category.products', ['category' => 9]) }}"
                class="category-item group bg-light rounded-2xl p-6 text-center transition-all duration-300 shadow-md hover:shadow-xl">
                <div
                    class="bg-white rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4 group-hover:bg-accent transition-colors">
                    <img src="https://placehold.co/60x60/254D70/EFE4D2?text=A" alt="Accessories"
                        class="w-14 h-14 rounded-full">
                </div>
                <h3 class="font-medium text-lg">Accessories</h3>
                <p class="text-sm text-gray-500 mt-1">Popular items</p>
            </a>
        </div>
    </div>
</section>

<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-10">
            <h2 class="text-3xl font-heading font-bold">New Arrivals</h2>
            <a href="{{ route('user.allproducts') }}" class="text-primary font-medium flex items-center">
                View all
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="ml-1">
                    <path fill="currentColor"
                        d="M17.92 11.62a1 1 0 0 0-.21-.33l-5-5a1 1 0 0 0-1.42 1.42l3.3 3.29H7a1 1 0 0 0 0 2h7.59l-3.3 3.29a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0l5-5a1 1 0 0 0 .21-.33a1 1 0 0 0 0-.76Z" />
                </svg>
            </a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($products as $product)
            @php
            $images = json_decode($product->images, true);
            $firstImage = $images[0] ?? null;
            @endphp

            <a href="{{ route('user.product', $product->id) }}">
                <div class="product-item bg-white rounded-2xl p-4 shadow-md transition-all duration-300">
                    <div class="relative overflow-hidden rounded-xl mb-4">
                        @if($firstImage)
                        <img src="{{ asset('storage/' . $firstImage) }}" alt="{{ $product->name }}"
                            class="w-full h-64 object-cover">
                        @else
                        <img alt="{{ $product->name }}" class="w-full h-64 object-cover">
                        @endif

                        <div class="absolute top-3 right-3">
                            <button
                                class="wishlist-toggle bg-white rounded-full px-3 py-2 shadow-md hover:bg-secondary hover:text-white"
                                data-product-id="{{ $product->id }}">
                                ❤
                            </button>
                        </div>
                        <div class="absolute top-3 left-3">
                            <span class="bg-secondary text-white text-xs px-2 py-1 rounded">New</span>
                        </div>
                    </div>
                    <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-900 font-bold mt-2">${{ $product->price }}</span>
                        <form action="{{ route('cart.store') }}" method="POST">
                            @csrf
                            @method('POST')
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button class="bg-primary text-white p-2 rounded-lg hover:bg-secondary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M8.5 19a1.5 1.5 0 1 0 1.5 1.5A1.5 1.5 0 0 0 8.5 19ZM19 16H7a1 1 0 0 1 0-2h8.491a3.013 3.013 0 0 0 2.885-2.176l1.585-5.55A1 1 0 0 0 19 5H6.74A3.007 3.007 0 0 0 3.92 3H3a1 1 0 0 0 0 2h.921a1.005 1.005 0 0 1 .962.725l.155.545v.005l1.641 5.742A3 3 0 0 0 7 18h12a1 1 0 0 0 0-2Zm-1.326-9l-1.22 4.274a1.005 1.005 0 0 1-.963.726H8.754l-.255-.892L7.326 7ZM16.5 19a1.5 1.5 0 1 0 1.5 1.5a1.5 1.5 0 0 0-1.5-1.5Z">
                                    </path>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </a>
            @endforeach
        </div>


    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script>
    // Initialize Swiper
    const swiper = new Swiper('.main-swiper', {
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        autoplay: {
            delay: 5000,
        },
    });
</script>
@endsection