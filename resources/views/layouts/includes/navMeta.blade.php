<section id="nav-meta" class="open-tray" data-target="nav-meta-tray">
    <span class="shift-indicator">08.00 - 16.00</span>
    <span class="shift-indicator activity">52</span>
    <span class="shift-indicator reports">2</span>
    <span class="shift-indicator discharge">456</span>
    <span class="shift-indicator pa-pending">241</span>
</section>

<style type="text/css">
    #nav-meta {
        height: 50px;
        top: 50px;
        line-height: 50px;
        width: 100%;
        background: #eff4f7;
        border-bottom: 1px solid rgba(0,0,0,.075);
        position: fixed;
        text-align: center;
        cursor: pointer;
    }
    #nav-meta:hover,
    #nav-meta:active {
        background: #ececec;
    }
    .shift-indicator {
        background: white;
        border-radius: 5px;
        padding: 2px 7px 3px 7px;
        font-size: 13px;
        margin-left: 3px;
        position: relative;
        top: -1px;
    }
    .shift-indicator.activity {
        background: #305496;
        color: white;
    }
    .shift-indicator.reports {
        background: #9E9E9E;
        color: white;
    }
    .shift-indicator.discharge {
        background: var(--red);
        color: white;
    }
    .shift-indicator.pa-pending {
        background: var(--yellow);
    }
</style>

@include('layouts.includes.meta-tray.navMetaTray')
