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
    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

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
                @foreach ($orders as $order)
                    <tr>
                        <td class="py-4 px-6 font-medium">#{{ $order->id }}</td>
                        <td class="py-4 px-6">{{ $order->user->first_name . ' ' . $order->user->last_name }}</td>
                        <td class="py-4 px-6">{{ $order->created_at->format('Y-m-d') }}</td>
                        <td class="py-4 px-6">${{ number_format($order->total_amount, 2) }}</td>
                        <td class="py-4 px-6">
                            @php
                                $colors = [
                                    // 'pending' => 'bg-red-100 text-red-800',
                                    'pending' => 'bg-yellow-100 text-yellow-800',
                                    // 'shipped' => 'bg-blue-100 text-blue-800',
                                    'completed' => 'bg-green-100 text-green-800',
                                    'cancelled' => 'bg-gray-100 text-gray-800',
                                ];
                            @endphp
                            <span
                                class="px-2 py-1 {{ $colors[$order->status] ?? 'bg-gray-100 text-gray-800' }} text-xs rounded-full">
                                {{ $order->status }} </span>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex justify-end space-x-2">
                                <button class="text-blue-500 hover:text-blue-700 action-btn"
                                    onclick="openModal('view-order-{{ $order->id }}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5s5 2.24 5 5s-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3s3-1.34 3-3s-1.34-3-3-3z" />
                                    </svg>
                                </button>
                                <button class="text-primary hover:text-accent action-btn"
                                    onclick="openModal('update-order-{{ $order->id }}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04a.996.996 0 0 0 0-1.41l-2.34-2.34a.996.996 0 0 0-1.41 0l-1.83 1.83l3.75 3.75l1.83-1.83z" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <!-- View Order Modal -->
                    <div class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50 opacity-0 pointer-events-none"
                        id="view-order-{{ $order->id }}">
                        <div class="bg-white rounded-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
                            <div class="p-6 border-b border-gray-200">
                                <h2 class="text-xl font-heading font-bold">Order #{{ $order->id }} Details</h2>
                            </div>
                            <div class="p-6">
                                <p><strong>Customer:</strong>
                                    {{ $order->user->first_name . ' ' . $order->user->last_name }}</p>
                                <p><strong>Email:</strong> {{ $order->user->email }}</p>
                                <p><strong>Total:</strong> ${{ number_format($order->total_amount, 2) }}</p>
                                <p><strong>Status:</strong> {{ $order->status }}</p>
                                <p><strong>Date:</strong> {{ $order->created_at->format('d M Y') }}</p>
                                <p><strong>Update Date:</strong> {{ $order->updated_at->format('d M Y') }}</p>

                                <h3 class="mt-4 font-semibold">Items:</h3>
                                <ul class="list-disc pl-5">
                                    @foreach ($order->orderItems as $item)
                                        <li>{{ $item->product->name }} x {{ $item->quantity }} - ${{ $item->price }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="p-6 border-t border-gray-200 flex justify-end">
                                <button class="px-4 py-2 bg-primary text-white rounded-lg font-medium hover:bg-accent"
                                    onclick="closeModal('view-order-{{ $order->id }}')">Close</button>
                            </div>

                        </div>
                    </div>
                    <!-- Update Order Modal -->
                    <div class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50 opacity-0 pointer-events-none"
                        id="update-order-{{ $order->id }}">
                        <div class="bg-white rounded-2xl w-full max-w-md overflow-y-auto">
                            <div class="p-6 border-b border-gray-200">
                                <h2 class="text-xl font-heading font-bold">Update Order #{{ $order->id }}</h2>
                            </div>
                            <div class="p-6">
                                <form action="{{ route('admin.dashboard.orders.update', $order->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                                    <select name="status"
                                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary mb-4">
                                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending
                                        </option>
                                        <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>
                                            Completed</option>
                                        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>
                                            Cancelled</option>
                                    </select>
                                    <div class="flex justify-end space-x-3">
                                        <button type="button"
                                            class="px-4 py-2 border border-gray-200 rounded-lg text-gray-700 hover:bg-gray-100"
                                            onclick="closeModal('update-order-{{ $order->id }}')">Cancel</button>
                                        <button type="submit"
                                            class="px-4 py-2 bg-green-600 text-white rounded-lg font-medium hover:bg-green-700">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        highlightActiveSection('orders')
    </script>
@endsection
