<div class="tray-views">
    <div class="ui-tray data-info {{ $detail?'active':'' }}" wire:loading.class="loading" wire:target="showDetail">
        <div class="data-info-head">
            <i data-feather="chevron-left" class="data-info-close close-all-tray"></i>
            <h2>{{ $title }}</h2>
        </div>
        <div class="data-info-spinner-container">
            <div class="spinner-border" role="status">
                <span class="sr-only">@lang('global.loading')...</span>
            </div>
        </div>
        @if($detail)
            <div class="data-info-body">

                <div class="data-info-body-title">
                    <h3>{{ $detail->name }}</h3>
                </div>

                <div class="data-item open-tray open-more-tools" data-target="view-more-tools">
                    <a href="#" class="data-info-action">@lang('global.options')</a>
                    <i data-feather="chevron-right" class="icon"></i>
                </div>

                <div class="view-more-tools d-none">
                    <div class="data-item cursor-ptr add-spinner div-href" data-url="{{ route('users', ['role_id' => $detail]) }}">
                        <a href="{{ route('users', ['role_id' => $detail]) }}" class="data-info-action">@lang('roles.view_user')</a>
                    </div>
                    @can('roles-update')
                        <div class="data-item cursor-ptr add-spinner div-href" data-url="{{ route('roles.edit', $detail) }}">
                            <a href="{{ route('roles.edit', $detail) }}" class="data-info-action">@lang('global.update')</a>
                        </div>
                    @endcan
                </div>

                <div class="data-item cursor-ptr close-all-tray">
                    <a href="#" class="data-info-action">@lang('global.close')</a>
                </div>

                <div class="pt-40"></div>

                <div class="data-item open-activities" wire:click="showActivities">
                    <a href="#" class="data-info-action">@lang('global.activities') ({{ $detail->activity_count }})</a>
                    <i data-feather="chevron-right" class="icon"></i>
                </div>

                <div class="pt-40"></div>

                <div class="data-section active">
                    <div class="header" data-tray="toggle-section">
                        <i data-feather="chevron-right" class="icon"></i>
                        @lang('global.about')
                    </div>
                    <div class="content">
                        <div class="tray-data">
                            <div class="row no-gutters">
                                <div class="col-6 left">
                                    <div class="data-title">@lang('global.users')</div>
                                </div>
                                <div class="col-6">
                                    <div class="data-value">{{ $detail->users_count }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="tray-data">
                            <div class="row no-gutters">
                                <div class="col-6 left">
                                    <div class="data-title">@lang('global.created_on')</div>
                                </div>
                                <div class="col-6">
                                    <div class="data-value">{{ $detail->created_at->format('d/m/Y H.i') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="tray-data">
                            <div class="row no-gutters">
                                <div class="col-6 left">
                                    <div class="data-title">@lang('global.created_by')</div>
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

    <div class="ui-tray data-activities {{ $detail&&$activities?'active':'' }}" wire:loading.class="loading" wire:target="showActivities">
        <div class="data-info-head">
            <i data-feather="chevron-left" class="data-info-close close-current"></i>
            <h2>@lang('global.activities')</h2>
        </div>
        <div class="data-info-spinner-container">
            <div class="spinner-border"></div>
        </div>
        @if($detail&&$activities)
            <div class="data-info-body">

                <div class="data-info-body-title">
                    <h3>{{ $detail->name }}</h3>
                </div>

                <div class="data-item close-current">
                    <a href="#" class="data-info-action">@lang('global.back')</a>
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
