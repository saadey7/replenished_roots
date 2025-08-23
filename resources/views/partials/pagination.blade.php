@if ($paginator->hasPages())
<div class="pagination-wrap">
    <ul class="list-wrap">

        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <li class="prv-next disabled">
            <span><i class="fas fa-angle-double-left"></i></span>
        </li>
        @else
        <li class="prv-next">
            <a href="{{ $paginator->previousPageUrl() }}"><i class="fas fa-angle-double-left"></i></a>
        </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- Dots --}}
        @if (is_string($element))
        <li><span>{{ $element }}</span></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li><a href="javascript:void(0);" class="current">{{ $page }}</a></li>
        @else
        <li><a href="{{ $url }}">{{ $page }}</a></li>
        @endif
        @endforeach
        @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li class="prv-right">
            <a href="{{ $paginator->nextPageUrl() }}"><i class="fas fa-angle-double-right"></i></a>
        </li>
        @else
        <li class="prv-right disabled">
            <span><i class="fas fa-angle-double-right"></i></span>
        </li>
        @endif

    </ul>
</div>
@endif