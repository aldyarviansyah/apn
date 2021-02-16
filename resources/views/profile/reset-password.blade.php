@extends('layouts.app')

@section('content')
    <section id="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">

                    <div class="mt-30"></div>

                    <form class="apn-form" action="{{ route('profile.reset.password') }}" method="post">
                        @csrf
                        <input type="hidden" name="route_name" value="{{ url()->previous() }}">
                        <div class="form-section mb-40">
                            <div class="form-group">
                                <label>New password</label>
                                <input type="password" class="form-control gmod @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}">
                                @error('password')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Repeat new password</label>
                                <input type="password" class="form-control gmod @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{ old('password_confirmation') }}">
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 mb-10">
                                    <button type="submit" class="btn btn-primary btn-block gmod-btn scale has-spinner add-spinner white-spinner">Reset Password</button>
                                </div>
                                <div class="col-md-6 mb-10">
                                    <a href="{{ url()->previous() }}" class="btn btn-light btn-block mb-10 gmod-btn pop-onclick">Back</a>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection
