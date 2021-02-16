@if ($paginator->hasPages())
    <div class="table-pagination-bottom mt-20">
        <div class="row no-gutters">
            <div class="col-3 pr-1">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <a href="javascript:void(0)" class="btn btn-light disabled btn-block mb-10 gmod-btn pop-onclick">
                        Prev
                    </a>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-primary btn-block mb-10 gmod-btn add-spinner white-spinner pop-onclick">
                        Prev
                    </a>
                @endif
            </div>
            <div class="col-6 pr-1 pl-1">
                <a href="javascript:void(0)" class="btn btn-light disabled btn-block mb-10 gmod-btn pop-onclick">
                    Page {{ $paginator->currentPage() }} of {{ $paginator->lastPage() }}
                </a>
            </div>
            <div class="col-3 pl-1">
                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-primary btn-block mb-10 gmod-btn add-spinner white-spinner pop-onclick">
                        Next
                    </a>
                @else
                    <a href="javascript:void(0)" class="btn btn-light disabled btn-block mb-10 gmod-btn pop-onclick">
                        Next
                    </a>
                @endif
            </div>
        </div>
    </div>
@endif
