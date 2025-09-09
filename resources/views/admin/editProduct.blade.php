@extends('admin.app')

@section('content')

    @if(Session::has('success'))
        <div class="bg-green-300 border text-green-700 rounded-xl pl-4 p-5 m-4 text-xl">
            <ul>
                <li> {{ Session::get('success') }} </li>
            </ul>
        </div>
    @endif
    <div class="bg-white rounded-2xl w-full overflow-y-auto">
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-xl font-heading font-bold">Edit Product</h2>
        </div>
        <div class="p-6">
            <form class="space-y-4" method="post" action="{{ route('products.update', $product) }}" enctype="multipart/form-data" novalidate>
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Product Name</label>
                        <input type="text" name="name"
                            class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                            value="{{ old('name', $product->name)  }}">
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Price</label>
                        <input type="text" name="price"
                            class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                            value="{{ old('price', $product->price) }}">
                        @error('price')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea name="description"
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                        rows="3">{{ old('description', $product->description)  }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                        <select 
                            name="category_id" value="{{ old('category') }}"
                            class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                            <option value="{{ old('category') }}">Select Category</option>
                            @foreach ($categories as $category)
                                <option class="text-gray-700 tex-sm" value="{{ old('category_id', $category->id) }}"
                                    {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Stock Quantity</label>
                        <input type="number" value="{{ old('quantity', $product->quantity) }}" name="quantity"
                            class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                            value="42">
                        @error('quantity')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Product Images</label>
                    <div class="flex space-x-4 mt-2">
 @php
            $images = json_decode($product->images, true);
            $firstImage = $images[0] ?? null;
        @endphp

        @if($firstImage)
            <img src="{{ asset('storage/' . $firstImage) }} "
            style="width: 200px; height: 200px;" 
                 alt="{{ $product->name }}" 
                 class="w-full h-64 object-cover">
        @else
            <img src="{{ asset('default-product.png') }}" 
                 alt="No Image" 
                 class="w-full h-64 object-cover">
        @endif                        <label
                            class="w-20 h-20 bg-gray-200 rounded-lg flex items-center justify-center border-2 border-dashed border-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z" />

                            </svg>
                            <input type="file" class="sr-only" value="{{ old('image', asset('storage/' . $product->image))}}" name="image" accept="/image/*">
                        </label>

                    </div>
                    @error('image')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                </div>

                <div class="p-6 border-t border-gray-200 flex justify-end space-x-3">

                    <a href="{{ route('products.index') }}">
                        <button class="px-4 py-2 border border-gray-200 rounded-lg text-gray-700 hover:bg-gray-100"
                            onclick="">Cancel</button>
                    </a>
                    <button class="px-4 py-2 bg-primary text-white rounded-lg font-medium hover:bg-accent">Update
                        Product</button>
                </div>
            </form>
        </div>

    </div>
@endsection