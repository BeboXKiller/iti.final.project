@extends('admin.app')

@section('content')
    @if ($errors->any())
        <div class="bg-red-300 border rounded-xl px-8 py-4 pl-4 m-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <div class="bg-red-300 rounded-xl px-8">
                        <li class="list-disc px-4">{{ $error }}</li>
                    </div>
                @endforeach

            </ul>
        </div>
    @endif
    @if (Session::has('success'))
        <div class="bg-green-300 border text-green-700 rounded-xl pl-4 p-5 m-4 text-xl">
            <ul>
                <li> {{ Session::get('success') }} </li>
            </ul>
        </div>
    @endif

    <div id="products-page" class="">

        <!-- Page Header with Action Buttons -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <div>
                <h1 class="text-2xl font-heading font-bold">Product Management</h1>
                <p class="text-gray-600 mt-2">Manage your product inventory</p>
            </div>
            <a href="{{ route('products.create') }}">
                <button
                        class="bg-primary text-white px-4 py-2 rounded-lg font-medium hover:bg-accent mt-4 md:mt-0 flex items-center action-btn"
                        onclick="openModal('add-product-modal')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="mr-2">
                        <path fill="currentColor" d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z" />
                    </svg>
                    Add New Product
                </button>
            </a>
        </div>

        <!-- Filters and Search -->
        <div class="bg-white rounded-2xl p-4 shadow-md mb-6">
            <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-4">
                <div class="flex-1 w-full">
                    <input type="text" placeholder="Search products..."
                           class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                </div>
                <div class="flex items-center space-x-2">
                    <select
                            class="bg-light border-none rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary">
                        <option>All Categories</option>
                        <option>Women</option>
                        <option>Men</option>
                        <option>Kids</option>
                    </select>
                    <select
                            class="bg-light border-none rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary">
                        <option>Status: All</option>
                        <option>Active</option>
                        <option>Inactive</option>
                        <option>Out of Stock</option>
                    </select>
                    <button class="bg-primary text-white px-4 py-2 rounded-lg font-medium hover:bg-accent action-btn">
                        Apply Filters
                    </button>
                </div>
            </div>
        </div>

        <!-- Products Table -->
        <div class="bg-white rounded-2xl shadow-md overflow-hidden">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50 text-left text-gray-500">
                        <th class="py-4 px-6 font-medium">Product</th>
                        <th class="py-4 px-6 font-medium">Category</th>
                        <th class="py-4 px-6 font-medium">Price</th>
                        <th class="py-4 px-6 font-medium">Stock</th>
                        <th class="py-4 px-6 font-medium">Status</th>
                        <th class="py-4 px-6 font-medium text-right">Actions</th>
                    </tr>
                </thead>
                
                <tbody class="divide-y divide-gray-100">
                    @foreach ($products as $product)
                        <tr>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    @php
                                        $images = json_decode($product->images, true);
                                        $firstImage = $images[0] ?? null;
                                    @endphp

                                    @if ($firstImage)
                                        <img src="{{ asset('storage/' . $firstImage) }}"
                                             style="width: 150px; height: 200px;"
                                             alt="{{ $product->name }}"
                                             class="w-10 mr-6 rounded-xl h-10 object-fit">
                                    @else
                                        <img src="{{ asset('assets/images/default-product.png') }}"
                                             alt="Image Not Found"
                                             class="w-20 mr-6 rounded-xl h-20 object-cover">
                                    @endif
                                    <div>
                                        <div class="font-medium">{{ $product->name }}</div>
                                        {{-- <div class="text-sm text-gray-500">#PRD-001</div> --}}
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">{{ $product->category->name }}</td>
                            <td class="py-4 px-6">${{ $product->price }}</td>
                            <td class="py-4 px-6">{{ $product->quantity }}</td>
                            @if ($product->quantity == 0)
                                <td class="py-4 px-6">
                                    <span class="px-2 py-1 bg-red-100 text-red-800 text-xs rounded-full">Out of Stock</span>
                                </td>
                            @elseif ($product->quantity >= 30)
                                <td class="py-4 px-6">
                                    <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Active</span>
                                </td>
                            @else
                                <td class="py-4 px-6">
                                    <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs rounded-full">Low Stock</span>
                                </td>
                            @endif
                            <td class="py-4 px-6">
                                <div class="flex justify-end space-x-2">
                                    <button
                                            class="text-blue-500 hover:text-blue-700 action-btn open-product-modal-btn"
                                            data-id="{{ $product->id }}"
                                            data-name="{{ ($product->name) }}"
                                            data-description="{{ ($product->description) }}"
                                            data-price="{{ $product->price }}"
                                            data-quantity="{{ $product->quantity }}"
                                            data-category="{{ ($product->category->name ?? '') }}"
                                            data-images='@json(json_decode($product->images, true))'>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5s5 2.24 5 5s-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3s3-1.34 3-3s-1.34-3-3-3z" />
                                        </svg>
                                    </button>
                                    <a href="{{ route('products.edit', $product) }}">
                                        <button class="text-primary hover:text-accent action-btn"
                                                onclick="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04a.996.996 0 0 0 0-1.41l-2.34-2.34a.996.996 0 0 0-1.41 0l-1.83 1.83l3.75 3.75l1.83-1.83z" />
                                            </svg>
                                        </button>
                                    </a>

                                    <form id="delete-form-{{ $product->id }}" action="{{ route('products.destroy', $product) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>

                                    <button class="text-red-500 hover:text-red-700 action-btn"
                                            onclick="deleteProduct('{{ $product->id }}')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
                </table>
        </div>
    </div>
    <x-admin.pagination :paginator="$products" />
    </div>
    @include('admin.modals.showProduct')
    </div>

    <script>
        highlightActiveSection('all-products');

        function deleteProduct(productId) {
            if (confirm('Are you sure you want to delete this product?')) {
                document.getElementById('delete-form-' + productId).submit();
            }
        }
    </script>
    <script>
        document.querySelectorAll('.open-product-modal-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const id = this.dataset.id;
                const name = this.dataset.name;
                const description = this.dataset.description;
                const price = this.dataset.price;
                const quantity = this.dataset.quantity;
                const category = this.dataset.category;

                // الصور كـ JSON
                let images = [];
                try {
                    images = JSON.parse(this.dataset.images);
                } catch (e) {
                    console.error("Image JSON parse error:", e);
                }

                // أول صورة أو صورة افتراضية
                const firstImage = images != null ? "{{ asset('storage') }}/" + images[0] : "{{ asset('assets/images/default-product.png') }}";

                // if (images != null ) {
                //     firstImage = "{{ asset('storage') }}/" + images[0];

                // } else {
                //     firstImage = "{{ asset('assets/images/default-product.png') }}";

                // }

                // حط البيانات في المودال
                document.getElementById('product-id').textContent = id;
                document.getElementById('product-name').textContent = name;
                document.getElementById('product-description').textContent = description;
                document.getElementById('product-price').textContent = "$" + price;
                document.getElementById('product-quantity').textContent = quantity;
                document.getElementById('product-category').textContent = category;
                document.getElementById('product-img').src = firstImage;

                // حالة المخزون
                if (quantity == 0) {
                    document.getElementById('product-status').innerHTML = 
                    '<p class="py-1 px-2 my-2  bg-red-100 text-red-800 text-xs rounded-full">Out of Stock</p>';
                } else if (quantity >= 30) {
                    document.getElementById('product-status').innerHTML = 
                    '<p class="py-1 px-2 my-2  bg-green-100 text-green-800 text-xs rounded-full">Active</p>';
                } else {
                    document.getElementById('product-status').innerHTML = 
                    '<p class="py-1 px-2 my-2 bg-yellow-100 text-yellow-800 text-xs rounded-full">Low Stock</p>';
                }

                openModal('view-product-modal');
            });
        });
    </script>
@endsection

