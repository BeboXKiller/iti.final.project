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

    <!-- Wishlist / Heart -->
    <a href="#" class="text-gray-800 hover:text-primary" title="Wishlist">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
            <path
                d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3a5.48 5.48 0 0 1 4.5 2.36A5.48 5.48 0 0 1 16.5 3C19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
        </svg>
    </a>

    <!-- Cart / Shopping Bag -->
    <a href="#" class="text-gray-800 hover:text-primary relative" title="Cart">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
            <path
                d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zm10 0c-1.1 0-1.99.9-1.99 2S15.9 22 17 22s2-.9 2-2-.9-2-2-2zM7.82 14l.94-2h7.53l.94 2H7.82zM6 6h15l-1.35 5H7.21L6 6z" />
        </svg>
        <span
            class="absolute -top-2 -right-2 bg-red-600 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">
            3
        </span>
    </a>

    <!-- Profile / User Dropdown -->
    <div class="relative group">
        <button class="flex items-center text-gray-800 hover:text-primary focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                <path
                    d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5zm0 2c-3.3 0-10 1.7-10 5v3h20v-3c0-3.3-6.7-5-10-5z" />
            </svg>
        </button>

        <!-- Dropdown Menu -->
        <div
            class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded shadow-lg opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all duration-150 z-50">
            <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Profile</a>
            <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Account Settings</a>
            <div class="border-t my-1"></div>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               class="block px-4 py-2 text-red-600 hover:bg-gray-100">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        </div>
    </div>

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