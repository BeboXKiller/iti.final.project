@extends('admin.app')

@section('content')
    <div class="flex-1 p-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <div>
                <h1 class="text-2xl font-heading font-bold">Category Management</h1>
                <p class="text-gray-600 mt-2">Organize your product categories</p>
            </div>
            <a href="{{ route('categories.create') }}"
                class="bg-primary text-white px-4 py-2 rounded-lg font-medium hover:bg-accent mt-4 md:mt-0 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="mr-2">
                    <path fill="currentColor" d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z" />
                </svg>
                Add New Category
            </a>

        </div>
        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Categories Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ( $categories as $category )
            <div class="bg-white rounded-2xl p-6 shadow-md">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="font-heading font-bold">{{ $category->name }}</h3>
                    @if ($category->products->count() > 0)
                    <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Active</span>
                    @else
                    <span class="px-2 py-1 bg-gray-100 text-gray-800 text-xs rounded-full">Inactive</span>
                    @endif
                </div>
                <p class="text-gray-600 mb-4">{{ $category->description }}</p>
                <div class="flex justify-between items-center">

                    <span class="text-sm text-gray-500">{{ $category->products->count() . " Products" }}</span>

                    <div class="flex space-x-2">
                        <a class="text-primary hover:text-accent action-btn"
                            href="{{ route('categories.edit' , $category) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04a.996.996 0 0 0 0-1.41l-2.34-2.34a.996.996 0 0 0-1.41 0l-1.83 1.83l3.75 3.75l1.83-1.83z" />
                            </svg>
                        </a>
                        <form id="delete-form-{{ $category->id }}" action="{{ route('categories.destroy', $category) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>

                            <button class="text-red-500 hover:text-red-700 action-btn"
                                onclick="deleteProduct('{{ $category->id }}')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z" />
                                </svg>
                            </button>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
    <script>
        highlightActiveSection('all-categories')

        function deleteProduct(categoryId) {
        if (confirm('Are you sure you want to delete this product?')) {
            document.getElementById('delete-form-' + categoryId).submit();
        }
    }
    </script>
@endsection
