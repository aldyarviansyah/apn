<div class="ui-tray shift-activity-detail">
    <div class="data-info-head">
        <i data-feather="chevron-left" class="data-info-close close-current"></i>
        <h2>Shift Activities</h2>
    </div>
    <div class="data-info-spinner-container">
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <div class="data-info-body">
        <div class="tray-form pb-10">
            <div class="card mb-10">
                <div class="card-body text-center pt-2 pb-2 close-current cursor-ptr">
                    Wednesday, 22 Nov 2020
                </div>
            </div>
            <div class="summary-radio activity-radio mb-10">
                <div class="row">
                    <div class="col-6 pr-1 summary-tab">
                        <div class="card switch-activity-detail active" data-seed="shift1">
                            <div class="card-body font-size-12">
                                Shift 1
                            </div>
                        </div>
                    </div>

                    <div class="col-6 pl-1 summary-tab">
                        <div class="card switch-activity-detail" data-seed="shift2">
                            <div class="card-body font-size-12">
                                Shift 2
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="activity-slice active" data-mode="shift1">
                <table class="table table-borderless table-sm mb-30 shift-day-table">
                    <tr class="shift-total">
                        <td>Total shift activities <br><span class="o3">All staff</span></td>
                        <td class="val-contributions cell-activities">139</td>
                    </tr>
                    <tr>
                        <td colspan="99"></td>
                    </tr>
                    <tr class="cursor-ptr view-staff-shift">
                        <td class="user-cell">
                            <div class="thumb"><img src="{{ asset('img/user-profile/1.jpg') }}"></div>
                            <div class="inner">Edwin Law <br> <span class="o3">Field Team</span></div>
                        </td>
                        <td class="val-contributions">94</td>
                    </tr>
                    <tr class="cursor-ptr view-staff-shift">
                        <td class="user-cell">
                            <div class="thumb"><img src="{{ asset('img/user-profile/1.jpg') }}"></div>
                            <div class="inner">Capt. Redi Dasman <br><span class="o3">Administrator</span></div>
                        </td>
                        <td class="val-contributions">57</td>
                    </tr>
                    <tr class="cursor-ptr view-staff-shift">
                        <td class="user-cell">
                            <div class="thumb"><img src="{{ asset('img/user-profile/1.jpg') }}"></div>
                            <div class="inner">Muh. Guruh <br><span class="o3">Administrator</span></div>
                        </td>
                        <td class="val-contributions">13</td>
                    </tr>
                </table>
            </div>
            <div class="activity-slice" data-mode="shift2">
                <table class="table table-borderless table-sm mb-30 shift-day-table">
                    <tr class="shift-total">
                        <td>Total shift activities <br><span class="o3">All staff</span></td>
                        <td class="val-contributions cell-activities">125</td>
                    </tr>
                    <tr>
                        <td colspan="99"></td>
                    </tr>
                    <tr>
                        <td colspan="99"></td>
                    </tr>
                    <tr class="cursor-ptr view-staff-shift">
                        <td class="user-cell">
                            <div class="thumb"><img src="{{ asset('img/user-profile/1.jpg') }}"></div>
                            <div class="inner">Muh. Guruh <br><span class="o3">Administrator</span></div>
                        </td>
                        <td class="val-contributions">68</td>
                    </tr>
                    <tr class="cursor-ptr view-staff-shift">
                        <td class="user-cell">
                            <div class="thumb"><img src="{{ asset('img/user-profile/1.jpg') }}"></div>
                            <div class="inner">Capt. Redi <br><span class="o3">Administrator</span></div>
                        </td>
                        <td class="val-contributions">40</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="data-item cursor-ptr close-current">
            <a href="#" class="data-info-action">Back</a>
        </div>
        <div class="data-item cursor-ptr close-all-tray">
            <a href="#" class="data-info-action">Close</a>
        </div>
    </div>
</div>
