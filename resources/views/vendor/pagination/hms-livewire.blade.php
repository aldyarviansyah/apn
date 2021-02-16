@if ($paginator->hasPages())
    <div class="table-pagination-bottom mt-20">
        <div class="row no-gutters">
            <div class="col-3 pr-1">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <a href="javascript:void(0)" class="btn btn-light disabled btn-block mb-10 gmod-btn pop-onclick">
                        {{ __('pagination.previous') }}
                    </a>
                @else
                    <a href="javascript:void(0)" wire:click="previousPage" class="to-top btn btn-primary btn-block mb-10 gmod-btn add-spinner white-spinner pop-onclick">
                        {{ __('pagination.previous') }}
                    </a>
                @endif
            </div>
            <div class="col-6 pr-1 pl-1">
                <a href="javascript:void(0)" class="btn btn-light disabled btn-block mb-10 gmod-btn pop-onclick">
                    {{ __('pagination.page') }} {{ $paginator->currentPage() }} {{ __('pagination.of') }} {{ $paginator->lastPage() }}
                </a>
            </div>
            <div class="col-3 pl-1">
                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <a href="javascript:void(0)" wire:click="nextPage" class="to-top btn btn-primary btn-block mb-10 gmod-btn add-spinner white-spinner pop-onclick">
                        {{ __('pagination.next') }}
                    </a>
                @else
                    <a href="javascript:void(0)" class="btn btn-light disabled btn-block mb-10 gmod-btn pop-onclick">
                        {{ __('pagination.next') }}
                    </a>
                @endif
            </div>
        </div>
    </div>
@endif
