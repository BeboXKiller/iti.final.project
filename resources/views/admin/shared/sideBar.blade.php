<!-- Sidebar -->
<div class="sidebar bg-white w-64 min-h-screen shadow-md py-4 hidden md:block" id="sidebar">
    <nav class="mt-4">
        <div class="px-4 mb-6">
            <h3 class="text-xs uppercase text-gray-500 font-semibold pl-3">Main</h3>
        </div>
        <a href="{{route('admin.dashboard')}}" class="nav-item flex items-center px-4 py-3 text-gray-700 hover:bg-light">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="mr-3">
                <path fill="currentColor" d="M10 20v-6h4v6h5v-8h3L12 3L2 12h3v8z" />
            </svg>
            <span>Dashboard</span>
        </a>
        <a href="#" class="nav-item flex items-center px-4 py-3 text-gray-700 hover:bg-light">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="mr-3">
                <path fill="currentColor"
                    d="M12 6v3l4-4-4-4v3c-4.42 0-8 3.58-8 8c0 1.57.46 3.03 1.24 4.26L6.7 14.8c-.45-.83-.7-1.79-.7-2.8c0-3.31 2.69-6 6-6zm6.76 1.74L17.3 9.2c.44.84.7 1.79.7 2.8c0 3.31-2.69 6-6 6v-3l-4 4l4 4v-3c4.42 0 8-3.58 8-8c0-1.57-.46-3.03-1.24-4.26z" />
            </svg>
            <span>Products</span>
        </a>
        <a href="{{ '/stylemart/admin/orders' }}" class="nav-item flex items-center px-4 py-3 text-gray-700 hover:bg-light">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="mr-3">
                <path fill="currentColor"
                    d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-7 9h-2V5h2v6zm0 4h-2v-2h2v2z" />
            </svg>
            <span>Orders</span>
        </a>
        <a href="{{ route('customers.index') }}"
            class="nav-item flex items-center px-4 py-3 text-gray-700 hover:bg-light">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="mr-3">
                <path fill="currentColor"
                    d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4s-4 1.79-4 4s1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
            </svg>
            <span>Customers</span>
        </a>


        <div class="px-4 mt-6 mb-3">
            <h3 class="text-xs uppercase text-gray-500 font-semibold pl-3">Content</h3>
        </div>
        <a href="{{ '/stylemart/admin/categories' }}"
            class="nav-item flex items-center px-4 py-3 text-gray-700 hover:bg-light">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="mr-3">
                <path fill="currentColor"
                    d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z" />
            </svg>
            <span>Categories</span>
        </a>
        <a href="{{ '/stylemart/admin/analytics' }}"
            class="nav-item flex items-center px-4 py-3 text-gray-700 hover:bg-light">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="mr-3">
                <path fill="currentColor"
                    d="M4 13h6c.55 0 1-.45 1-1V4c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1v8c0 .55.45 1 1 1zm0 8h6c.55 0 1-.45 1-1v-4c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1v4c0 .55.45 1 1 1zm10 0h6c.55 0 1-.45 1-1v-8c0-.55-.45-1-1-1h-6c-.55 0-1 .45-1 1v8c0 .55.45 1 1 1zM13 4v4c0 .55.45 1 1 1h6c.55 0 1-.45 1-1V4c0-.55-.45-1-1-1h-6c-.55 0-1 .45-1 1z" />
            </svg>
            <span>Analytics</span>
        </a>
        <a href="{{ '/stylemart/admin/reports' }}"
            class="nav-item flex items-center px-4 py-3 text-gray-700 hover:bg-light">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="mr-3">
                <path fill="currentColor"
                    d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" />
            </svg>
            <span>Reports</span>
        </a>

        <div class="px-4 mt-6 mb-3">
            <h3 class="text-xs uppercase text-gray-500 font-semibold pl-3">Settings</h3>
        </div>
        <a href="{{ '/stylemart/admin/settings' }}"
            class="nav-item flex items-center px-4 py-3 text-gray-700 hover:bg-light">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="mr-3">
                <path fill="currentColor"
                    d="M19.14 12.94c.04-.3.06-.61.06-.94c0-.32-.02-.64-.07-.94l2.03-1.58a.49.49 0 0 0 .12-.61l-1.92-3.32a.488.488 0 0 0-.59-.22l-2.39.96c-.5-.38-1.03-.7-1.62-.94l-.36-2.54a.484.484 0 0 0-.48-.41h-3.84c-.24 0-.43.17-.47.41l-.36 2.54c-.59.24-1.13.57-1.62.94l-2.39-.96c-.22-.08-.47 0-.59.22L2.74 8.87c-.12.21-.08.47.12.61l2.03 1.58c-.05.3-.09.63-.09.94s.02.64.07.94l-2.03 1.58a.49.49 0 0 0-.12.61l1.92 3.32c.12.22.37.29.59.22l2.39-.96c.5.38 1.03.7 1.62.94l.36 2.54c.05.24.24.41.48.41h3.84c.24 0 .44-.17.47-.41l.36-2.54c.59-.24 1.13-.56 1.62-.94l2.39.96c.22.08.47 0 .59-.22l1.92-3.32c.12-.22.07-.47-.12-.61l-2.01-1.58zM12 15.6c-1.98 0-3.6-1.62-3.6-3.6s1.62-3.6 3.6-3.6s3.6 1.62 3.6 3.6s-1.62 3.6-3.6 3.6z" />
            </svg>
            <span>Settings</span>
        </a>
    </nav>
</div>
