@if ($paginator->hasPages())
    <nav>
        <div class="flex-1 flex gap-2 items-center justify-between">

            <div>
                <p class="text-sm text-primary-content">
                    Mostrando
                    @if ($paginator->firstItem())
                        {{ $paginator->firstItem() }}
                        -
                        {{ $paginator->lastItem() }}
                    @else
                        {{ $paginator->count() }}
                    @endif
                    de
                    {{ $paginator->total() }}
                    resultados
                </p>
            </div>

            <div>
                <span class="join">

                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" aria-label="anterior">
                            <span class="cursor-not-allowed join-item btn" aria-hidden="true">
                                «
                            </span>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="join-item btn"
                            aria-label="anterior">
                            «
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span class="join-item btn">{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <span class="join-item btn btn-primary">{{ $page }}</span>
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="join-item btn"
                                        aria-label="{{ 'Ir a la página' . $page }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="join-item btn"
                            aria-label="siguiente">
                            »
                        </a>
                    @else
                        <span aria-disabled="true" aria-label="siguiente">
                            <span class="cursor-not-allowed join-item btn" aria-hidden="true">
                                »
                            </span>
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif
