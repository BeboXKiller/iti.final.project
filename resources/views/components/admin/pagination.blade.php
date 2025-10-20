@props([
    'paginator' => null,
    'previousText' => '<< Previous',
    'nextText' => 'Next >>',
    'containerClass' => 'flex justify-center mt-6',
    'navClass' => 'flex items-center space-x-2',
    'activeClass' => 'px-3 py-2 rounded-lg border border-primary bg-primary text-white',
    'inactiveClass' => 'px-3 py-2 rounded-lg border border-gray-200 text-gray-500 hover:bg-primary hover:text-white',
    'disabledClass' => 'px-3 py-2 rounded-lg border border-gray-200 text-gray-500'
])

@if ($paginator && $paginator->hasPages())
<div class="{{ $containerClass }}">
    <nav class="{{ $navClass }}">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="{{ $disabledClass }}">{{ $previousText }}</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="{{ $inactiveClass }}">{{ $previousText }}</a>
        @endif

        {{-- Page Number Links --}}
        @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
            @if ($page == $paginator->currentPage())
                <span class="{{ $activeClass }}">{{ $page }}</span>
            @else
                <a href="{{ $url }}" class="{{ $inactiveClass }}">{{ $page }}</a>
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="{{ $inactiveClass }}">{{ $nextText }}</a>
        @else
            <span class="{{ $disabledClass }}">{{ $nextText }}</span>
        @endif
    </nav>
</div>
@endif
