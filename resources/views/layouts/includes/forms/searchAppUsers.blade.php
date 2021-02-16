<div class="ui-tray user-search-tray">
    <div class="data-info-head">
        <i data-feather="chevron-left" class="data-info-close close-all-tray"></i>
        <h2>Search App User</h2>
    </div>
    <div class="data-info-body">
        <div class="tray-form pb-10">

            <div class="form-group">
                <input type="text" class="form-control gmod first-focus" placeholder="Search username">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block gmod-btn scale has-spinner user-select-search-go">
                    <div class="info-container">Search</div>
                    <div class="spinner-container">
                        <div class="spinner-border"></div>
                    </div>
                </button>
            </div>
            <div class="user-result-options d-none">
                <div class="card mb-10 user-tray-item">
                    <div class="card-body">
                        <div class="content">
                            <div class="thumb"><img src="{{ asset('img/initials/1_a.png') }}"></div>
                            <div class="inner">Amber McDonald <br><span class="o3">Administrator</span></acronym></div>
                        </div>
                    </div>
                </div>
                <div class="card mb-10 user-tray-item">
                    <div class="card-body">
                        <div class="content">
                            <div class="thumb"><img src="{{ asset('img/initials/1_h.png') }}"></div>
                            <div class="inner">Hames Frank <br><span class="o3">Administrator</span></acronym></div>
                        </div>
                    </div>
                </div>
                <div class="card mb-10 user-tray-item">
                    <div class="card-body">
                        <div class="content">
                            <div class="thumb"><img src="{{ asset('img/initials/1_d.png') }}"></div>
                            <div class="inner">Donnie Fedora <br><span class="o3">Administrator</span></acronym></div>
                        </div>
                    </div>
                </div>
                <p class="o5 ml-1 mr-1"><em>Showing maximum 10 results. Refine your search if the user is not found.</em></p>
            </div>
        </div>
        <div class="data-item cursor-ptr close-all-tray">
            <a href="#" class="data-info-action">Cancel</a>
        </div>
    </div>
</div>
