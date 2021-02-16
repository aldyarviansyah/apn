<div>
    <div id="ui-specifics">
        <!-- Page specifics -->
        @include('livewire.users.includes.detail')
        @include('livewire.users.includes.filter')
        @if(Session::has('msg') && Session::get('msg') == 'user_saved' && Session::has('dataMsg'))
            <livewire:components.message-action :data="Session::get('dataMsg')"/>
        @endif
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
                                    @lang('global.options')
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
                                    @lang('global.manage')
                                    <i data-feather="chevron-right" class="btn-icon btn-icon-right"></i>
                                </a>
                            </div>
                            <div class="col-6 d-none d-sm-block col-sm-3 page-option-item pr-xs-1">
                                <a href="#" class="btn {{ $keyword&&$column?'btn-warning':'btn-light' }} btn-block mb-10 gmod-btn pop-onclick open-tray" data-target="user-search-tray">
                                    <i data-feather="search" class="btn-icon"></i>
                                    @lang('global.search')
                                </a>
                            </div>
                            <div class="col-6 d-none d-sm-block col-sm-3 page-option-item pl-xs-1">
                                <a href="#" class="btn {{ $role_id?'btn-warning':'btn-light' }} btn-block mb-10 gmod-btn pop-onclick open-tray" data-target="user-filter-tray">
                                    <i data-feather="filter" class="btn-icon"></i>
                                    @lang('global.filter')
                                </a>
                            </div>
                            <div class="d-none d-sm-block col-sm-3 page-option-item">
                                <select class="custom-select" wire:model="sort">
                                    <option value="asc">@lang('global.sort_by'): @lang('global.sort_name_a_z')</option>
                                    <option value="desc">@lang('global.sort_by'): @lang('global.sort_name_z_a')</option>
                                    <option value="latest">@lang('global.sort_by'): @lang('global.sort_latest')</option>
                                </select>
                            </div>

                        </div>
                    </div>

                    @if($users->total()>0)
                        <div class="table-meta" wire:loading.class="d-none" wire:target="previousPage,nextPage">
                            @lang('global.viewing') <span class="black">{{ $users->lastItem()??0 }}</span> <span>@lang('global.out_of')</span> <span class="black">{{ $users->total() }}</span> @lang('global.users')
                            @if($role_id||$keyword||$column)
                                <a href="{{ route('users') }}" class="table-meta-desc">
                                    <i data-feather="x" class="icon"></i>
                                    @lang('global.remove') {{ $keyword&&$column?__('global.search'):__('global.filter') }}
                                </a>
                            @endif
                        </div>
                        <div class="table-meta w-100 block" wire:loading wire:target="previousPage,nextPage">
                            <span class="black">@lang('global.loading')...</span>
                        </div>
                    @endif
                    @foreach($users as $key => $user)
                        <div class="data-row row-user open-user-info" wire:click="showDetail({{ $user->id }})" wire:key="{{ $user->id }}">
                            <div class="left">
                                <div class="upper">
                                    <div class="thumb"><img src="{{ $user->image }}"></div>
                                    <div class="inner">{{ $user->full_name }} <br> <span class="user-row-meta">{{ $user->role }}</span></div>
                                </div>
                            </div>
                            <div class="right">
                                <i data-feather="chevron-right" class="icon"></i>
                            </div>
                        </div>
                    @endforeach
                    @if($users->total()>0)
                        <div class="table-meta-bottom" wire:loading.class="d-none" wire:target="previousPage,nextPage">
                            @lang('global.viewing') <span class="black">{{ $users->lastItem()??0 }}</span> @lang('global.out_of') <span class="black">{{ $users->total() }}</span> @lang('global.users')
                        </div>
                        <div class="table-meta w-100 block" wire:loading wire:target="previousPage,nextPage">
                            <span class="black">@lang('global.loading')...</span>
                        </div>
                    @endif
                    @if(count($users)==0)
                        <div class="table-meta text-center border-bottom">
                            <span class="black">@lang('global.data_not_found')</span>
                            @if($role_id||$keyword||$column)
                                <a href="{{ route('users') }}" class="table-meta-desc">
                                    <i data-feather="x" class="icon"></i>
                                    @lang('global.remove') {{ $keyword&&$column?__('global.search'):__('global.filter') }}
                                </a>
                            @endif
                        </div>
                    @endif

                    {{ $users->links('vendor.pagination.hms-livewire') }}

                </div>
            </div>
        </div>
    </section>
</div>
