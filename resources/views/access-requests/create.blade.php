@extends('layouts.appWeb')

@section('content')
    <div id="ui-general">
       @include('layouts.includes.nav-public')
    </div>
    <section id="content" class="no-meta-tray">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">

                    <form class="apn-form" action="{{ route('access-requests.store') }}" method="post">
                        @csrf
                        <div class="form-section mb-20">
                            <div class="card">
                                <div class="card-body">
                                    <p>{{ __('accessrequest.note') }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-section mb-40">
                            <div class="form-group">
                                <label>{{ __('accessrequest.name') }}</label>
                                <input type="text" class="form-control gmod first-focus @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>{{ __('accessrequest.phone') }}</label>
                                <div class="form-input-meta below-section-head">{{ __('accessrequest.phone_note') }}</div>
                                <input type="text" class="form-control gmod @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}">
                                @error('phone')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>{{ __('accessrequest.company_name') }}</label>
                                <input type="text" class="form-control gmod @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}">
                                @error('company_name')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>{{ __('accessrequest.company_address') }}</label>
                                <input type="text" class="form-control gmod @error('company_address') is-invalid @enderror" name="company_address" value="{{ old('company_address') }}">
                                @error('company_address')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>{{ __('accessrequest.company_address') }}</label>
                                <input type="text" class="form-control gmod @error('company_email') is-invalid @enderror" name="company_email" value="{{ old('company_email') }}">
                                @error('company_email')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>{{ __('accessrequest.position') }}</label>
                                <input type="text" class="form-control gmod @error('company_position') is-invalid @enderror" name="company_position" value="{{ old('company_position') }}">
                                @error('company_position')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 mb-10">
                                    <button type="submit" class="btn btn-primary btn-block gmod-btn scale add-spinner white-spinner">{{ __('accessrequest.send') }}</button>
                                </div>
                                <div class="col-md-6 mb-10">
                                    <a href="{{ url()->previous() }}" class="btn btn-light btn-block mb-10 gmod-btn pop-onclick">{{ __('accessrequest.back') }}</a>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection

@section('extraCss')
    <!-- Custom css -->
    <link rel="stylesheet" href="css/hms.css?v=23">
@endsection
