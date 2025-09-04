@extends('admin.app')

@section('content')

    <div class="flex-1 p-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <div>
                <h1 class="text-2xl font-heading font-bold">Category Management</h1>
                <p class="text-gray-600 mt-2">Organize your product categories</p>
            </div>
            <button
                class="bg-primary text-white px-4 py-2 rounded-lg font-medium hover:bg-accent mt-4 md:mt-0 flex items-center action-btn"
                onclick="openModal('add-category-modal')">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="mr-2">
                    <path fill="currentColor" d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z" />
                </svg>
                Add New Category
            </button>
        </div>

        <!-- Categories Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white rounded-2xl p-6 shadow-md">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="font-heading font-bold">Women's Fashion</h3>
                    <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Active</span>
                </div>
                <p class="text-gray-600 mb-4">Dresses, tops, bottoms, and accessories for women</p>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-500">86 products</span>
                    <div class="flex space-x-2">
                        <button class="text-primary hover:text-accent action-btn"
                            onclick="openModal('edit-category-modal')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04a.996.996 0 0 0 0-1.41l-2.34-2.34a.996.996 0 0 0-1.41 0l-1.83 1.83l3.75 3.75l1.83-1.83z" />
                            </svg>
                        </button>
                        <button class="text-red-500 hover:text-red-700 action-btn"
                            onclick="openModal('delete-category-modal')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-md">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="font-heading font-bold">Men's Fashion</h3>
                    <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Active</span>
                </div>
                <p class="text-gray-600 mb-4">Shirts, pants, jackets, and accessories for men</p>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-500">64 products</span>
                    <div class="flex space-x-2">
                        <button class="text-primary hover:text-accent action-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04a.996.996 0 0 0 0-1.41l-2.34-2.34a.996.996 0 0 0-1.41 0l-1.83 1.83l3.75 3.75l1.83-1.83z" />
                            </svg>
                        </button>
                        <button class="text-red-500 hover:text-red-700 action-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height极速加速器="20" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-md">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="font-heading font-bold">Accessories</h3>
                    <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Active</span>
                </div>
                <p class="text-gray-600 mb-4">Bags, jewelry, watches, and other accessories</p>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-500">42 products</span>
                    <div class="flex space-x-2">
                        <button class="text-primary hover:text-accent action-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04a.996.996 0 0 0 0-1.41l-2.34-2.34a.996.996 0 0 0-1.41 0l-1.83 1.83l3.75 3.75l1.83-1.83z" />
                            </svg>
                        </button>
                        <button class="text-red-500 hover:text-red-700 action-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-md">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="font-heading font-bold">Footwear</h3>
                    <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Active</span>
                </div>
                <p class="text-gray-600 mb-4">Shoes, sneakers, boots, and sandals</p>
                <div class="flex justify-between items-center">
                    <span class="text-sm text-gray-500">38 products</span>
                    <div class="flex space-x-2">
                        <button class="text-primary hover:text-accent action-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04a.996.996 0 0 0 0-1.41l-2.34-2.34a.996.996 0 0 0-1.41 0l-1.83 1.83l3.75 3.75l1.83-1.83z" />
                            </svg>
                        </button>
                        <button class="text-red-500 hover:text-red-700 action-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection