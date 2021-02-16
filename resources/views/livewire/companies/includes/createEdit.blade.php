<div class="trays-create">

    <div class="ui-tray select-users {{ $openSelectUser?'active':'' }}">
        <div class="data-info-head">
            <i data-feather="chevron-left" class="data-info-close close-all-tray"></i>
            <h2>Select users</h2>
        </div>
        <div class="data-info-body">
            <div class="tray-form pb-10">
                <p>Select from your registered users. If not found, please register as new.</p>
                <form wire:submit.prevent="searchUsers">
                    <div class="form-group">
                        <input type="text" class="form-control gmod first-focus  @error('keyword') is-invalid @enderror" placeholder="Search" wire:model="keyword">
                        @error('keyword')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block gmod-btn pop-onclick add-spinner white-spinner tray-search-go">
                            <div wire:loading.remove wire:target="searchUsers">
                                Search
                            </div>
                            <div class="spinner-contain" wire:loading wire:target="searchUsers">
                                <div class="spinner-border"></div>
                            </div>
                        </button>
                    </div>
                </form>

                <div class="in-tray-search-result tray-user-select">
                    <div class="tray-list-result">
                        @foreach($users as $user)
                            <div class="card user-choice mb-10 close-all-tray" wire:key="users{{ $user->id }}" wire:click="selectThis('user',{{$user}})" data-full_name="{{$user->full_name}}" data-role="{{$user->role}}" data-image="{{$user->image}}">
                                <div class="card-body">
                                    <img class="radio-thumb" src="{{ $user->image }}">
                                    <div class="radio-name fw-600">{{ $user->full_name }}</div>
                                    <div class="radio-meta o3">{{ $user->role }}</div>
                                </div>
                            </div>
                        @endforeach
                        @if($notfound)
                            <p class="o5 ml-1 mr-1"><em>Data not found</em></p>
                        @endif
                    </div>
                    <p class="o5 ml-1 mr-1"><em>Showing a maximum of 10 results that you are authorized to view. Refine your search if the data is not found.</em></p>

                </div>
            </div>
            <div class="data-item close-all-tray">
                <a href="#" class="data-info-action">Cancel</a>
            </div>
        </div>
        <div class="selected-ship-template d-none">
            <div class="card mb-10 tray-option open-tray cursor-ptr" data-target="select-ship">
                <div class="card-body">
                    <div class="radio-name fw-600"></div>
                    <div class="radio-meta o3"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="ui-tray select-ships {{ $openSelectShip?'active':'' }}">
        <div class="data-info-head">
            <i data-feather="chevron-left" class="data-info-close close-all-tray"></i>
            <h2>Select ships</h2>
        </div>
        <div class="data-info-body">
            <div class="tray-form pb-10">
                <p>Select from your registered ships. If not found, please register as new.</p>
                <form wire:submit.prevent="searchShips">
                    <div class="form-group">
                        <input type="text" class="form-control gmod first-focus  @error('keyword') is-invalid @enderror" placeholder="Search" wire:model="keyword">
                        @error('keyword')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block gmod-btn pop-onclick add-spinner white-spinner tray-search-go">
                            <div wire:loading.remove wire:target="searchShips">
                                Search
                            </div>
                            <div class="spinner-contain" wire:loading wire:target="searchShips">
                                <div class="spinner-border"></div>
                            </div>
                        </button>
                    </div>
                </form>

                <div class="in-tray-search-result tray-ship-select">
                    <div class="tray-list-result">
                        @foreach($ships as $key => $ship)
                            <div class="card ship-choice mb-10 close-all-tray" wire:key="boats{{ $ship->id }}" wire:click="selectThis('ship',{{$ship}})" data-name="{{ $ship->name }}" data-category="{{ $ship->category }}">
                                <div class="card-body">
                                    <div class="radio-name fw-600">{{ $ship->name }}</div>
                                    <div class="radio-meta o3">{{ ucfirst($ship->category) }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @if($notfound)
                        <p class="o5 ml-1 mr-1"><em>Data not found</em></p>
                    @endif
                    <p class="o5 ml-1 mr-1"><em>Showing a maximum of 10 results that you are authorized to view. Refine your search if the data is not found.</em></p>
                </div>
            </div>
            <div class="data-item close-all-tray">
                <a href="#" class="data-info-action">Cancel</a>
            </div>
        </div>
        <div class="selected-ship-template d-none">
            <div class="card mb-10 tray-option open-tray cursor-ptr" data-target="select-ship">
                <div class="card-body">
                    <div class="radio-name fw-600"></div>
                    <div class="radio-meta o3"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="ui-tray select-boats {{ $openSelectBoat?'active':'' }}">
        <div class="data-info-head">
            <i data-feather="chevron-left" class="data-info-close close-all-tray"></i>
            <h2>Select boats</h2>
        </div>
        <div class="data-info-body">
            <div class="tray-form pb-10">
                <p>Select from your registered boats. If not found, please register as new.</p>
                <form wire:submit.prevent="searchBoats">
                    <div class="form-group">
                        <input type="text" class="form-control gmod first-focus  @error('keyword') is-invalid @enderror" placeholder="Search" wire:model="keyword">
                        @error('keyword')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block gmod-btn pop-onclick add-spinner white-spinner tray-search-go">
                            <div wire:loading.remove wire:target="searchBoats">
                                Search
                            </div>
                            <div class="spinner-contain" wire:loading wire:target="searchBoats">
                                <div class="spinner-border"></div>
                            </div>
                        </button>
                    </div>
                </form>

                <div class="in-tray-search-result tray-boat-select">
                    <div class="tray-list-result">
                        @foreach($boats as $key => $boat)
                            <div class="card boat-choice mb-10 close-all-tray" wire:key="boats{{$boat->id}}" wire:click="selectThis('boat',{{$boat}})" data-name="{{$boat->name}}">
                                <div class="card-body">
                                    <div class="radio-name fw-600">{{ $boat->name }}</div>
                                    <div class="radio-meta o3">Tug Boat</div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @if($notfound)
                        <p class="o5 ml-1 mr-1"><em>Data not found</em></p>
                    @endif
                    <p class="o5 ml-1 mr-1"><em>Showing a maximum of 10 results that you are authorized to view. Refine your search if the data is not found.</em></p>
                </div>
            </div>
            <div class="data-item close-all-tray">
                <a href="#" class="data-info-action">Cancel</a>
            </div>
        </div>
        <div class="selected-ship-template d-none">
            <div class="card mb-10 tray-option open-tray cursor-ptr" data-target="select-ship">
                <div class="card-body">
                    <div class="radio-name fw-600"></div>
                    <div class="radio-meta o3"></div>
                </div>
            </div>
        </div>
    </div>

</div>
