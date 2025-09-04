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

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Product 1 -->
                <div class="product-item bg-white rounded-2xl p-4 shadow-md transition-all duration-300">
                    <div class="relative overflow-hidden rounded-xl mb-4">
                        <img src="https://placehold.co/300x400/254D70/EFE4D2?text=Product+1" alt="Product 1" class="w-full">
                        <div class="absolute top-3 right-3">
                            <button class="bg-white rounded-full p-2 shadow-md hover:bg-secondary hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M20.16 4.61A6.27 6.27 0 0 0 12 4a6.27 6.27 0 0 0-8.16 9.48l7.45 7.45a1 1 0 0 0 1.42 0l7.45-7.45a6.27 6.27 0 0 0 0-8.87Zm-1.41 7.46L12 18.81l-6.75-6.74a4.28 4.28 0 0 1 3-7.3a4.25 4.25 0 0 1 3 1.25a1 1 0 0 0 1.42 0a4.27 4.27 0 0 1 6 6.05Z" />
                                </svg>
                            </button>
                        </div>
                        <div class="absolute top-3 left-3">
                            <span class="bg-secondary text-white text-xs px-2 py-1 rounded">New</span>
                        </div>
                    </div>
                    <h3 class="font-medium mb-1">Classic White Shirt</h3>
                    <div class="flex items-center mb-2">
                        <div class="flex text-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                <path fill="currentColor"
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327l4.898.696c.441.062.612.636.283.95l-3.523 3.356l.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                <path fill="currentColor"
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327l4.898.696c.441.062.612.636.283.95l-3.523 3.356l.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                <path fill="currentColor"
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327l4.898.696c.441.062.612.636.283.95l-3.523 3.356l.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                <path fill="currentColor"
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327l4.898.696c.441.062.612.636.283.95l-3.523 3.356l.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                <path fill="currentColor"
                                    d="M5.354 5.119L7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327l4.898.696A.537.537 0 0 1 16 6.32a.548.548 0 0 1-.17.445l-3.523 3.356l.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.52.52 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403a.58.58 0 0 1 .085-.302a.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894l-.694-3.957a.565.565 0 0 1 .162-.505l2.907-2.77l-4.052-.576a.525.525 0 0 1-.393-.288L8.001 2.223L8 2.226v9.8z" />
                            </svg>
                        </div>
                        <span class="text-xs text-gray-500 ml-1">(24)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="font-heading font-bold text-lg">$49.99</span>
                        <button class="bg-primary text-white p-2 rounded-lg hover:bg-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M8.5 19a1.5 1.5 0 1 0 1.5 1.5A1.5 1.5 0 0 0 8.5 19ZM19 16H7a1 1 0 0 1 0-2h8.491a3.013 3.013 0 0 0 2.885-2.176l1.585-5.55A1 1 0 0 0 19 5H6.74A3.007 3.007 0 0 0 3.92 3H3a1 1 0 0 0 0 2h.921a1.005 1.005 0 0 1 .962.725l.155.545v.005l1.641 5.742A3 3 0 0 0 7 18h12a1 1 0 0 0 0-2Zm-1.326-9l-1.22 4.274a1.005 1.005 0 0 1-.963.726H8.754l-.255-.892L7.326 7ZM16.5 19a1.5 1.5 0 1 0 1.5 1.5a1.5 1.5 0 0 0-1.5-1.5Z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- More products would go here... -->
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