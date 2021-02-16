<div class="ui-tray shift-activity-detail-staff">
    <div class="data-info-head">
        <i data-feather="chevron-left" class="data-info-close close-current"></i>
        <h2>Shift Info</h2>
    </div>
    <div class="data-info-spinner-container">
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <div class="data-info-body">
        <div class="tray-form pb-10">
            <div class="card mb-10">
                <div class="card-body pt-1 pb-1 text-center">
                    Edwin Law<br>
                    <span class="o3">Field Team</span>
                </div>
            </div>
            <div class="card mb-10">
                <div class="card-body pt-1 pb-1 text-center">
                    Shift 2 - 20.00 to 08.00 <br>
                    <span class="o3">Wednesday, 22 Nov 2020</span>
                </div>
            </div>
            <div class="card mb-10 bg--navy">
                <div class="card-body text-center pt-2 pb-2 cursor-ptr">
                    94 activities
                </div>
            </div>
            <table class="table table-borderless table-sm mb-30 shift-day-table">
                <?php for ($i=0; $i < 12; $i++): ?>
                <tr class="hour-head">
                    <td colspan="99">17.00 - 18.00</td>
                </tr>
                <tr>
                    <td colspan="99"></td>
                </tr>
                <tr>
                    <td>18.30</td>
                    <td class="shift-activity-item">Updated <span>Discharge Progress</span> on <span>MV. Shen Yun Lai</span> to <span>95%</span></td>
                </tr>
                <tr>
                    <td>18.20</td>
                    <td class="shift-activity-item">Updated <span>Discharge Progress</span> on <span>MV. Shen Yun Lai</span> to <span>65%</span></td>
                </tr>
                <tr>
                    <td>18.10</td>
                    <td class="shift-activity-item">Converted PA <span>BG. Budiman Sakti</span> to barge Schedule <span>BG. Budiman Sakti</span></td>
                </tr>
                <tr>
                    <td>17.10</td>
                    <td class="shift-activity-item">Registered <span>BG. Budiman Sakti</span> as a <span>Ship (Barge)</span></td>
                </tr>
                <?php endfor; ?>
            </table>
        </div>
        <div class="data-item cursor-ptr close-current">
            <a href="#" class="data-info-action">Back</a>
        </div>
        <div class="data-item cursor-ptr close-all-tray">
            <a href="#" class="data-info-action">Close</a>
        </div>
    </div>
</div>
