@extends('admin.app')

@section('content')

    <div class="flex-1 p-6">
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-200 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <div>
                <h1 class="text-2xl font-heading font-bold">Customer Management</h1>
                <p class="text-gray-600 mt-2">Manage your customer database</p>
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
                    @foreach ($customers as $cust)
                        <tr>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 rounded-full mr-4 flex items-center justify-center text-white font-bold"
                                        style="background-color: {{ $cust->avatar_color }};">
                                        {{ strtoupper(substr($cust->first_name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="font-medium">{{ $cust->first_name }} {{ $cust->last_name }}</div>
                                        <div class="text-sm text-gray-500">{{$cust->created_at->format('M Y')}}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">{{$cust->email}}</td>
                            <td class="py-4 px-6">{{$cust->phone}}</td>
                            <td class="py-4 px-6">{{$cust->orders_count}}</td>
                            <td class="py-4 px-6">
                                <span
                                    class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">{{$cust->status}}</span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex justify-end space-x-2">
                                    <a href="{{ route('customers.show', $cust->id) }}"
                                        class="text-blue-500 hover:text-blue-700 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5s5 2.24 5 5s-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3s3-1.34 3-3s-1.34-3-3-3z" />
                                        </svg>
                                    </a>

                                    <a href="{{ route('customers.edit', $cust->id) }}"
                                        class="text-primary hover:text-accent flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04a.996.996 0 0 0 0-1.41l-2.34-2.34a.996.996 0 0 0-1.41 0l-1.83 1.83l3.75 3.75l1.83-1.83z" />
                                        </svg>
                                    </a>
                                </div>
                            </td>

                        </tr>

                    @endforeach

        </div>
        </td>
        </tr>
        </tbody>
        </table>
    </div>
        @include('components.pagination')
    </div>  

    <script>
        highlightActiveSection('customers')
    </script>
@endsection