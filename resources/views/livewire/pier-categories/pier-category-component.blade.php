<div>
    <div id="ui-specifics">
        <!-- Page specifics -->
        @if(Session::has('msg') && Session::get('msg') == 'data_saved' && Session::has('dataMsg'))
            <livewire:components.message-action :data="Session::get('dataMsg')"/>
        @endif
        @include('livewire.pier-categories.includes.detail')
    </div>
    <section id="content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-filters">
                        <div class="row">
                            <div class="col-sm-12">
                                <a href="{{ route('pier-categories.create') }}" class="btn btn-primary btn-block mb-10 gmod-btn add-spinner white-spinner pop-onclick">
                                    <i data-feather="plus" class="btn-icon"></i>
                                    New
                                </a>
                            </div>
                        </div>
                    </div>
                    @if($categories->total() > 0)
                        <div class="table-meta" wire:loading.class="d-none" wire:target="previousPage,nextPage">
                            Viewing <span class="black">{{ $categories->lastItem() }}</span> <span>out of</span> <span class="black">{{ $categories->total() }}</span> {{ $title }}
                        </div>
                        <div class="table-meta w-100 block" wire:loading wire:target="previousPage,nextPage">
                            <span class="black">Loading...</span>
                        </div>
                    @endif
                    @foreach($categories as $category)
                        <div class="data-row open-view" wire:click="showDetail({{ $category->id }})" wire:key="{{ $category->id }}">
                            <div class="left">
                                <div class="upper">
                                    <div class="inner">{{ $category->name }}<br> <span class="user-row-meta">{{ $category->piers_count }} piers</span></div>
                                </div>
                            </div>
                            <div class="right">
                                <i data-feather="chevron-right" class="icon"></i>
                            </div>
                        </div>
                    @endforeach
                    @if($categories->total() > 0)
                        <div class="table-meta-bottom" wire:loading.class="d-none" wire:target="previousPage,nextPage">
                            Viewing <span class="black">{{ $categories->lastItem() }}</span> out of <span class="black">{{ $categories->total() }}</span> {{ $title }}
                        </div>
                        <div class="table-meta w-100 block" wire:loading wire:target="previousPage,nextPage">
                            <span class="black">Loading...</span>
                        </div>
                    @endif
                    @if(count($categories)==0)
                        <div class="table-meta text-center border-bottom">
                            <span class="black">Data not found</span>
                        </div>
                    @endif
                    {{ $categories->links('vendor.pagination.hms-livewire') }}
                </div>
            </div>
        </div>
    </section>
</div>
