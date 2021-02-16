<div class="tray-others">
    <div class="ui-tray pa-inbox-filter-tray">
        <div class="data-info-head">
            <i data-feather="chevron-left" class="data-info-close close-all-tray"></i>
            <h2>Filter Piers</h2>
        </div>
        <div class="data-info-body">
            <div class="tray-form pb-10">
                <form action="{{ route('piers') }}">
                    <div class="form-group">
                        <select class="custom-select" name="pier_category_id">
                            <option value="">All pier categories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $pier_category_id == $category->id? 'selected':'' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block gmod-btn add-spinner white-spinner pop-onclick">Apply</button>
                    </div>
                    <div class="form-group">
                        <a href="#" class="btn btn-light btn-block gmod-btn close-all-tray">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="ui-tray pa-inbox-search-tray">
        <div class="data-info-head">
            <i data-feather="chevron-left" class="data-info-close close-all-tray"></i>
            <h2>Search All Arrivals</h2>
        </div>
        <div class="data-info-body">
            <div class="tray-form pb-10">
                <form action="page-arrivals.php">
                    <div class="form-group">
                        <input type="text" class="form-control gmod first-focus" placeholder="Search...">
                    </div>
                    <div class="form-group">
                        <select class="custom-select">
                            <option>Ship's name</option>
                            <option>Agent's name</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block gmod-btn add-spinner white-spinner pop-onclick">Search</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <a href="#" class="btn btn-light btn-block gmod-btn close-all-tray">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
