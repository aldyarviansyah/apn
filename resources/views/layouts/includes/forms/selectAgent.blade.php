<div class="ui-tray select-agent">
    <div class="data-info-head">
        <i data-feather="chevron-left" class="data-info-close close-all-tray"></i>
        <h2>Select agent</h2>
    </div>
    <div class="data-info-spinner-container">
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <div class="data-info-body">
        <div class="tray-form pb-10">
            <p>Select from your registered agents. If not found, please register as new.</p>
            <div class="form-group">
                <input type="text" class="form-control gmod first-focus" placeholder="Input agent name">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block gmod-btn scale has-spinner agent-select-search-go">
                    <div class="info-container">Search</div>
                    <div class="spinner-container">
                        <div class="spinner-border"></div>
                    </div>
                </button>
            </div>
            <div class="agent-result-options d-none">
                <div class="card mb-10 tray-option agent-option cursor-ptr">
                    <div class="card-body">
                        <div class="agent-select-name">PT. Andhika Semudera Luas</div>
                    </div>
                </div>
                <div class="card mb-10 tray-option agent-option cursor-ptr">
                    <div class="card-body">
                        <div class="agent-select-name">PT. Skymon Shafir Searvice</div>
                    </div>
                </div>
                <div class="card mb-10 tray-option agent-option cursor-ptr">
                    <div class="card-body">
                        <div class="agent-select-name">PT. Pelayaran Perintis Armada Berjdaya</div>
                    </div>
                </div>
                <p class="o5 ml-1 mr-1"><em>Showing maximum 10 results. Refine your search if the user is not found.</em></p>
            </div>
        </div>
        <div class="data-item cursor-ptr confirm-agent-selection">
            <a href="#" class="data-info-action">Select</a>
        </div>
        <div class="data-item cursor-ptr close-all-tray">
            <a href="#" class="data-info-action">Cancel</a>
        </div>
    </div>
    <div class="selected-agent-template d-none">
        <div class="card mb-10 tray-option open-tray cursor-ptr" data-target="select-agent">
            <div class="card-body">
                <div class="agent-select-name"></div>
            </div>
        </div>
    </div>
</div>
