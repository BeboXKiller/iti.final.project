@extends('admin.app')

@section('content')
<div class="flex-1 p-6">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-heading font-bold">Customer Details</h1>
        <a href="{{ route('customers.index') }}"
           class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300">
           Back to Customers
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-md p-6 space-y-4">
        <div class="flex items-center space-x-4">
            <div class="w-16 h-16 rounded-full flex items-center justify-center text-white font-bold text-xl"
                 style="background-color: {{ $customer->avatar_color }};">
                {{ strtoupper(substr($customer->first_name, 0, 1)) }}
            </div>
            <div>
                <h2 class="text-xl font-semibold">{{ $customer->first_name }} {{ $customer->last_name }}</h2>
                <p class="text-gray-500">{{ $customer->email }}</p>
                <p class="text-gray-500">{{ $customer->phone }}</p>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <h3 class="text-gray-600 font-medium">Address</h3>
                <p>{{ $customer->address ?? 'N/A' }}</p>
            </div>
            <div>
                <h3 class="text-gray-600 font-medium">City</h3>
                <p>{{ $customer->city ?? 'N/A' }}</p>
            </div>
            <div>
                <h3 class="text-gray-600 font-medium">Status</h3>
                <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">{{ $customer->status }}</span>
            </div>
            <div>
                <h3 class="text-gray-600 font-medium">Orders</h3>
                <p>{{ $customer->orders_count ?? 0 }}</p>
            </div>
        </div>  
    </div>

</div>
@endsection
