@extends('admin.app')

@section('content')

<div class="flex-1 p-6">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
                    <div>
                        <h1 class="text-2xl font-heading font-bold">Customer Management</h1>
                        <p class="text-gray-600 mt-2">Manage your customer database</p>
                    </div>
                    <button class="bg-primary text-white px-4 py-2 rounded-lg font-medium hover:bg-accent mt-4 md:mt-0 flex items-center action-btn" onclick="openModal('add-customer-modal')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="mr-2"><path fill="currentColor" d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/></svg>
                        Add New Customer
                    </button>
                </div>

                <!-- Filters and Search -->
                <div class="bg-white rounded-2xl p-4 shadow-md mb-6">
                    <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-4">
                        <div class="flex-1 w-full">
                            <input type="text" placeholder="Search customers..." class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                        </div>
                        <div class="flex items-center space-x-2">
                            <select class="bg-light border-none rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary">
                                <option>Status: All</option>
                                <option>Active</option>
                                <option>Inactive</option>
                            </select>
                            <select class="bg-light border-none rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary">
                                <option>Sort by: Newest</option>
                                <option>Sort by: Oldest</option>
                                <option>Sort by: A-Z</option>
                                <option>Sort by: Z-A</option>
                            </select>
                            <button class="bg-primary text-white px-4 py-2 rounded-lg font-medium hover:bg-accent action-btn">
                                Apply Filters
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Customers Table -->
                <div class="bg-white rounded-2xl shadow-md overflow-hidden">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-50 text-left text-gray-500">
                                <th class="py-4 px-6 font-medium">Customer</th>
                                <th class="py-4 px-6 font-medium">Email</th>
                                <th class="py-4 px-6 font-medium">Phone</th>
                                <th class="py-4 px-6 font-medium">Orders</th>
                                <th class="py-4 px-6 font-medium">Status</th>
                                <th class="py-4 px-6 font-medium text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <tr>
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-gray-200 rounded-full mr-4"></div>
                                        <div>
                                            <div class="font-medium">Sarah Johnson</div>
                                            <div class="text-sm text-gray-500">Joined Jun 2023</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">sarah@example.com</td>
                                <td class="py-4 px-6">(555) 123-4567</td>
                                <td class="py-4 px-6">12</td>
                                <td class="py-4 px-6">
                                    <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Active</span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex justify-end space-x-2">
                                        <button class="text-blue-500 hover:text-blue-700 action-btn" onclick="openModal('view-customer-modal')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5s5 2.24 5 5s-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3s3-1.34 3-3s-1.34-3-3-3z"/></svg>
                                        </button>
                                        <button class="text-primary hover:text-accent action-btn" onclick="openModal('edit-customer-modal')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04a.996.996 0 0 0 0-1.41l-2.34-2.34a.996.996 0 0 0-1.41 0l-1.83 1.83l3.75 3.75l1.83-1.83z"/></svg>
                                        </button>
                                        <button class="text-red-500 hover:text-red-700 action-btn" onclick="openModal('delete-customer-modal')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/></svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-gray-200 rounded-full mr-4"></div>
                                        <div>
                                            <div class="font-medium">Michael Brown</div>
                                            <div class="text-sm text-gray-500">Joined May 2023</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">michael@example.com</td>
                                <td class="py-4 px-6">(555) 987-6543</td>
                                <td class="py-4 px-6">8</td>
                                <td class="py-4 px-6">
                                    <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Active</span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex justify-end space-x-2">
                                        <button class="text-blue-500 hover:text-blue-700 action-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5s5 2.24 5 5s-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3s3-1.34 3-3s-1.34-3-3-3z"/></svg>
                                        </button>
                                        <button class="text-primary hover:text-accent action-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04a.996.996 0 0 0 0-1.41l-2.34-2.34a.996.996 0 0 0-1.41 0l-1.83 1.83l3.75 3.75l1.83-1.83z"/></svg>
                                        </button>
                                        <button class="text-red-500 hover:text-red-700 action-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/></svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-gray-200 rounded-full mr-4"></div>
                                        <div>
                                            <div class="font-medium">Emily Wilson</div>
                                            <div class="text-sm text-gray-500">Joined Apr 2023</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6">emily@example.com</td>
                                <td class="py-4 px-6">(555) 456-7890</td>
                                <td class="py-4 px-6">5</td>
                                <td class="py-4 px-6">
                                    <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Active</span>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex justify-end space-x-2">
                                        <button class="text-blue-500 hover:text-blue-700 action-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5s5 2.24 5 5s-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3s3-1.34 3-3s-1.34-3-3-3z"/></svg>
                                        </button>
                                        <button class="text-primary hover:text-accent action-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04a.996.996 0 0 0 0-1.41l-2.34-2.34a.996.996 0 0 0-1.41 0l-1.83 1.83l3.75 3.75l1.83-1.83z"/></svg>
                                        </button>
                                        <button class="text-red-500 hover:text-red-700 action-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/></svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>


@endsection