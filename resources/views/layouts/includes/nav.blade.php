<div id="web-overlay"></div>

<section id="webnav">
    <div class="nav-logo">
        <img src="{{ asset('img/website/logo-white.svg?v=5') }}">
    </div>
    <div class="nav-menu js-trigger-menu">
        <img src="{{ asset('icons/menu-white-jagged.svg') }}">
    </div>
</section>

<section id="navtray">
    <a href="#" class="navlink nav-close js-nav-close mt-30">
        <i data-feather="x" class="icon"></i>
        Close
    </a>
    <div class="mt-20"></div>
    <a href="{{ route('login') }}" class="navlink">
        <i data-feather="user" class="icon"></i>
        APN staff login
    </a>
    <a href="{{ route('login') }}" class="navlink">
        <i data-feather="user" class="icon"></i>
        Agent login
    </a>
    <a href="{{ route('login') }}" class="navlink">
        <i data-feather="user" class="icon"></i>
        Trader login
    </a>
</section>

<style type="text/css">
    #navtray a.navlink {
        display: block;
        padding: 14px 30px 14px 54px;
        color: #303030;
        position: relative;
    }
    #navtray a.navlink.nav-close {
        background: rgb(0 0 0 / .03);
    }
    #navtray a.navlink .icon {
        position: absolute;
        left: 28px;
        top: 50%;
        width: 16px;
        opacity: .3;
        transform: translate(0, -50%);
    }
    #navtray {
        position: fixed;
        background: rgb(255 255 255 / 1);
        top: 0;
        right: 0;
        width: 320px;
        height: 100%;
        transition: all 0.1s ease-in-out;
        transform: translate(500px,0);
    }
    #navtray.active {
        transform: translate(0,0);
    }
    .nav-logo {
        position: absolute;
        top: 20px;
        left: 15px;
        width: 120px;
        cursor: pointer;
    }
    .nav-logo img {
        width: 100%;
    }
    .nav-menu {
        position: absolute;
        right: 15px;
        top: 19px;
        width: 40px;
        height: 40px;
        cursor: pointer;
    }
    .nav-menu img {
        width: 100%;
        -webkit-transform: scaleX(-1);
        transform: scaleX(-1);
    }
    @media (min-width: 900px) {
        .nav-logo {
            top: 20px;
            left: 45px;
            width: 120px;
        }
        .nav-menu {
            right: 45px;
            top: 24px;
            width: 40px;
            height: 40px;
        }
    }
</style>
