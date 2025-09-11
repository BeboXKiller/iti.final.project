@extends('website.app')
@section('content')

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @foreach($products as $product)
    @php
    $images = json_decode($product->images, true);
    $firstImage = $images[0] ?? null;
    @endphp

    <a href="{{ route('user.product', $product->id) }}">
        <div class="product-item bg-white rounded-2xl p-4 shadow-md transition-all duration-300">
            <div class="relative overflow-hidden rounded-xl mb-4">
                @if($firstImage)
                <img src="{{ asset('storage/' . $firstImage) }}"
                    alt="{{ $product->name }}"
                    class="w-full h-64 object-cover">
                @else
                <img alt="{{ $product->name }}" class="w-full h-64 object-cover">
                @endif

                <div class="absolute top-3 right-3">
                    <button class="wishlist-toggle bg-white rounded-full p-2 shadow-md hover:bg-secondary hover:text-white" data-product-id="{{ $product->id }}">
                        ❤️
                    </button>
                </div>
                <div class="absolute top-3 left-3">
                    <span class="bg-secondary text-white text-xs px-2 py-1 rounded">New</span>
                </div>
            </div>
            <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
            <div class="flex justify-between items-center">
                <span class="text-gray-900 font-bold mt-2">${{ $product->price }}</span>
                <button class="bg-primary text-white p-2 rounded-lg hover:bg-secondary">🛒</button>
            </div>
        </div>
    </a>
    @endforeach
</div>

@endsection