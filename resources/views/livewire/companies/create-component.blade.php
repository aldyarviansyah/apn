<div>
    @include('livewire.companies.includes.createEdit')
    <section id="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">

                    <div class="mt-30"></div>
                    <form class="apn-form">
                        <div class="form-section mb-40">
                            <div class="form-group">
                                <label>Company name</label>
                                <input type="text" class="form-control gmod first-focus @error('name') is-invalid @enderror" wire:model="name">
                                <div class="o5 mt-1">For example: PT. Adiputra Sentosa</div>
                                @error('name')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Company type</label>
                                <select class="custom-select @error('company_type_id') is-invalid @enderror" wire:model="company_type_id">
                                    <option value="">Select company type</option>
                                    @foreach($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                                @error('company_type_id')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Company address</label>
                                <input type="text" class="form-control gmod @error('address') is-invalid @enderror" wire:model="address">
                                @error('address')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Company email</label>
                                <input type="text" class="form-control gmod @error('email') is-invalid @enderror" wire:model="email" onkeyup="this.value = this.value.toLowerCase();">
                                @error('email')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Company phone</label>
                                <input type="text" class="form-control gmod @error('phone') is-invalid @enderror" wire:model="phone">
                                @error('phone')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-section mb-40">
                            <div class="form-group">
                                <label>Contacts</label>
                                <div class="select-cart-area users">
                                    @foreach($users_selected as $key => $user)
                                        <div class="card mb-10 select-cart-item users" wire:key="user_selected{{ $user['id'] }}">
                                            <span wire:click="removeThis({{$key}},'user')" class="remove-el">
                                                <i data-feather="x" class="close-btn"></i>
                                            </span>
                                            <div class="card-body">
                                                <label>
                                                    <img class="thumb" src="{{ $user['image'] }}">
                                                    {{ $user['full_name'] }} ({{ $user['role'] }})
                                                </label>
                                                <input type="text" class="form-control gmod @error('user_selected_role.'.$key) is-invalid @enderror" wire:model="user_selected_role.{{$key}}" placeholder="Role in company (required)">
                                                @error('user_selected_role.'.$key)
                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <a href="#" class="btn btn-outline btn-block mb-10 gmod-btn scale justify-content-start open-tray tray-search-go pop-onclick" data-target="select-users" wire:click="openSelect('user')">
                                    <i data-feather="plus" class="add-another-icon"></i>
                                    Add Users
                                </a>
                                <div class="o5 mt-1">Adding Users are optional and you can do this task later.</div>
                            </div>
                        </div>

                        <div class="form-section mb-40">
                            <div class="form-group">
                                <label>Ships</label>
                                <div class="select-cart-area ships">
                                    @foreach($ships_selected as $key => $ship)
                                        <div class="card mb-10 select-cart-item" wire:key="ships_selected{{$key}}">
                                            <span wire:click="removeThis({{$key}},'ship')" class="remove-el">
                                                <i data-feather="x" class="close-btn"></i>
                                            </span>
                                            <div class="card-body">
                                                <label>
                                                    {{ $ship['name'] }} ({{ ucfirst($ship['category']) }})
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <a href="#" class="btn btn-outline btn-block mb-10 gmod-btn scale justify-content-start open-tray pop-onclick" data-target="select-ships" wire:click="openSelect('ship')">
                                    <i data-feather="plus" class="add-another-icon"></i>
                                    Add Ships
                                </a>
                                <div class="o5 mt-1">Adding Ships are optional and you can do this task later.</div>
                            </div>
                        </div>

                        <div class="form-section mb-40">
                            <div class="form-group">
                                <label>Boats</label>
                                <div class="select-cart-area boats">
                                    @foreach($boats_selected as $key => $boat)
                                        <div class="card mb-10 select-cart-item" wire:key="boats_selected{{$key}}">
                                            <span wire:click="removeThis({{$key}},'boat')" class="remove-el">
                                                <i data-feather="x" class="close-btn"></i>
                                            </span>
                                            <div class="card-body">
                                                <label>
                                                    {{ $boat['name'] }} (Tug Boat)
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <a href="#" class="btn btn-outline btn-block mb-10 gmod-btn scale justify-content-start open-tray pop-onclick" data-target="select-boats" wire:click="openSelect('boat')">
                                    <i data-feather="plus" class="add-another-icon"></i>
                                    Add Boats
                                </a>
                                <div class="o5 mt-1">Adding Boats are optional and you can do this task later.</div>
                            </div>
                        </div>



                        <div class="pt-20"></div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 mb-10">
                                    <button type="button" wire:click="storeSubmit" class="btn btn-primary btn-block gmod-btn scale add-spinner white-spinner">Create</button>
                                </div>
                                <div class="col-md-6 mb-10">
                                    <a href="{{ url()->previous() }}" class="btn btn-light btn-block mb-10 gmod-btn pop-onclick">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
</div>
