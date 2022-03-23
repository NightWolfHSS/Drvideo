<!-- this is pagination - CUSTOM -->
@if ($paginator->hasPages())
    <ul class="pagination">

        @if ($paginator->onFirstPage())
            <a class="disabled prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="prev-arrow" rel="prev"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
        @endif
        
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page === $paginator->currentPage())
                        <a class="active">{{ $page }}</a>
                    @elseif (($page === $paginator->currentPage() - 1 || $page === $paginator->currentPage() + 1)
                    || $page === $paginator->lastPage())
                         <a href="{{ $url }}">{{ $page }}</a>
                    @elseif ($page === $paginator->lastPage() - 1)
                        <a class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
                    @endif
                @endforeach
            @endif
        @endforeach
  
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
        @else
            <a class="disabled next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
        @endif
    </ul>
@endif 

