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
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center py-10">
        <div class="text-white px-6">
            <p class="text-secondary font-semibold mb-2">{{ $badge }}</p>
            <h2 class="text-4xl md:text-5xl font-heading font-bold mb-4">{{ $title }}</h2>
            <p class="mb-6">{{ $description }}</p>
            <a href="{{ $buttonLink }}" class="bg-secondary text-white px-6 py-3 rounded-full font-medium inline-flex items-center">
                {{ $buttonText }}
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="ml-2" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M17.92 11.62a1 1 0 0 0-.21-.33l-5-5a1 1 0 0 0-1.42 1.42l3.3 3.29H7a1 1 0 0 0 0 2h7.59l-3.3 3.29a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0l5-5a1 1 0 0 0 .21-.33a1 1 0 0 0 0-.76Z" />
                </svg>
            </a>
        </div>
        <div class="flex justify-center">
            <img src="{{ asset($image) }}" alt="{{ $imageAlt }}" class="rounded-2xl shadow-xl">
        </div>
    </div>
</div>