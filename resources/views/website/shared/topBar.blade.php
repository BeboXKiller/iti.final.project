<nav class="sticky top-0 z-40 bg-white shadow-md">
    <div class="container mx-auto px-4 py-3">
        <div class="flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="text-2xl font-heading font-bold text-primary">StyleMart</a>
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
                <!-- Wishlist / Heart -->
                <a href="{{ route('user.wishlist') }}" class="text-gray-800 hover:text-primary" title="Wishlist">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3a5.48 5.48 0 0 1 4.5 2.36A5.48 5.48 0 0 1 16.5 3C19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                    </svg>
                </a>

                <!-- Cart / Shopping Bag -->
                <a href="#" class="text-gray-800 hover:text-primary relative" title="Cart">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"
                            d="M8.41799 3.25089C8.69867 2.65917 9.30155 2.25 10 2.25H14C14.6984 2.25 15.3013 2.65917 15.582 3.25089C16.2655 3.25586 16.7983 3.28724 17.2738 3.47309C17.842 3.69516 18.3362 4.07266 18.6999 4.56242C19.0668 5.0565 19.2391 5.68979 19.4762 6.56144L20.2181 9.28272L20.4985 10.124C20.5065 10.1339 20.5144 10.1438 20.5222 10.1539C21.4231 11.3076 20.9941 13.0235 20.1362 16.4553C19.5905 18.638 19.3176 19.7293 18.5039 20.3647C17.6901 21.0001 16.5652 21.0001 14.3153 21.0001H9.68462C7.43476 21.0001 6.30983 21.0001 5.49605 20.3647C4.68227 19.7293 4.40943 18.638 3.86376 16.4553C3.00581 13.0235 2.57684 11.3076 3.47767 10.1539C3.48555 10.1438 3.4935 10.1338 3.50152 10.1239L3.7819 9.28271L4.52384 6.56145C4.76092 5.6898 4.93316 5.0565 5.30009 4.56242C5.66381 4.07266 6.15802 3.69516 6.72621 3.4731C7.20175 3.28724 7.73447 3.25586 8.41799 3.25089ZM8.41951 4.75231C7.75763 4.759 7.49204 4.78427 7.27224 4.87018C6.96629 4.98976 6.70018 5.19303 6.50433 5.45674C6.32822 5.69388 6.22488 6.0252 5.93398 7.09206L5.36442 9.18091C6.38451 9.00012 7.77753 9.00012 9.68462 9.00012H14.3153C16.2224 9.00012 17.6155 9.00012 18.6356 9.18092L18.066 7.09206C17.7751 6.0252 17.6718 5.69388 17.4957 5.45674C17.2998 5.19303 17.0337 4.98976 16.7278 4.87018C16.508 4.78427 16.2424 4.759 15.5805 4.75231C15.2992 5.3423 14.6972 5.75 14 5.75H10C9.30281 5.75 8.70084 5.3423 8.41951 4.75231Z" />
                    </svg>
                    {{-- <span
                        class="absolute -top-2 -right-2 bg-red-600 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">
                        3
                    </span> --}}
                </a>



            </div>

        </div>
    </div>

    @php


    @endphp

    @if(Request()->is('/' , 'home', 'user/dashboard'))

        @include('website.components.topBar.nav')

    @endif

</nav>