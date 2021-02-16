<div class="ui-tray shift-discharge-detail">
    <div class="data-info-head">
        <i data-feather="chevron-left" class="data-info-close close-current"></i>
        <h2>Shift Discharge</h2>
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
            <div class="summary-radio discharge-radio mb-10">
                <div class="row">

                    <div class="col-4 pr-1 summary-tab">
                        <div class="card switch-discharge-detail active" data-seed="shift1--val">
                            <div class="card-body font-size-12">
                                Shift 1
                            </div>
                        </div>
                    </div>

                    <div class="col-4 pl-1 pr-1 summary-tab">
                        <div class="card switch-discharge-detail" data-seed="shift2--val">
                            <div class="card-body font-size-12">
                                Shift 2
                            </div>
                        </div>
                    </div>

                    <div class="col-4 pl-1 summary-tab">
                        <div class="card switch-discharge-detail" data-seed="total--val">
                            <div class="card-body font-size-12">
                                Total
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <table class="table table-borderless table-sm mb-30 shift-activity-table table--shift-discharge-detail" data-mode="shift1--val">
                <tr>
                    <td colspan="4" class="val-header">
                        <div class="sub-val shift1--val">Shift 1 Total Discharge (kilo Mt)</div>
                        <div class="sub-val shift2--val">Shift 2 Total Discharge (kilo Mt)</div>
                        <div class="sub-val total--val">Day Total Discharge (kilo Mt)</div>
                    </td>
                </tr>
                <tr>
                    <td class="val-header"></td>
                    <td class="val-header">Trans</td>
                    <td class="val-header">Reg</td>
                    <td class="val-header">Total</td>
                </tr>
                <?php foreach ($cargos as $key => $val): ?>
                <tr>
                    <td><?php echo $key; ?></td>
                    <td class="val o7 <?php echo $val; ?>">
                        <div class="sub-val shift1--val">4</div>
                        <div class="sub-val shift2--val">8</div>
                        <div class="sub-val total--val">12</div>
                    </td>
                    <td class="val o7 <?php echo $val; ?>">
                        <div class="sub-val shift1--val">6</div>
                        <div class="sub-val shift2--val">11</div>
                        <div class="sub-val total--val">17</div>
                    </td>
                    <td class="val <?php echo $val; ?>">
                        <div class="sub-val shift1--val">10</div>
                        <div class="sub-val shift2--val">19</div>
                        <div class="sub-val total--val">29</div>
                    </td>
                </tr>
                <?php if ($key == 'Nickel Ore'): ?>
                <tr>
                    <td colspan="99"></td>
                </tr>
                <?php endif; ?>
                <?php if ($key == 'Semi Coke'): ?>
                <tr class="shift-discharge-total-row">
                    <td>Total coal</td>
                    <td class="val o7">
                        <div class="sub-val shift1--val"><?php echo rand(200,400); ?></div>
                        <div class="sub-val shift2--val"><?php echo rand(200,400); ?></div>
                        <div class="sub-val total--val"><?php echo rand(200,400); ?></div>
                    </td>
                    <td class="val o7">
                        <div class="sub-val shift1--val"><?php echo rand(200,400); ?></div>
                        <div class="sub-val shift2--val"><?php echo rand(200,400); ?></div>
                        <div class="sub-val total--val"><?php echo rand(200,400); ?></div>
                    </td>
                    <td class="val">
                        <div class="sub-val shift1--val"><?php echo rand(200,400); ?></div>
                        <div class="sub-val shift2--val"><?php echo rand(200,400); ?></div>
                        <div class="sub-val total--val"><?php echo rand(200,400); ?></div>
                    </td>
                </tr>
                <tr>
                    <td colspan="99"></td>
                </tr>
                <?php endif; ?>
                <?php endforeach; ?>
                <tr class="shift-discharge-total-row">
                    <td>Total All</td>
                    <td class="val o7">
                        <div class="sub-val shift1--val"><?php echo rand(200,400); ?></div>
                        <div class="sub-val shift2--val"><?php echo rand(200,400); ?></div>
                        <div class="sub-val total--val"><?php echo rand(200,400); ?></div>
                    </td>
                    <td class="val o7">
                        <div class="sub-val shift1--val"><?php echo rand(200,400); ?></div>
                        <div class="sub-val shift2--val"><?php echo rand(200,400); ?></div>
                        <div class="sub-val total--val"><?php echo rand(200,400); ?></div>
                    </td>
                    <td class="val">
                        <div class="sub-val shift1--val"><?php echo rand(420,1440); ?></div>
                        <div class="sub-val shift2--val"><?php echo rand(420,1440); ?></div>
                        <div class="sub-val total--val"><?php echo rand(420,1440); ?></div>
                    </td>
                </tr>
            </table>
            <p class="o5 ml-1 mr-1"><em>"Trans" refers to all vessel with transhipment type selected. "Reg" refers to both vessel and barge with regular type selected.</em></p>
        </div>
        <div class="data-item cursor-ptr close-current">
            <a href="#" class="data-info-action">Back</a>
        </div>
        <div class="data-item cursor-ptr close-all-tray">
            <a href="#" class="data-info-action">Close</a>
        </div>
    </div>
</div>
