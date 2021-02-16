<div class="tray-views">
    <div class="ui-tray data-info {{ $detail?'active':'' }}" wire:loading.class="loading" wire:target="showDetail">
        <div class="data-info-head">
            <i data-feather="chevron-left" class="data-info-close close-all-tray"></i>
            <h2>{{ $title }}</h2>
        </div>
        <div class="data-info-spinner-container">
            <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        @if($detail)
            <div class="data-info-body">

                <div class="data-info-body-title">
                    <h3>{{ $detail->name }}</h3>
                    <div class="meta">{{ ucwords($detail->category) }}</div>
                </div>

                <div class="data-item open-tray open-more-tools" data-target="view-more-tools">
                    <a href="#" class="data-info-action">Options</a>
                    <i data-feather="chevron-right" class="icon"></i>
                </div>

                <div class="view-more-tools d-none">

                    @can('ships-update')
                        <div class="data-item cursor-ptr add-spinner div-href" data-url="{{ route('ships.edit', $detail) }}">
                            <a href="{{ route('ships.edit', $detail) }}" class="data-info-action">Update</a>
                            <i data-feather="chevron-right" class="icon"></i>
                        </div>
                    @endcan

                    <div class="data-item add-spinner">
                        <a href="#" class="data-info-action">Arrivals related to this ship</a>
                        <i data-feather="chevron-right" class="icon"></i>
                    </div>

                    <div class="data-item add-spinner">
                        <a href="#" class="data-info-action">Current agent info</a>
                        <i data-feather="chevron-right" class="icon"></i>
                    </div>

                </div>

                <div class="data-item cursor-ptr close-all-tray">
                    <a href="#" class="data-info-action">Close</a>
                </div>

                <div class="pt-40"></div>

                <div class="data-item open-activities" wire:click="showActivities">
                    <a href="#" class="data-info-action">Activities ({{ $detail->activity_count }})</a>
                    <i data-feather="chevron-right" class="icon"></i>
                </div>

                <div class="pt-40"></div>

                <div class="data-section active">
                    <div class="header" data-tray="toggle-section">
                        <i data-feather="chevron-right" class="icon"></i>
                        Ship Information
                    </div>
                    <div class="content">
                        <div class="tray-data">
                            <div class="row no-gutters">
                                <div class="col-6 left">
                                    <div class="data-title">Ship name</div>
                                </div>
                                <div class="col-6">
                                    <div class="data-value">{{ $detail->name }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="tray-data">
                            <div class="row no-gutters">
                                <div class="col-6 left">
                                    <div class="data-title">Ship type</div>
                                </div>
                                <div class="col-6">
                                    <div class="data-value">{{ ucwords($detail->category) }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="tray-data">
                            <div class="row no-gutters">
                                <div class="col-6 left">
                                    <div class="data-title">Call sign</div>
                                </div>
                                <div class="col-6">
                                    <div class="data-value">{{ $detail->call_sign }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="tray-data">
                            <div class="row no-gutters">
                                <div class="col-6 left">
                                    <div class="data-title">Nationality</div>
                                </div>
                                <div class="col-6">
                                    <div class="data-value">{{ $detail->country->nicename }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="tray-data">
                            <div class="row no-gutters">
                                <div class="col-6 left">
                                    <div class="data-title">24 Hour Telephone Number</div>
                                </div>
                                <div class="col-6">
                                    <div class="data-value">{{ $detail->telephone }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="tray-data">
                            <div class="row no-gutters">
                                <div class="col-6 left">
                                    <div class="data-title">Port of registry</div>
                                </div>
                                <div class="col-6">
                                    <div class="data-value">{{ $detail->port }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="tray-data">
                            <div class="row no-gutters">
                                <div class="col-6 left">
                                    <div class="data-title">IMO Number</div>
                                </div>
                                <div class="col-6">
                                    <div class="data-value">{{ $detail->imo_number }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="tray-data">
                            <div class="row no-gutters">
                                <div class="col-6 left">
                                    <div class="data-title">ISSC type</div>
                                </div>
                                <div class="col-6">
                                    <div class="data-value">{{ $detail->issc_type }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="tray-data">
                            <div class="row no-gutters">
                                <div class="col-6 left">
                                    <div class="data-title">Date of issue ISSC</div>
                                </div>
                                <div class="col-6">
                                    <div class="data-value">{{ $detail->issc_issue_date_formated }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="tray-data">
                            <div class="row no-gutters">
                                <div class="col-6 left">
                                    <div class="data-title">Date of expiry ISSC</div>
                                </div>
                                <div class="col-6">
                                    <div class="data-value">{{ $detail->issc_expiry_date_formated }}</div>
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
                        <div class="tray-data">
                            <div class="row no-gutters">
                                <div class="col-6 left">
                                    <div class="data-title">Created on</div>
                                </div>
                                <div class="col-6">
                                    <div class="data-value">{{ $detail->created_at->format('d/m/Y H.i') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="tray-data">
                            <div class="row no-gutters">
                                <div class="col-6 left">
                                    <div class="data-title">Created by</div>
                                </div>
                                <div class="col-6">
                                    <div class="data-value">{{ $detail->created_by_user }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <div class="ui-tray ship-filter-tray">
        <div class="data-info-head">
            <i data-feather="chevron-left" class="data-info-close close-all-tray"></i>
            <h2>Filter Ships</h2>
        </div>
        <div class="data-info-body">
            <div class="tray-form pb-10">
                <form action="{{ route('ships') }}">
                    <div class="form-group">
                        <select class="custom-select" name="category">
                            <option value="">All ship categories</option>
                            <option value="barge" {{ $category=='barge'?'selected':'' }}>Barges ({{ $barge }})</option>
                            <option value="vessel" {{ $category=='vessel'?'selected':'' }}>Vessels ({{ $vessel }})</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block gmod-btn add-spinner white-spinner pop-onclick">Apply</button>
                    </div>
                    <div class="form-group">
                        <a href="#" class="btn btn-light btn-block gmod-btn close-all-tray">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="ui-tray ship-search-tray">
        <div class="data-info-head">
            <i data-feather="chevron-left" class="data-info-close close-all-tray"></i>
            <h2>Search Ships</h2>
        </div>
        <div class="data-info-body">
            <div class="tray-form pb-10">
                <form action="{{ route('ships') }}">
                    <div class="form-group">
                        <input type="text" class="form-control gmod first-focus" placeholder="Search..." name="keyword" value="{{ $keyword }}">
                    </div>
                    <div class="form-group">
                        <select class="custom-select" name="column">
                            <option value="name" {{ $column=='name'?'selected':'' }}>Ship name</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block gmod-btn add-spinner white-spinner pop-onclick">Search</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <a href="#" class="btn btn-light btn-block gmod-btn close-all-tray">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="ui-tray tools-tray">
        <div class="data-info-head">
            <i data-feather="chevron-left" class="data-info-close close-all-tray"></i>
            <h2>Manage</h2>
        </div>
        <div class="data-info-body">
            <div class="tray-form pb-10">
                <div class="form-group">
                    <a href="{{ route('ships.create') }}" class="btn btn-primary btn-block gmod-btn pop-onclick add-spinner white-spinner">
                        <i data-feather="plus" class="btn-icon"></i>
                        Create new
                    </a>
                </div>
                <div class="form-group">
                    <a href="#" class="btn btn-light btn-block gmod-btn pop-onclick">
                        Export table
                    </a>
                </div>
            </div>

            <div class="data-item close-all-tray">
                <a href="#" class="data-info-action">Close</a>
            </div>
        </div>
    </div>

    <div class="ui-tray data-activities {{ $detail&&$activities?'active':'' }}" wire:loading.class="loading" wire:target="showActivities">
        <div class="data-info-head">
            <i data-feather="chevron-left" class="data-info-close close-current"></i>
            <h2>Activities</h2>
        </div>
        <div class="data-info-spinner-container">
            <div class="spinner-border"></div>
        </div>
        @if($detail&&$activities)
            <div class="data-info-body">

                <div class="data-info-body-title">
                    <h3>{{ $detail->name }}</h3>
                    <div class="meta">{{ ucwords($detail->category) }}</div>
                </div>

                <div class="data-item close-current">
                    <a href="#" class="data-info-action">Back</a>
                </div>

                <div class="pt-40"></div>

                <div id="data-timeline">
                    @foreach($activities as $key => $activity)
                        @if(count($activity->items)>0)
                            <div class="activity-branch">
                                <div class="creator">
                                    <img src="{{ $activity->user_image }}" class="thumb">
                                    <div class="name">{{ $activity->user_name }}</div>
                                    <div class="role">{{ $activity->user_role }}</div>
                                </div>
                                <div class="content">
                                    @foreach($activity->items as $subKey => $subActivity)
                                        <div class="twig">
                                            <div class="field">{{ $subActivity->field_label }}</div>
                                            <div class="new-val">{{ $subActivity->new_display_value }}</div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="time">
                                    {{ $activity->time_created }} <br>{{ $activity->date_created }}
                                </div>
                            </div>
                        @else
                            <div class="activity-branch">
                                <div class="creator">
                                    <img src="{{ $activity->user_image }}" class="thumb">
                                    <div class="name">{{ $activity->user_name }}</div>
                                    <div class="role">{{ $activity->user_role }}</div>
                                </div>
                                <div class="content">
                                    <div class="twig">
                                        {{ $activity->action_label }}
                                    </div>
                                </div>
                                <div class="time">
                                    {{ $activity->time_created }} <br>{{ $activity->date_created }}
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

            </div>
        @endif
    </div>
</div>
