<div class="tray-others">
    <div class="ui-tray user-filter-tray">
        <div class="data-info-head">
            <i data-feather="chevron-left" class="data-info-close close-all-tray"></i>
            <h2>@lang('global.filter') {{ $title }}</h2>
        </div>
        <div class="data-info-body">
            <div class="tray-form pb-10">
                <form action="{{ route('users') }}">
                    <div class="form-group">
                        <select class="custom-select" name="role_id">
                            <option value="">@lang('users.all_user_role')</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}" {{ $role_id==$role->id?'selected':'' }}>{{ $role->name }} ( {{ $role->users_count }} )</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block gmod-btn add-spinner white-spinner pop-onclick">@lang('global.apply')</button>
                    </div>
                    <div class="form-group">
                        <a href="#" class="btn btn-light btn-block gmod-btn close-all-tray">@lang('global.apply')</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="ui-tray user-search-tray">
        <div class="data-info-head">
            <i data-feather="chevron-left" class="data-info-close close-all-tray"></i>
            <h2>@lang('global.search') {{ $title }}</h2>
        </div>
        <div class="data-info-body">
            <div class="tray-form pb-10">
                <form action="{{route('users')}}" method="get">
                    <div class="form-group">
                        <input type="text" class="form-control gmod first-focus" name="keyword" placeholder="@lang('global.search')..." value="{{ $keyword }}">
                    </div>
                    <div class="form-group">
                        <select class="custom-select" name="column">
                            <option value="full_name" {{ $column=='full_name'?'selected':'' }}>@lang('users.user_name')</option>
                            <option value="email" {{ $column=='email'?'selected':'' }}>@lang('users.user_email')</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block gmod-btn add-spinner white-spinner pop-onclick">@lang('global.search')</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <a href="#" class="btn btn-light btn-block gmod-btn close-all-tray">@lang('global.cancel')</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="ui-tray tools-tray">
        <div class="data-info-head">
            <i data-feather="chevron-left" class="data-info-close close-all-tray"></i>
            <h2>@lang('global.manage')</h2>
        </div>
        <div class="data-info-body">
            <div class="tray-form pb-10">
                <div class="form-group">
                    <a href="{{ route('users.create') }}" class="btn btn-primary btn-block gmod-btn pop-onclick add-spinner white-spinner">
                        <i data-feather="plus" class="btn-icon"></i>
                        @lang('global.create_new')
                    </a>
                </div>
                <div class="form-group">
                    <a href="#" class="btn btn-light btn-block gmod-btn pop-onclick">
                        @lang('global.export_table')
                    </a>
                </div>
            </div>

            <div class="data-item close-all-tray">
                <a href="#" class="data-info-action">@lang('global.close')</a>
            </div>
        </div>
    </div>

</div>
