@extends('layouts.appWeb')

@section('content')
    @include('layouts.includes.nav')
    <div class="mt-50 pt-50"></div>

    <section id="tagline" class="mb-50">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">

                    <div class="large">
                        Effecient, Reliable & Effective
                    </div>
                    <div class="meta">
                        We make your arrival easy
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section id="home-login">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="login-contain mb-50">
                        <h1>Welcome to PT. Agung Prima Nusantara</h1>
                        <p class="mb-20">Login to book your ship arrival or track barge activities.</p>
                        <a href="{{ route('login') }}" class="btn btn-primary btn-apn btn-block popclick mb-10">Login</a>
                        <a href="{{ route('access-requests.public') }}" class="btn btn-light btn-apn btn-block popclick">Request access</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="quickform">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h3 class="mb-20">Manage your arrival</h3>
                    <div class="row">
                        <div class="col-6 pr-1">
                            <div class="switch-item js-home-switch popclick active" data-target="pre-arrival">
                                Pre-Arrival
                            </div>
                        </div>
                        <div class="col-6 pl-1">
                            <div class="switch-item js-home-switch popclick" data-target="ship-registration">
                                Register Ship
                            </div>
                        </div>
                    </div>

                    <div class="body mt-20">
                        <div class="home-form-panel js-home-form-panel active" data-panel="pre-arrival">
                            <div class="form-group">
                                <label>ETA Morosi (WITA)</label>
                                <div class="row">
                                    <div class="col-7 pr-0">
                                        <input type="date" class="form-control" value="2020-11-21">
                                    </div>
                                    <div class="col-5">
                                        <input type="time" class="form-control" value="19:20">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Shipment Type</label>
                                <select class="form-control">
                                    <option>Regular</option>
                                    <option>Transhipment</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Cargo Type</label>
                                <select class="form-control">
                                    <?php foreach ($cargos as $key => $value): ?>
                                    <option><?php echo $key; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group mt-20">
                                <button type="submit" class="btn btn-primary btn-apn btn-block popclick">Create PA</button>
                            </div>
                        </div>
                        <div class="home-form-panel js-home-form-panel" data-panel="ship-registration">
                            <div class="form-group">
                                <label>Ship Type</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Ship Name</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group mt-20">
                                <button type="submit" class="btn btn-primary btn-apn btn-block popclick">Register</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section id="footer" class="mt-50 pt-50">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center">
                    Copyright 2020 - 2030 - PT. Agung Prima Nusantara
                </div>
            </div>
        </div>
    </section>
@endsection

@section('extraCss')
    <!-- Custom css -->
    <link rel="stylesheet" href="{{ asset('css/website.css?v=1') }}">

    <style type="text/css">
        #footer {
            opacity: .5;
        }
        #quickform .body {
            background: rgb(255 255 255 / 1);
            border-radius: 15px;
            padding: 30px 20px;
            color: #303030;
        }
        .home-form-panel {
            display: none;
        }
        .home-form-panel.active {
            display: block;
        }
        #tagline {
        }
        #tagline .large {
            font-size: 54px;
            font-weight: 700;
            line-height: 56px;
        }
        #tagline .meta {
            margin-top: 10px;
            opacity: .7;
            font-size: 24px;
        }

        #quickform .switch-item {
            background: rgb(255 255 255 / .2);
            border-radius: 15px;
            padding: 10px 15px;
            text-align: center;
            color: white;
            cursor: pointer;
        }
        #quickform .switch-item:hover {
            background: rgb(255 255 255 / .4);
        }
        #quickform .switch-item {transition: all 0.1s ease-in-out;}
        #quickform .switch-item:active {transform: scale(1.05) !important;}
        #quickform .switch-item.active {
            background: rgb(255 255 255 / 1);
            color: #333;
        }
        .login-contain {
            background: rgb(255 255 255 / .2);
            border-radius: 15px;
            padding: 20px;
        }
        .login-contain h1 {
            font-size: 22px;
        }
        .login-contain p {
            opacity: .5;
        }
    </style>
@endsection

@section('extraJs')
    <script type="text/javascript">
        $(document).ready(function() {

            $('body').on('click', '.js-home-switch', function(e) {
                e.preventDefault();

                var loc1 = $(this);
                var loc2 = $('.js-home-switch');
                var loc3 = $('.js-home-form-panel');

                var loc4 = loc1.attr('data-target');
                var loc5 = $('.js-home-form-panel[data-panel="'+loc4+'"]');

                loc2.removeClass('active');
                loc1.addClass('active');

                loc3.removeClass('active');
                loc5.addClass('active');
            });

            $('body').on('click', '.js-trigger-menu', function(e) {
                e.preventDefault();

                var loc1 = $(this);
                var loc2 = $('#web-overlay');
                var loc3 = $('#navtray');

                loc2.addClass('active');
                loc3.addClass('active');
            });

            $('body').on('click', '#web-overlay', function(e) {
                e.preventDefault();

                var loc1 = $(this);
                var loc3 = $('#navtray');

                loc1.removeClass('active');
                loc3.removeClass('active');
            });

            $('body').on('click', '.js-nav-close', function(e) {
                e.preventDefault();

                var loc1 = $('#web-overlay');
                var loc3 = $('#navtray');

                loc1.removeClass('active');
                loc3.removeClass('active');
            });
        })
    </script>
@endsection
