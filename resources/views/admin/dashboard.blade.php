@extends('admin.app')
@section('content')
<!-- Main Content -->
<div class="flex-1 p-6">
    <h1 class="text-2xl font-heading font-bold mb-6">Dashboard Overview</h1>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="dashboard-card bg-white rounded-2xl p-6 shadow-md transition-all duration-300">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-gray-500">Total Sales</h3>
                <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center text-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10s10-4.48 10-10S17.52 2 12 2zm1.41 16.09V20h-2.67v-1.93c-1.71-.36-3.16-1.46-3.27-3.4h1.96c.1 1.05.82 1.87 2.65 1.87c1.96 0 2.4-.98 2.4-1.59c0-.83-.44-1.61-2.67-2.14c-2.48-.6-4.18-1.62-4.18-3.67c0-1.72 1.39-2.84 3.11-3.21V4h2.67v1.95c1.86.45 2.79 1.86 2.85 3.39H14.3c-.05-1.11-.64-1.87-2.22-1.87c-1.5 0-2.4.68-2.4 1.64c0 .84.65 1.39 2.67 1.91s4.18 1.39 4.18 3.91c-.01 1.83-1.38 2.83-3.12 3.16z" />
                    </svg>
                </div>
            </div>
            <div class="text-3xl font-bold text-gray-800">
                {{ number_format($totalSales, 2) }}
            </div>
            <p class="text-green-500 text-sm mt-2">+12% from last month</p>

        </div>

        <div class="dashboard-card bg-white rounded-2xl p-6 shadow-md transition-all duration-300">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-gray-500">Orders</h3>
                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center text-green-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z" />
                    </svg>
                </div>
            </div>
            <div class="text-3xl font-bold text-gray-800">
                {{ $ordersCount }}
            </div>
            <p class="text-green-500 text-sm mt-2">+8% from last month</p>

        </div>

        <div class="dashboard-card bg-white rounded-2xl p-6 shadow-md transition-all duration-300">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-gray-500">Customers</h3>
                <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center text-purple-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4s-4 1.79-4 4s1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                    </svg>
                </div>
            </div>
            <div class="text-3xl font-bold text-gray-800">
                {{ $customersCount }}
            </div>
            <p class="text-green-500 text-sm mt-2">+5% from last month</p>

        </div>

        <div class="dashboard-card bg-white rounded-2xl p-6 shadow-md transition-all duration-300">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-gray-500">Products</h3>
                <div class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center text-orange-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M20 6h-4V4c0-1.11-.89-2-2-2h-4c-1.11 0-2 .89-2 2v2H4c-1.11 0-1.99.89-1.99 2L2 19c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2zm-6 0h-4V4h4v2z" />
                    </svg>
                </div>
            </div>
            <div class="text-3xl font-bold text-gray-800">
                {{ $productsCount }}
            </div>
            <p class="text-gray-500 text-sm mt-2">+2 new this month</p>

        </div>
    </div>

    <!-- Charts & Recent Activity -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Sales Chart -->
        <div class="bg-white rounded-2xl p-6 shadow-md">
            <h3 class="font-heading font-bold mb-6">Sales Overview</h3>
            <div class="h-64 flex items-end space-x-2">
                <div class="flex-1 flex flex-col items-center">
                    <div class="w-8 bg-primary rounded-t" style="height: 60%;"></div>
                    <span class="text-xs text-gray-500 mt-2">Mon</span>
                </div>
                <div class="flex-1 flex flex-col items-center">
                    <div class="w-8 bg-primary rounded-t" style="height: 80%;"></div>
                    <span class="text-xs text-gray-500 mt-2">Tue</span>
                </div>
                <div class="flex-1 flex flex-col items-center">
                    <div class="w-8 bg-primary rounded-t" style="height: 45%;"></div>
                    <span class="text-xs text-gray-500 mt-2">Wed</span>
                </div>
                <div class="flex-1 flex flex-col items-center">
                    <div class="w-8 bg-primary rounded-t" style="height: 70%;"></div>
                    <span class="text-xs text-gray-500 mt-2">Thu</span>
                </div>
                <div class="flex-1 flex flex-col items-center">
                    <div class="w-8 bg-secondary rounded-t" style="height: 90%;"></div>
                    <span class="text-xs text-gray-500 mt-2">Fri</span>
                </div>
                <div class="flex-1 flex flex-col items-center">
                    <div class="w-8 bg-primary rounded-t" style="height: 65%;"></div>
                    <span class="text-xs text-gray-500 mt-2">Sat</span>
                </div>
                <div class="flex-1 flex flex-col items-center">
                    <div class="w-8 bg-primary rounded-t" style="height: 75%;"></div>
                    <span class="text-xs text-gray-500 mt-2">Sun</span>
                </div>
            </div>
        </div>

        <!-- Recent Orders -->
        <div class="bg-white rounded-2xl p-6 shadow-md">
            <div class="flex justify-between items-center mb-6">
                <h3 class="font-heading font-bold">Recent Orders</h3>
                <a href="#" class="text-primary text-sm hover:underline">View all</a>
            </div>
            <div class="space-y-4">
                <div class="flex justify-between items-center border-b border-gray-100 pb-4">
                    <div>
                        <h4 class="font-medium">#ORD-1234</h4>
                        <p class="text-sm text-gray-500">Summer Floral Dress</p>
                    </div>
                    <div class="text-right">
                        <p class="font-medium">$59.99</p>
                        <span class="text-xs px-2 py-1 bg-green-100 text-green-800 rounded-full">Delivered</span>
                    </div>
                </div>
                <div class="flex justify-between items-center border-b border-gray-100 pb-4">
                    <div>
                        <h4 class="font-medium">#ORD-1233</h4>
                        <p class="text-sm text-gray-500">Leather Jacket</p>
                    </div>
                    <div class="text-right">
                        <p class="font-medium">$129.99</p>
                        <span class="text-xs px-2 py-1 bg-blue-100 text-blue-800 rounded-full">Shipped</span>
                    </div>
                </div>
                <div class="flex justify-between items-center border-b border-gray-100 pb-4">
                    <div>
                        <h4 class="font-medium">#ORD-1232</h4>
                        <p class="text-sm text-gray-500">Designer Sneakers</p>
                    </div>
                    <div class="text-right">
                        <p class="font-medium">$99.99</p>
                        <span class="text-xs px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full">Processing</span>
                    </div>
                </div>
                <div class="flex justify-between items-center">
                    <div>
                        <h4 class="font-medium">#ORD-1231</h4>
                        <p class="text-sm text-gray-500">Classic Watch</p>
                    </div>
                    <div class="text-right">
                        <p class="font-medium">$299.99</p>
                        <span class="text-xs px-2 py-1 bg-red-100 text-red-800 rounded-full">Pending</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Top Products -->
    <div class="bg-white rounded-2xl p-6 shadow-md mb-8">
        <div class="flex justify-between items-center mb-6">
            <h3 class="font-heading font-bold">Top Selling Products</h3>
            <a href="#" class="text-primary text-sm hover:underline">View all</a>
        </div>
        <table class="w-full">
            <thead>
                <tr class="text-left text-gray-500 border-b border-gray-100">
                    <th class="pb-3">Product</th>
                    <th class="pb-3">Price</th>
                    <th class="pb-3">Sold</th>
                    <th class="pb-3">Stock</th>
                    <th class="pb-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b border-gray-100">
                    <td class="py-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-gray-200 rounded-lg mr-3"></div>
                            <div>
                                <div class="font-medium">Summer Floral Dress</div>
                                <div class="text-sm text-gray-500">Women's Dresses</div>
                            </div>
                        </div>
                    </td>
                    <td class="py-4">$59.99</td>
                    <td class="py-4">142</td>
                    <td class="py-4">
                        <span class="text-green-600">In Stock</span>
                    </td>
                    <td class="py-4 text-right">
                        <button class="text-primary hover:text-accent">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04a.996.996 0 0 0 0-1.41l-2.34-2.34a.996.996 0 0 0-1.41 0l-1.83 1.83l3.75 3.75l1.83-1.83z" />
                            </svg>
                        </button>
                    </td>
                </tr>
                <tr class="border-b border-gray-100">
                    <td class="py-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-gray-200 rounded-lg mr-3"></div>
                            <div>
                                <div class="font-medium">Leather Jacket</div>
                                <div class="text-sm text-gray-500">Men's Outerwear</div>
                            </div>
                        </div>
                    </td>
                    <td class="py-4">$129.99</td>
                    <td class="py-4">98</td>
                    <td class="py-4">
                        <span class="text-red-600">Low Stock</span>
                    </td>
                    <td class="py-4 text-right">
                        <button class="text-primary hover:text-accent">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04a.996.996 0 0 0 0-1.41l-2.34-2.34a.996.996 0 0 0-1.41 0l-1.83 1.83l3.75 3.75l1.83-1.83z" />
                            </svg>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="py-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-gray-200 rounded-lg mr-3"></div>
                            <div>
                                <div class="font-medium">Designer Sneakers</div>
                                <div class="text-sm text-gray-500">Footwear</div>
                            </div>
                        </div>
                    </td>
                    <td class="py-4">$99.99</td>
                    <td class="py-4">76</td>
                    <td class="py-4">
                        <span class="text-green-600">In Stock</span>
                    </td>
                    <td class="py-4 text-right">
                        <button class="text-primary hover:text-accent">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04a.996.996 0 0 0 0-1.41l-2.34-2.34a.996.996 0 0 0-1.41 0l-1.83 1.83l3.75 3.75l1.83-1.83z" />
                            </svg>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<script>
    highlightActiveSection('dashboard');
</script>
@endsection