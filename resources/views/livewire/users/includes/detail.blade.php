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
                    <div class="thumb"><img src="{{ $detail->image }}"></div>
                    <div class="inner">
                        <h3>{{ $detail->full_name }}</h3>
                        <div class="meta">{{ $detail->role }}</div>
                    </div>
                </div>

                <div class="data-item open-tray open-more-tools" data-target="view-more-tools">
                    <a href="#" class="data-info-action">@lang('global.options')</a>
                    <i data-feather="chevron-right" class="icon"></i>
                </div>

                <div class="view-more-tools d-none">
                    @can('users-update')
                        <div class="data-item cursor-ptr add-spinner div-href" data-url="{{ route('users.edit', $detail) }}">
                            <a href="{{ route('users.edit', $detail) }}" class="data-info-action">@lang('global.update')</a>
                        </div>
                    @endcan

                    @can('users-change-permissions')
                        <div class="data-item cursor-ptr open-tray view-user-permissions" wire:click="showPermissionGroup">
                            <a href="#" class="data-info-action">@lang('users.user_permissions')</a>
                            <i data-feather="chevron-right" class="icon"></i>
                        </div>
                    @endcan

                    @can('users-update')
                        <div class="data-item cursor-ptr add-spinner div-href" data-url="{{ route('users.reset', $detail) }}">
                            <a href="{{ route('users.reset', $detail) }}" class="data-info-action">@lang('users.reset_password')</a>
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
                                    <div class="data-title">@lang('users.login_username')</div>
                                </div>
                                <div class="col-6">
                                    <div class="data-value">{{ $detail->username }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="tray-data">
                            <div class="row no-gutters">
                                <div class="col-6 left">
                                    <div class="data-title">@lang('users.full_name')</div>
                                </div>
                                <div class="col-6">
                                    <div class="data-value">{{ $detail->full_name }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="tray-data">
                            <div class="row no-gutters">
                                <div class="col-6 left">
                                    <div class="data-title">@lang('users.email')</div>
                                </div>
                                <div class="col-6">
                                    <div class="data-value">{{ $detail->email }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="tray-data">
                            <div class="row no-gutters">
                                <div class="col-6 left">
                                    <div class="data-title">@lang('users.email')</div>
                                </div>
                                <div class="col-6">
                                    <div class="data-value">{{ $detail->role }}</div>
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
                        <div class="tray-data">
                            <div class="row no-gutters">
                                <div class="col-6 left">
                                    <div class="data-title">@lang('global.last_login')</div>
                                </div>
                                <div class="col-6">
                                    <div class="data-value">{{ $detail->last_login?$detail->last_login->format('d/m/Y H.i'):'-' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div class="ui-tray user-data-permissions {{ $detail&&$permissionGroups?'active':'' }}" wire:loading.class="loading" wire:target="showPermissionGroup">
        <div class="data-info-head">
            <i data-feather="chevron-left" class="data-info-close close-current"></i>
            <h2>@lang('users.app_user_permissions')</h2>
        </div>
        <div class="data-info-spinner-container">
            <div class="spinner-border" role="status">
                <span class="sr-only">@lang('global.loading')...</span>
            </div>
        </div>
        @if($detail && $permissionGroups)
            <div class="data-info-body">

                <div class="data-info-body-title">
                    <div class="thumb"><img src="{{ $detail->image }}"></div>
                    <div class="inner">
                        <h3>{{ $detail->full_name }}</h3>
                        <div class="meta">{{ $detail->role }}</div>
                    </div>
                </div>

                <div class="data-item cursor-ptr open-tray" data-target="copy-user-permissions">
                    <a href="#" class="data-info-action">@lang('users.copy_permissions_from')</a>
                    <i data-feather="chevron-right" class="icon"></i>
                </div>

                <div class="data-item cursor-ptr close-current">
                    <a href="#" class="data-info-action">@lang('global.back')</a>
                </div>

                <div class="pt-40"></div>

                <form action="{{ route('users.update.permission', $detail) }}" method="post">
                    @csrf
                    <div class="data-section active">
                        <div class="header" data-tray="toggle-section">
                            <i data-feather="chevron-right" class="icon"></i>
                            @lang('users.user_permissions')
                        </div>
                        <div class="content">

                            @foreach($permissionGroups as $permissionGroup)
                                <div class="tray-data">
                                    <div class="row no-gutters permission-matrix">
                                        <div class="col-12">
                                            <div class="data-title mb-10">{{ $permissionGroup->name }}</div>
                                        </div>
                                        @foreach($permissionGroup->permissions as $permission)
                                            <div class="col-12 item">
                                                <label>
                                                    <input class="" name="permissions[]" type="checkbox" value="{{ $permission->id }}" {{ $detail->hasPermissionTo($permission->name)?'checked':'' }}>
                                                    {{ $permission->label }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach

                            <div class="tray-form-buttons">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block gmod-btn add-spinner white-spinner pop-onclick">@lang('global.save')</button>
                                </div>
                                <div class="form-group">
                                    <a href="#" class="btn btn-light btn-block gmod-btn close-all-tray close-current">@lang('global.close')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        @endif
    </div>
    <div class="ui-tray copy-user-permissions {{ $trayCopyPermission?'active':'' }}">
        <div class="data-info-head">
            <i data-feather="chevron-left" class="data-info-close close-current"></i>
            <h2>@lang('users.select_copy_permissions')</h2>
        </div>
        <div class="data-info-body">
            <div class="tray-form pb-0">
                <form wire:submit.prevent="searchFormSubmit">
                    <p>@lang('users.select_permissions_to')</p>
                    <div class="form-group">
                        <input type="text" class="form-control gmod first-focus @error('userSearch') is-invalid @enderror" wire:model="userSearch" placeholder="{{ __('users.input_user_login_name') }}">
                        @error('userSearch')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block gmod-btn pop-onclick add-spinner white-spinner user-search-permission-go">@lang('global.search')</button>
                    </div>
                </form>
            </div>
            <form wire:submit.prevent="copyFormSubmit">
                <div class="tray-form pb-10 pt-0">
                    @if($usersResults && count($usersResults)>0)
                        <div class="user-permission-result-item">
                            @foreach($usersResults as $user)
                                <div class="card mb-10 tray-option apn-radio cursor-ptr {{ $userId==$user->id?'selected':'' }}">
                                    <label class="card-body mb-0 cursor-ptr">
                                        <input type="radio" class="invisible position-fixed" value="{{ $user->id }}" wire:model="userId">
                                        <div class="radio-name fw-600">{{ $user->full_name }}</div>
                                        <div class="radio-meta o3">{{ $user->role }}</div>
                                    </label>
                                </div>
                            @endforeach
                            <p class="o5 ml-1 mr-1"><em>@lang('users.showing_note')</em></p>
                        </div>
                    @endif
                </div>
                <div class="tray-form-buttons copy-permissions-actions {{ $usersResults && count($usersResults)>0?'':'d-none' }}">
                    @error('userId')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block gmod-btn add-spinner white-spinner pop-onclick">@lang('global.copy')</button>
                    </div>
                    <div class="form-group">
                        <a href="#" class="btn btn-light btn-block gmod-btn close-current">@lang('global.cancel')</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="selected-ship-template d-none">
            <div class="card mb-10 tray-option open-tray cursor-ptr" data-target="select-ship">
                <div class="card-body">
                    <div class="radio-name fw-600"></div>
                    <div class="radio-meta o3"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="ui-tray data-activities {{ $detail&&$activities?'active':'' }}" wire:loading.class="loading" wire:target="showActivities">
        <div class="data-info-head">
            <i data-feather="chevron-left" class="data-info-close close-current"></i>
            <h2>@lang('global.activities')</h2>
        </div>
        <div class="data-info-spinner-container">
            <div class="spinner-border" role="status">
                <span class="sr-only">@lang('global.loading')...</span>
            </div>
        </div>
        @if($detail&&$activities)
            <div class="data-info-body">

                <div class="data-info-body-title">
                    <div class="thumb"><img src="{{ $detail->image }}"></div>
                    <div class="inner">
                        <h3>{{ $detail->full_name }}</h3>
                        <div class="meta">{{ $detail->role }}</div>
                    </div>
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
