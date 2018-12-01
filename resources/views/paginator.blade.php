@if ($paginator->hasPages())
    <div class="paginator">
        @if ($paginator->onFirstPage())
            <span class="page-item disabled" title="Prev. page">&lt;</span>
        @else
            <span class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" title="Prev. page">&lt;</a>
            </span>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="page-item disabled"><span class="page-link">{{ $element }}</span></span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="page-item active"><span class="page-link">{{ $page }}</span></span>
                    @else
                        <span class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></span>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <span class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" title="Next page">&gt;</a>
            </span>
        @else
            <span class="page-item disabled" title="Next page">&gt;</span>
        @endif
    </div>
@endif
