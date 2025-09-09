
<!-- Sidebar -->
<div class="sidebar bg-white w-64 min-h-screen shadow-md py-4" id="sidebar">
    <nav class="mt-4">
        <div class="px-4 mb-6">
            <h3 class="text-xs uppercase text-gray-500 font-semibold pl-3">Main</h3>
        </div>
        
        <!-- Dashboard -->
        <a href="{{ route('admin.dashboard') }}" class="nav-item flex items-center px-4 py-3 text-gray-700 hover:bg-light" data-page="dashboard">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="mr-3">
                <path fill="currentColor" d="M10 20v-6h4v6h5v-8h3L12 3L2 12h3v8z" />
            </svg>
            <span>Dashboard</span>
        </a>

        <!-- Products Dropdown -->
        <div class="dropdown-container">
            
            <div class="nav-item dropdown-btn flex items-center px-4 py-3 text-gray-700 hover:bg-light" data-dropdown="products">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="mr-3">
                    <path fill="currentColor" d="M12 6v3l4-4-4-4v3c-4.42 0-8 3.58-8 8c0 1.57.46 3.03 1.24 4.26L6.7 14.8c-.45-.83-.7-1.79-.7-2.8c0-3.31 2.69-6 6-6zm6.76 1.74L17.3 9.2c.44.84.7 1.79.7 2.8c0 3.31-2.69 6-6 6v-3l-4 4l4 4v-3c4.42 0 8-3.58 8-8c0-1.57-.46-3.03-1.24-4.26z" />
                </svg>
                <span>Products</span>
                <svg class="dropdown-arrow w-4 h-4 ml-auto" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </div>
            
            <div class="dropdown-content" data-dropdown-content="products">

                <a href="{{ route('products.index') }}"class="dropdown-item flex items-center" data-page="all-products">

                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512" class="mr-3">
                        <path fill="currentColor" d="M192,7.10542736e-15 L384,110.851252 L384,332.553755 L192,443.405007 L1.42108547e-14,332.553755 L1.42108547e-14,110.851252 L192,7.10542736e-15 Z M127.999,206.918 L128,357.189 L170.666667,381.824 L170.666667,231.552 L127.999,206.918 Z M42.6666667,157.653333 L42.6666667,307.920144 L85.333,332.555 L85.333,182.286 L42.6666667,157.653333 Z M275.991,97.759 L150.413,170.595 L192,194.605531 L317.866667,121.936377 L275.991,97.759 Z M192,49.267223 L66.1333333,121.936377 L107.795,145.989 L233.374,73.154 L192,49.267223 Z"/>
                    </svg>
                    
                    <span>All Products</span>
                </a>

                <a href="{{ route('products.create') }}" class="dropdown-item flex items-center" data-page="add-product">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" class="mr-3">
                        <path fill="currentColor" d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
                    </svg>Add Product</a>
                
                {{-- <div class="dropdown-item flex items-center" data-page="product-categories">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" class="mr-3">
                        <path fill="currentColor" d="M12 2l3.09 6.26L22 9.27l-5 4.87L18.18 22L12 18.77L5.82 22L7 14.14L2 9.27l6.91-1.01L12 2z"/>
                    </svg>
                    <span>Categories</span>
                </div>
                <div class="dropdown-item flex items-center" data-page="inventory">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" class="mr-3">
                        <path fill="currentColor" d="M20 6h-2.18c.11-.31.18-.65.18-1a2.996 2.996 0 0 0-5.5-1.65l-.5.67l-.5-.68C10.96 2.54 10.05 2 9 2C7.34 2 6 3.34 6 5c0 .35.07.69.18 1H4c-1.11 0-1.99.89-1.99 2L2 19c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2zm-5-2c.55 0 1 .45 1 1s-.45 1-1 1s-1-.45-1-1s.45-1 1-1zM9 4c.55 0 1 .45 1 1s-.45 1-1 1s-1-.45-1-1s.45-1 1-1z"/>
                    </svg>
                    <span>Inventory</span>
                </div> --}}
            </div>
        </div>
        
        <!-- Orders -->
        <a href="#" class="nav-item flex items-center px-4 py-3 text-gray-700 hover:bg-light" data-page="orders">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="mr-3">
                <path fill="currentColor" d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-7 9h-2V5h2v6zm0 4h-2v-2h2v2z" />
            </svg>
            <span>Orders</span>
        </a>
        
        <!-- Customers -->
        <a href="#" class="nav-item flex items-center px-4 py-3 text-gray-700 hover:bg-light" data-page="customers">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="mr-3">
                <path fill="currentColor" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4s-4 1.79-4 4s1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
            </svg>
            <span>Customers</span>
        </a>

        <div class="px-4 mt-6 mb-3">
            <h3 class="text-xs uppercase text-gray-500 font-semibold pl-3">Content</h3>
        </div>
        
        <!-- Categories -->
        <a href="#" class="nav-item flex items-center px-4 py-3 text-gray-700 hover:bg-light" data-page="categories">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="mr-3">
                <path fill="currentColor" d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z" />
            </svg>
            <span>Categories</span>
        </a>
        
        <!-- Analytics -->
        <a href="#" class="nav-item flex items-center px-4 py-3 text-gray-700 hover:bg-light" data-page="analytics">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="mr-3">
                <path fill="currentColor" d="M4 13h6c.55 0 1-.45 1-1V4c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1v8c0 .55.45 1 1 1zm0 8h6c.55 0 1-.45 1-1v-4c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1v4c0 .55.45 1 1 1zm10 0h6c.55 0 1-.45 1-1v-8c0-.55-.45-1-1-1h-6c-.55 0-1 .45-1 1v8c0 .55.45 1 1 1zM13 4v4c0 .55.45 1 1 1h6c.55 0 1-.45 1-1V4c0-.55-.45-1-1-1h-6c-.55 0-1 .45-1 1z" />
            </svg>
            <span>Analytics</span>
        </a>
        
        <!-- Reports -->
        <a href="#" class="nav-item flex items-center px-4 py-3 text-gray-700 hover:bg-light" data-page="reports">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="mr-3">
                <path fill="currentColor" d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" />
            </svg>
            <span>Reports</span>
        </a>

        <div class="px-4 mt-6 mb-3">
            <h3 class="text-xs uppercase text-gray-500 font-semibold pl-3">Settings</h3>
        </div>
        
        <!-- Settings -->
        <a href="#" class="nav-item flex items-center px-4 py-3 text-gray-700 hover:bg-light" data-page="settings">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="mr-3">
                <path fill="currentColor" d="M19.14 12.94c.04-.3.06-.61.06-.94c0-.32-.02-.64-.07-.94l2.03-1.58a.49.49 0 0 0 .12-.61l-1.92-3.32a.488.488 0 0 0-.59-.22l-2.39.96c-.5-.38-1.03-.7-1.62-.94l-.36-2.54a.484.484 0 0 0-.48-.41h-3.84c-.24 0-.43.17-.47.41l-.36 2.54c-.59.24-1.13.57-1.62.94l-2.39-.96c-.22-.08-.47 0-.59.22L2.74 8.87c-.12.21-.08.47.12.61l2.03 1.58c-.05.3-.09.63-.09.94s.02.64.07.94l-2.03 1.58a.49.49 0 0 0-.12.61l1.92 3.32c.12.22.37.29.59.22l2.39-.96c.5.38 1.03.7 1.62.94l.36 2.54c.05.24.24.41.48.41h3.84c.24 0 .44-.17.47-.41l.36-2.54c.59-.24 1.13-.56 1.62-.94l2.39.96c.22.08.47 0 .59-.22l1.92-3.32c.12-.22.07-.47-.12-.61l-2.01-1.58zM12 15.6c-1.98 0-3.6-1.62-3.6-3.6s1.62-3.6 3.6-3.6s3.6 1.62 3.6 3.6s-1.62 3.6-3.6 3.6z" />
            </svg>
            <span>Settings</span>
        </a>
    </nav>
