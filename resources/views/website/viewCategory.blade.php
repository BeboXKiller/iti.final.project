@extends('website.app')

@section('content')

    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
        <div>
            <h1 class="text-3xl font-heading font-bold">Women's Collection</h1>
            <p class="text-gray-600 mt-2">Showing 1-12 of 86 products</p>
        </div>
        <div class="flex items-center space-x-4 mt-4 md:mt-0">
            <div class="flex items-center">
                <span class="text-gray-600 mr-2">Sort by:</span>
                <select
                    class="bg-light border-none rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary">
                    <option>Newest First</option>
                    <option>Price: Low to High</option>
                    <option>Price: High to Low</option>
                    <option>Most Popular</option>
                </select>
            </div>
            <button class="bg-primary text-white p-2 rounded-lg md:hidden" onclick="toggleMobileFilters()">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M3 18v-2h18v2H3Zm0-5v-2h18v2H3Zm0-5V6h18v2H3Z" />
                </svg>
            </button>
        </div>
    </div>

    <div class="flex flex-col md:flex-row gap-8">
        <!-- Filters Sidebar -->
        <div class="w-full md:w-64 bg-white rounded-2xl p-6 shadow-md" id="filters-sidebar">
            <div class="flex justify-between items-center mb-6">
                <h2 class="font-heading font-bold text-lg">Filters</h2>
                <button class="text-primary text-sm" onclick="clearFilters()">Clear all</button>
            </div>

            <!-- Price Filter -->
            <div class="mb-6">
                <h3 class="font-medium mb-3">Price</h3>
                <input type="range" min="0" max="500" value="250" class="w-full price-range accent-secondary">
                <div class="flex justify-between mt-2">
                    <span class="text-sm">$0</span>
                    <span class="text-sm">$500</span>
                </div>
            </div>

            <!-- Category Filter -->
            <div class="mb-6">
                <h3 class="font-medium mb-3">Category</h3>
                <div class="space-y-2">
                    <label class="filter-item flex items-center">
                        <input type="checkbox" class="hidden">
                        <span
                            class="w-4 h-4 border border-gray-300 rounded-sm mr-2 flex items-center justify-center"></span>
                        Dresses
                    </label>
                    <label class="filter-item flex items-center">
                        <input type="checkbox" class="hidden">
                        <span
                            class="w-4 h-4 border border-gray-300 rounded-sm mr-2 flex items-center justify-center"></span>
                        Tops
                    </label>
                    <label class="filter-item flex items-center">
                        <input type="checkbox" class="hidden" checked>
                        <span
                            class="w-4 h-4 border border-gray-300 rounded-sm mr-2 flex items-center justify-center"></span>
                        Pants
                    </label>
                    <label class="filter-item flex items-center">
                        <input type="checkbox" class="hidden">
                        <span
                            class="w-4 h-4 border border-gray-300 rounded-sm mr-2 flex items-center justify-center"></span>
                        Shoes
                    </label>
                </div>
            </div>

            <!-- Size Filter -->
            <div class="mb-6">
                <h3 class="font-medium mb-3">Size</h3>
                <div class="grid grid-cols-3 gap-2">
                    <button class="border border-gray-200 py-2 rounded-lg text-sm hover:border-primary">XS</button>
                    <button class="border border-gray-200 py-2 rounded-lg text-sm hover:border-primary">S</button>
                    <button class="border border-primary py-2 rounded-lg text-sm bg-light text-primary">M</button>
                    <button class="border border-gray-200 py-2 rounded-lg text-sm hover:border-primary">L</button>
                    <button class="border border-gray-200 py-2 rounded-lg text-sm hover:border-primary">XL</button>
                    <button class="border border-gray-200 py-2 rounded-lg text-sm hover:border-primary">XXL</button>
                </div>
            </div>

            <!-- Color Filter -->
            <div class="mb-6">
                <h3 class="font-medium mb-3">Color</h3>
                <div class="grid grid-cols-4 gap-2">
                    <button class="w-8 h-8 bg-black rounded-full border border-gray-200"></button>
                    <button class="w-8 h-8 bg-white rounded-full border border-gray-200"></button>
                    <button class="w-8 h-8 bg-red-500 rounded-full border border-gray-200"></button>
                    <button class="w-8 h-8 bg-blue-500 rounded-full border border-gray-200"></button>
                    <button class="w-8 h-8 bg-green-500 rounded-full border border-gray-200"></button>
                    <button class="w-8 h-8 bg-yellow-500 rounded-full border border-gray-200"></button>
                    <button class="w-8 h-8 bg-purple-500 rounded-full border border-gray-200"></button>
                    <button class="w-8 h-8 bg-pink-500 rounded-full border border-gray-200"></button>
                </div>
            </div>

            <button class="w-full bg-primary text-white py-3 rounded-lg font-medium hover:bg-accent">
                Apply Filters
            </button>
        </div>

        <!-- Products Grid -->
        <div class="flex-1">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Product 1 -->
                <div class="product-item bg-white rounded-2xl p-4 shadow-md transition-all duration-300">
                    <div class="relative overflow-hidden rounded-xl mb-4">
                        <img src="https://placehold.co/300x400/254D70/EFE4D2?text=Summer+Dress" alt="Summer Dress"
                            class="w-full">
                        <div class="absolute top-3 right-3">
                            <button class="bg-white rounded-full p-2 shadow-md hover:bg-secondary hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5C2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3C19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                                </svg>
                            </button>
                        </div>
                        <div class="absolute top-3 left-3">
                            <span class="bg-secondary text-white text-xs px-2 py-1 rounded">New</span>
                        </div>
                    </div>
                    <h3 class="font-medium mb-1">Summer Floral Dress</h3>
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
                        <span class="text-xs text-gray-500 ml-1">(42)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="font-heading font-bold text-lg">$59.99</span>
                        <button class="bg-primary text-white p-2 rounded-lg hover:bg-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M8.5 19a1.5 1.5 0 1 0 1.5 1.5A1.5 1.5 0 0 0 8.5 19ZM19 16H7a1 1 0 0 1 0-2h8.491a3.013 3.013 0 0 0 2.885-2.176l1.585-5.55A1 1 0 0 0 19 5H6.74A3.007 3.007 0 0 0 3.92 3H3a1 1 0 0 0 0 2h.921a1.005 1.005 0 0 1 .962.725l.155.545v.005l1.641 5.742A3 3 0 0 0 7 18h12a1 1 0 0 0 0-2Zm-1.326-9l-1.22 4.274a1.005 1.005 0 0 1-.963.726H8.754l-.255-.892L7.326 7ZM16.5 19a1.5 1.5 0 1 0 1.5 1.5a1.5 1.5 0 0 0-1.5-1.5Z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- More products would go here... (11 more) -->
            </div>

            <!-- Pagination -->
            <div class="flex justify-center mt-12">
                <nav class="flex items-center space-x-2">
                    <a href="#"
                        class="px-3 py-2 rounded-lg border border-gray-200 text-gray-500 hover:bg-primary hover:text-white">&laquo;
                        Previous</a>
                    <a href="#" class="px-3 py-2 rounded-lg border border-primary bg-primary text-white">1</a>
                    <a href="#"
                        class="px-3 py-2 rounded-lg border border-gray-200 text-gray-500 hover:bg-primary hover:text-white">2</a>
                    <a href="#"
                        class="px-3 py-2 rounded-lg border border-gray-200 text-gray-500 hover:bg-primary hover:text-white">3</a>
                    <span class="px-2 py-2 text-gray-500">...</span>
                    <a href="#"
                        class="px-3 py-2 rounded-lg border border-gray-200 text-gray-500 hover:bg-primary hover:text-white">8</a>
                    <a href="#"
                        class="px-3 py-2 rounded-lg border border-gray-200 text-gray-500 hover:bg-primary hover:text-white">Next
                        &raquo;</a>
                </nav>
            </div>
        </div>
    </div>


    <script>
        // Mobile filters toggle
        function toggleMobileFilters() {
            const sidebar = document.getElementById('filters-sidebar');
            sidebar.classList.toggle('hidden');
            sidebar.classList.toggle('fixed');
            sidebar.classList.toggle('inset-0');
            sidebar.classList.toggle('z-50');
            sidebar.classList.toggle('p-6');
            sidebar.classList.toggle('overflow-auto');
        }

        // Clear all filters
        function clearFilters() {
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(checkbox => {
                checkbox.checked = false;
            });

            const rangeInput = document.querySelector('.price-range');
            rangeInput.value = 250;

            // Reset size buttons
            const sizeButtons = document.querySelectorAll('.grid button');
            sizeButtons.forEach(button => {
                button.classList.remove('bg-light', 'text-primary', 'border-primary');
                button.classList.add('border-gray-200');
            });
        }
    </script>
@endsection