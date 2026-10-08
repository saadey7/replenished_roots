@if ($paginator->hasPages())
<style>
    /* make the whole circle clickable, not just the number / arrow */
    .pagination li {
        position: relative;
        cursor: pointer;
    }
    .pagination li a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
        position: static;
    }
    /* stretch the link over the whole <li>, so a click anywhere on it works */
    .pagination li a::after {
        content: "";
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
    }
</style>
<div class="center">
    <ul class="pagination">

        {{-- Previous Page Link --}}
        @if (!$paginator->onFirstPage())
        <li class="prev">
            <a href="{{ $paginator->previousPageUrl() }}"><i class="fa-solid fa-angle-left"></i></a>
        </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- Dots --}}
            @if (is_string($element))
            <li><a href="javascript:void(0);">{{ $element }}</a></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                    <li class="active"><a href="javascript:void(0);" class="current">{{ $page }}</a></li>
                    @else
                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li class="next">
            <a href="{{ $paginator->nextPageUrl() }}"><i class="fa-solid fa-angle-right"></i></a>
        </li>
        @endif

    </ul>
</div>
@endif