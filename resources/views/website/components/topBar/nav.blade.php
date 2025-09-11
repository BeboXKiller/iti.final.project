<nav class="border-t border-gray-200 mx-auto lg:flex">
    <div class="container mx-auto px-4">
        <div class="flex justify-center">
            <ul class="flex space-x-10 py-3">
                <li><a href="{{route('styleMart')}}" class="text-dark hover:text-primary font-medium">Home</a></li>
                <li><a href="{{ route('category.products', ['category' => 1]) }}" class="text-dark hover:text-primary font-medium">Men</a></li>
                <li><a href="{{ route('category.products', ['category' => 2]) }}" class="text-dark hover:text-primary font-medium">Women</a></li>
                <li><a href="{{ route('category.products', ['category' => 3]) }}" class="text-dark hover:text-primary font-medium">Kids</a></li>
            </ul>
        </div>
    </div>
</nav>