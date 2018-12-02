@if ($paginator->hasPages())
    <div class="paginator">
        @if ($paginator->onFirstPage())
            <span class="page-item disabled">Prev. page</span>
        @else
            <span class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}"><< Prev. page</a>
            </span>
        @endif

        @if ($paginator->hasMorePages())
            <span class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}">Next page >></a>
            </span>
        @else
            <span class="page-item disabled">Next page</span>
        @endif
    </div>
@endif
