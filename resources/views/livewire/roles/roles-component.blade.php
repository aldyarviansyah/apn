<div>
    <div id="ui-specifics">
        <!-- Page specifics -->
        @if(Session::has('msg') && Session::get('msg') == 'role_saved' && Session::has('dataMsg'))
            <livewire:components.message-action :data="Session::get('dataMsg')"/>
        @endif
        @include('livewire.roles.includes.detail')
    </div>
    <section id="content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-filters">
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="{{ route('roles.create') }}" class="btn btn-primary btn-block mb-10 gmod-btn add-spinner white-spinner pop-onclick">
                                    <i data-feather="plus" class="btn-icon"></i>
                                    @lang('global.new')
                                </a>
                            </div>

                            <div class="col-sm-6">
                                <select class="custom-select" wire:model="sort">
                                    <option value="highest">@lang('global.sort_lowest')</option>
                                    <option value="a-z">@lang('global.sort_a_z')</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    @if($roles->total() > 0)
                        <div class="table-meta" wire:loading.class="d-none" wire:target="previousPage,nextPage">
                            @lang('global.viewing') <span class="black">{{ $roles->lastItem() }}</span> <span>@lang('global.out_of')</span> <span class="black">{{ $roles->total() }}</span> {{ $title }}
                        </div>
                        <div class="table-meta w-100 block" wire:loading wire:target="previousPage,nextPage">
                            <span class="black">@lang('global.loading')...</span>
                        </div>
                    @endif
                    @foreach($roles as $key => $role)
                        <div class="data-row open-view" wire:click="showDetail({{ $role->id }})" wire:key="{{$role->id}}">
                            <div class="left">
                                <div class="upper">
                                    <div class="inner">{{ $role->name }} <span class="o3 fw-600">( {{ $role->users_count }} )</span></div>
                                </div>
                            </div>
                            <div class="right">
                                <i data-feather="chevron-right" class="icon"></i>
                            </div>
                        </div>
                    @endforeach
                    @if($roles->total() > 0)
                        <div class="table-meta-bottom" wire:loading.class="d-none" wire:target="previousPage,nextPage">
                            @lang('global.viewing') <span class="black">{{ $roles->lastItem() }}</span> @lang('global.out_of') <span class="black">{{ $roles->total() }}</span> {{ $title }}
                        </div>
                        <div class="table-meta w-100 block" wire:loading wire:target="previousPage,nextPage">
                            <span class="black">@lang('global.loading')...</span>
                        </div>
                    @endif
                    @if(count($roles)==0)
                        <div class="table-meta text-center border-bottom">
                            <span class="black">@lang('global.data_not_found')</span>
                        </div>
                    @endif

                    {{ $roles->links('vendor.pagination.hms-livewire') }}

                </div>
            </div>
        </div>
    </section>

</div>
