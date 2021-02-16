<div class="ui-tray nav-meta-tray">
    <div class="data-info-head">
        <i data-feather="chevron-left" class="data-info-close close-all-tray"></i>
        <h2>Shift Summaries</h2>
    </div>
    <div class="data-info-body">
        <div class="tray-form pb-10">
            <div class="card mb-10">
                <div class="card-body text-center pt-2 pb-2 open-tray summary-date-select" data-target="summary-date-range">
                    22/11/2020 - 28/11/2020
                </div>
            </div>
            <div class="summary-radio mb-10">
                <div class="row">

                    <div class="col-3 pr-1 summary-tab">
                        <div class="card switch-summary switch-activity active" data-target="table--activities">
                            <div class="card-body">
                                <i data-feather="activity" class="icon"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-3 pl-1 pr-1 summary-tab">
                        <div class="card switch-summary switch-discharge" data-target="table--discharge">
                            <div class="card-body">
                                <i data-feather="truck" class="icon"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-3 pl-1 pr-1 summary-tab">
                        <div class="card switch-summary switch-reports" data-target="table--reports">
                            <div class="card-body">
                                <i data-feather="file-text" class="icon"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-3 pl-1 summary-tab">
                        <div class="card switch-summary switch-pa" data-target="table--pa">
                            <div class="card-body">
                                <i data-feather="radio" class="icon"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="shift-table table--activities active">
                <table class="table table-borderless table-sm mb-30 shift-activity-table">
                    <tr>
                        <td colspan="3" class="val-header">Shift Activities</td>
                    </tr>
                    <tr>
                        <td class="val-header"></td>
                        <td class="val-header">Shift 1</td>
                        <td class="val-header">Shift 2</td>
                    </tr>
                    <tr>
                        <td>Monday <br><span class="o3">22 Nov</span></td>
                        <td class="val view-shift activity-1">65</td>
                        <td class="val view-shift activity-1">89</td>
                    </tr>
                    <tr>
                        <td>Tuesday <br><span class="o3">23 Nov</span></td>
                        <td class="val view-shift activity-2">150</td>
                        <td class="val view-shift activity-1">70</td>
                    </tr>
                    <tr>
                        <td>Wednesday <br><span class="o3">24 Nov</span></td>
                        <td class="val view-shift activity-3">210</td>
                        <td class="val view-shift activity-1">13</td>
                    </tr>
                    <tr>
                        <td>Thursday <br><span class="o3">25 Nov</span></td>
                        <td class="val view-shift activity-2">165</td>
                        <td class="val view-shift activity-1">65</td>
                    </tr>
                    <tr class="shift-today">
                        <td>Friday <br><span class="o3">26 Nov</span></td>
                        <td class="val view-shift activity-1">70</td>
                        <td class="val no-activity"></td>
                    </tr>
                    <tr>
                        <td>Saturday <br><span class="o3">27 Nov</span></td>
                        <td class="val no-activity"></td>
                        <td class="val no-activity"></td>
                    </tr>
                    <tr>
                        <td>Sunday <br><span class="o3">28 Nov</span></td>
                        <td class="val no-activity"></td>
                        <td class="val no-activity"></td>
                    </tr>
                </table>
            </div>
            <div class="shift-table table--discharge">
                <table class="table table-borderless table-sm mb-30 shift-activity-table">
                    <tr>
                        <td colspan="4" class="val-header">Shift Total Discharge (kilo Mt)</td>
                    </tr>
                    <tr>
                        <td class="val-header"></td>
                        <td class="val-header">Shift 1</td>
                        <td class="val-header">Shift 2</td>
                        <td class="val-header">Daily</td>
                    </tr>
                    <tr>
                        <td>Monday <br><span class="o3">22 Nov</span></td>
                        <td class="val view-shift-discharge discharge-1">56</td>
                        <td class="val view-shift-discharge discharge-3">424</td>
                        <td class="val view-shift-discharge no-activity">480</td>
                    </tr>
                    <tr>
                        <td>Tuesday <br><span class="o3">23 Nov</span></td>
                        <td class="val view-shift-discharge discharge-2">250</td>
                        <td class="val view-shift-discharge discharge-1">24</td>
                        <td class="val view-shift-discharge no-activity">480</td>
                    </tr>
                    <tr>
                        <td>Wednesday <br><span class="o3">24 Nov</span></td>
                        <td class="val view-shift-discharge discharge-1">56</td>
                        <td class="val view-shift-discharge discharge-2">126</td>
                        <td class="val view-shift-discharge no-activity">480</td>
                    </tr>
                    <tr>
                        <td>Thursday <br><span class="o3">25 Nov</span></td>
                        <td class="val view-shift-discharge discharge-2">276</td>
                        <td class="val view-shift-discharge discharge-2">289</td>
                        <td class="val view-shift-discharge no-activity">480</td>
                    </tr>
                    <tr class="shift-today">
                        <td>Friday <br><span class="o3">26 Nov</span></td>
                        <td class="val view-shift-discharge discharge-3">690</td>
                        <td class="val no-activity"></td>
                        <td class="val no-activity"></td>
                    </tr>
                    <tr>
                        <td>Saturday <br><span class="o3">27 Nov</span></td>
                        <td class="val no-activity"></td>
                        <td class="val no-activity"></td>
                        <td class="val no-activity"></td>
                    </tr>
                    <tr>
                        <td>Sunday <br><span class="o3">28 Nov</span></td>
                        <td class="val no-activity"></td>
                        <td class="val no-activity"></td>
                        <td class="val no-activity"></td>
                    </tr>
                </table>
            </div>
            <div class="shift-table table--reports">
                <table class="table table-borderless table-sm mb-30 shift-activity-table">
                    <tr>
                        <td colspan="3" class="val-header">Shift Reports</td>
                    </tr>
                    <tr>
                        <td class="val-header"></td>
                        <td class="val-header">Shift 1</td>
                        <td class="val-header">Shift 2</td>
                    </tr>
                    <tr>
                        <td>Monday <br><span class="o3">22 Nov</span></td>
                        <td class="val view-shift-report report-1">2</td>
                        <td class="val view-shift-report report-3">12</td>
                    </tr>
                    <tr>
                        <td>Tuesday <br><span class="o3">23 Nov</span></td>
                        <td class="val no-activity">0</td>
                        <td class="val view-shift-report report-2">6</td>
                    </tr>
                    <tr>
                        <td>Wednesday <br><span class="o3">24 Nov</span></td>
                        <td class="val view-shift-report report-1">1</td>
                        <td class="val view-shift-report report-1">2</td>
                    </tr>
                    <tr>
                        <td>Thursday <br><span class="o3">25 Nov</span></td>
                        <td class="val view-shift-report report-2">8</td>
                        <td class="val view-shift-report report-1">4</td>
                    </tr>
                    <tr class="shift-today">
                        <td>Friday <br><span class="o3">26 Nov</span></td>
                        <td class="val view-shift-report report-1">2</td>
                        <td class="val view-shift-report report-1">5</td>
                    </tr>
                    <tr>
                        <td>Saturday <br><span class="o3">27 Nov</span></td>
                        <td class="val no-activity"></td>
                        <td class="val no-activity"></td>
                    </tr>
                    <tr>
                        <td>Sunday <br><span class="o3">28 Nov</span></td>
                        <td class="val no-activity"></td>
                        <td class="val no-activity"></td>
                    </tr>
                </table>
            </div>
            <div class="shift-table table--pa">
                <table class="table table-borderless table-sm mb-30 shift-activity-table">
                    <tr>
                        <td colspan="3" class="val-header">Pending PA</td>
                    </tr>
                    <tr>
                        <td class="val-header"></td>
                        <td class="val-header">Shift 1</td>
                        <td class="val-header">Shift 2</td>
                    </tr>
                    <tr>
                        <td>Monday <br><span class="o3">22 Nov</span></td>
                        <td class="val pa-pending-1">4</td>
                        <td class="val pa-pending-2">13</td>
                    </tr>
                    <tr>
                        <td>Tuesday <br><span class="o3">23 Nov</span></td>
                        <td class="val pa-pending-1">2</td>
                        <td class="val pa-pending-3">25</td>
                    </tr>
                    <tr>
                        <td>Wednesday <br><span class="o3">24 Nov</span></td>
                        <td class="val pa-pending-2">13</td>
                        <td class="val pa-pending-1">4</td>
                    </tr>
                    <tr>
                        <td>Thursday <br><span class="o3">25 Nov</span></td>
                        <td class="val pa-pending-1">2</td>
                        <td class="val pa-pending-1">1</td>
                    </tr>
                    <tr class="shift-today">
                        <td>Friday <br><span class="o3">26 Nov</span></td>
                        <td class="val pa-pending-1">5</td>
                        <td class="val no-activity"></td>
                    </tr>
                    <tr>
                        <td>Saturday <br><span class="o3">27 Nov</span></td>
                        <td class="val no-activity"></td>
                        <td class="val no-activity"></td>
                    </tr>
                    <tr>
                        <td>Sunday <br><span class="o3">28 Nov</span></td>
                        <td class="val no-activity"></td>
                        <td class="val no-activity"></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="data-item cursor-ptr close-all-tray">
            <a href="#" class="data-info-action">Close</a>
        </div>
    </div>
