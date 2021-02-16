@extends('layouts.app')

@section('content')
    <section id="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">

                    <div class="mt-30"></div>

                    <form class="apn-form" action="{{ route('ships.update', $detail) }}" method="post">
                        @csrf
                        <div class="form-section mb-40">
                            <div class="form-group">
                                <label>Ship name</label>
                                <input type="text" class="form-control gmod @error('name') is-invalid @enderror" name="name" value="{{ old('name', $detail->name) }}">
                                <div class="o5 mt-1">Max 24 char, alphabets and numbers only, cannot be duplicate of other ship's name</div>
                                @error('name')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select class="custom-select @error('category') is-invalid @enderror" name="category" value="{{ old('category') }}">
                                    <option value="barge" {{ old('category', $detail->category)=='barge'?'selected':'' }}>Barge</option>
                                    <option value="vessel" {{ old('category', $detail->category)=='vessel'?'selected':'' }}>Vessel</option>
                                </select>
                                @error('category')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Call sign</label>
                                <input type="text" class="form-control gmod @error('call_sign') is-invalid @enderror" name="call_sign" value="{{ old('call_sign', $detail->call_sign) }}">
                                @error('call_sign')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nationality</label>
                                <select class="custom-select @error('nationality_id') is-invalid @enderror" name="nationality_id" value="{{ old('nationality_id') }}">
                                    @php($separated=false)
                                    @foreach($countries as $country)
                                        @if(!$country->highlighted && !$separated)
                                            <option disabled>----------------------------------------------------</option>
                                            @php($separated=true)
                                        @endif
                                        <option value="{{ $country->id }}" {{ $country->id==old('nationality_id', $detail->nationality_id)?'selected':'' }}>{{ $country->nicename }}</option>
                                    @endforeach
                                </select>
                                @error('nationality_id')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>24 Hour Telephone Number</label>
                                <input type="text" class="form-control gmod @error('telephone') is-invalid @enderror" name="telephone" value="{{ old('telephone', $detail->telephone) }}">
                                @error('telephone')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Port of registry</label>
                                <input type="text" class="form-control gmod @error('port') is-invalid @enderror" name="port" value="{{ old('port', $detail->port) }}">
                                @error('port')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>IMO Number</label>
                                <input type="text" class="form-control gmod @error('imo_number') is-invalid @enderror" name="imo_number" value="{{ old('imo_number', $detail->imo_number) }}">
                                @error('imo_number')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>ISSC type</label>
                                <select class="custom-select @error('issc_type') is-invalid @enderror" name="issc_type" value="{{ old('issc_type') }}">
                                    <option value="Interim ISSC" {{ old('issc_type', $detail->issc_type)=='Interim ISSC'?'selected':'' }}>Interim ISSC</option>
                                    <option value="Final ISSC" {{ old('issc_type', $detail->issc_type)=='Final ISSC'?'selected':'' }}>Final ISSC</option>
                                </select>
                                @error('issc_type')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Date of issue ISSC</label>
                                <input type="date" class="form-control gmod @error('issc_issue_date') is-invalid @enderror" name="issc_issue_date" value="{{ old('issc_issue_date', $detail->issc_issue_date_formated) }}">
                                @error('issc_issue_date')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Date of expiry ISSC</label>
                                <input type="date" class="form-control gmod @error('issc_expiry_date') is-invalid @enderror" name="issc_expiry_date" value="{{ old('issc_expiry_date', $detail->issc_expiry_date_formated) }}">
                                @error('issc_expiry_date')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 mb-10">
                                    <button type="submit" class="btn btn-primary btn-block gmod-btn scale has-spinner add-spinner white-spinner">Update</button>
                                </div>
                                <div class="col-md-6 mb-10">
                                    <a href="{{ route('ships') }}" class="btn btn-light btn-block mb-10 gmod-btn pop-onclick">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection
