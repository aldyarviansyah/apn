<div>
    <div id="ui-specifics">
        <!-- Page specifics -->
        @if(Session::has('msg') && Session::get('msg') == 'data_saved' && Session::has('dataMsg'))
            <livewire:components.message-action :data="Session::get('dataMsg')"/>
        @endif
        @include('livewire.boats.includes.detailAndSearch')
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
                            <div class="d-none d-sm-block col-sm-4">
                                <a href="#" class="btn btn-primary btn-block mb-10 gmod-btn pop-onclick open-tray" data-target="tools-tray">
                                    Manage
                                    <i data-feather="chevron-right" class="btn-icon btn-icon-right"></i>
                                </a>
                            </div>
                            <div class="d-none d-sm-block col-sm-4 page-option-item">
                                <a href="#" class="btn {{ $keyword&&$column?'btn-warning':'btn-light' }} btn-block mb-10 gmod-btn pop-onclick open-tray" data-target="ship-search-tray">
                                    <i data-feather="search" class="btn-icon"></i>
                                    Search
                                </a>
                            </div>
                            <div class="d-none d-sm-block col-sm-4 page-option-item">
                                <select class="custom-select" wire:model="sort">
                                    <option value="asc">Sort by: Name A-Z</option>
                                    <option value="desc">Sort by: Name Z-A</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    @if($boats->total() > 0)
                        <div class="table-meta" wire:loading.class="d-none" wire:target="previousPage,nextPage">
                            Viewing <span class="black">{{ $boats->lastItem() }}</span> <span>out of</span> <span class="black">{{ $boats->total() }}</span> {{ $title }}
                            @if($keyword||$column)
                                <a href="{{ route('boats') }}" class="table-meta-desc">
                                    <i data-feather="x" class="icon"></i>
                                    Remove Search
                                </a>
                            @endif
                        </div>
                        <div class="table-meta w-100 block" wire:loading wire:target="previousPage,nextPage">
                            <span class="black">Loading...</span>
                        </div>
                    @endif

                    @foreach($boats as $boat)
                        <div class="data-row open-view" wire:click="showDetail({{ $boat->id }})" wire:key="{{$boat->id}}">
                            <div class="left">
                                <div class="upper">
                                    <div class="inner">{{ $boat->name }}</div>
                                </div>
                            </div>
                            <div class="right">
                                <i data-feather="chevron-right" class="icon"></i>
                            </div>
                        </div>
                    @endforeach

                    @if($boats->total() > 0)
                        <div class="table-meta-bottom" wire:loading.class="d-none" wire:target="previousPage,nextPage">
                            Viewing <span class="black">{{ $boats->lastItem() }}</span> out of <span class="black">{{ $boats->total() }}</span> {{ $title }}
                        </div>
                        <div class="table-meta w-100 block" wire:loading wire:target="previousPage,nextPage">
                            <span class="black">Loading...</span>
                        </div>
                    @endif
                    @if(count($boats)==0)
                        <div class="table-meta text-center border-bottom">
                            <span class="black">Data not found</span>
                            @if($keyword||$column)
                                <a href="{{ route('boats') }}" class="table-meta-desc">
                                    <i data-feather="x" class="icon"></i>
                                    Remove Search
                                </a>
                            @endif
                        </div>
                    @endif

                    {{ $boats->links('vendor.pagination.hms-livewire') }}

                </div>
            </div>
        </div>
    </section>

</div>
