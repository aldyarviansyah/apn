<div class="tray-views">
    <div class="ui-tray data-info {{ $detail?'active':'' }}" wire:loading.class="loading" wire:target="showDetail">
        <div class="data-info-head">
            <i data-feather="chevron-left" class="data-info-close close-all-tray"></i>
            <h2>Pier Detail</h2>
        </div>
        <div class="data-info-spinner-container">
            <div class="spinner-border"></div>
        </div>
        @if($detail)
            <div class="data-info-body">

                <div class="data-info-body-title">
                    <h3>Pier {{ $detail->number }}</h3>
                    <div class="meta">{{ $detail->category->name }}</div>
                </div>

                <div class="data-item add-spinner div-href" data-url="{{ route('piers.edit', $detail) }}">
                    <a href="{{ route('piers.edit', $detail) }}" class="data-info-action">Update</a>
                </div>

                <div class="data-item close-all-tray">
                    <a href="#" class="data-info-action">Close</a>
                </div>

                <div class="pt-40"></div>

                <div class="data-section active">
                    <div class="header" data-tray="toggle-section">
                        <i data-feather="chevron-right" class="icon"></i>
                        Important information
                    </div>
                    <div class="content">
                        <div class="tray-data">
                            <div class="row no-gutters">
                                <div class="col-6 left">
                                    <div class="data-title">Harbor section</div>
                                </div>
                                <div class="col-6">
                                    <div class="data-value">{{ ucwords($detail->section) }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="tray-data">
                            <div class="row no-gutters">
                                <div class="col-6 left">
                                    <div class="data-title">Pier category</div>
                                </div>
                                <div class="col-6">
                                    <div class="data-value">{{ $detail->category->name }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="data-section active">
                    <div class="header" data-tray="toggle-section">
                        <i data-feather="chevron-right" class="icon"></i>
                        About
                    </div>
                    <div class="content">
                        <div class="data-item">
                            <div class="left">Created on</div>
                            <div class="right">
                                <div class="val">{{ $detail->created_at->format('d/m/Y H.i') }}</div>
                            </div>
                        </div>
                        <div class="data-item">
                            <div class="left">Created by</div>
                            <div class="right">
                                <div class="val">{{ $detail->created_by_user }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