</div>

@include('layouts.includes.meta-tray.dateRange')

<!-- activities -->
@include('layouts.includes.meta-tray.shiftActivityDetail')

@include('layouts.includes.meta-tray.shiftActivityDetailStaff')

<!-- discharge -->
{{--@include('layouts.includes.meta-tray.shiftDischargeDetail')--}}
<livewire:components.shift-discharge-detail/>

<!-- reports -->
@include('layouts.includes.meta-tray.shiftReportDetail')

<style type="text/css">
    .report-slice {display: none;}
    .report-slice.active {display: block;}
    .report-radio .switch-report-detail {
        text-align: center;
    }
    .report-radio .switch-report-detail:active,
    .report-radio .switch-report-detail.active {
        border: 1px solid var(--coal) !important;
        background: var(--coal) !important;
        color: white !important;
    }
    .user-cell {
        position: relative;
    }
    .user-cell .inner {
        padding-left: 40px;
    }
    .user-cell .thumb {
        position: absolute;
        top: 50%;
        transform: translate(0,-50%);
        border-radius: 100px;
        width: 28px;
        height: 28px;
        overflow: hidden;
    }
    .user-cell .thumb img {
        width: 100%;
        border-radius: 100px;
    }
    .activity-slice {display: none;}
    .activity-slice.active {display: block;}
    .activity-radio .switch-activity-detail {
        text-align: center;
    }
    .activity-radio .switch-activity-detail:active,
    .activity-radio .switch-activity-detail.active {
        border: 1px solid var(--navy) !important;
        background: var(--navy) !important;
        color: white !important;
    }
    .summary-date-select {
        cursor: pointer;
    }
    .summary-date-select:hover {
        background: rgb(0 0 0 / .03);
    }
    .shift-discharge-table .val,
    .shift-day-table .val-contributions {
        min-height: 44px;
    }
    .discharge-radio .switch-discharge-detail {
        text-align: center;
    }
    .discharge-radio .switch-discharge-detail:active,
    .discharge-radio .switch-discharge-detail.active {
        border: 1px solid var(--red) !important;
        background: var(--red) !important;
        color: white !important;
    }
    .shift-discharge-table .val {
        padding: 8px 0;
    }
    .sub-val {display: none;}
    .shift-discharge-total-row .val {
        background: #ececec;
    }
    *[data-mode="shift1--val"] .sub-val.shift1--val {display: block}
    *[data-mode="shift2--val"] .sub-val.shift2--val {display: block}
    *[data-mode="total--val"] .sub-val.total--val {display: block}
    .switch-summary {
        text-align: center;
    }
    .summary-tab {
        margin-bottom: 10px;
    }
    .summary-tab .icon {
        width: 14px;
        height: 14px;
        opacity: .8;
        position: relative;
        top: -2px;
    }
    .summary-tab .card {
        transition: all 0.1s ease-in-out;
        cursor: pointer;
    }
    .summary-tab .card:active {
        transform: scale(1.05) !important;
    }
    .summary-tab .card.active {
        /*background: rgb(0 0 0 / .05);*/
    }
    .summary-tab .card:hover {
        background: rgb(0 0 0 / .03);
    }
    .summary-tab .card-body {
        padding: 12px 20px;
    }
    .summary-tab .switch-activity.active {background: var(--navy);color: white;border: 1px solid var(--navy);}
    .summary-tab .switch-discharge.active {background: var(--red);color: white;border: 1px solid var(--cerise);}
    .summary-tab .switch-reports.active {background: var(--coal);color: white;border: 1px solid var(--coal);}
    .summary-tab .switch-pa.active {background: var(--yellow);border: 1px solid var(--yellow);}

    .summary-tab .active .icon {opacity: 1}

    .shift-table {display: none;}
    .shift-table.active {display: block;}

    .activity-1 {background: #d9e1f2;}
    .activity-2 {background: #8ea9db;}
    .activity-3 {background: #203764; color: rgb(255 255 255 / .8);}

    .discharge-1 {background: rgb(220 53 69 / .2);}
    .discharge-2 {background: rgb(220 53 69 / .5);}
    .discharge-3 {background: rgb(220 53 69 / .8);color: white;}

    .pa-pending-1 {background: #ffecb3;}
    .pa-pending-2 {background: var(--yellow);}
    .pa-pending-3 {background: #ff8f00;}

    .report-1 {background: rgb(108 117 125 / .2);}
    .report-2 {background: rgb(108 117 125 / .5);}
    .report-3 {background: var(--coal);color: white;}
    .kpi-summary-table .val {
        text-align: center;
    }
    tr td.cell-activities {
        background: var(--navy) !important;
        color: white !important;
    }
    tr.shift-today td:first-child {
        background: rgb(86 145 169 / 0.2);
    }
    .shift-activity-table {
        font-size: 12px;
    }
    .shift-activity-table .val-header {
        text-align: center;
        background: #fafafa;
        border: 1px solid white;
        padding: 10px 15px;
    }
    .shift-activity-table .val {
        vertical-align: middle;
        border: 1px solid rgb(255 255 255 / 1);
        transition: all 0.1s ease-in-out;
        cursor: pointer;
        text-align: center;
    }
    .shift-activity-table .val:active {
        transform: scale(1.05) !important;
    }
    .shift-activity-table .val:hover {
        opacity: .8;
    }
    .no-activity {background: #ececec;}


    .summary-report {background: #ececec;}
    .summary-discharge {background: #ececec;}


    .shift-day-table {
        font-size: 12px;
    }
    .shift-day-table .val-contributions,
    .shift-day-table .shift-day-action {
        text-align: center;
        vertical-align: middle;
        border: 1px solid rgb(255 255 255 / 1);
        padding-left: 10px;
        padding-right: 10px;
    }
    .shift-day-table .val-contributions {
        background: #ececec;
    }
    .shift-day-table .val-contributions.reports {
        background: #8bc34a;
        color: white;
    }
    .shift-day-table .shift-day-action {
        background: #b4c6e7;
    }
    .shift-day-table .val-contributions:hover {
        background: #e1e1e1;
    }

    .shift-activity-item {
        color: #cecece;
        padding-left: 15px !important;
        padding-bottom: 15px !important;
        cursor: pointer;
    }
    .shift-activity-item:hover span,
    .shift-activity-item:active span {
        color: #303030;
    }
    .hour-head td {
        border-bottom: 1px solid #cecece;
        padding-top: 20px;
        font-size: 14px;
    }
</style>
