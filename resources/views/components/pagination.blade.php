@if ($customers->hasPages())
<div class="flex justify-center mt-6">
    <nav class="flex items-center space-x-2">
        {{-- Previous --}}
        @if ($customers->onFirstPage())
            <span class="px-3 py-2 rounded-lg border border-gray-200 text-gray-500">&laquo; Previous</span>
        @else
            <a href="{{ $customers->previousPageUrl() }}" class="px-3 py-2 rounded-lg border border-gray-200 text-gray-500 hover:bg-primary hover:text-white">&laquo; Previous</a>
        @endif

        {{-- Page Links --}}
        @foreach ($customers->getUrlRange(1, $customers->lastPage()) as $page => $url)
            @if ($page == $customers->currentPage())
                <span class="px-3 py-2 rounded-lg border border-primary bg-primary text-white">{{ $page }}</span>
            @else
                <a href="{{ $url }}" class="px-3 py-2 rounded-lg border border-gray-200 text-gray-500 hover:bg-primary hover:text-white">{{ $page }}</a>
            @endif
        @endforeach

        {{-- Next --}}
        @if ($customers->hasMorePages())
            <a href="{{ $customers->nextPageUrl() }}" class="px-3 py-2 rounded-lg border border-gray-200 text-gray-500 hover:bg-primary hover:text-white">Next &raquo;</a>
        @else
            <span class="px-3 py-2 rounded-lg border border-gray-200 text-gray-500">Next &raquo;</span>
        @endif
    </nav>
</div>
@endif
