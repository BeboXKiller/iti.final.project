@props([
    'badge' => 'LIMITED OFFER',
    'title' => 'Up to 50% Off Sale',
    'description' => 'Don\'t miss our biggest sale of the season. Limited stock available!',
    'buttonText' => 'Shop Sale',
    'buttonLink' => '#',
    'image' => 'assets/images/pexels-laryssa-suaid-798122-1667088.jpg',
    'imageAlt' => 'Sale'
])

<div {{ $attributes->merge(['class' => 'swiper-slide']) }}>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center py-6 md:py-8">
        <!-- Content Section -->
        <div class="px-6 md:px-8 order-2 md:order-1">
            <span class="inline-block bg-secondary text-white px-3 py-1 rounded-full text-sm font-semibold mb-3">
                {{ $badge }}
            </span>
            <h2 class="text-2xl md:text-4xl font-heading font-bold text-gray-900 mb-3 leading-tight">
                {{ $title }}
            </h2>
            <p class="text-gray-600 mb-4 max-w-md">{{ $description }}</p>
            <a href="{{ $buttonLink }}" 
               class="bg-primary text-white px-6 py-3 rounded-lg font-medium inline-flex items-center gap-2 shadow-md hover:bg-accent transition-all duration-300">
                {{ $buttonText }}
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M17.92 11.62a1 1 0 0 0-.21-.33l-5-5a1 1 0 0 0-1.42 1.42l3.3 3.29H7a1 1 0 0 0 0 2h7.59l-3.3 3.29a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0l5-5a1 1 0 0 0 .21-.33a1 1 0 0 0 0-.76Z" />
                </svg>
            </a>
        </div>
        
        <!-- Image Section -->
        <div class="flex justify-center order-1 md:order-2">
            <img src="{{ asset($image) }}" alt="{{ $imageAlt }}" 
                 class="rounded-xl shadow-lg w-full max-w-xs md:max-w-sm lg:max-w-md">
        </div>
    </div>
</div>