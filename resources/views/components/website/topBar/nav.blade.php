<nav class="border-t border-gray-200 mx-auto lg:flex">
    <div class="container mx-auto px-4">
        <div class="flex justify-center">
            <ul class="flex space-x-10 py-3">
                 <li><a href="{{route('styleMart')}}" class="text-dark hover:text-primary font-medium">Home</a></li> 
                <li><a href="{{ route('category.products', ['category' => 6]) }}" class="text-dark hover:text-primary font-medium">Men</a></li>
                <li><a href="{{ route('category.products', ['category' => 7]) }}" class="text-dark hover:text-primary font-medium">Women</a></li>
                <li><a href="{{ route('category.products', ['category' => 8]) }}" class="text-dark hover:text-primary font-medium">Kids</a></li>
                <li><a href="{{ route('category.products', ['category' => 9]) }}" class="text-dark hover:text-primary font-medium">Accessories</a></li>
            </ul>
        </div>
    </div>
</nav>