</div>

<script>
// Simple Dropdown Script - Beginner Friendly

// When page loads, set up all the click events
document.addEventListener('DOMContentLoaded', function() {
    
    // 1. Handle dropdown button clicks (like "Products")
    var dropdownButtons = document.querySelectorAll('.dropdown-btn');
    for (var i = 0; i < dropdownButtons.length; i++) {
        dropdownButtons[i].addEventListener('click', function(e) {
            // e.preventDefault();
            
            // Find which dropdown this is
            var clickedButton = e.currentTarget;
            var dropdownName = clickedButton.getAttribute('data-dropdown');
            var dropdownContent = document.querySelector('[data-dropdown-content="' + dropdownName + '"]');
            
            // Check if this dropdown is currently open
            var isOpen = clickedButton.classList.contains('active');
            
            // First, close all dropdowns
            closeAllDropdowns();
            
            // If it wasn't open, open it now
            if (!isOpen) {
                clickedButton.classList.add('active');
                dropdownContent.classList.add('show');
            }
        });
    }
    
    // 2. Handle dropdown item clicks (like "All Products", "Add Product")
    var dropdownItems = document.querySelectorAll('.dropdown-item');
    for (var i = 0; i < dropdownItems.length; i++) {
        dropdownItems[i].addEventListener('click', function(e) {
            // e.preventDefault();
            
            var clickedItem = e.currentTarget;
            var pageName = clickedItem.getAttribute('data-page');
            
            // Remove active class from everything
            removeAllActiveClasses();
            
            // Make this item active
            clickedItem.classList.add('active');
            
            // Also make the dropdown button active
            var dropdownContainer = clickedItem.closest('.dropdown-container');
            var dropdownButton = dropdownContainer.querySelector('.dropdown-btn');
            dropdownButton.classList.add('active');
            
            // Keep the dropdown open
            var dropdownContent = dropdownContainer.querySelector('.dropdown-content');
            dropdownContent.classList.add('show');
            
            // Update the demo text
            var itemText = clickedItem.querySelector('span').textContent;
            updateCurrentSelection(itemText);
            
            console.log('Selected: ' + pageName);
        });
    }
    
    // 3. Handle regular nav items (like "Dashboard", "Orders")
    var regularNavItems = document.querySelectorAll('.nav-item:not(.dropdown-btn)');
    for (var i = 0; i < regularNavItems.length; i++) {
        regularNavItems[i].addEventListener('click', function(e) {
            // e.preventDefault();
            
            var clickedItem = e.currentTarget;
            var pageName = clickedItem.getAttribute('data-page');
            
            // Remove active class from everything and close dropdowns
            removeAllActiveClasses();
            closeAllDropdowns();
            
            // Make this item active
            clickedItem.classList.add('active');
            
            // Update the demo text
            var itemText = clickedItem.querySelector('span').textContent;
            updateCurrentSelection(itemText);
            
            console.log('Selected: ' + pageName);
        });
    }
    
    // 4. Close dropdowns when clicking outside
    document.addEventListener('click', function(e) {
        var clickedInsideDropdown = e.target.closest('.dropdown-container');
        if (!clickedInsideDropdown) {
            closeAllDropdowns();
        }
    });
    
});

