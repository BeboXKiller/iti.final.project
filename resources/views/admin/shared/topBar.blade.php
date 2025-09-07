<!-- Admin Header -->
<header class="bg-primary text-white">
    <div class="flex items-center justify-between px-4 py-3">
        <div class="flex items-center">
            <button class="mr-4 text-white" onclick="toggleSidebar()">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z" />
                </svg>
            </button>
            <a href="index.html" class="text-xl font-heading font-bold">StyleMart Admin</a>
        </div>
        <div class="flex items-center space-x-4">
            <button class="relative text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.89 2 2 2zm6-6v-5c0-3.07-1.64-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.63 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z" />
                </svg>
                <span class="absolute -top-1 -right-1 bg-secondary text-xs rounded-full h-4 w-4 flex items-center justify-center">3</span>
            </button>
            <div class="relative">
                <button class="flex items-center text-white" onclick="toggleUserMenu()">
                    <div class="w-8 h-8 bg-light rounded-full flex items-center justify-center text-primary font-bold mr-2">A</div>
                    <span>Admin User</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="ml-1">
                        <path fill="currentColor" d="M7 10l5 5 5-5z" />
                    </svg>
                </button>
                <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 hidden z-50" id="user-menu">
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Settings</a>
                    <div class="border-t border-gray-200 my-1"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-link">Logout</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</header>