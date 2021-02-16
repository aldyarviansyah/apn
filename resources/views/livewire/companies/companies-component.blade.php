<div>
    <div id="ui-specifics">
        <!-- Page specifics -->
        @if(Session::has('msg') && Session::get('msg') == 'data_saved' && Session::has('dataMsg'))
            <livewire:components.message-action :data="Session::get('dataMsg')"/>
        @endif
        @include('livewire.companies.includes.detailAndSearch')
    </div>
    <section id="content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-filters">
                        <div class="row">
                            <!----------------
							Mobile view
							------------------>
                            <div class="col-9 d-sm-none pr-1">
                                <a href="#" class="btn btn-primary btn-block gmod-btn pop-onclick page-options-toggle">
                                    Options
                                    <i data-feather="chevron-down" class="btn-icon btn-icon-right"></i>
                                </a>
                            </div>
                            <div class="col-3 d-sm-none pl-1y">
                                <a href="#" class="btn btn-light btn-block gmod-btn pop-onclick open-tray" data-target="tools-tray">
                                    <i data-feather="settings" class="btn-icon mr-0"></i>
                                </a>
                            </div>

                            <!----------------
                            Desktop & mobile view
                            ------------------>
                            <div class="d-none d-sm-block col-sm-3">
                                <a href="#" class="btn btn-primary btn-block mb-10 gmod-btn pop-onclick open-tray" data-target="tools-tray">
                                    Manage
                                    <i data-feather="chevron-right" class="btn-icon btn-icon-right"></i>
                                </a>
                            </div>

                            <div class="d-none d-sm-block col-6 col-sm-3 pr-xs-1 page-option-item">
                                <a href="#" class="btn {{ $keyword&&$column?'btn-warning':'btn-light' }} btn-block mb-10 gmod-btn pop-onclick open-tray" data-target="ship-search-tray">
                                    <i data-feather="search" class="btn-icon"></i>
                                    Search
                                </a>
                            </div>
                            <div class="d-none d-sm-block col-6 col-sm-3 pl-xs-1 page-option-item">
                                <a href="#" class="btn {{ $category?'btn-warning':'btn-light' }} btn-block mb-10 gmod-btn pop-onclick open-tray" data-target="ship-filter-tray">
                                    <i data-feather="filter" class="btn-icon"></i>
                                    Filter
                                </a>
                            </div>
                            <div class="d-none d-sm-block col-sm-3 page-option-item">
                                <select class="custom-select" wire:model="sort">
                                    <option value="asc">Sort by: Name A-Z</option>
                                    <option value="desc">Sort by: Name Z-A</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    @if($companies->total() > 0)
                        <div class="table-meta" wire:loading.class="d-none" wire:target="previousPage,nextPage">
                            Viewing <span class="black">{{ $companies->lastItem() }}</span> <span>out of</span> <span class="black">{{ $companies->total() }}</span> {{ $title }}
                            @if($keyword||$column||$category)
                                <a href="{{ route('companies') }}" class="table-meta-desc">
                                    <i data-feather="x" class="icon"></i>
                                    Remove {{ $keyword&&$column?'Search':'Filter' }}
                                </a>
                            @endif
                        </div>
                        <div class="table-meta w-100 block" wire:loading wire:target="previousPage,nextPage">
                            <span class="black">Loading...</span>
                        </div>
                    @endif

                    @foreach($companies as $company)
                        <div class="data-row open-view" wire:click="showDetail({{ $company->id }})" wire:key="{{$company->id}}">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="left">
                                        <div class="upper">{{ $company->name }}</div>
                                        <div class="lower">{{ $company->company_type->name }}</div>
                                    </div>
                                </div>
                                <div class="d-none d-sm-block col-sm-6">
                                    <div class="text-right o3">{{ $company->users_count }} contacts</div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    @if($companies->total() > 0)
                        <div class="table-meta-bottom" wire:loading.class="d-none" wire:target="previousPage,nextPage">
                            Viewing <span class="black">{{ $companies->lastItem() }}</span> out of <span class="black">{{ $companies->total() }}</span> {{ $title }}
                        </div>
                        <div class="table-meta w-100 block" wire:loading wire:target="previousPage,nextPage">
                            <span class="black">Loading...</span>
                        </div>
                    @endif
                    @if(count($companies)==0)
                        <div class="table-meta text-center border-bottom">
                            <span class="black">Data not found</span>
                            @if($keyword||$column||$category)
                                <a href="{{ route('companies') }}" class="table-meta-desc">
                                    <i data-feather="x" class="icon"></i>
                                    Remove {{ $keyword&&$column?'Search':'Filter' }}
                                </a>
                            @endif
                        </div>
                    @endif

                    {{ $companies->links('vendor.pagination.hms-livewire') }}

                </div>
            </div>
        </div>
    </section>

</div>
