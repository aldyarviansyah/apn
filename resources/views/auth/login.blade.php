@extends('layouts.appWeb')

@section('content')
    <div id="overlay"></div>
    @if(Session::has('msg') && Session::get('msg') == 'data_saved' && Session::has('dataMsg'))
        @php($dataMsg=Session::get('dataMsg'))
        <div class="ui-tray splash">
            <div class="data-info-head">
                <i data-feather="chevron-left" class="data-info-close close-all-tray"></i>
                <h2>{{ $dataMsg['title'] }}</h2>
            </div>
            <div class="data-info-body">
                <div class="data-message pb-10">
                    <p>{{ $dataMsg['message'] }}</p>
                </div>
                <div class="data-item close-all-tray">
                    <a href="#" class="data-info-action">Okay</a>
                </div>
            </div>
        </div>
    @endif
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="mid-form-wrapper">
                    <div class="mid-form-logo mb-20">
                        <img src="{{ asset('img/logo-admin.svg') }}">
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control text-lowercase gmod first-focus @error('username') is-invalid @enderror @error('email') is-invalid @enderror" name="username" value="{{ old('username') }}" autofocus  onkeyup="this.value = this.value.toLowerCase();">
                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control gmod @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block gmod-btn add-spinner white-spinner pop-onclick">Login</button>
                                </div>
                                <div class="form-group">
                                    <a href="{{ route('access-requests.public') }}" class="btn btn-light btn-block gmod-btn pop-onclick">Request Access</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <h5 class="mt-20 mid-form-meta">APN Harbor Management System V.1</h5>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extraCss')
    <!-- Custom css -->
    <link rel="stylesheet" href="css/hms.css?v=23">
@endsection
