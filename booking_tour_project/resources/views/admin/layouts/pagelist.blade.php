@if($paginator->hasPages())
    <ul class="pagination">
        <!-- Prevoius Page Link -->
        @if($paginator->onFirstPage())
            <li><a class="page-link ml-2"><span>&laquo;</span></a></li>
        @else
            <li class="page-item ml-2"><a href="{{ $paginator->previousPageUrl() }}" class="page-link" rel="prev">&laquo;</a></li>
        @endif

    <!-- Pagination Elements Here -->
        @foreach($elements as $element)
        <!-- Make three dots -->
            @if(is_string($element))
                <li class="page-item disabled ml-2"><a  class="page-link"><span>{{$element}}</span></a></li>
            @endif

        <!-- Links Array Here -->
            @if(is_array($element))
                @foreach($element as $page=>$url)

                    @if($page == $paginator->currentPage())
                        <li class="page-item active ml-2"><a class="page-link"><span>{{ $page }}</span></a></li>
                    @else
                        <li class="page-item ml-2"><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
                    @endif

                @endforeach
            @endif

        @endforeach

    <!-- Next Page Link -->
        @if($paginator->hasMorePages())
            <li class="page-item ml-2"><a href="{{ $paginator->nextPageUrl() }}" class="page-link"><span>&raquo;</span></a></li>
        @else
            <li class="page-item disabled ml-2"><a class="page-link"><span>&raquo;</span></a></li>
        @endif
    </ul>

@endif
