@extends('website.app')

@section('content')
<main class="py-8">
    <div class="container mx-auto px-4">
        @if(session('error'))
        <div class="flex items-center bg-red-100 border border-red-400 text-red-800 px-4 py-3 rounded-md shadow-md mb-6 animate-fade-in"
            role="alert">
            <svg class="w-6 h-6 mr-2 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
            <span class="font-medium">{{ session('error') }}</span>
        </div>
        @endif

        @if(session('success'))
        <div class="flex items-center bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded-md shadow-md mb-6 animate-fade-in"
            role="alert">
            <svg class="w-6 h-6 mr-2 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
            </svg>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
        @endif

        <!-- Page Header -->
        <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-8">
            <div class="mb-4 md:mb-0">
                <h1 class="text-3xl font-bold text-gray-900">My Wishlist</h1>
                <p class="text-gray-600 mt-2">
                    <span class="wishlist-count">{{ $wishlists->count() }}</span>
                    {{ Str::plural('item', $wishlists->count()) }} saved for later
                </p>
            </div>
            
            @if($wishlists->count() > 0)
                <div class="flex flex-wrap gap-3">
                    <button class="wishlist-clear bg-gray-200 text-gray-700 px-4 py-2 rounded-lg font-medium hover:bg-gray-300 transition-colors duration-200">
                        Clear All
                    </button>
                    <button class="bg-primary text-white px-4 py-2 rounded-lg font-medium hover:bg-accent transition-colors duration-200"
                        onclick="shareWishlist()">
                        Share Wishlist
                    </button>
                </div>
            @endif
        </div>

        @if($wishlists->count() > 0)
            <!-- Wishlist Grid -->
            <div class="wishlist-grid grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-8">
                @foreach($wishlists as $wishlist)
                    @php
                        $product = $wishlist->product;
                    @endphp
                    <x-website.product-item 
                        :product="$product" 
                        :in-wishlist="true" 
                    />
                @endforeach
            </div>

            <!-- Bulk Actions -->
            <div class="bg-white rounded-2xl shadow-md p-6 border border-gray-100">
                <h3 class="text-xl font-bold text-gray-900 mb-4">Wishlist Actions</h3>
                <div class="flex flex-col sm:flex-row gap-4">
                    <form action="{{ route('cart.addAllFromWishlist') }}" method="POST" class="flex-1">
                        @csrf
                        <button type="submit"
                            class="w-full bg-primary text-white px-6 py-3 rounded-lg font-medium hover:bg-accent transition-all duration-300 transform hover:scale-[1.02] shadow-md">
                            Add All to Cart
                        </button>
                    </form>
                    <button class="bg-secondary text-white px-6 py-3 rounded-lg font-medium hover:bg-accent transition-colors duration-200"
                        onclick="moveToNewList()">
                        Create New List
                    </button>
                    <button class="bg-gray-200 text-gray-700 px-6 py-3 rounded-lg font-medium hover:bg-gray-300 transition-colors duration-200"
                        onclick="exportWishlist()">
                        Export Wishlist
                    </button>
                </div>
            </div>
        @else
            <!-- Empty State -->
            <div id="empty-wishlist" class="text-center py-16">
                <div class="max-w-md mx-auto">
                    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" class="text-gray-400">
                            <path fill="currentColor"
                                d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5C2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3C19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-600 mb-2">Your wishlist is empty</h3>
                    <p class="text-gray-500 mb-6">Save items you love by clicking the heart icon on products</p>
                    <a href="{{ route('home') }}"
                        class="inline-flex items-center bg-primary text-white px-6 py-3 rounded-lg font-medium hover:bg-accent transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="mr-2">
                            <path fill="currentColor" d="M11 9h2V6h3V4h-3V1h-2v3H8v2h3v3Zm-4 9q-.825 0-1.412-.587Q5 16.825 5 16q0-.825.588-1.413Q6.175 14 7 14t1.412.587Q9 15.175 9 16q0 .825-.588 1.413Q7.825 18 7 18Zm10 0q-.825 0-1.412-.587Q15 16.825 15 16q0-.825.588-1.413Q16.175 14 17 14t1.413.587Q19 15.175 19 16q0 .825-.587 1.413Q17.825 18 17 18ZM7 17q.75 0 1.425-.387Q9.2 16.225 9.5 15.5h6.3q.275.725.95 1.113q.675.387 1.425.387q.75 0 1.425-.387Q20 16.225 20.3 15.5h.2q.425 0 .712-.288q.288-.287.288-.712t-.288-.712Q21.125 13.5 20.7 13.5h-1.15l-3.075-5.5H8.6l-.9-1.5H3.4v2h2.95l3.5 6.075l-1.3 2.325q-.225.4-.037.825q.188.425.638.425H17.5v-2H7.75q-.075 0-.137-.05q-.063-.05-.088-.125l-.025-.075Z"/>
                        </svg>
                        Start Shopping
                    </a>
                </div>
            </div>
        @endif
    </div>
</main>

<script>
    // Additional functions for wishlist page
    function shareWishlist() {
        if (navigator.share) {
            navigator.share({
                title: 'My Wishlist',
                text: 'Check out my favorite items!',
                url: window.location.href
            });
        } else {
            // Fallback - copy to clipboard
            navigator.clipboard.writeText(window.location.href).then(() => {
                if (window.wishlistManager) {
                    window.wishlistManager.showNotification('Wishlist link copied to clipboard!', 'success');
                } else {
                    alert('Wishlist link copied to clipboard!');
                }
            });
        }
    }

    function moveToNewList() {
        const listName = prompt('Enter name for new wishlist:');
        if (listName) {
            if (window.wishlistManager) {
                window.wishlistManager.showNotification(`New wishlist "${listName}" created!`, 'success');
            } else {
                alert(`New wishlist "${listName}" created!`);
            }
        }
    }

    function exportWishlist() {
        const items = Array.from(document.querySelectorAll('.product-item h3')).map(h3 => h3.textContent);
        const csvContent = "data:text/csv;charset=utf-8," + items.join('\n');
        const link = document.createElement("a");
        link.setAttribute("href", encodeURI(csvContent));
        link.setAttribute("download", "my_wishlist.csv");
        link.click();
        if (window.wishlistManager) {
            window.wishlistManager.showNotification('Wishlist exported successfully!', 'success');
        } else {
            alert('Wishlist exported successfully!');
        }
    }

    // Initialize when document is ready
    document.addEventListener('DOMContentLoaded', function() {
        // Make sure wishlist manager is initialized
        if (window.wishlistManager) {
            window.wishlistManager.updateWishlistCount({{ $wishlists->count() }});
        }
    });
</script>
@endsection