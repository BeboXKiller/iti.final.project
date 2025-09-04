@extends('admin.app')

@section('content')

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <div>
                <h1 class="text-2xl font-heading font-bold">Order Management</h1>
                <p class="text-gray-600 mt-2">Manage customer orders</p>
            </div>
            <div class="flex items-center space-x-2 mt-4 md:mt-0">
                <button
                    class="bg-primary text-white px-4 py-2 rounded-lg font-medium hover:bg-accent action-btn flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="mr-2">
                        <path fill="currentColor" d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z" />
                    </svg>
                    Export Orders
                </button>
            </div>
        </div>

        <!-- Filters and Search -->
        <div class="bg-white rounded-2xl p-4 shadow-md mb-6">
            <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-4">
                <div class="flex-1 w-full">
                    <input type="text" placeholder="Search orders..."
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                </div>
                <div class="flex items-center space-x-2">
                    <select
                        class="bg-light border-none rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary">
                        <option>Status: All</option>
                        <option>Pending</option>
                        <option>Processing</option>
                        <option>Shipped</option>
                        <option>Delivered</option>
                        <option>Cancelled</option>
                    </select>
                    <select
                        class="bg-light border-none rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary">
                        <option>Date: All</option>
                        <option>Today</option>
                        <option>This Week</option>
                        <option>This Month</option>
                    </select>
                    <button class="bg-primary text-white px-4 py-2 rounded-lg font-medium hover:bg-accent action-btn">
                        Apply Filters
                    </button>
                </div>
            </div>
        </div>

        <!-- Orders Table -->
        <div class="bg-white rounded-2xl shadow-md overflow-hidden">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50 text-left text-gray-500">
                        <th class="py-4 px-6 font-medium">Order ID</th>
                        <th class="py-4 px-6 font-medium">Customer</th>
                        <th class="py-4 px-6 font-medium">Date</th>
                        <th class="py-4 px-6 font-medium">Amount</th>
                        <th class="py-4 px-6 font-medium">Status</th>
                        <th class="py-4 px-6 font-medium text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <tr>
                        <td class="py-4 px-6 font-medium">#ORD-1234</td>
                        <td class="py-4 px-6">Sarah Johnson</td>
                        <td class="py-4 px-6">Jun 15, 2023</td>
                        <td class="py-4 px-6">$159.98</td>
                        <td class="py-4 px-6">
                            <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Delivered</span>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex justify-end space-x-2">
                                <button class="text-blue-500 hover:text-blue-700 action-btn"
                                    onclick="openModal('view-order-modal')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5s5 2.24 5 5s-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3s3-1.34 3-3s-1.34-3-3-3z" />
                                    </svg>
                                </button>
                                <button class="text-primary hover:text-accent action-btn"
                                    onclick="openModal('edit-order-modal')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04a.996.996 0 0 0 0-1.41l-2.34-2.34a.996.996 0 0 0-1.41 0l-1.83 1.83l3.75 3.75l1.83-1.83z" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6 font-medium">#ORD-1233</td>
                        <td class="py-4 px-6">Michael Brown</td>
                        <td class="py-4 px-6">Jun 14, 2023</td>
                        <td class="py-4 px-6">$229.98</td>
                        <td class="py-4 px-6">
                            <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded-full">Shipped</span>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex justify-end space-x-2">
                                <button class="text-blue-500 hover:text-blue-700 action-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5s5 2.24 5 5s-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3s3-1.34 3-3s-1.34-3-3-3z" />
                                    </svg>
                                </button>
                                <button class="text-primary hover:text-accent action-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04a.996.996 0 0 0 0-1.41l-2.34-2.34a.996.996 0 0 0-1.41 0l-1.83 1.83l3.75 3.75l1.83-1.83z" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6 font-medium">#ORD-1232</td>
                        <td class="py-4 px-6">Emily Wilson</td>
                        <td class="py-4 px-6">Jun 13, 2023</td>
                        <td class="py-4 px-6">$99.99</td>
                        <td class="py-4 px-6">
                            <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs rounded-full">Processing</span>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex justify-end space-x-2">
                                <button class="text-blue-500 hover:text-blue-700 action-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5s5 2.24 5 5s-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3s3-1.34 3-3s-1.34-3-3-3z" />
                                    </svg>
                                </button>
                                <button class="text-primary hover:text-accent action-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04a.996.996 0 0 0 0-1.41l-2.34-2.34a.996.996 0 0 0-1.41 0l-1.83 1.83l3.75 3.75l1.83-1.83z" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="py-4 px-6 font-medium">#ORD-1231</td>
                        <td class="py-4 px-6">David Miller</td>
                        <td class="py-4 px-6">Jun 12, 2023</td>
                        <td class="py-4 px-6">$299.99</td>
                        <td class="py-4 px-6">
                            <span class="px-2 py-1 bg-red-100 text-red-800 text-xs rounded-full">Pending</span>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex justify-end space-x-2">
                                <button class="text-blue-500 hover:text-blue-700 action-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5s5 2.24 5 5s-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3s3-1.34 3-3s-1.34-3-3-3z" />
                                    </svg>
                                </button>
                                <button class="text-primary hover:text-accent action-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04a.996.996 0 0 0 0-1.41l-2.34-2.34a.996.996 0 0 0-1.41 0l-1.83 1.83l3.75 3.75l1.83-1.83z" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>


@endsection