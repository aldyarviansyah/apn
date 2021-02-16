<div>
    <section id="page-nav">
        <div class="container">
            <div class="row">
                <div class="col-12 justify-content-center">
                    <div class="nav-container">
                        <img src="{{ asset('icons/menu-white-jagged.svg') }}" class="nav-icon">
                        <h2 class="page-nav-title">{{ $title }}</h2>
                        <div class="user-indicator">
                            <img src="{{ auth()->user()->image }}">
                            <span class="name">{{ auth()->user()->full_name }}</span>
                            <i data-feather="chevron-down" class="icon"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="ui-tray my-profile">
        <div class="data-info-head">
            <i data-feather="chevron-left" class="data-info-close close-all-tray"></i>
            <h2>@lang('global.my_profile')</h2>
        </div>
        <div class="data-info-spinner-container">
            <div class="spinner-border" role="status">
                <span class="sr-only">@lang('global.loading')...</span>
            </div>
        </div>
        <div class="data-info-body">

            <div class="data-info-body-title">
                <div class="thumb"><img src="{{ auth()->user()->image }}"></div>
                <div class="inner">
                    <h3>{{ auth()->user()->full_name }}</h3>
                    <div class="meta">{{ auth()->user()->role }}</div>
                </div>
            </div>

            <div class="data-item">
                <a href="#" class="data-info-action">@lang('global.my_activities') (12)</a>
            </div>

            <div class="data-item add-spinner div-href" data-url="{{ route('profile.reset-password') }}">
                <a href="{{ route('profile.reset-password') }}" class="data-info-action">@lang('users.reset_password')</a>
            </div>

            <div class="data-item add-spinner"  onclick="document.getElementById('do-logout').submit()">
                <a href="javascript:void(0)" class="data-info-action"  onclick="document.getElementById('do-logout').submit()">@lang('global.sign_out')</a>
            </div>

            <div class="data-item close-all-tray">
                <a href="#" class="data-info-action">@lang('global.close')</a>
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
                                <div class="data-value">{{ auth()->user()->username }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="tray-data">
                        <div class="row no-gutters">
                            <div class="col-6 left">
                                <div class="data-title">@lang('users.full_name')</div>
                            </div>
                            <div class="col-6">
                                <div class="data-value">{{ auth()->user()->full_name }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="tray-data">
                        <div class="row no-gutters">
                            <div class="col-6 left">
                                <div class="data-title">@lang('users.email')</div>
                            </div>
                            <div class="col-6">
                                <div class="data-value">{{ auth()->user()->email }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="tray-data">
                        <div class="row no-gutters">
                            <div class="col-6 left">
                                <div class="data-title">@lang('users.role')</div>
                            </div>
                            <div class="col-6">
                                <div class="data-value">{{ auth()->user()->role }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="tray-data">
                        <div class="row no-gutters">
                            <div class="col-6 left">
                                <div class="data-title">@lang('global.created_on')</div>
                            </div>
                            <div class="col-6">
                                <div class="data-value">{{ auth()->user()->created_at->format('d/m/Y H.i') }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="tray-data">
                        <div class="row no-gutters">
                            <div class="col-6 left">
                                <div class="data-title">@lang('global.created_by')</div>
                            </div>
                            <div class="col-6">
                                <div class="data-value">{{ auth()->user()->created_by_user }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="tray-data">
                        <div class="row no-gutters">
                            <div class="col-6 left">
                                <div class="data-title">@lang('users.last_login')</div>
                            </div>
                            <div class="col-6">
                                <div class="data-value">{{ auth()->user()->last_login?auth()->user()->last_login->format('d/m/Y H.i'):'-' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
