@if ($paginator->hasPages())
    <!-- Pagination -->
    <ul class="pagination">
        @if ($paginator->onFirstPage())
            <li><a title="Следуюшая страница" href="{{ $paginator->nextPageurl() }}" class="button large next">></a></li>
        @elseif($paginator->onLastPage())
            <li>
                <a title="Предыдущая страница" href="{{ $paginator->previousPageUrl() }}" class=" button large previous"><</a>
            </li>
        @else
            <li>
                <a title="Предыдущая страница" href="{{ $paginator->previousPageUrl() }}" class=" button large previous"><</a>
            </li>
            <li>
                <a title="Следуюшая страница" href="{{ $paginator->nextPageurl() }}" class="button large next">></a>
            </li>
        @endif
    </ul>
@endif
