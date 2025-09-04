@extends('admin.app')

@section('content')


    <!-- Analytics Page -->
    <div id="analytics" class="page active">
        <h1 class="text-2xl font-heading font-bold mb-6">Analytics Dashboard</h1>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="dashboard-card bg-white rounded-2xl p-6 shadow-md transition-all duration-300">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-gray-500">Total Visitors</h3>
                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center text-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10s10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8s极速加速器8 3.59 8 8s-3.59 8-8 8zm-1-13h2v6h-2zm0 8h2v2h-2z" />
                        </svg>
                    </div>
                </div>
                <div class="text-3xl font-bold text-gray-800">24,582</div>
                <p class="text-green-500 text-sm mt-2">+12% from last month</p>
            </div>

            <div class="dashboard-card bg-white rounded-2xl p-6 shadow-md transition-all duration-300">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-gray-500">Conversion Rate</h3>
                    <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center text-green-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M16 11h3l-4-4-4 4h3c0 3.31-2.69 6-6 6-1.01 0-1.97-.25-2.8-.7l-1.46 1.46C5.96 19.55 7.43 20 9 20c4.42 0 8-3.58 8-8zm-8 3h-3l4 4 4-4h-3c0-3.31 2.69-6 6-6 1.01 0 1.97.25 2.8.7l1.46-1.46C18.04 4.45 16.57 4 15 4c-4.42 0-8 3.58-8 8z" />
                        </svg>
                    </div>
                </div>
                <div class="text-3xl font-bold text-gray-800">3.2%</div>
                <p class="text-green-500 text-sm mt-2">+0.4% from last month</p>
            </div>

            <div class="dashboard-card bg-white rounded-2xl p-6 shadow-md transition-all duration-300">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-gray-500">Avg. Order Value</h3>
                    <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center text-purple-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 极速加速器10 10s10-4.48 10-10S17.52 2 12 2zm1.41 16.09V20h-2.67v-1.93c-1.71-.36-3.16-1.46-3.27-3.4h1.96c.1 1.05.82 1.87 2.65 1.87c1.96 0 2.4-.98 2.4-1.59c0-.83-.44-1.61-2.67-2.14c-2.48-.6-4.18-1.62-4.极速加速器18-3.67c0-1.72 1.39-2.84 3.11-3.21V4h2.67v1.95c1.86.45 2.79 1.86 2.85 3.39H14.3c-.05-1.11-.64-1.87-2.22-1.87c-1.5 0-2.4.68-2.4 1.64c0 .84.65 1.39 2.67 1.91s4.18 1.39 4.18 3.91c-.01 1.83-1.38 2.83-3.12 3.16z" />
                        </svg>
                    </div>
                </div>
                <div class="text-3xl font-bold text-gray-800">$89.99</div>
                <p class="text-green-500 text-sm mt-2">+$5.20 from last month</p>
            </div>

            <div class="dashboard-card bg-white rounded-2xl p-6 shadow-md transition-all duration-300">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-gray-500">Bounce Rate</h3>
                    <div class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center text-orange-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10s10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8s8 3.58 8 8s-3.58 8-8 8zm1-5h-2v-2h2v2zm0-4h-2V7h2v4z" />
                        </svg>
                    </div>
                </div>
                <div class="text-3xl font-bold text-gray-800">42%</div>
                <p class="text-red-500 text-sm mt-2">+3% from last month</p>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <!-- Traffic Sources Chart -->
            <div class="bg-white rounded-2xl p-6 shadow-md">
                <h3 class="font-heading font-bold mb-6">Traffic Sources</h3>
                <div class="h-64 flex items-end justify-between px-4">
                    <div class="flex flex-col items-center">
                        <div class="w-8 bg-primary rounded-t chart-bar" style="height: 70%;"></div>
                        <span class="text-xs text-gray-500 mt-2">Organic</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-8 bg-secondary rounded-t chart-bar" style="height: 85%;"></div>
                        <span class="text-xs text-gray-500 mt-2">Direct</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-8 bg-accent rounded-t chart-bar" style="height: 60%;"></div>
                        <span class="text-xs text-gray-500 mt-2">Social</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-8 bg-green-500 rounded-t chart-bar" style="height: 45%;"></div>
                        <span class="text-xs text-gray-500 mt-2">Email</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-8 bg-yellow-500 rounded-t chart-bar" style="height: 30%;"></div>
                        <span class="text-xs text-gray-500 mt-2">Referral</span>
                    </div>
                </div>
            </div>

            <!-- Sales Over Time Chart -->
            <div class="bg-white rounded-2xl p-6 shadow-md">
                <h3 class="font-heading font-bold mb-6">Sales Over Time</h3>
                <div class="h-64 flex items-end space-x-2 px-4">
                    <div class="flex-1 flex flex-col items-center">
                        <div class="w-4 bg-primary rounded-t chart-bar" style="height: 40%;"></div>
                        <span class="text-xs text-gray-500 mt-2">Mon</span>
                    </div>
                    <div class="flex-1 flex flex-col items-center">
                        <div class="w-4 bg-primary rounded-t chart-bar" style="height: 60%;"></div>
                        <span class="text-xs text-gray-500 mt-2">Tue</span>
                    </div>
                    <div class="flex-1 flex flex-col items-center">
                        <div class="w-4 bg-primary rounded-t chart-bar" style="height: 30%;"></div>
                        <span class="text-xs text-gray-500 mt-2">Wed</span>
                    </div>
                    <div class="flex-1 flex flex-col items-center">
                        <div class="w-4 bg-primary rounded-t chart-bar" style="height: 50%;"></div>
                        <span class="text-xs text-gray-500 mt-2">Thu</span>
                    </div>
                    <div class="flex-1 flex flex-col items-center">
                        <div class="w-4 bg-secondary rounded-t chart-bar" style="height: 75%;"></div>
                        <span class="text-xs text-gray-500 mt-2">Fri</span>
                    </div>
                    <div class="flex-1 flex flex-col items-center">
                        <div class="w-4 bg-primary rounded-t chart-bar" style="height: 55%;"></div>
                        <span class="text-xs text-gray-500 mt-2">Sat</span>
                    </div>
                    <div class="flex-1 flex flex-col items-center">
                        <div class="w-4 bg-primary rounded-t chart-bar" style="height: 65%;"></div>
                        <span class="text-xs text-gray-500 mt-2">Sun</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Top Performing Products -->
        <div class="bg-white rounded-2xl p-6 shadow-md mb-8">
            <div class="flex justify-between items-center mb-6">
                <h3 class="font-heading font-bold">Top Performing Products</h3>
                <button class="text-primary text-sm hover:underline">View all</button>
            </div>
            <table class="w-full">
                <thead>
                    <tr class="text-left text-gray-500 border-b border-gray-100">
                        <th class="pb-3">Product</th>
                        <th class="pb-3">Views</th>
                        <th class="pb-3">Conversions</th>
                        <th class="pb-3">Revenue</th>
                        <th class="pb-3 text-right">CR</th>
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
                        <td class="py-4">1,245</td>
                        <td class="py-4">42</td>
                        <td class="py-4">$2,519.58</td>
                        <td class="py-4 text-right">3.37%</td>
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
                        <td class="py-4">987</td>
                        <td class="py-4">28</td>
                        <td class="py-4">$3,639.72</td>
                        <td class="py-4 text-right">2.84%</td>
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
                        <td class="py-4">1,532</td>
                        <td class="py-4">35</td>
                        <td class="py-4">$3,499.65</td>
                        <td class="py-4 text-right">2.28%</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Audience Demographics -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <!-- Gender Distribution -->
            <div class="bg-white rounded-2xl p-6 shadow-md">
                <h3 class="font-heading font-bold mb-6">Audience by Gender</h3>
                <div class="flex items-center justify-center">
                    <div class="relative w-48 h-48">
                        <svg viewBox="0 0 100 100" class="w-full h-full">
                            <circle cx="50" cy="50" r="45" fill="#EFE4D2" />
                            <path fill="#254D70" d="M50 5 A45 45 0 0 1 95 50 L50 50 Z" />
                            <path fill="#954C2E" d="M50 5 A45 45 0 0 0 5 50 L50 50 Z" />
                            <circle cx="50" cy="50" r="15" fill="#EFE4D2" />
                        </svg>
                        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center">
                            <div class="text-xl font-bold">65%</div>
                            <div class="text-xs text-gray-500">Female</div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center mt-4 space-x-6">
                    <div class="flex items-center">
                        <div class="w-4 h-4 bg-primary rounded mr-2"></div>
                        <span class="text-sm">Female: 65%</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-4 h-4 bg-secondary rounded mr-2"></div>
                        <span class="text-sm">Male: 35%</span>
                    </div>
                </div>
            </div>

            <!-- Age Distribution -->
            <div class="bg-white rounded-2xl p-6 shadow-md">
                <h3 class="font-heading font-bold mb-6">Audience by Age</h3>
                <div class="space-y-4">
                    <div>
                        <div class="flex justify-between text-sm mb-1">
                            <span>18-24</span>
                            <span>22%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-primary h-2 rounded-full" style="width: 22%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between text-sm mb-1">
                            <span>25-34</span>
                            <span>35%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-secondary h-2 rounded-full" style="width: 35%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between text-sm mb-1">
                            <span>35-44</span>
                            <span>25%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-accent h-2 rounded-full" style="width: 25%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between text-sm mb-1">
                            <span>45+</span>
                            <span>18%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-yellow-500 h-2 rounded-full" style="width: 18%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Export Options -->
        <div class="bg-white rounded-2xl p-6 shadow-md">
            <h3 class="font-heading font-bold mb-6">Export Analytics Data</h3>
            <div class="flex flex-wrap gap-4">
                <button
                    class="bg-primary text-white px-6 py-3 rounded-lg font-medium hover:bg-accent action-btn flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="mr-2">
                        <path fill="currentColor" d="M19 9h-4V3H9v6H5l7 7 7-7zM5 18v2h14v-2H5z" />
                    </svg>
                    Download PDF Report
                </button>
                <button
                    class="bg-secondary text-white px-6 py-3 rounded-lg font-medium hover:bg-accent action-btn flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="mr-2">
                        <path fill="currentColor" d="M19 9h-4V3H9v6H5l7 7 7-7zM5 18v2h14v-2H5z" />
                    </svg>
                    Export CSV Data
                </button>
                <button
                    class="bg-gray-200 text-gray-700 px-6 py-3 rounded-lg font-medium hover:bg-gray-300 action-btn flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" view极速加速器Box="0 0 24 24" class="mr-2">
                        <path fill="currentColor" d="M19 9h-4V3H9v6H5l7 7 7-7zM5 18v2h14v-2H5z" />
                    </svg>
                    Export to Excel
                </button>
            </div>
        </div>
    </div>

@endsection