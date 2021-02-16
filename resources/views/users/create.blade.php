@extends('layouts.app')

@section('content')
    <section id="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">

                    <div class="mt-30"></div>

                    <form class="apn-form" action="{{ route('users.store') }}" method="post">
                        @csrf
                        <div class="form-section mb-40">
                            <div class="form-group">
                                <label>@lang('users.login_username')</label>
                                <input type="text" class="form-control text-lowercase gmod @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" onkeyup="this.value = this.value.toLowerCase();">
                                <div class="o5 mt-1">@lang('users.login_username_note')</div>
                                @error('username')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>@lang('users.full_name')</label>
                                <input type="text" class="form-control gmod @error('full_name') is-invalid @enderror" name="full_name" value="{{ old('full_name') }}">
                                <div class="o5 mt-1">@lang('users.login_username_note')</div>
                                @error('full_name')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>@lang('users.login_password')</label>
                                <input type="password" class="form-control gmod @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}">
                                @error('password')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>@lang('users.confirm_password')</label>
                                <input type="password" class="form-control gmod @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{ old('password_confirmation') }}">
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>@lang('users.email')</label>
                                <input type="email" class="form-control text-lowercase gmod @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" onkeyup="this.value = this.value.toLowerCase();">
                                @error('email')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>@lang('users.role')</label>
                                <select class="custom-select @error('role_id') is-invalid @enderror" name="role_id" value="{{ old('role_id') }}">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                <div class="o5 mt-1">@lang('users.role_note')</div>
                                @error('role_id')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6 mb-10">
                                    <button type="submit" class="btn btn-primary btn-block gmod-btn scale has-spinner add-spinner white-spinner">@lang('global.create')</button>
                                </div>
                                <div class="col-md-6 mb-10">
                                    <a href="{{ route('users') }}" class="btn btn-light btn-block mb-10 gmod-btn pop-onclick">@lang('global.back')</a>
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
    <style type="text/css">
        /*page-specific css*/
        .role-select-item {
            cursor: pointer;
            margin-bottom: 10px;
        }
        .role-select-item.active,
        .role-select-item:hover {
            background: #ececec;
            border: 1px solid #ececec;
        }
        .role-select-item .card-body {
            padding-top: 14px;
            padding-bottom: 14px;
        }
    </style>
@endsection
