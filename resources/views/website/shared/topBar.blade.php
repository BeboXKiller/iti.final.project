<nav class="sticky top-0 z-40 bg-white shadow-md">
    <div class="container mx-auto px-4 py-3">
        <div class="flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ '/stylemart' }}" class="text-2xl font-heading font-bold text-primary">StyleMart</a>
            </div>

            <div class="hidden lg:flex flex-1 max-w-2xl mx-10">
                <div class="flex w-full bg-gray-100 rounded-full px-4 py-2">
                    <select name="Categories"
                        class="bg-transparent border-none text-sm focus:outline-none hidden md:block">
                        <option>All Categories</option>
                        <option>Women</option>
                        <option>Men</option>
                        <option>Kids</option>
                    </select>
                    <input type="text" placeholder="Search for clothing items..."
                        class="w-full px-4 bg-transparent border-none focus:outline-none">
                    <button class="bg-primary text-white p-2 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Header Actions -->
            <div class="flex items-center space-x-5">
                <a href="#" class="text-dark hover:text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M15.71 12.71a6 6 0 1 0-7.42 0a10 10 0 0 0-6.22 8.18a1 1 0 0 0 2 .22a8 8 0 0 1 15.9 0a1 1 0 0 0 1 .89h.11a1 1 0 0 0 .88-1.1a10 10 0 0 0-6.25-8.19ZM12 12a4 4 0 1 1 4-4a4 4 0 0 1-4 4Z" />
                    </svg>
                </a>
                <a href="#" class="text-dark hover:text-primary">
                    <svg xmlns="极速加速器" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M20.16 4.61A6.27 6.27 0 0 0 12 4a6.27 6.27 0 0 0-8.16 9.48l7.45 7.45a1 1 0 0 0 1.42 0l7.45-7.45a6.27 6.27 0 0 0 0-8.87Zm-1.41 7.46L12 18.81l-6.75-6.74a4.28 4.28 0 0 1 3-7.3a4.25 4.25 0 0 1 3 1.25a1 1 0 0 0 1.42 0a4.27 4.27 0 0 1 6 6.05Z" />
                    </svg>
                </a>
                <a href="#" class="text-dark hover:text-primary relative">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M8.5 19a1.5 1.5 0 1 0 1.5 1.5A1.5 1.5 0 0 0 8.5 19ZM19 16H7a1 1 0 0 1 0-2h8.491a3.013 3.013 0 0 0 2.885-2.176l1.585-5.55A1 1 0 0 0 19 5H6.74A3.007 3.007 0 0 0 3.92 3H3a1 1 0 0 0 0 2h.921a1.005 1.005 0 0 1 .962.725l.155.545v.005l1.641 5.742A3 3 0 0 0 7 18h12a1 1 0 0 0 0-2Zm-1.326-9l-1.22 4.274a1.005 1.005 0 0 1-.963.726H8.754l-.255-.892L7.326 7ZM16.5 19a1.5 1.5 0 1 0 1.5 1.5a1.5 1.5 0 0 0-1.5-1.5Z" />
                    </svg>
                    <span
                        class="absolute -top-2 -right-2 bg-secondary text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">3</span>
                </a>
            </div>
        </div>
    </div>

        @php
            
            $i = [ 'stylemart', 'stylemart/categories' , 'stylemat/product'];

        @endphp

        @if(Request()->is($i))

        @include('website.components.topBar.nav')
            
        @endif
        

    
</nav>