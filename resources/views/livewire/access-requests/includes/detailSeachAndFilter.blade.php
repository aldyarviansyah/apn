<div class="tray-views">
    <div class="ui-tray data-info-pending {{ $detail?'active':'' }}" wire:loading.class="loading" wire:target="showDetail">
        <div class="data-info-head">
            <i data-feather="chevron-left" class="data-info-close close-all-tray"></i>
            <h2>{{ $title }}</h2>
        </div>
        <div class="data-info-spinner-container">
            <div class="spinner-border" role="status">
                <span class="sr-only">{{ __('global.loading') }}...</span>
            </div>
        </div>
        @if($detail)
            <div class="data-info-body">

                <div class="data-info-body-title">
                    <h3>{{ $detail->name }}</h3>
                    <div class="meta">{{ $detail->company_name }} ({{ $detail->company_position }})</div>
                </div>

                @if($detail->status == 'pending')
                    <div class="data-info-arrival-status pending">
                        <span class="fw-700">{{ __('accessrequest.pending_approval') }}</span>
                    </div>

                    @can('access-requests-approve')
                        <div class="data-item add-spinner div-href" data-url="{{ route('access-requests.showApprove', $detail) }}">
                            <a href="{{ route('access-requests.showApprove', $detail) }}" class="data-info-action">{{ __('accessrequest.approve_and_create_user') }}</a>
                            <i data-feather="chevron-right" class="icon"></i>
                        </div>
                    @endcan

                    @can('access-requests-reject')
                        <div class="data-item open-tray" data-target="reject-access-request-reason">
                            <a href="#" class="data-info-action">{{ __('global.reject') }}</a>
                            <i data-feather="chevron-right" class="icon"></i>
                        </div>
                    @endcan

                @elseif($detail->status == 'rejected')
                    <div class="data-info-arrival-status rejected">
                        <span class="fw-700">{{ __('global.rejected') }}</span>
                        <br>
                        <span class="o5">{{ __('accessrequest.reason') }}: {{ $detail->reason }}</span>
                    </div>
                @endif

                <div class="data-item cursor-ptr close-all-tray">
                    <a href="#" class="data-info-action">{{ __('global.close') }}</a>
                </div>

                <div class="pt-40"></div>

                <div class="data-item open-activities" wire:click="showActivities">
                    <a href="#" class="data-info-action">{{ __('global.activities') }} ({{ $detail->activity_count }})</a>
                    <i data-feather="chevron-right" class="icon"></i>
                </div>

                <div class="pt-40"></div>

                <div class="data-section active">
                    <div class="header" data-tray="toggle-section">
                        <i data-feather="chevron-right" class="icon"></i>
                        {{ __('accessrequest.request_information') }}
                    </div>
                    <div class="content">
                        <div class="tray-data">
                            <div class="row no-gutters">
                                <div class="col-6 left">
                                    <div class="data-title">{{ __('accessrequest.requester_name') }}</div>
                                </div>
                                <div class="col-6">
                                    <div class="data-value">{{ $detail->name }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="tray-data">
                            <div class="row no-gutters">
                                <div class="col-6 left">
                                    <div class="data-title">{{ __('accessrequest.phone') }}</div>
                                </div>
                                <div class="col-6">
                                    <div class="data-value">{{ $detail->phone }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="tray-data">
                            <div class="row no-gutters">
                                <div class="col-6 left">
                                    <div class="data-title">{{ __('accessrequest.company_name') }}</div>
                                </div>
                                <div class="col-6">
                                    <div class="data-value">{{ $detail->company_name }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="tray-data">
                            <div class="row no-gutters">
                                <div class="col-6 left">
                                    <div class="data-title">{{ __('accessrequest.company_address') }}</div>
                                </div>
                                <div class="col-6">
                                    <div class="data-value">{{ $detail->company_address }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="tray-data">
                            <div class="row no-gutters">
                                <div class="col-6 left">
                                    <div class="data-title">{{ __('accessrequest.company_email') }}</div>
                                </div>
                                <div class="col-6">
                                    <div class="data-value">{{ $detail->company_email }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="tray-data">
                            <div class="row no-gutters">
                                <div class="col-6 left">
                                    <div class="data-title">{{ __('accessrequest.position') }}</div>
                                </div>
                                <div class="col-6">
                                    <div class="data-value">{{ $detail->company_position }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="data-section active">
                    <div class="header" data-tray="toggle-section">
                        <i data-feather="chevron-right" class="icon"></i>
                        {{ __('global.about') }}
                    </div>
                    <div class="content">
                        <div class="tray-data">
                            <div class="row no-gutters">
                                <div class="col-6 left">
                                    <div class="data-title">{{ __('global.created_on') }}</div>
                                </div>
                                <div class="col-6">
                                    <div class="data-value">{{ $detail->created_at->format('d/m/Y H.i') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="tray-data">
                            <div class="row no-gutters">
                                <div class="col-6 left">
                                    <div class="data-title">{{ __('global.created_by') }}</div>
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

    <div class="ui-tray filter-tray">
        <div class="data-info-head">
            <i data-feather="chevron-left" class="data-info-close close-all-tray"></i>
            <h2>{{ __('global.search') }} {{ $title }}</h2>
        </div>
        <div class="data-info-body">
            <div class="tray-form pb-10">
                <form action="{{ route('access-requests') }}">
                    <div class="form-group">
                        <select class="custom-select" name="status">
                            <option value="pending" {{ $status=='pending'?'selected':'' }}>{{ __('global.pending') }}</option>
                            <option value="rejected" {{ $status=='rejected'?'selected':'' }}>{{ __('global.rejected') }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block gmod-btn add-spinner white-spinner pop-onclick">{{ __('global.apply') }}</button>
                    </div>
                    <div class="form-group">
                        <a href="#" class="btn btn-light btn-block gmod-btn close-all-tray">{{ __('global.cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="ui-tray search-tray">
        <div class="data-info-head">
            <i data-feather="chevron-left" class="data-info-close close-all-tray"></i>
            <h2>{{ __('global.search') }} {{$title}}</h2>
        </div>
        <div class="data-info-body">
            <div class="tray-form pb-10">
                <form action="{{ route('access-requests') }}">
                    <div class="form-group">
                        <input type="text" class="form-control gmod first-focus" name="keyword" value="{{$keyword}}" placeholder="{{ __('global.search') }}...">
                    </div>
                    <div class="form-group">
                        <select class="custom-select" name="column">
                            <option value="name" {{ $column=='name'?'selected':'' }}>{{ __('accessrequest.requester_name') }}</option>
                            <option value="company_name" {{ $column=='company_name'?'selected':'' }}>{{ __('accessrequest.company_name') }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block gmod-btn add-spinner white-spinner pop-onclick">{{ __('global.search') }}</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <a href="#" class="btn btn-light btn-block gmod-btn close-all-tray">{{ __('global.cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="ui-tray data-activities {{ $detail&&$activities?'active':'' }}" wire:loading.class="loading" wire:target="showActivities">
        <div class="data-info-head">
            <i data-feather="chevron-left" class="data-info-close close-current"></i>
            <h2>{{ __('global.activities') }}</h2>
        </div>
        <div class="data-info-spinner-container">
            <div class="spinner-border"></div>
        </div>
        @if($detail&&$activities)
            <div class="data-info-body">

                <div class="data-info-body-title">
                    <h3>{{ $detail->name }}</h3>
                    <div class="meta">{{ $detail->company_name }} ({{ $detail->company_position }})</div>
                </div>

                <div class="data-item close-current">
                    <a href="#" class="data-info-action">{{ __('global.back') }}</a>
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
                                            <div class="new-val">{{ $subActivity->new_value }}</div>
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

    @can('access-requests-reject')
        @if($detail)
            <div class="ui-tray reject-access-request-reason {{ $showReject?'active':'' }}">
                <div class="data-info-head">
                    <i data-feather="chevron-left" class="data-info-close cursor-ptr close-all-tray"></i>
                    <h2>{{ __('accessrequest.reject_access_request') }}</h2>
                </div>
                <div class="data-info-body">
                    <div class="tray-form pb-10">
                        <form  wire:submit.prevent="rejectFormSubmit">
                            <div class="form-group">
                                <label>{{ __('accessrequest.reason_for_rejecting') }}:</label>
                                <input type="text" class="form-control gmod first-focus @error('reason') is-invalid @enderror" wire:model="reason">
                                @error('reason')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block gmod-btn add-spinner white-spinner pop-onclick">{{ __('accessrequest.confirm_reject') }}</button>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-light btn-block gmod-btn pop-onclick close-current">{{ __('global.cancel') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    @endcan
</div>
