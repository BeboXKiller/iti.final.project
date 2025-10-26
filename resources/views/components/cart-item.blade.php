@props(['item'])

@php
    $images = json_decode($item->options->images ?? '[]', true);
    $firstImage = $images[0] ?? null;
    $productImage = $item->options->image ?? $firstImage;
@endphp

<div class="flex items-center bg-white rounded-2xl shadow-md p-4 mb-4 border border-gray-100 hover:shadow-lg transition-all duration-300">
    <!-- Product Image -->
    <div class="flex-shrink-0">
        @if($productImage)
            <img src="{{ asset('storage/' . $productImage) }}" 
                 alt="{{ $item->name }}"
                 class="w-20 h-20 md:w-24 md:h-24 object-fit rounded-xl">
        @else
            <img src="https://placehold.co/100x100/EFE4D2/254D70?text=No+Image" 
                 alt="{{ $item->name }}"
                 class="w-20 h-20 md:w-24 md:h-24 object-cover rounded-xl">
        @endif
    </div>

    <!-- Product Details -->
    <div class="flex-1 ml-4 md:ml-6">
        <div class="flex flex-col md:flex-row md:items-start md:justify-between">
            <!-- Product Info -->
            <div class="flex-1">
                <h3 class="font-semibold text-gray-900 mb-1 line-clamp-1">{{ $item->name }}</h3>
                <p class="text-gray-500 text-sm mb-2 line-clamp-2">
                    {{ Str::limit($item->options->description ?? '', 60) }}
                </p>
                
                <!-- Quantity Controls -->
                <div class="flex items-center space-x-3">
                    <form action="{{ route('cart.update', $item->rowId) }}" method="POST" class="flex items-center">
                        @csrf
                        @method('PUT')
                        <div class="flex items-center border border-gray-300 rounded-lg bg-white shadow-sm">
                            <button type="submit" name="qty" value="{{ $item->qty - 1 }}"
                                class="p-2 hover:bg-gray-50 text-gray-500 hover:text-primary transition-colors rounded-l-lg"
                                @if($item->qty <= 1) disabled @endif>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M19 13H5v-2h14v2z" />
                                </svg>
                            </button>
                            <span class="px-3 py-1 min-w-12 text-center font-medium text-gray-900">{{ $item->qty }}</span>
                            <button type="submit" name="qty" value="{{ $item->qty + 1 }}"
                                class="p-2 hover:bg-gray-50 text-gray-500 hover:text-primary transition-colors rounded-r-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z" />
                                </svg>
                            </button>
                        </div>
                    </form>

                    <!-- Remove Button -->
                    <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="text-red-500 hover:text-red-700 p-2 hover:bg-red-50 rounded-lg transition-colors duration-200"
                                onclick="return confirm('Are you sure you want to remove this item?')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M7 21q-.825 0-1.412-.587Q5 19.825 5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413Q17.825 21 17 21ZM17 6H7v13h10ZM9 17h2V8H9Zm4 0h2V8h-2ZM7 6v13Z" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Price Information -->
            <div class="mt-2 md:mt-0 text-right">
                <p class="font-bold text-lg text-gray-900">${{ number_format((float)$item->subtotal(), 2) }}</p>
                <p class="text-gray-500 text-sm">${{ number_format((float)$item->price, 2) }} each</p>
                @if($item->qty > 1)
                    <p class="text-green-600 text-xs font-medium mt-1">
                        Save ${{ number_format((float)(($item->price * $item->qty) - $item->subtotal()), 2) }}
                    </p>
                @endif
            </div>
        </div>
    </div>
</div>