@extends('layouts.app')

@section('content')
    <section id="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">

                    <div class="mt-30"></div>

                    <form class="apn-form" action="{{ route('roles.store') }}" method="post">
                        @csrf
                        <div class="form-section mb-40">
                            <div class="form-group">
                                <label>@lang('roles.role_name')</label>
                                <input type="text" class="form-control gmod @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                                <div class="o5 mt-1">@lang('roles.max_24')</div>
                                @error('name')
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
                                    <a href="{{ route('roles') }}" class="btn btn-light btn-block mb-10 gmod-btn pop-onclick">@lang('global.cancel')</a>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection
