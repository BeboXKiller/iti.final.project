@extends('website.app')

@section('content')
    <style>
        .product-item:hover {
            transform: translateY(-5px);
        }
    </style>


    <!-- Page Header -->
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-heading font-bold">My Wishlist</h1>
            <p class="text-gray-600 mt-2">5 items saved for later</p>
        </div>
        <div class="flex space-x-3">
            <button class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg font-medium hover:bg-gray-300"
                onclick="clearWishlist()">
                Clear All
            </button>
            <button class="bg-primary text-white px-4 py-2 rounded-lg font-medium hover:bg-accent"
                onclick="shareWishlist()">
                Share Wishlist
            </button>
        </div>
    </div>

    <!-- Wishlist Items -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Wishlist Item 1 -->
        <div class="product-item bg-white rounded-2xl p-4 shadow-md transition-all duration-300 wishlist-item">
            <div class="relative overflow-hidden rounded-xl mb-4">
                <img src="https://placehold.co/300x400/254D70/EFE4D2?text=Elegant+Dress" alt="Elegant Summer Dress"
                    class="w-full">
                <div class="absolute top-3 right-3">
                    <button class="bg-red-500 text-white rounded-full p-2 shadow-md hover:bg-red-600"
                        onclick="removeFromWishlist(this)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5C2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3C19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                        </svg>
                    </button>
                </div>
                <div class="absolute top-3 left-3">
                    <span class="bg-green-500 text-white text-xs px-2 py-1 rounded">In Stock</span>
                </div>
            </div>
            <h3 class="font-medium mb-2">Elegant Summer Dress</h3>
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
                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327l4.898.696c.441.062.612.636.283.95l-3.523 3.356l.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                    </svg>
                </div>
                <span class="text-xs text-gray-500 ml-1">(42)</span>
            </div>
            <div class="flex justify-between items-center mb-3">
                <span class="font-heading font-bold text-lg">$89.99</span>
                <span class="text-sm text-gray-500">Added 3 days ago</span>
            </div>
            <div class="flex space-x-2">
                <button class="flex-1 bg-primary text-white py-2 rounded-lg font-medium hover:bg-accent"
                    onclick="addToCart(this)">
                    Add to Cart
                </button>
                <button class="bg-gray-200 text-gray-700 p-2 rounded-lg hover:bg-gray-300" onclick="quickView(this)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5s5 2.24 5 5s-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3s3-1.34 3-3s-1.34-3-3-3z" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Wishlist Item 2 -->
        <div class="product-item bg-white rounded-2xl p-4 shadow-md transition-all duration-300 wishlist-item">
            <div class="relative overflow-hidden rounded-xl mb-4">
                <img src="https://placehold.co/300x400/954C2E/EFE4D2?text=Leather+Jacket" alt="Leather Jacket"
                    class="w-full">
                <div class="absolute top-3 right-3">
                    <button class="bg-red-500 text-white rounded-full p-2 shadow-md hover:bg-red-600"
                        onclick="removeFromWishlist(this)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5C2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3C19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                        </svg>
                    </button>
                </div>
                <div class="absolute top-3 left-3">
                    <span class="bg-red-500 text-white text-xs px-2 py-1 rounded">Low Stock</span>
                </div>
            </div>
            <h3 class="font-medium mb-2">Premium Leather Jacket</h3>
            <div class="flex items-center mb-2">
                <div class="flex text-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                        <path fill="currentColor"
                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327l4.898.696c.441.062.612.636.283.95l-3.523 3.356l.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                        <path fill="currentColor"
                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327l4.898.696c.441.062.612.636.283.950l-3.523 3.356l.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
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
                <span class="text-xs text-gray-500 ml-1">(18)</span>
            </div>
            <div class="flex justify-between items-center mb-3">
                <span class="font-heading font-bold text-lg">$129.99</span>
                <span class="text-sm text-gray-500">Added 1 week ago</span>
            </div>
            <div class="flex space-x-2">
                <button class="flex-1 bg-primary text-white py-2 rounded-lg font-medium hover:bg-accent"
                    onclick="addToCart(this)">
                    Add to Cart
                </button>
                <button class="bg-gray-200 text-gray-700 p-2 rounded-lg hover:bg-gray-300" onclick="quickView(this)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5s5 2.24 5 5s-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3s3-1.34 3-3s-1.34-3-3-3z" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Wishlist Item 3 -->
        <div class="product-item bg-white rounded-2xl p-4 shadow-md transition-all duration-300 wishlist-item">
            <div class="relative overflow-hidden rounded-xl mb-4">
                <img src="https://placehold.co/300x400/131D4F/EFE4D2?text=Sneakers" alt="Designer Sneakers" class="w-full">
                <div class="absolute top-3 right-3">
                    <button class="bg-red-500 text-white rounded-full p-2 shadow-md hover:bg-red-600"
                        onclick="removeFromWishlist(this)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5C2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3C19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                        </svg>
                    </button>
                </div>
                <div class="absolute top-3 left-3">
                    <span class="bg-secondary text-white text-xs px-2 py-1 rounded">Sale</span>
                </div>
            </div>
            <h3 class="font-medium mb-2">Designer Sneakers</h3>
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
                <span class="text-xs text-gray-500 ml-1">(31)</span>
            </div>
            <div class="flex justify-between items-center mb-3">
                <div class="flex items-center space-x-2">
                    <span class="font-heading font-bold text-lg text-secondary">$99.99</span>
                    <span class="text-gray-500 line-through text-sm">$149.99</span>
                </div>
                <span class="text-sm text-gray-500">Added 5 days ago</span>
            </div>
            <div class="flex space-x-2">
                <button class="flex-1 bg-primary text-white py-2 rounded-lg font-medium hover:bg-accent"
                    onclick="addToCart(this)">
                    Add to Cart
                </button>
                <button class="bg-gray-200 text-gray-700 p-2 rounded-lg hover:bg-gray-300" onclick="quickView(this)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5s5 2.24 5 5s-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3s3-1.34 3-3s-1.34-3-3-3z" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Wishlist Item 4 -->
        <div class="product-item bg-white rounded-2xl p-4 shadow-md transition-all duration-300 wishlist-item">
            <div class="relative overflow-hidden rounded-xl mb-4">
                <img src="https://placehold.co/300x400/EFE4D2/254D70?text=Watch" alt="Classic Watch" class="w-full">
                <div class="absolute top-3 right-3">
                    <button class="bg-red-500 text-white rounded-full p-2 shadow-md hover:bg-red-600"
                        onclick="removeFromWishlist(this)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5C2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3C19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                        </svg>
                    </button>
                </div>
                <div class="absolute top-3 left-3">
                    <span class="bg-gray-500 text-white text-xs px-2 py-1 rounded">Out of Stock</span>
                </div>
            </div>
            <h3 class="font-medium mb-2">Classic Gold Watch</h3>
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
                <span class="text-xs text-gray-500 ml-1">(7)</span>
            </div>
            <div class="flex justify-between items-center mb-3">
                <span class="font-heading font-bold text-lg">$299.99</span>
                <span class="text-sm text-gray-500">Added 2 weeks ago</span>
            </div>
            <div class="flex space-x-2">
                <button class="flex-1 bg-gray-300 text-gray-500 py-2 rounded-lg font-medium cursor-not-allowed" disabled>
                    Out of Stock
                </button>
                <button class="bg-gray-200 text-gray-700 p-2 rounded-lg hover:bg-gray-300"
                    onclick="notifyWhenAvailable(this)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.89 2 2 2zm6-6v-5c0-3.07-1.64-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.63 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Wishlist Item 5 -->
        <div class="product-item bg-white rounded-2xl p-4 shadow-md transition-all duration-300 wishlist-item">
            <div class="relative overflow-hidden rounded-xl mb-4">
                <img src="https://placehold.co/300x400/954C2E/EFE4D2?text=Handbag" alt="Designer Handbag" class="w-full">
                <div class="absolute top-3 right-3">
                    <button class="bg-red-500 text-white rounded-full p-2 shadow-md hover:bg-red-600"
                        onclick="removeFromWishlist(this)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5C2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3C19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                        </svg>
                    </button>
                </div>
                <div class="absolute top-3 left-3">
                    <span class="bg-green-500 text-white text-xs px-2 py-1 rounded">In Stock</span>
                </div>
            </div>
            <h3 class="font-medium mb-2">Designer Handbag</h3>
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
                <span class="text-xs text-gray-500 ml-1">(12)</span>
            </div>
            <div class="flex justify-between items-center mb-3">
                <span class="font-heading font-bold text-lg">$199.99</span>
                <span class="text-sm text-gray-500">Added 1 month ago</span>
            </div>
            <div class="flex space-x-2">
                <button class="flex-1 bg-primary text-white py-2 rounded-lg font-medium hover:bg-accent"
                    onclick="addToCart(this)">
                    Add to Cart
                </button>
                <button class="bg-gray-200 text-gray-700 p-2 rounded-lg hover:bg-gray-300" onclick="quickView(this)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5s5 2.24 5 5s-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3s3-1.34 3-3s-1.34-3-3-3z" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Wishlist Item 6 -->
        <div class="product-item bg-white rounded-2xl p-4 shadow-md transition-all duration-300 wishlist-item">
            <div class="relative overflow-hidden rounded-xl mb-4">
                <img src="https://placehold.co/300x400/131D4F/EFE4D2?text=Sweater" alt="Cozy Sweater" class="w-full">
                <div class="absolute top-3 right-3">
                    <button class="bg-red-500 text-white rounded-full p-2 shadow-md hover:bg-red-600"
                        onclick="removeFromWishlist(this)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5C2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3C19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                        </svg>
                    </button>
                </div>
                <div class="absolute top-3 left-3">
                    <span class="bg-green-500 text-white text-xs px-2 py-1 rounded">In Stock</span>
                </div>
            </div>
            <h3 class="font-medium mb-2">Cozy Winter Sweater</h3>
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
                <span class="text-xs text-gray-500 ml-1">(28)</span>
            </div>
            <div class="flex justify-between items-center mb-3">
                <span class="font-heading font-bold text-lg">$59.99</span>
                <span class="text-sm text-gray-500">Added yesterday</span>
            </div>
            <div class="flex space-x-2">
                <button class="flex-1 bg-primary text-white py-2 rounded-lg font-medium hover:bg-accent"
                    onclick="addToCart(this)">
                    Add to Cart
                </button>
                <button class="bg-gray-200 text-gray-700 p-2 rounded-lg hover:bg-gray-300" onclick="quickView(this)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5s5 2.24 5 5s-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3s3-1.34 3-3s-1.34-3-3-3z" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Empty State (hidden by default) -->
    <div id="empty-wishlist" class="text-center py-16 hidden">
        <div class="max-w-md mx-auto">
            <div class="w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" class="text-gray-400">
                    <path fill="currentColor"
                        d="M20.16 4.61A6.27 6.27 0 0 0 12 4a6.27 6.27 0 0 0-8.16 9.48l7.45 7.45a1 1 0 0 0 1.42 0l7.45-7.45a6.27 6.27 0 0 0 0-8.87Zm-1.41 7.46L12 18.81l-6.75-6.74a4.28 4.28 0 0 1 3-7.3a4.25 4.25 0 0 1 3 1.25a1 1 0 0 0 1.42 0a4.27 4.27 0 0 1 6 6.05Z" />
                </svg>
            </div>
            <h3 class="text-xl font-heading font-bold mb-2">Your wishlist is empty</h3>
            <p class="text-gray-600 mb-6">Save items you love by clicking the heart icon</p>
            <a href="index.html"
                class="bg-primary text-white px-6 py-3 rounded-lg font-medium inline-block hover:bg-accent">
                Start Shopping
            </a>
        </div>
    </div>

    <!-- Bulk Actions -->
    <div class="mt-8 bg-white rounded-2xl shadow-md p-6">
        <h3 class="text-xl font-heading font-bold mb-4">Wishlist Actions</h3>
        <div class="flex flex-wrap gap-4">
            <button class="bg-secondary text-white px-6 py-3 rounded-lg font-medium hover:bg-accent"
                onclick="addAllToCart()">
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
    <script>
        let wishlistCount = 5;

        // Remove from wishlist
        function removeFromWishlist(button) {
            if (confirm('Remove this item from your wishlist?')) {
                button.closest('.wishlist-item').remove();
                wishlistCount--;
                updateWishlistCount();

                if (wishlistCount === 0) {
                    document.getElementById('empty-wishlist').classList.remove('hidden');
                    document.querySelector('.grid').classList.add('hidden');
                }
            }
        }

        // Add to cart
        function addToCart(button) {
            const productName = button.closest('.wishlist-item').querySelector('h3').textContent;

            // Animation effect
            button.innerHTML = 'Added!';
            button.classList.add('bg-green-500');
            button.classList.remove('bg-primary');

            setTimeout(() => {
                button.innerHTML = 'Add to Cart';
                button.classList.remove('bg-green-500');
                button.classList.add('bg-primary');
            }, 2000);

            // Update cart count in header
            const cartBadge = document.querySelector('header .bg-secondary');
            let currentCount = parseInt(cartBadge.textContent);
            cartBadge.textContent = currentCount + 1;

            // Show success message
            showNotification(`${productName} added to cart!`);
        }

        // Quick view
        function quickView(button) {
            const productName = button.closest('.wishlist-item').querySelector('h3').textContent;
            alert(`Quick view for ${productName} would open here`);
        }

        // Notify when available
        function notifyWhenAvailable(button) {
            const productName = button.closest('.wishlist-item').querySelector('h3').textContent;
            showNotification(`You'll be notified when ${productName} is back in stock!`);
        }

        // Bulk actions
        function clearWishlist() {
            if (confirm('Are you sure you want to clear your entire wishlist?')) {
                document.querySelectorAll('.wishlist-item').forEach(item => item.remove());
                wishlistCount = 0;
                updateWishlistCount();
                document.getElementById('empty-wishlist').classList.remove('hidden');
                document.querySelector('.grid').classList.add('hidden');
            }
        }

        function shareWishlist() {
            if (navigator.share) {
                navigator.share({
                    title: 'My StyleMart Wishlist',
                    text: 'Check out my favorite items from StyleMart!',
                    url: window.location.href
                });
            } else {
                // Fallback - copy to clipboard
                navigator.clipboard.writeText(window.location.href);
                showNotification('Wishlist link copied to clipboard!');
            }
        }

        function addAllToCart() {
            const availableItems = document.querySelectorAll('.wishlist-item').length;
            if (confirm(`Add all ${availableItems} items to your cart?`)) {
                document.querySelectorAll('.wishlist-item button[onclick="addToCart(this)"]').forEach(btn => {
                    if (!btn.disabled) {
                        btn.click();
                    }
                });
            }
        }

        function moveToNewList() {
            const listName = prompt('Enter name for new wishlist:');
            if (listName) {
                showNotification(`New wishlist "${listName}" created!`);
            }
        }

        function exportWishlist() {
            const items = Array.from(document.querySelectorAll('.wishlist-item h3')).map(h3 => h3.textContent);
            const csvContent = "data:text/csv;charset=utf-8," + items.join('\n');
            const link = document.createElement("a");
            link.setAttribute("href", encodeURI(csvContent));
            link.setAttribute("download", "my_wishlist.csv");
            link.click();
            showNotification('Wishlist exported successfully!');
        }

        // Update wishlist count
        function updateWishlistCount() {
            const countElement = document.querySelector('h1 + p');
            countElement.textContent = `${wishlistCount} items saved for later`;
        }

        // Show notification
        function showNotification(message) {
            const notification = document.createElement('div');
            notification.className = 'fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50';
            notification.textContent = message;
            document.body.appendChild(notification);

            setTimeout(() => {
                notification.remove();
            }, 3000);
        }
    </script>
@endsection