@extends('website.app')
@section('content')
<div class="mt-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($products as $product)
                <x-website.product-item 
                :product="$product" 
                :in-wishlist="in_array($product->id, $wishlistItems)" 
                />
            @endforeach
        </div>

@endsection