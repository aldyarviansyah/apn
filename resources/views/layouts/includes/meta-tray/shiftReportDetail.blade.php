<div class="ui-tray shift-report-detail">
    <div class="data-info-head">
        <i data-feather="chevron-left" class="data-info-close close-current"></i>
        <h2>Shift Reports</h2>
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
            <div class="summary-radio report-radio mb-10">
                <div class="row">
                    <div class="col-6 pr-1 summary-tab">
                        <div class="card switch-report-detail active" data-seed="shift1">
                            <div class="card-body font-size-12">
                                Shift 1
                            </div>
                        </div>
                    </div>

                    <div class="col-6 pl-1 summary-tab">
                        <div class="card switch-report-detail" data-seed="shift2">
                            <div class="card-body font-size-12">
                                Shift 2
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="report-slice active" data-mode="shift1">
                <div class="card mb-10">
                    <div class="card-body pt-2 pb-2 cursor-ptr">
                        <div class="report-meta">
                            <div class="thumb"><img src="{{ asset('img/initials/1_g.png')  }}"></div>
                            <div class="time">18.24</div>
                            <div class="inner">Muh. Guruh <br><span class="o3">Administrator</span></div>
                        </div>
                        <div class="report-content">
                            Ombak sangat besar
                        </div>
                    </div>
                </div>
                <div class="card mb-10">
                    <div class="card-body pt-2 pb-2 cursor-ptr">
                        <div class="report-meta">
                            <div class="thumb"><img src="{{ asset('img/user-profile/2.jpg') }}"></div>
                            <div class="time">17.12</div>
                            <div class="inner">Edwin Law <br> <span class="o3">Field Team</span></div>
                        </div>
                        <div class="report-content">
                            Excavator utk slot 24-25 bahan bakar habis
                        </div>
                    </div>
                </div>
            </div>
            <div class="report-slice" data-mode="shift2">
                <div class="card mb-10">
                    <div class="card-body pt-2 pb-2 cursor-ptr">
                        <div class="report-meta">
                            <div class="thumb"><img src="{{ asset('img/user-profile/1.jpg') }}"></div>
                            <div class="time">18.24</div>
                            <div class="inner">Muh. Guruh <br><span class="o3">Administrator</span></div>
                        </div>
                        <div class="report-content">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua.
                        </div>
                    </div>
                </div>
                <div class="card mb-10">
                    <div class="card-body pt-2 pb-2 cursor-ptr">
                        <div class="report-meta">
                            <div class="thumb"><img src="{{ asset('img/user-profile/2.jpg') }}"></div>
                            <div class="time">17.12</div>
                            <div class="inner">Edwin Law <br> <span class="o3">Field Team</span></div>
                        </div>
                        <div class="report-content">
                            Excavator utk slot 24-25 bahan bakar habis
                        </div>
                    </div>
                </div>
                <div class="card mb-10">
                    <div class="card-body pt-2 pb-2 cursor-ptr">
                        <div class="report-meta">
                            <div class="thumb"><img src="{{ asset('img/user-profile/1.jpg') }}"></div>
                            <div class="time">18.24</div>
                            <div class="inner">Muh. Guruh <br><span class="o3">Administrator</span></div>
                        </div>
                        <div class="report-content">
                            Ombak sangat besar
                        </div>
                    </div>
                </div>
                <div class="card mb-10">
                    <div class="card-body pt-2 pb-2 cursor-ptr">
                        <div class="report-meta">
                            <div class="thumb"><img src="{{ asset('img/initials/1_e.png') }}"></div>
                            <div class="time">17.12</div>
                            <div class="inner">Edwin Law <br> <span class="o3">Field Team</span></div>
                        </div>
                        <div class="report-content">
                            Excavator utk slot 24-25 bahan bakar habis
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style type="text/css">
            .report-meta {
                position: relative;
                margin-bottom: 10px;
                font-size: 12px;
            }
            .report-meta .inner {
                padding-left: 40px;
            }
            .report-meta .thumb {
                position: absolute;
                top: 50%;
                transform: translate(0,-50%);
                border-radius: 100px;
                width: 28px;
                height: 28px;
                overflow: hidden;
            }
            .report-meta .thumb img {
                width: 100%;
                border-radius: 100px;
            }
            .report-meta .time {
                opacity: .3;
                position: absolute;
                top: 0;
                right: 0px;
            }
        </style>

        <div class="data-item cursor-ptr close-current">
            <a href="#" class="data-info-action">Back</a>
        </div>
        <div class="data-item cursor-ptr close-all-tray">
            <a href="#" class="data-info-action">Close</a>
        </div>
    </div>
</div>
