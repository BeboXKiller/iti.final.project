@extends('admin.app')

@section('content')
    <div class="bg-white rounded-2xl w-full overflow-y-auto">
        <!-- Header -->
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-xl font-heading font-bold">Add New Category</h2>
        </div>

        <!-- Form -->
        <div class="p-6">
            <form class="space-y-4" method="POST" action="{{ route('categories.update' , $category ) }}">
                @csrf
                @method('PUT')

                <!-- Category Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Category Name</label>
                    <input type="text" name="name" value="{{ old('name', $category->name ) }}"
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Category Description -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea name="description"
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                        rows="3">{{ old('description', $category->description ) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="pt-6 border-t border-gray-200 flex justify-end space-x-3">
                    <a href="{{ route('categories.index') }}"
                        class="px-4 py-2 border border-gray-200 rounded-lg text-gray-700 hover:bg-gray-100">
                        Cancel
                    </a>
                    <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg font-medium hover:bg-accent">
                        Update Category
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        highlightActiveSection('add-category');
    </script>
@endsection
