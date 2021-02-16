<section id="side-nav" style="display: none;">
    <div class="sidebar-logo">
        <a href="{{ url('/') }}"><img src="{{ asset('img/logo-admin.svg?v=2') }}"></a>
    </div>

    <div class="clock">
        <div class="left">Jakarta</div>
        <div class="right"><span class="o3">{{ $dateWIB->format('d M Y') }}</span> {{ $dateWIB->format('H.i') }}</div>
    </div>

    <div class="clock">
        <div class="left">Morosi</div>
        <div class="right"><span class="o3">{{ $dateWITA->format('d M Y') }}</span> {{ $dateWITA->format('H.i') }}</div>
    </div>



    <!----------------
    ------------------
    ------------------
    MAIN DRAWER
    ------------------
    ------------------
    ------------------>
    <div class="drawer-container">
        <div class="drawer drawer--main active">
            <div class="sidebar-link {{ request()->route()->getName() == 'dashboard' ? 'current' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <i data-feather="home" class="icon"></i>
                    <i data-feather="chevron-right" class="cue"></i>
                    @lang('global.dashboard')
                </a>
            </div>

            <div class="sidebar-link open-drawer close-current-drawer" data-target="drawer--arrivals">
                <a href="#">
                    <i data-feather="calendar" class="icon"></i>
                    <i data-feather="chevron-right" class="cue"></i>
                    @lang('global.ship_arrivals') (154)
                </a>
            </div>

            <div class="sidebar-link">
                <a href="lineups.php">
                    <i data-feather="list" class="icon"></i>
                    <i data-feather="chevron-right" class="cue"></i>
                    @lang('global.lineups')
                </a>
            </div>

            @if(auth()->user()->can('boats-read-all') || auth()->user()->can('ships-read-all'))
                <div class="sidebar-link open-tray close-current-drawer" data-target="drawer--ships">
                    <a href="#">
                        <i data-feather="database" class="icon"></i>
                        <i data-feather="chevron-right" class="cue"></i>
                        @lang('global.ships_boats')
                    </a>
                </div>
            @endif

            @if(auth()->user()->can('pier-read-all') || auth()->user()->can('pier-categories-read-all'))
                <div class="sidebar-link open-tray close-current-drawer" data-target="drawer--piers">
                    <a href="#">
                        <i data-feather="anchor" class="icon"></i>
                        <i data-feather="chevron-right" class="cue"></i>
                        @lang('global.piers')
                    </a>
                </div>
            @endif

            @can('companies-read-all')
                <div class="sidebar-link">
                    <a href="{{ route('companies') }}">
                        <i data-feather="briefcase" class="icon"></i>
                        <i data-feather="chevron-right" class="cue"></i>
                        Companies
                    </a>
                </div>
            @endcan

            @if(auth()->user()->can('users-read-all') || auth()->user()->can('roles-read-all'))
                <div class="sidebar-link open-tray close-current-drawer" data-target="drawer--users">
                    <a href="#">
                        <i data-feather="users" class="icon"></i>
                        <i data-feather="chevron-right" class="cue"></i>
                        @lang('global.users')
                    </a>
                </div>
            @endif

            <div class="nav-wedge"></div>

            <div class="sidebar-link open-tray close-current-drawer" data-target="drawer--maps">
                <a href="#">
                    <i data-feather="map" class="icon"></i>
                    <i data-feather="chevron-right" class="cue"></i>
                    @lang('global.maps')
                </a>
            </div>

            <div class="sidebar-link open-tray close-sidebar" data-target="nav-meta-tray">
                <a href="#">
                    <i data-feather="activity" class="icon"></i>
                    @lang('global.shift_summaries')
                </a>
            </div>

            <div class="sidebar-link">
                <a href="exports.php">
                    <i data-feather="download" class="icon"></i>
                    @lang('global.database_export')
                </a>
            </div>

            <div class="nav-wedge"></div>

            <div class="sidebar-link open-tray close-sidebar" data-target="user-search-tray">
                <a href="#">
                    <i data-feather="search" class="icon"></i>
                    @lang('global.search_user')
                </a>
            </div>

            <div class="sidebar-link">
                <a href="#">
                    <i data-feather="user" class="icon"></i>
                    @lang('global.my_profile')
                </a>
            </div>

            <div class="sidebar-link open-drawer close-current-drawer" data-target="drawer--lang">
                <a href="#">
                    <i data-feather="sliders" class="icon"></i>
                    English / 中文
                </a>
            </div>

            <div class="sidebar-link">
                <form action="{{ route('logout') }}" method="post" id="do-logout">
                    @csrf
                </form>
                <a href="javascript:void(0)" onclick="document.getElementById('do-logout').submit()">
                    <i data-feather="log-out" class="icon"></i>
                    @lang('global.sign_out')
                </a>
            </div>
        </div>

        <!----------------
        ------------------
        ------------------
        SHIP ARRIVALS
        ------------------
        ------------------
        ------------------>

        <div class="drawer drawer--arrivals">
            <div class="drawer-link previous-drawer open-drawer close-current-drawer current" data-target="drawer--main">
                <a href="#">
                    <i data-feather="chevron-left" class="back-icon"></i>
                    @lang('global.ship_arrivals')
                </a>
            </div>

            <div class="mt-10"></div>

            <div class="drawer-link">
                <a href="arrivals.php?filter=pending">
                    <i data-feather="radio" class="icon"></i>
                    @lang('global.pending_arrival') <span class="o5">(24)</span>
                </a>
            </div>

            <div class="drawer-link">
                <a href="arrivals.php?filter=sailing">
                    <i data-feather="fast-forward" class="icon"></i>
                    @lang('global.sailing') <span class="o5">(3)</span>
                </a>
            </div>

            <div class="drawer-link">
                <a href="arrivals.php?filter=anchored">
                    <i data-feather="anchor" class="icon"></i>
                    @lang('global.anchored') <span class="o5">(14)</span>
                </a>
            </div>

            <div class="drawer-link">
                <a href="arrivals.php?filter=jetty">
                    <i data-feather="repeat" class="icon"></i>
                    @lang('global.jetty_berthing') <span class="o5">(2)</span>
                </a>
            </div>

            <div class="drawer-link">
                <a href="arrivals.php?filter=discharging">
                    <i data-feather="log-out" class="icon"></i>
                    @lang('global.discharging') <span class="o5">(56)</span>
                </a>
            </div>

            <div class="drawer-link">
                <a href="arrivals.php?filter=loading">
                    <i data-feather="log-in" class="icon"></i>
                    @lang('global.loading') <span class="o5">(4)</span>
                </a>
            </div>

            <div class="drawer-link">
                <a href="arrivals.php?filter=otustanding">
                    <i data-feather="alert-octagon" class="icon"></i>
                    @lang('global.outstanding') <span class="o5">(2)</span>
                </a>
            </div>

            <div class="drawer-link">
                <a href="arrivals.php?filter=problem">
                    <i data-feather="alert-octagon" class="icon"></i>
                    @lang('global.problem') <span class="o5">(2)</span>
                </a>
            </div>

            <div class="mt-10"></div>

            <hr>

            <div class="drawer-link">
                <a href="page-arrival.php?filter=rejected">
                    <i data-feather="delete" class="icon"></i>
                    PA @lang('global.rejected')<span class="o5">(124)</span>
                </a>
            </div>
            <div class="drawer-link">
                <a href="page-arrival.php?filter=rejected">
                    <i data-feather="wind" class="icon"></i>
                    @lang('global.cast_off') <span class="o5">(1,920)</span>
                </a>
            </div>

            <div class="mt-10"></div>

            <hr>

            <div class="drawer-link">
                <a href="arrival-search.php">
                    <i data-feather="search" class="icon"></i>
                    @lang('global.search_arrival')
                </a>
            </div>

            <div class="pb-50"></div>
        </div>

        <!----------------
        ------------------
        ------------------
        MAPS
        ------------------
        ------------------
        ------------------>
        <div class="drawer drawer--maps">
            <div class="drawer-link previous-drawer open-drawer close-current-drawer current" data-target="drawer--main">
                <a href="#">
                    <i data-feather="chevron-left" class="back-icon"></i>
                    @lang('global.maps')
                </a>
            </div>

            <div class="mt-10"></div>

            <div class="drawer-link">
                <a href="page-maps.php">
                    <i data-feather="map" class="icon"></i>
                    @lang('global.west_map')
                </a>
            </div>
            <div class="drawer-link">
                <a href="page-maps.php">
                    <i data-feather="map" class="icon"></i>
                    @lang('global.center_map')
                </a>
            </div>
            <div class="drawer-link">
                <a href="page-maps.php">
                    <i data-feather="map" class="icon"></i>
                    @lang('global.east_map')
                </a>
            </div>
        </div>

        <!----------------
        ------------------
        ------------------
        SHIPS
        ------------------
        ------------------
        ------------------>

        <div class="drawer drawer--ships">
            <div class="drawer-link previous-drawer open-drawer close-current-drawer current" data-target="drawer--main">
                <a href="#">
                    <i data-feather="chevron-left" class="back-icon"></i>
                    @lang('global.ships')
                </a>
            </div>

            <div class="mt-10"></div>

            @can('ships-read-all')
                <div class="drawer-link">
                    <a href="{{ route('ships') }}">
                        <i data-feather="database" class="icon"></i>
                        @lang('global.barges_vessels')
                    </a>
                </div>
            @endcan

            @can('boats-read-all')
                <div class="drawer-link">
                    <a href="{{ route('boats') }}">
                        <i data-feather="database" class="icon"></i>
                        @lang('global.tug_boats')
                    </a>
                </div>
            @endcan

        </div>

        <!----------------
        ------------------
        ------------------
        Users
        ------------------
        ------------------
        ------------------>

        <div class="drawer drawer--users">
            <div class="drawer-link previous-drawer open-drawer close-current-drawer current" data-target="drawer--main">
                <a href="#">
                    <i data-feather="chevron-left" class="back-icon"></i>
                    @lang('global.users')
                </a>
            </div>

            <div class="mt-10"></div>

            @can('users-read-all')
                <div class="drawer-link">
                    <a href="{{ route('users') }}">
                        <i data-feather="database" class="icon"></i>
                        @lang('global.view_all')
                    </a>
                </div>
            @endcan

            @can('roles-read-all')
                <div class="drawer-link">
                    <a href="{{ route('roles') }}">
                        <i data-feather="tag" class="icon"></i>
                        @lang('global.roles')
                    </a>
                </div>
            @endcan

            @can('access-requests-read-all')
                <div class="drawer-link">
                    <a href="{{ route('access-requests') }}">
                        <i data-feather="user-plus" class="icon"></i>
                        @lang('global.access_request')
                    </a>
                </div>
            @endcan
        </div>

        <!----------------
        ------------------
        ------------------
        Piers
        ------------------
        ------------------
        ------------------>

        <div class="drawer drawer--piers">
            <div class="drawer-link previous-drawer open-drawer close-current-drawer current" data-target="drawer--main">
                <a href="#">
                    <i data-feather="chevron-left" class="back-icon"></i>
                    @lang('global.piers')
                </a>
            </div>

            <div class="mt-10"></div>

            @can('pier-read-all')
                <div class="drawer-link">
                    <a href="{{ route('piers') }}">
                        <i data-feather="database" class="icon"></i>
                        @lang('global.view_all')
                    </a>
                </div>
            @endcan

            @can('pier-categories-read-all')
                <div class="drawer-link">
                    <a href="{{ route('pier-categories') }}">
                        <i data-feather="tag" class="icon"></i>
                        @lang('global.categories')
                    </a>
                </div>
            @endcan
        </div>


        <!----------------
        ------------------
        ------------------
        LANG
        ------------------
        ------------------
        ------------------>

        <div class="drawer drawer--lang">
            <div class="drawer-link previous-drawer open-drawer close-current-drawer current" data-target="drawer--main">
                <a href="#">
                    <i data-feather="chevron-left" class="back-icon"></i>
                    English / 中文
                </a>
            </div>

            <div class="mt-10"></div>

            <div class="drawer-link">
                <a href="{{ route('languages.change', 'en') }}">
                    <i data-feather="server" class="icon"></i>
                    English
                </a>
            </div>
            <div class="drawer-link">
                <a href="{{ route('languages.change', 'zh') }}">
                    <i data-feather="server" class="icon"></i>
                    中文
                </a>
            </div>
            <div class="drawer-link">
                <a href="{{ route('languages.change', 'id') }}">
                    <i data-feather="server" class="icon"></i>
                    Bahasa Indonesia
                </a>
            </div>
        </div>
    </div>
</section>
