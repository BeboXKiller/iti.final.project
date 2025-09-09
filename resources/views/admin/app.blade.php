@include('admin.shared.header')
<body class="font-sans text-gray-700 bg-gray-100">
    
    @include('admin.shared.topBar')

    <div class="flex">

        @include('admin.shared.sideBar')
        

        @php
            
        $i = Request()->is('/stylemart/admin', '/stylemart/admin/categories', '/stylemart/admin/') 

    @endphp
        <div class="flex-1 p-6">

            @yield('content')

            {{-- ===================================== --}}
            {{-- @if (!Request()->is('stylemart/admin', 'stylemart/admin/categories', 'stylemart/admin/', 'stylemart/admin/analytics', 'stylemart/admin/reports', 'stylemart/admin/settings'))
                @include('components.pagination')
            @endif --}}
            {{-- ===================================== --}}
            

        </div>

    </div>

    <!-- Add Product Modal -->
    <div class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50 opacity-0 pointer-events-none" id="add-product-modal">
        <div class="bg-white rounded-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
            <div class="p-6 border-b border-gray-200">
                <h2 class="text-xl font-heading font-bold">Add New Product</h2>
            </div>
            <div class="p-6">
                <form class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Product Name</label>
                            <input type="text" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Price</label>
                            <input type="text" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="$0.00">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" rows="3"></textarea>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                            <select class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                                <option>Select Category</option>
                                <option>Women</option>
                                <option>Men</option>
                                <option>Kids</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Stock Quantity</label>
                            <input type="number" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Product Images</label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600">
                                    <label class="relative cursor-pointer bg-white rounded-md font-medium text-primary hover:text-accent focus-within:outline-none">
                                        <span>Upload images</span>
                                        <input type="file" class="sr-only" multiple>
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                            <select class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                                <option>Active</option>
                                <option>Inactive</option>
                                <option>Draft</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">SKU</label>
                            <input type="text" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                        </div>
                    </div>
                </form>
            </div>
            <div class="p-6 border-t border-gray-200 flex justify-end space-x-3">
                <button class="px-4 py-2 border border-gray-200 rounded-lg text-gray-700 hover:bg-gray-100" onclick="closeModal('add-product-modal')">Cancel</button>
                <button class="px-4 py-2 bg-primary text-white rounded-lg font-medium hover:bg-accent">Add Product</button>
            </div>
        </div>
    </div>

    <!-- Edit Product Modal -->
    <div class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50 opacity-0 pointer-events-none" id="edit-product-modal">
        <div class="bg-white rounded-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
            <div class="p-6 border-b border-gray-200">
                <h2 class="text-xl font-heading font-bold">Edit Product</h2>
            </div>
            <div class="p-6">
                <form class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Product Name</label>
                            <input type="text" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" value="Summer Floral Dress">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Price</label>
                            <input type="text" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" value="$59.99">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" rows="3">This beautiful summer floral dress features a flattering A-line silhouette with a comfortable elastic waist. Made from lightweight, breathable fabric that's perfect for warm weather.</textarea>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                            <select class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                                <option>Women</option>
                                <option>Men</option>
                                <option>Kids</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Stock Quantity</label>
                            <input type="number" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" value="42">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Product Images</label>
                        <div class="flex space-x-4 mt-2">
                            <div class="w-20 h-20 bg-gray-200 rounded-lg"></div>
                            <div class="w-20 h-20 bg-gray-200 rounded-lg"></div>
                            <div class="w-20 h-20 bg-gray-200 rounded-lg flex items-center justify-center border-2 border-dashed border-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/></svg>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                            <select class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                                <option>Active</option>
                                <option>Inactive</option>
                                <option>Draft</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">SKU</label>
                            <input type="text" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" value="PRD-001">
                        </div>
                    </div>
                </form>
            </div>
            <div class="p-6 border-t border-gray-200 flex justify-end space-x-3">
                <button class="px-4 py-2 border border-gray-200 rounded-lg text-gray-700 hover:bg-gray-100" onclick="closeModal('edit-product-modal')">Cancel</button>
                <button class="px-4 py-2 bg-primary text-white rounded-lg font-medium hover:bg-accent">Update Product</button>
            </div>
        </div>
    </div>

    <!-- View Product Modal -->
    <div class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50 opacity-0 pointer-events-none" id="view-product-modal">
        <div class="bg-white rounded-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
            <div class="p-6 border-b border-gray-200">
                <h2 class="text-xl font-heading font-bold">Product Details</h2>
            </div>
            <div class="p-6">
                <div class="flex flex-col md:flex-row gap-6 mb-6">
                    <div class="w-full md:w-1/3">
                        <div class="w-full h-48 bg-gray-200 rounded-lg"></div>
                    </div>
                    <div class="w-full md:w-2/3">
                        <h3 class="text-2xl font-heading font-bold mb-2">Summer Floral Dress</h3>
                        <div class="flex items-center mb-4">
                            <div class="flex text-secondary mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path fill="currentColor" d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327l4.898.696c.441.062.612.636.283.95l-3.523 3.356l.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path fill="currentColor" d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327l4.898.696c.441.062.612.636.283.95l-3.523 3.356l.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path fill="currentColor" d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327l4.898.696c.441.062.612.636.283.95l-3.523 3.356l.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path fill="currentColor" d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327l4.898.696c.441.062.612.636.283.95l-3.523 3.356l.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path fill="currentColor" d="M5.354 5.119L7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327l4.898.696A.537.537 0 0 1 16 6.32a.548.548 0 0 1-.17.445l-3.523 3.356l.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.52.52 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403a.58.58 0 0 1 .085-.302a.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894l-.694-3.957a.565.565 0 0 1 .162-.505l2.907-2.77l-4.052-.576a.525.525 0 0 1-.393-.288L8.001 2.223L8 2.226v9.8z"/></svg>
                            </div>
                            <span class="text-xs text-gray-500">(42 reviews)</span>
                        </div>
                        <p class="text-gray-600 mb-4">This beautiful summer floral dress features a flattering A-line silhouette with a comfortable elastic waist. Made from lightweight, breathable fabric that's perfect for warm weather.</p>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm text-gray-500">Price</p>
                                <p class="font-medium">$59.99</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">SKU</p>
                                <p class="font-medium">PRD-001</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Stock</p>
                                <p class="font-medium">42 units</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Status</p>
                                <p class="font-medium text-green-600">Active</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-t border-gray-200 pt-4">
                    <h4 class="font-medium mb-2">Product Details</h4>
                    <ul class="list-disc pl-5 space-y-1 text-gray-600">
                        <li>Lightweight, breathable fabric</li>
                        <li>Elastic waist for comfort</li>
                        <li>A-line silhouette</li>
                        <li>Machine washable</li>
                        <li>Imported</li>
                    </ul>
                </div>
            </div>
            <div class="p-6 border-t border-gray-200 flex justify-end">
                <button class="px-4 py-2 bg-primary text-white rounded-lg font-medium hover:bg-accent" onclick="closeModal('view-product-modal')">Close</button>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50 opacity-0 pointer-events-none" id="delete-product-modal">
        <div class="bg-white rounded-2xl w-full max-w-md">
            <div class="p-6 border-b border-gray-200">
                <h2 class="text-xl font-heading font-bold">Confirm Deletion</h2>
            </div>
            <div class="p-6">
                <p class="text-gray-600 mb-4">Are you sure you want to delete <span class="font-medium">"Summer Floral Dress"</span>? This action cannot be undone.</p>
            </div>
            <div class="p-6 border-t border-gray-200 flex justify-end space-x-3">
                <button class="px-4 py-2 border border-gray-200 rounded-lg text-gray-700 hover:bg-gray-100" onclick="closeModal('delete-product-modal')">Cancel</button>
                <button class="px-4 py-2 bg-red-500 text-white rounded-lg font-medium hover:bg-red-600">Delete Product</button>
            </div>
        </div>
    </div>

    <script>
        // Toggle sidebar on mobile
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('hidden');
            sidebar.classList.click('hiddin')

            // sidebar.classList.toggle('fixed');
            sidebar.classList.toggle('inset-0');
            sidebar.classList.toggle('z-40');
        }

        // Toggle user menu
        function toggleUserMenu() {
            const menu = document.getElementById('user-menu');
            menu.classList.toggle('hidden');
        }

        // Modal functions
        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.remove('opacity-0', 'pointer-events-none');
            modal.classList.add('opacity-100');
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.remove('opacity-100');
            modal.classList.add('opacity-0', 'pointer-events-none');
        }

        // Close menus when clicking outside
        document.addEventListener('click', function(event) {
            const userMenu = document.getElementById('user-menu');
            const userButton = document.querySelector('[onclick="toggleUserMenu()"]');
            
            if (!userMenu.contains(event.target) && !userButton.contains(event.target)) {
                userMenu.classList.add('hidden');
            }
            
            // Close modals when clicking outside
            const modals = document.querySelectorAll('.modal');
            modals.forEach(modal => {
                if (event.target === modal) {
                    closeModal(modal.id);
                }
            });
        });
    </script>
</body>
</html>