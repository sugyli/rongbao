@if ($paginator->hasPages())
    <ul class="pagelink">
        <em id="pagestats">{{$paginator->currentPage()}}/{{$paginator->lastPage()}}</em>
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a href="javascript:" class="pgroup">&laquo;</a>
        @else
            <a href="{{ route('web.dashubaotop', ['any'=>$any , 'id' => $id ,'page' =>($paginator->currentPage()-1) ],false ) }}" class="pgroup">&laquo;</a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <strong>{{ $element }}</strong>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <strong>{{ $page }}</strong>
                    @else
                        <a href="{{ route('web.dashubaotop', ['any'=>$any , 'id' => $id ,'page' =>$page ] ,false) }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ route('web.dashubaotop', ['any'=>$any , 'id' => $id ,'page' =>($paginator->currentPage()+1) ] ,false) }}" class="next">&raquo;</a>
        @else
            <a href="javascript:" class="next">&raquo;</a>
        @endif
    </ul>
@endif