// Helper function: Close all open dropdowns
function closeAllDropdowns() {
    var openButtons = document.querySelectorAll('.dropdown-btn.active');
    var openContents = document.querySelectorAll('.dropdown-content.show');
    
    // Remove active class from buttons
    for (var i = 0; i < openButtons.length; i++) {
        openButtons[i].classList.remove('active');
    }
    
    // Hide dropdown contents
    for (var i = 0; i < openContents.length; i++) {
        openContents[i].classList.remove('show');
    }
}

// Helper function: Remove active class from all nav items
function removeAllActiveClasses() {
    var activeItems = document.querySelectorAll('.nav-item.active, .dropdown-item.active');
    for (var i = 0; i < activeItems.length; i++) {
        activeItems[i].classList.remove('active');
    }
}


// Function you can call from outside to highlight a specific page
function highlightActiveSection(pageId) {
    var item = document.querySelector('[data-page="' + pageId + '"]');
    if (item) {
        // Remove all active classes first
        removeAllActiveClasses();
        closeAllDropdowns();
        
        // Make this item active
        item.classList.add('active');
        
        // If it's a dropdown item, also activate its parent
        var dropdownContainer = item.closest('.dropdown-container');
        if (dropdownContainer) {
            var dropdownButton = dropdownContainer.querySelector('.dropdown-btn');
            dropdownButton.classList.add('active');
            var dropdownContent = dropdownContainer.querySelector('.dropdown-content');
            dropdownContent.classList.add('show');
        }
        
        // Update demo text
        var itemText = item.querySelector('span').textContent;
        updateCurrentSelection(itemText);
    }
}
</script>