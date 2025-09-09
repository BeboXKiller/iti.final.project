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

<!-- Main Site Sign Up Modal -->
<div class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50 opacity-0 pointer-events-none transition-all duration-300" id="signup-modal">
    <div class="bg-white rounded-2xl w-full max-w-md">
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-xl font-heading font-bold">Create Your Account</h2>
        </div>
        <div class="p-6">
            <form class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                        <input type="text" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary form-input">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                        <input type="text" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary form-input">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                    <input type="email" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary form-input">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <div class="relative">
                        <input type="password" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary form-input pr-10">
                        <span class="absolute right-3 top-3 toggle-password">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                        </span>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                    <div class="relative">
                        <input type="password" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary form-input pr-10">
                        <span class="absolute right-3 top-3 toggle-password">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="terms" class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                    <label for="terms" class="ml-2 block text-sm text-gray-700">
                        I agree to the <a href="#" class="text-primary hover:underline">Terms of Service</a> and <a href="#" class="text-primary hover:underline">Privacy Policy</a>
                    </label>
                </div>
            </form>
        </div>
        <div class="p-6 border-t border-gray-200 flex flex-col space-y-3">
            <button class="w-full bg-primary text-white py-3 rounded-lg font-medium hover:bg-accent transition-colors">Create Account</button>
            <div class="text-center text-sm text-gray-600">
                Already have an account? <a href="#" class="text-primary font-medium hover:underline" onclick="showSignIn()">Sign In</a>
            </div>
        </div>
    </div>
</div>


<section class="py-8 bg-primary">
    <!-- Hero Banner with Swiper -->
    <div class="swiper main-swiper container mx-auto px-4 rounded-2xl overflow-hidden">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center py-10">
                    <div class="text-white px-6">
                        <p class="text-secondary font-semibold mb-2">SUMMER COLLECTION</p>
                        <h2 class="text-4xl md:text-5xl font-heading font-bold mb-4">Fall - Winter
                            Collections
                            2023</h2>
                        <p class="mb-6">A specialist label creating luxury essentials. Ethically crafted
                            with an
                            unwavering commitment to exceptional quality.</p>
                        <a href="#"
                            class="bg-secondary text-white px-6 py-3 rounded-full font-medium inline-flex items-center">
                            Shop Now
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="ml-2"
                                viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M17.92 11.62a1 1 0 0 0-.21-.33l-5-5a1 1 0 0 0-1.42 1.42l3.3 3.29H7a1 1 0 0 0 0 2h7.59l-3.3 3.29a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0l5-5a1 1 0 0 0 .21-.33a1 1 0 0 0 0-.76Z" />
                            </svg>
                        </a>
                    </div>
                    <div class="flex justify-center">
                        <img src="https://placehold.co/500x600/EFE4D2/254D70?text=Summer+Collection"
                            alt="Summer Collection" class="rounded-2xl shadow-xl">
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center py-10">
                    <div class="text-white px-6">
                        <p class="text-secondary font-semib极速加速器old mb-2">NEW ARRIVALS</p>
                        <h2 class="text-4xl md:text-5xl font-heading font-bold mb-4">New Season Arrivals
                        </h2>
                        <p class="mb-6">Discover the latest trends in fashion and upgrade your wardrobe with
                            our
                            new collection.</p>
                        <a href="#"
                            class="bg-secondary text-white px-6 py-3 rounded-full font-medium inline-flex items-center">
                            Shop Collection
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="ml-2"
                                viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M17.92 11.62a1 1 0 0 0-.21-.33l-5-5a1 1 0 0 0-1.42 1.42l3.3 3.29H7a1 1 0 0 0 0 2h7.59l-3.3 3.29a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0l5-5a1 1 0 0 0 .21-.33a1 1 0 0 0 0-.76Z" />
                            </svg>
                        </a>
                    </div>
                    <div class="flex justify-center">
                        <img src="https://placehold.co/500x600/EFE4D2/254D70?text=New+Arrivals" alt="New Arrivals"
                            class="rounded-2xl shadow-xl">
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>

<!-- Categories Section -->
<section class="py-12 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-heading font-bold text-center mb-10">Shop by Category</h2>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <a href="#"
                class="category-item group bg-light rounded-2xl p-6 text-center transition-all duration-300 shadow-md hover:shadow-xl">
                <div
                    class="bg-white rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4 group-hover:bg-accent transition-colors">
                    <img src="https://placehold.co/60x60/254D70/EFE4D2?text=W" alt="Women"
                        class="w-14 h-14 rounded-full">
                </div>
                <h3 class="font-medium text-lg">Women</h3>
                <p class="text-sm text-gray-500 mt-1">Spring collection</p>
            </a>

            <a href="#"
                class="category-item group bg-light rounded-2xl p-6 text-center transition-all duration-300 shadow-md hover:shadow-xl">
                <div
                    class="bg-white rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4 group-hover:bg-accent transition-colors">
                    <img src="https://placehold.co/60x60/254D70/EFE4D2?text=M" alt="Men" class="w-14 h-14 rounded-full">
                </div>
                <h3 class="font-medium text-lg">Men</h3>
                <p class="text-sm text-gray-500 mt-1">New arrivals</p>
            </a>

            <a href="#"
                class="category-item group bg-light rounded-2xl p-6 text-center transition-all duration-300 shadow-md hover:shadow-xl">
                <div
                    class="bg-white rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4 group-hover:bg-accent transition-colors">
                    <img src="https://placehold.co/60x60/254D70/EFE4D2?text=K" alt="Kids"
                        class="w-14 h-14 rounded-full">
                </div>
                <h3 class="font-medium text-lg">Kids</h3>
                <p class="text-sm text-gray-500 mt-1">Summer collection</p>
            </a>

            <a href="#"
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

<!-- Featured Products -->
<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-10">
            <h2 class="text-3xl font-heading font-bold">New Arrivals</h2>
            <a href="#" class="text-primary font-medium flex items-center">
                View all
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="ml-1">
                    <path fill="currentColor"
                        d="M17.92 11.62a1 1 0 0 0-.21-.33l-5-5a1 1 0 0 0-1.42 1.42l3.3 3.29H7a1 1 0 0 0 0 2h7.59l-3.3 3.29a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0l5-5a1 1 0 0 0 .21-.33a1 1 0 0 0 0-.76Z" />
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
  @foreach($products as $product)
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        @php
            $images = json_decode($product->images, true);
            $firstImage = $images[0] ?? null;
        @endphp

        @if($firstImage)
            <img src="{{ asset('storage/' . $firstImage) }}" 
                 alt="{{ $product->name }}" 
                 class="w-full h-64 object-cover">
        @else
            <img src="{{ asset('default-product.png') }}" 
                 alt="No Image" 
                 class="w-full h-64 object-cover">
        @endif

        <div class="p-4">
            <h2 class="text-lg font-semibold">{{ $product->name }}</h2>
            <p class="text-gray-900 font-bold mt-2">${{ $product->price }}</p>
        </div>
    </div>
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