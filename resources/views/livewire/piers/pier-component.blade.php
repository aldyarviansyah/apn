<div>
    <div id="ui-specifics">
        <!-- Page specifics -->
        @if(Session::has('msg') && Session::get('msg') == 'data_saved' && Session::has('dataMsg'))
            <livewire:components.message-action :data="Session::get('dataMsg')"/>
        @endif
        @include('livewire.piers.includes.detail')
        @include('livewire.piers.includes.filter')
    </div>
    <section id="content" class="pier-table">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <div class="table-filters">
                        <div class="row">
                            <div class="col-12 d-sm-none">
                                <a href="#" class="btn btn-primary btn-block gmod-btn pop-onclick page-options-toggle">
                                    Options
                                    <i data-feather="chevron-down" class="btn-icon btn-icon-right"></i>
                                </a>
                            </div>
                            <div class="d-none d-sm-block col-sm-6 page-option-item">
                                <a href="{{ route('piers.create') }}" class="btn btn-primary btn-block mb-10 gmod-btn add-spinner white-spinner pop-onclick">
                                    <i data-feather="plus" class="btn-icon"></i>
                                    New
                                </a>
                            </div>
                            <div class="d-none d-sm-block col-12 col-sm-6 page-option-item">
                                <a href="#" class="btn {{ $pier_category_id?'btn-warning':'btn-light' }} btn-block mb-10 gmod-btn pop-onclick open-tray" data-target="pa-inbox-filter-tray">
                                    <i data-feather="filter" class="btn-icon"></i>
                                    Filter
                                </a>
                            </div>
                        </div>
                    </div>

                    @if(count($piers) > 0)
                        <div class="table-meta">
                            Viewing <span class="black">{{ count($piers) }}</span> <span>out of</span> <span class="black">{{ count($piers) }}</span> items
                            @if($pier_category_id)
                                <a href="{{ route('piers') }}" class="table-meta-desc">
                                    <i data-feather="x" class="icon"></i>
                                    Remove Filter
                                </a>
                            @endif
                        </div>
                    @endif

                    <div class="piers-slots-container">
                        <div class="row no-gutters">
                            @foreach($piers as $key => $pier)
                                <div class="col-3 col-md-2 col-lg-1" wire:click="showDetail({{ $pier->id }})" wire:key="{{ $pier->id }}">
                                    <div class="pier-box open-view">
                                        <div class="number">
                                            {{ $pier->number }}
                                        </div>
                                        <div class="lineup">
{{--                                            <div class="icon"></div>--}}
                                            <!-- <div class="icon"></div> -->
                                            <!-- <div class="icon"></div> -->
                                            <!-- <div class="icon"></div> -->
                                            <!-- <div class="icon"></div> -->
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    @if(count($piers) > 0)
                        <div class="table-meta-bottom">
                            Viewing <span class="black">{{ count($piers) }}</span> out of <span class="black">{{ count($piers) }}</span> items
                        </div>
                    @endif
                    @if(count($piers)==0)
                        <div class="table-meta text-center border-bottom">
                            <span class="black">Data not found</span>
                        </div>
                    @endif

                    <div class="mt-50"></div>

                    <a href="#ui-general"><i data-feather="corner-left-up" class="footer-link-icon"></i>Back to top</a>

                </div>
            </div>
        </div>
    </section>
</div>
