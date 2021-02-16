<div>
    <div id="ui-specifics">
        <!-- Page specifics -->
        @if(Session::has('msg') && Session::get('msg') == 'data_saved' && Session::has('dataMsg'))
            <livewire:components.message-action :data="Session::get('dataMsg')"/>
        @endif
        @include('livewire.access-requests.includes.detailSeachAndFilter')
    </div>
    <section id="content" class="access-request-public">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-filters">
                        <div class="row">
                            <div class="col-12 d-sm-none">
                                <a href="#" class="btn btn-primary btn-block gmod-btn pop-onclick page-options-toggle">
                                    {{ __('global.options') }}
                                    <i data-feather="chevron-down" class="btn-icon btn-icon-right"></i>
                                </a>
                            </div>
                            <div class="col-sm-4 d-none d-sm-block page-option-item">
                                <a href="#" class="btn {{ $keyword&&$column?'btn-light':'btn-warning' }} btn-block mb-10 gmod-btn pop-onclick open-tray" data-target="filter-tray">
                                    <i data-feather="filter" class="btn-icon"></i>
                                    {{ __('global.filter') }}
                                </a>
                            </div>
                            <div class="col-sm-4 d-none d-sm-block page-option-item">
                                <a href="#" class="btn {{ $keyword&&$column?'btn-warning':'btn-light' }} btn-block mb-10 gmod-btn pop-onclick open-tray" data-target="search-tray">
                                    <i data-feather="search" class="btn-icon"></i>
                                    {{ __('global.search') }}
                                </a>
                            </div>
                            <div class="col-sm-4 d-none d-sm-block page-option-item">
                                <select class="custom-select" wire:model="sort">
                                    <option value="latest">{{ __('global.sort_by') }}: {{ __('global.sort_latest') }}</option>
                                    <option value="asc">{{ __('global.sort_by') }}: {{ __('global.sort_name_a_z') }}</option>
                                    <option value="desc">{{ __('global.sort_by') }}: {{ __('global.sort_name_z_a') }}</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    @if($accessRequests->total() > 0)
                        <div class="table-meta" wire:loading.class="d-none" wire:target="previousPage,nextPage">
                            {{ __('global.viewing') }} <span class="black">{{ $accessRequests->lastItem() }}</span> <span>{{ __('global.out_of') }}</span> <span class="black">{{ $accessRequests->total() }}</span> {{ $status }} {{ $title }}
                            @if($keyword||$column)
                                <a href="{{ route('access-requests') }}" class="table-meta-desc">
                                    <i data-feather="x" class="icon"></i>
                                    {{ __('global.remove_search') }}
                                </a>
                            @endif
                        </div>
                        <div class="table-meta w-100 block" wire:loading wire:target="previousPage,nextPage">
                            <span class="black">{{ __('global.loading') }}...</span>
                        </div>
                    @endif

                    @foreach($accessRequests as $accessRequest)
                        <div class="data-row open-view-pending" wire:click="showDetail({{ $accessRequest->id }})" wire:key="{{$accessRequest->id}}">
                            <div class="left pr-3">
                                <div class="upper">
                                    <div class="inner">{{ $accessRequest->name }}</div>
                                </div>
                                <div class="lower">{{ $accessRequest->company_name }} ({{ $accessRequest->company_position }})</div>
                            </div>
                            <div class="right">
                                <i data-feather="chevron-right" class="icon"></i>
                            </div>
                        </div>
                    @endforeach

                    @if($accessRequests->total() > 0)
                        <div class="table-meta-bottom" wire:loading.class="d-none" wire:target="previousPage,nextPage">
                            {{ __('global.viewing') }} <span class="black">{{ $accessRequests->lastItem() }}</span> {{ __('global.out_of') }} <span class="black">{{ $accessRequests->total() }}</span> {{ $status }} {{ $title }}
                        </div>
                        <div class="table-meta w-100 block" wire:loading wire:target="previousPage,nextPage">
                            <span class="black">{{ __('global.loading') }}...</span>
                        </div>
                    @endif
                    @if(count($accessRequests)==0)
                        <div class="table-meta text-center border-bottom">
                            <span class="black">{{ __('global.data_not_found') }}</span>
                            @if($keyword||$column)
                                <a href="{{ route('access-requests') }}" class="table-meta-desc">
                                    <i data-feather="x" class="icon"></i>
                                    {{ __('global.remove_search') }}
                                </a>
                            @endif
                        </div>
                    @endif
                    {{ $accessRequests->links('vendor.pagination.hms-livewire') }}
                </div>
            </div>
        </div>
    </section>
</div>
