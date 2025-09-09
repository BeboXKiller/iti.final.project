@extends('website.app')

@section('content')

    <!-- Product Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-16">
        <!-- Product Gallery -->
        <div class="product-gallery">
            <div class="relative rounded-2xl overflow-hidden mb-4">
                <img src="https://placehold.co/600x700/254D70/EFE4D2?text=Summer+Dress" alt="Summer Floral Dress"
                    class="w-full" id="main-image">
                <div class="absolute top-3 right-3">
                    <button class="bg-white rounded-full p-2 shadow-md hover:bg-secondary hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5C2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3C19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                        </svg>
                    </button>
                </div>
                <div class="absolute top-3 left-3">
                    <span class="bg-secondary text-white text-xs px-2 py-1 rounded">New</span>
                </div>
            </div>
            <!-- <div class="grid grid-cols-4 gap-4">
                            <img src="https://placehold.co/150x150/254D70/EFE4D2?text=Front" alt="Front view" class="rounded-lg cursor-pointer" onclick="changeImage(this)">
                            <img src="https://placehold.co/150x150/954C2E/EFE4D2?text=Back" alt="Back view" class="rounded-lg cursor-pointer" onclick="changeImage(this)">
                            <img src="https://placehold.co/150x150/131D4F/EFE4D2?text=Side" alt="Side view" class="rounded-lg cursor-pointer" onclick="changeImage(this)">
                            <img src="https://placehold.co/150x150/254D70/EFE4D2?text=Detail" alt="Detail view" class="rounded-lg cursor-pointer" onclick="changeImage(this)">
                        </div> -->
        </div>

        <!-- Product Details -->
        <div>
            <h1 class="text-3xl font-heading font-bold mb-2">Summer Floral Dress</h1>
            <div class="flex items-center mb-4">
                <div class="flex text-secondary mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
                        <path fill="currentColor"
                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327l4.898.696c.441.062.612.636.283.95l-3.523 3.356l.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
                        <path fill="currentColor"
                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327l4.898.696c.441.062.612.636.283.95l-3.523 3.356l.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
                        <path fill="currentColor"
                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327l4.898.696c.441.062.612.636.283.95l-3.523 3.356l.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
                        <path fill="currentColor"
                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327l4.898.696c.441.062.612.636.283.95l-3.523 3.356l.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
                        <path fill="currentColor"
                            d="M5.354 5.119L7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327l4.898.696A.537.537 0 0 1 16 6.32a.548.548 0 0 1-.17.445l-3.523 3.356l.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.52.52 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403a.58.58 0 0 1 .085-.302a.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894l-.694-3.957a.565.565 0 0 1 .162-.505l2.907-2.77l-4.052-.576a.525.525 0 0 1-.393-.288L8.001 2.223L8 2.226v9.8z" />
                    </svg>
                </div>
                <span class="text-gray-500">(42 reviews)</span>
                <a href="#reviews" class="text-primary ml-4 hover:underline">Read reviews</a>
            </div>

            <div class="mb-6">
                <span class="font-heading font-bold text-2xl text-secondary">$59.99</span>
                <span class="text-gray-500 line-through ml-2">$79.99</span>
            </div>

            <p class="text-gray-600 mb-6">
                This beautiful summer floral dress features a flattering A-line silhouette with a comfortable elastic waist.
                Made from lightweight, breathable fabric that's perfect for warm weather. The vibrant floral print adds a
                touch of elegance to any summer occasion.
            </p>

            <!-- Size Selection -->
            <div class="mb-6">
                <h3 class="font-medium mb-3">Size</h3>
                <div class="flex flex-wrap gap-2">
                    <label class="size-option">
                        <input type="radio" name="size" class="hidden">
                        <span
                            class="inline-block border border-gray-200 py-2 px-4 rounded-lg cursor-pointer hover:border-primary">XS</span>
                    </label>
                    <label class="size-option">
                        <input type="radio" name="size" class="hidden">
                        <span
                            class="inline-block border border-gray-200 py-2 px-4 rounded-lg cursor-pointer hover:border-primary">S</span>
                    </label>
                    <label class="size-option">
                        <input type="radio" name="size" class="hidden" checked>
                        <span
                            class="inline-block border border-gray-200 py-2 px-4 rounded-lg cursor-pointer hover:border-primary">M</span>
                    </label>
                    <label class="size-option">
                        <input type="radio" name="size" class="hidden">
                        <span
                            class="inline-block border border-gray-200 py-2 px-4 rounded-lg cursor-pointer hover:border-primary">L</span>
                    </label>
                    <label class="size-option">
                        <input type="radio" name="size" class="hidden">
                        <span
                            class="inline-block border border-gray-200 py-2 px-4 rounded-lg cursor-pointer hover:border-primary">XL</span>
                    </label>
                </div>
                <a href="#" class="text-primary text-sm mt-2 inline-block hover:underline">Size guide</a>
            </div>

            <!-- Color Selection -->
            <div class="mb-6">
                <h3 class="font-medium mb-3">Color: Floral Print</h3>
                <div class="flex gap-3">
                    <label class="color-option">
                        <input type="radio" name="color" class="hidden" checked>
                        <span class="inline-block w-8 h-8 bg-blue-500 rounded-full cursor-pointer"></span>
                    </label>
                    <label class="color-option">
                        <input type="radio" name="color" class="hidden">
                        <span class="inline-block w-8 h-8 bg-pink-500 rounded-full cursor-pointer"></span>
                    </label>
                    <label class="color-option">
                        <input type="radio" name="color" class="hidden">
                        <span class="inline-block w-8 h-8 bg-green-500 rounded-full cursor-pointer"></span>
                    </label>
                </div>
            </div>

            <!-- Quantity & Add to Cart -->
            <div class="flex flex-wrap items-center gap-4 mb-2">
                <div class="flex items-center border border-gray-200 rounded-lg">
                    <button class="px-4 py-3 text-gray-500 hover:text-primary" onclick="updateQuantity(-1)">-</button>
                    <span class="px-4 py-2" id="quantity">1</span>
                    <button class="px-4 py-3 text-gray-500 hover:text-primary" onclick="updateQuantity(1)">+</button>
                </div>
                <button
                    class="flex-1 bg-primary text-white py-3 px-6 rounded-lg font-medium hover:bg-accent flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="mr-2">
                        <path fill="currentColor"
                            d="M8.5 19a1.5 1.5 0 1 0 1.5 1.5A1.5 1.5 0 0 0 8.5 19ZM19 16H7a1 1 0 0 1 0-2h8.491a3.013 3.013 0 0 0 2.885-2.176l1.585-5.55A1 1 0 0 0 19 5H6.74A3.007 3.007 0 0 0 3.92 3H3a1 1 0 0 0 0 2h.921a1.005 1.005 0 0 1 .962.725l.155.545v.005l1.641 5.742A3 3 0 0 0 7 18h12a1 1 0 0 0 0-2Zm-1.326-9l-1.22 4.274a1.005 1.005 0 0 1-.963.726H8.754l-.255-.892L7.326 7ZM16.5 19a1.5 1.5 0 1 0 1.5 1.5a1.5 1.5 0 0 0-1.5-1.5Z" />
                    </svg>
                    Add to Cart
                </button>
            </div>

            <!-- Product Actions -->
            <div class="flex items-center space-x-4 border-t border-b border-gray-200 py-4">
                <button class="flex items-center text-gray-600 hover:text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="mr-2">
                        <path fill="currentColor"
                            d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5C2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3C19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                    </svg>
                    Add to Wishlist
                </button>
                <button class="flex items-center text-gray-600 hover:text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="mr-2">
                        <path fill="currentColor"
                            d="M8.465 20.485c-.673 0-1.218-.545-1.218-1.218s.545-1.218 1.218-1.218s1.218.545 1.218 1.218s-.545 1.218-1.218 1.218zm9.546 0c-.673 0-1.218-.545-1.218-1.218s.545-1.218 1.218-1.218s1.218.545 1.218 1.218s-.545 1.218-1.218 1.218zM21 6H5.454L4.788 3.545A1.222 1.222 0 0 0 3.545 2.727H2.273A1.227 1.227 0 0 0 1.045 3.955c0 .673.545 1.218 1.218 1.218h1.091l.667 2.909l1.745 8.303a1.227 1.227 0 0 0 1.218.985h10.909a1.227 1.227 0 0 0 1.218-1.218c0-.673-.545-1.218-1.218-1.218H7.273l-.248-1.164h11.531a1.227 1.227 0 0 0 1.218-1.033l1.091-5.455A1.227 1.227 0 0 0 21 6zm-3.273 9.273H8.273v-1.091h9.454v1.091z" />
                    </svg>
                    Add to Compare
                </button>
            </div>

            <!-- Product Details Accordion -->
            <div class="mt-2 space-y-4">
                <div class="border-b border-gray-200 pb-4">
                    <button class="flex justify-between items-center w-full text-left font-medium"
                        onclick="toggleAccordion(this)">
                        <span>Product Details</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            class="transform rotate-0 transition-transform">
                            <path fill="currentColor" d="M12 15.375L6 9.375l1.4-1.4l4.6 4.6l4.6-4.6l1.4 1.4l-6 6Z" />
                        </svg>
                    </button>
                    <div class="mt-2 text-gray-600 hidden">
                        <ul class="list-disc pl-5 space-y-1">
                            <li>Lightweight, breathable fabric</li>
                            <li>Elastic waist for comfort</li>
                            <li>A-line silhouette</li>
                            <li>Machine washable</li>
                            <li>Imported</li>
                        </ul>
                    </div>
                </div>
                <div class="border-b border-gray-200 pb-4">
                    <button class="flex justify-between items-center w-full text-left font-medium"
                        onclick="toggleAccordion(this)">
                        <span>Shipping & Returns</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            class="transform rotate-0 transition-transform">
                            <path fill="currentColor" d="M12 15.375L6 9.375l1.4-1.4l4.6 4.6l4.6-4.6l1.4 1.4l-6 6Z" />
                        </svg>
                    </button>
                    <div class="mt-2 text-gray-600 hidden">
                        <p>Free standard shipping on orders over $50. Returns accepted within 30 days of purchase.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Reviews Section -->
    <section class="mb-16" id="reviews">
        <h2 class="text-2xl font-heading font-bold mb-6">Customer Reviews</h2>
        <div class="bg-white rounded-2xl p-6 shadow-md">
            <div class="flex flex-col md:flex-row items-start gap-8">
                <div class="md:w-1/3">
                    <div class="text-center">
                        <div class="text-5xl font-bold text-secondary mb-2">4.2</div>
                        <div class="flex justify-center text-secondary mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 16 16">
                                <path fill="currentColor"
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327l4.898.696c.441.062.612.636.283.95l-3.523 3.356l.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 16 16">
                                <path fill="currentColor"
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327l4.898.696c.441.062.612.636.283.95l-3.523 3.356l.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 16 16">
                                <path fill="currentColor"
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327l4.898.696c.441.062.612.636.283.95l-3.523 3.356l.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 16 16">
                                <path fill="currentColor"
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327l4.898.696c.441.062.612.636.283.95l-3.523 3.356l.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 16 16">
                                <path fill="currentColor"
                                    d="M5.354 5.119L7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327l4.898.696A.537.537 0 0 1 16 6.32a.548.548 0 0 1-.17.445l-3.523 3.356l.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.52.52 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403a.58.58 0 0 1 .085-.302a.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894l-.694-3.957a.565.565 0 0 1 .162-.505l2.907-2.77l-4.052-.576a.525.525 0 0 1-.393-.288L8.001 2.223L8 2.226v9.8z" />
                            </svg>
                        </div>
                        <p class="text-gray-600">Based on 42 reviews</p>
                    </div>
                </div>
                <div class="md:w-2/3">
                    <!-- Individual reviews would go here -->
                    <div class="border-b border-gray-200 pb-4 mb-4">
                        <div class="flex items-center mb-2">
                            <div class="flex text-secondary mr-2">
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
                            <span class="font-medium">Sarah Johnson</span>
                        </div>
                        <p class="text-gray-600 mb-2">Posted on June 15, 2023</p>
                        <p>This dress is absolutely beautiful! The fit is perfect and the material is so comfortable. I've
                            received so many compliments when wearing it.</p>
                    </div>
                    <!-- More reviews would go here -->
                    <button class="bg-primary text-white px-6 py-2 rounded-lg font-medium hover:bg-accent">
                        Write a Review
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Products -->
    <section class="mb-16">
        <h2 class="text-2xl font-heading font-bold mb-6">You May Also Like</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Related product 1 -->
            <div class="product-item bg-white rounded-2xl p-4 shadow-md transition-all duration-300">
                <div class="relative overflow-hidden rounded-xl mb-4">
                    <img src="https://placehold.co/300x400/954C2E/EFE4D2?text=Summer+Top" alt="Summer Top" class="w-full">
                    <div class="absolute top-3 right-3">
                        <button class="bg-white rounded-full p-2 shadow-md hover:bg-secondary hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5C2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3C19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                            </svg>
                        </button>
                    </div>
                </div>
                <h3 class="font-medium mb-1">Floral Summer Top</h3>
                <div class="flex items-center mb-2">
                    <div class="flex text-secondary">
                        <!-- Star ratings would go here -->
                    </div>
                    <span class="text-xs text-gray-500 ml-1">(24)</span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="font-heading font-bold text-lg">$39.99</span>
                    <button class="bg-primary text-white p-2 rounded-lg hover:bg-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M8.5 19a1.5 1.5 0 1 0 1.5 1.5A1.5 1.5 0 0 0 8.5 19ZM19 16H7a1 1 0 0 1 0-2h8.491a3.013 3.013 0 0 0 2.885-2.176l1.585-5.55A1 1 0 0 0 19 5H6.74A3.007 3.007 0 0 0 3.92 3H3a1 1 0 0 0 0 2h.921a1.005 1.005 0 0 1 .962.725l.155.545v.005l1.641 5.742A3 3 0 0 0 7 18h12a1 1 0 0 0 0-2Zm-1.326-9l-1.22 4.274a1.005 1.005 0 0 1-.963.726H8.754l-.255-.892L7.326 7ZM16.5 19a1.5 1.5 0 1 0 1.5 1.5a1.5 1.5 0 0 0-1.5-1.5Z" />
                        </svg>
                    </button>
                </div>
            </div>
            <!-- More related products would go here -->
        </div>
    </section>

    <script>
        // Change main product image
        function changeImage(element) {
            document.getElementById('main-image').src = element.src;
        }

        // Update quantity
        function updateQuantity(change) {
            const quantityElement = document.getElementById('quantity');
            let quantity = parseInt(quantityElement.textContent);
            quantity += change;
            if (quantity < 1) quantity = 1;
            quantityElement.textContent = quantity;
        }

        // Toggle accordion
        function toggleAccordion(button) {
            const content = button.nextElementSibling;
            const icon = button.querySelector('svg');

            content.classList.toggle('hidden');
            icon.classList.toggle('rotate-0');
            icon.classList.toggle('rotate-180');
        }
    </script>
@endsection