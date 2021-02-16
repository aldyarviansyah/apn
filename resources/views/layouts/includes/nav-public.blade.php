
<div id="overlay"></div>

<section id="page-nav">
    <div class="container">
        <div class="row">
            <div class="col-12 justify-content-center">
                <div class="nav-container">
                    <img src={{ asset('icons/menu-white-jagged.svg') }} class="nav-icon">
                    <h2 class="page-nav-title">{{ $title }}</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="side-nav">
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
            <div class="sidebar-link {{ request()->route()->getName() == 'access-requests.public'? 'current':'' }}">
                <a href="{{ route('access-requests.public') }}">
                    <i data-feather="home" class="icon"></i>
                    <i data-feather="chevron-right" class="cue"></i>
                    Access Request
                </a>
            </div>

            <div class="nav-wedge"></div>

            <div class="sidebar-link open-drawer close-current-drawer" data-target="drawer--lang">
                <a href="#">
                    <i data-feather="sliders" class="icon"></i>
                    English / 中文
                </a>
            </div>

            <div class="sidebar-link">
                <a href="{{ url('/') }}">
                    <i data-feather="corner-up-left" class="icon"></i>
                    Back to Website
                </a>
            </div>
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
