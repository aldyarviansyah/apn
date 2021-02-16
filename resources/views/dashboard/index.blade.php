@extends('layouts.app')

@section('content')
    <section id="content">
        <div class="container">

            <div class="pt-30"></div>

            <div class="row mb-30">
                <div class="col-12 pr-1">
                    <h1 class="font-size-32">Welcome, {{ auth()->user()->full_name }}!</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-6 pr-1">
                    <a href="#" class="btn btn-light btn-block mb-10 gmod-btn pop-onclick page-tab active" data-target="tab-ship-status"><i data-feather="server" class="btn-icon"></i>Summary</a>
                </div>
                <div class="col-6 pl-1">
                    <a href="#" class="btn btn-light btn-block mb-10 gmod-btn pop-onclick page-tab" data-target="tab-my-apps"><i data-feather="grid" class="btn-icon"></i>My Apps</a>
                </div>
            </div>

            <div class="pt-30"></div>

            <div class="page-tab-target active tab-ship-status">
                <h2 class="mb-20 font-size-20">Vessel & Barge Summary</h2>
                <div class="card mb-10 switch">
                    <div class="card-body">
                        <div class="row no-gutters">
                            <div class="col-4">
                                <div class="switch-item pop-onclick ship-summary-switch-mode active" data-target="mode-count">Count</div>
                            </div>
                            <div class="col-4">
                                <div class="switch-item pop-onclick ship-summary-switch-mode" data-target="mode-qty">Quantity</div>
                            </div>
                            <div class="col-4">
                                <div class="switch-item pop-onclick ship-summary-switch-mode" data-target="mode-cargo">Cargo</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-status-tab mode-count active">
                    <div class="row mb-30">
                        <div class="col-sm-6 col-md-4 mb-10 ship-funnel pop-onclick">
                            <div class="card div-href" data-url="page-arrivals.php">
                                <div class="card-body ship-status card-multi-row">
                                    <div class="title">PA Pending</div>
                                    <div class="meta">14</div>
                                    <div class="row">
                                        <div class="col-6 pr-1 left">Vessel</div>
                                        <div class="col-6 pl-1 right">3</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 pr-1 left">Barge</div>
                                        <div class="col-6 pl-1 right">10</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 mb-10 ship-funnel pop-onclick">
                            <div class="card">
                                <div class="card-body ship-status card-multi-row">
                                    <div class="title">Sailing</div>
                                    <div class="meta mode-count active">17</div>
                                    <div class="row">
                                        <div class="col-6 pr-1 left">Vessel</div>
                                        <div class="col-6 pl-1 right">12</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 pr-1 left">Barge</div>
                                        <div class="col-6 pl-1 right">5</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 mb-10 ship-funnel pop-onclick">
                            <div class="card">
                                <div class="card-body ship-status card-multi-row">
                                    <div class="title">Anchored</div>
                                    <div class="meta mode-count active">17</div>
                                    <div class="row">
                                        <div class="col-6 pr-1 left">Vessel</div>
                                        <div class="col-6 pl-1 right">12</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 pr-1 left">Barge</div>
                                        <div class="col-6 pl-1 right">5</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 mb-10 ship-funnel pop-onclick">
                            <div class="card">
                                <div class="card-body ship-status card-multi-row">
                                    <div class="title">Jetty/Berthing</div>
                                    <div class="meta mode-count active">17</div>
                                    <div class="row">
                                        <div class="col-6 pr-1 left">Vessel</div>
                                        <div class="col-6 pl-1 right">12</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 pr-1 left">Barge</div>
                                        <div class="col-6 pl-1 right">5</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 mb-10 ship-funnel pop-onclick">
                            <div class="card">
                                <div class="card-body ship-status card-multi-row">
                                    <div class="title">Discharging</div>
                                    <div class="meta mode-count active">17</div>
                                    <div class="row">
                                        <div class="col-6 pr-1 left">Vessel</div>
                                        <div class="col-6 pl-1 right">12</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 pr-1 left">Barge</div>
                                        <div class="col-6 pl-1 right">5</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 mb-10 ship-funnel pop-onclick">
                            <div class="card">
                                <div class="card-body ship-status card-multi-row">
                                    <div class="title">Loading</div>
                                    <div class="meta mode-count active">17</div>
                                    <div class="row">
                                        <div class="col-6 pr-1 left">Vessel</div>
                                        <div class="col-6 pl-1 right">12</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 pr-1 left">Barge</div>
                                        <div class="col-6 pl-1 right">5</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 mb-10 ship-funnel pop-onclick">
                            <div class="card">
                                <div class="card-body ship-status card-multi-row">
                                    <div class="title">Outstanding</div>
                                    <div class="meta mode-count active">17</div>
                                    <div class="row">
                                        <div class="col-6 pr-1 left">Vessel</div>
                                        <div class="col-6 pl-1 right">12</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 pr-1 left">Barge</div>
                                        <div class="col-6 pl-1 right">0</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-status-tab mode-qty">
                    <div class="row mb-30">
                        <div class="col-sm-6 col-md-4 mb-10 ship-funnel pop-onclick">
                            <div class="card">
                                <div class="card-body ship-status card-multi-row">
                                    <div class="title">PA Waiting</div>
                                    <div class="meta">532,409 MT</div>
                                    <div class="row">
                                        <div class="col-6 pr-1 left">Vessel</div>
                                        <div class="col-6 pl-1 right">12,259 <span class="o3">MT</span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 pr-1 left">Barge</div>
                                        <div class="col-6 pl-1 right">432,112 <span class="o3">MT</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 mb-10 ship-funnel pop-onclick">
                            <div class="card">
                                <div class="card-body ship-status card-multi-row">
                                    <div class="title">Sailing</div>
                                    <div class="meta mode-qty">424,442 MT</div>
                                    <div class="row">
                                        <div class="col-6 pr-1 left">Vessel</div>
                                        <div class="col-6 pl-1 right">112,259 <span class="o3">MT</span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 pr-1 left">Barge</div>
                                        <div class="col-6 pl-1 right">232,112 <span class="o3">MT</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 mb-10 ship-funnel pop-onclick">
                            <div class="card">
                                <div class="card-body ship-status card-multi-row">
                                    <div class="title">Anchored</div>
                                    <div class="meta mode-qty">424,442 MT</div>
                                    <div class="row">
                                        <div class="col-6 pr-1 left">Vessel</div>
                                        <div class="col-6 pl-1 right">112,259 <span class="o3">MT</span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 pr-1 left">Barge</div>
                                        <div class="col-6 pl-1 right">232,112 <span class="o3">MT</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 mb-10 ship-funnel pop-onclick">
                            <div class="card">
                                <div class="card-body ship-status card-multi-row">
                                    <div class="title">Jetty/Berthing</div>
                                    <div class="meta mode-qty">424,442 MT</div>
                                    <div class="row">
                                        <div class="col-6 pr-1 left">Vessel</div>
                                        <div class="col-6 pl-1 right">112,259 <span class="o3">MT</span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 pr-1 left">Barge</div>
                                        <div class="col-6 pl-1 right">232,112 <span class="o3">MT</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 mb-10 ship-funnel pop-onclick">
                            <div class="card">
                                <div class="card-body ship-status card-multi-row">
                                    <div class="title">Discharging</div>
                                    <div class="meta">424,442 MT</div>
                                    <div class="row">
                                        <div class="col-6 pr-1 left">Vessel</div>
                                        <div class="col-6 pl-1 right">112,259 <span class="o3">MT</span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 pr-1 left">Barge</div>
                                        <div class="col-6 pl-1 right">232,112 <span class="o3">MT</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 mb-10 ship-funnel pop-onclick">
                            <div class="card">
                                <div class="card-body ship-status card-multi-row">
                                    <div class="title">Loading</div>
                                    <div class="meta">424,442 MT</div>
                                    <div class="row">
                                        <div class="col-6 pr-1 left">Vessel</div>
                                        <div class="col-6 pl-1 right">112,259 <span class="o3">MT</span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 pr-1 left">Barge</div>
                                        <div class="col-6 pl-1 right">232,112 <span class="o3">MT</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 mb-10 ship-funnel pop-onclick">
                            <div class="card">
                                <div class="card-body ship-status card-multi-row">
                                    <div class="title">Outstanding</div>
                                    <div class="meta">12,654 MT</div>
                                    <div class="row">
                                        <div class="col-6 pr-1 left">Vessel</div>
                                        <div class="col-6 pl-1 right">12,654 <span class="o3">MT</span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 pr-1 left">Barge</div>
                                        <div class="col-6 pl-1 right">0 <span class="o3">MT</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-status-tab mode-cargo">
                    <div class="row mb-30">
                        <div class="col-sm-6 col-md-4 mb-10 ship-funnel pop-onclick">
                            <div class="card">
                                <div class="card-body ship-status card-multi-row">
                                    <div class="title">PA Waiting</div>
                                    <div class="row">
                                        <div class="col-6 pr-1 left">Nickel</div>
                                        <div class="col-6 pl-1 right">12,259 <span class="o3">MT</span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 pr-1 left">Coal</div>
                                        <div class="col-6 pl-1 right">432,112 <span class="o3">MT</span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 pr-1 left">Other</div>
                                        <div class="col-6 pl-1 right">632,112 <span class="o3">MT</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 mb-10 ship-funnel pop-onclick">
                            <div class="card">
                                <div class="card-body ship-status card-multi-row">
                                    <div class="title">Sailing</div>
                                    <div class="row">
                                        <div class="col-6 pr-1 left">Nickel</div>
                                        <div class="col-6 pl-1 right">12,259 <span class="o3">MT</span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 pr-1 left">Coal</div>
                                        <div class="col-6 pl-1 right">432,112 <span class="o3">MT</span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 pr-1 left">Other</div>
                                        <div class="col-6 pl-1 right">632,112 <span class="o3">MT</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 mb-10 ship-funnel pop-onclick">
                            <div class="card">
                                <div class="card-body ship-status card-multi-row">
                                    <div class="title">Anchored</div>
                                    <div class="row">
                                        <div class="col-6 pr-1 left">Nickel</div>
                                        <div class="col-6 pl-1 right">12,259 <span class="o3">MT</span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 pr-1 left">Coal</div>
                                        <div class="col-6 pl-1 right">432,112 <span class="o3">MT</span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 pr-1 left">Other</div>
                                        <div class="col-6 pl-1 right">632,112 <span class="o3">MT</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 mb-10 ship-funnel pop-onclick">
                            <div class="card">
                                <div class="card-body ship-status card-multi-row">
                                    <div class="title">Jetty/Berthing</div>
                                    <div class="row">
                                        <div class="col-6 pr-1 left">Nickel</div>
                                        <div class="col-6 pl-1 right">12,259 <span class="o3">MT</span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 pr-1 left">Coal</div>
                                        <div class="col-6 pl-1 right">432,112 <span class="o3">MT</span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 pr-1 left">Other</div>
                                        <div class="col-6 pl-1 right">632,112 <span class="o3">MT</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 mb-10 ship-funnel pop-onclick">
                            <div class="card">
                                <div class="card-body ship-status card-multi-row">
                                    <div class="title">Discharging</div>
                                    <div class="row">
                                        <div class="col-6 pr-1 left">Nickel</div>
                                        <div class="col-6 pl-1 right">12,259 <span class="o3">MT</span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 pr-1 left">Coal</div>
                                        <div class="col-6 pl-1 right">432,112 <span class="o3">MT</span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 pr-1 left">Other</div>
                                        <div class="col-6 pl-1 right">632,112 <span class="o3">MT</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 mb-10 ship-funnel pop-onclick">
                            <div class="card">
                                <div class="card-body ship-status card-multi-row">
                                    <div class="title">Loading</div>
                                    <div class="row">
                                        <div class="col-6 pr-1 left">Nickel</div>
                                        <div class="col-6 pl-1 right">12,259 <span class="o3">MT</span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 pr-1 left">Coal</div>
                                        <div class="col-6 pl-1 right">432,112 <span class="o3">MT</span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 pr-1 left">Other</div>
                                        <div class="col-6 pl-1 right">632,112 <span class="o3">MT</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 mb-10 ship-funnel pop-onclick">
                            <div class="card">
                                <div class="card-body ship-status card-multi-row">
                                    <div class="title">Outstanding</div>
                                    <div class="row">
                                        <div class="col-6 pr-1 left">Nickel</div>
                                        <div class="col-6 pl-1 right">12,259 <span class="o3">MT</span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 pr-1 left">Coal</div>
                                        <div class="col-6 pl-1 right">432,112 <span class="o3">MT</span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 pr-1 left">Other</div>
                                        <div class="col-6 pl-1 right">632,112 <span class="o3">MT</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-30">
                    <div class="pt-30"></div>
                    <div class="col-12">
                        <h2 class="mb-20 font-size-20">Pier Summary</h2>
                    </div>
                    <div class="col-sm-12 col-md-4 mb-10 ship-funnel pop-onclick">
                        <div class="card">
                            <div class="card-body ship-status card-multi-row">
                                <div class="title">Slot(s) available</div>
                                <div class="meta active">24/88 - 25%</div>
                                <div class="row">
                                    <div class="col-6 pr-1 left">West</div>
                                    <div class="col-6 pl-1 right">4/13 - 30%</div>
                                </div>
                                <div class="row">
                                    <div class="col-6 pr-1 left">Center</div>
                                    <div class="col-6 pl-1 right">12/20 - 60%</div>
                                </div>
                                <div class="row">
                                    <div class="col-6 pr-1 left">East</div>
                                    <div class="col-6 pl-1 right">8/88 - 10%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-30">
                    <div class="pt-30"></div>
                    <div class="col-12">
                        <h2 class="mb-20 font-size-20">Barges Currently Discharging</h2>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-4 mb-10">
                                <div class="card">
                                    <div class="card-body ship-status">
                                        <h5 class="card-title o7 text-center">Total: 393,723 MT</h5>
                                        <img src="img/pie1.jpg" class="discharging-pie">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-12 mb-10 ship-funnel pop-onclick">
                                        <div class="card has-progress nickel">
                                            <span class="bar-in-card" style="width:69%;"></span>
                                            <div class="card-body ship-status">
                                                <span class="title">Nickel</span>
                                                <div class="val">345,892 MT - 69%</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-10 ship-funnel pop-onclick">
                                        <div class="card has-progress coal">
                                            <span class="bar-in-card" style="width:25%;"></span>
                                            <div class="card-body ship-status">
                                                <span class="title">Coal</span>
                                                <div class="val">39,031 MT - 25%</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-10 ship-funnel pop-onclick">
                                        <div class="card has-progress china-cargo">
                                            <span class="bar-in-card" style="width:15%;"></span>
                                            <div class="card-body ship-status">
                                                <span class="title">China Cargo</span>
                                                <div class="val">10,166 MT - 15%</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-10 ship-funnel pop-onclick">
                                        <div class="card has-progress antrachite">
                                            <span class="bar-in-card" style="width:7%;"></span>
                                            <div class="card-body ship-status">
                                                <span class="title">Antrachite</span>
                                                <div class="val">4,500 MT - 7%</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-10 ship-funnel pop-onclick">
                                        <div class="card has-progress coal">
                                            <span class="bar-in-card" style="width:4%;"></span>
                                            <div class="card-body ship-status">
                                                <span class="title">Australian Coal</span>
                                                <div class="val">3,400 MT - 4%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-30">
                    <div class="pt-30"></div>
                    <div class="col-12">
                        <h2 class="mb-20 font-size-20">Daily Discharge</h2>
                    </div>
                    <div class="col-12">
                        <img src="img/chart.jpg" class="w-100">
                    </div>
                </div>
                <div class="row mb-30">
                    <div class="pt-30"></div>
                    <div class="col-md-6">
                        <h2 class="font-size-20 section-title">Last 14 Days Discharging Rate</h2>
                    </div>
                    <div class="col-md-6 section-meta">
                        <a href="#">See all time frames</a>
                    </div>
                    <div class="col-sm-6 mb-10 ship-funnel pop-onclick">
                        <div class="card">
                            <div class="card-body ship-status card-multi-row">
                                <div class="title">Barge Coal</div>
                                <div class="row">
                                    <div class="col-6 pr-1 left">Lowest</div>
                                    <div class="col-6 pl-1 right">24,427 MT</div>
                                </div>
                                <div class="row">
                                    <div class="col-6 pr-1 left">Highest</div>
                                    <div class="col-6 pl-1 right">52,114 MT</div>
                                </div>
                                <div class="row">
                                    <div class="col-6 pr-1 left">Avg</div>
                                    <div class="col-6 pl-1 right">31,098 MT</div>
                                </div>
                                <div class="row">
                                    <div class="col-6 pr-1 left">Total</div>
                                    <div class="col-6 pl-1 right">231,665 MT</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-10 ship-funnel pop-onclick">
                        <div class="card">
                            <div class="card-body ship-status card-multi-row">
                                <div class="title">Barge Nickel</div>
                                <div class="row">
                                    <div class="col-6 pr-1 left">Lowest</div>
                                    <div class="col-6 pl-1 right">24,427 MT</div>
                                </div>
                                <div class="row">
                                    <div class="col-6 pr-1 left">Highest</div>
                                    <div class="col-6 pl-1 right">52,114 MT</div>
                                </div>
                                <div class="row">
                                    <div class="col-6 pr-1 left">Avg</div>
                                    <div class="col-6 pl-1 right">31,098 MT</div>
                                </div>
                                <div class="row">
                                    <div class="col-6 pr-1 left">Total</div>
                                    <div class="col-6 pl-1 right">231,665 MT</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-10 ship-funnel pop-onclick">
                        <div class="card">
                            <div class="card-body ship-status card-multi-row">
                                <div class="title">Vessel</div>
                                <div class="row">
                                    <div class="col-6 pr-1 left">Lowest</div>
                                    <div class="col-6 pl-1 right">24,427 MT</div>
                                </div>
                                <div class="row">
                                    <div class="col-6 pr-1 left">Highest</div>
                                    <div class="col-6 pl-1 right">52,114 MT</div>
                                </div>
                                <div class="row">
                                    <div class="col-6 pr-1 left">Avg</div>
                                    <div class="col-6 pl-1 right">31,098 MT</div>
                                </div>
                                <div class="row">
                                    <div class="col-6 pr-1 left">Total</div>
                                    <div class="col-6 pl-1 right">231,665 MT</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-10 ship-funnel pop-onclick">
                        <div class="card">
                            <div class="card-body ship-status card-multi-row">
                                <div class="title">Total Barges</div>
                                <div class="row">
                                    <div class="col-6 pr-1 left">Lowest</div>
                                    <div class="col-6 pl-1 right">24,427 MT</div>
                                </div>
                                <div class="row">
                                    <div class="col-6 pr-1 left">Highest</div>
                                    <div class="col-6 pl-1 right">52,114 MT</div>
                                </div>
                                <div class="row">
                                    <div class="col-6 pr-1 left">Avg</div>
                                    <div class="col-6 pl-1 right">31,098 MT</div>
                                </div>
                                <div class="row">
                                    <div class="col-6 pr-1 left">Total</div>
                                    <div class="col-6 pl-1 right">231,665 MT</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-30">
                    <div class="pt-30"></div>
                    <div class="col-md-12">
                        <h2 class="font-size-20 section-title">Barge Lineup 3000 - 6000</h2>
                    </div>
                    <div class="col-12 mb-10">
                        <table class="table table-sm table-bordered font-size-12 mb-0 bg-white">
                            <tr>
                                <td>1</td>
                                <td>
                                    BG. SUPPORT 11 <br>
                                    <span class="o3">PT. ADHIKA ARNAWAMA AGENSI</span> <br>
                                    <span class="o3">23-Nov-20 00:50:00</span>
                                </td>
                                <td>
                                    3714 MT <br>
                                    <span class="o3">Coal</span> <br>
                                    <span class="o3">VDNI</span>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>
                                    BG. RHYMAN 21 <br>
                                    <span class="o3">PT. ANUGERAH MAKMUR SEJAHTERA</span> <br>
                                    <span class="o3">24-Nov-20 08:30:00</span>
                                </td>
                                <td>
                                    6012 MT <br>
                                    <span class="o3">Coal</span> <br>
                                    <span class="o3">VDNI</span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row mb-30">
                    <div class="pt-30"></div>
                    <div class="col-md-12">
                        <h2 class="font-size-20 section-title">Barge Lineup 6000 - 8000</h2>
                    </div>
                    <div class="col-12 mb-10">
                        <table class="table table-sm table-bordered font-size-12 mb-0 bg-white">
                            <tr>
                                <td>1</td>
                                <td>
                                    BG. SURYA XXI <br>
                                    <span class="o3">PT. ADHIKA ARNAWAMA AGENSI</span> <br>
                                    <span class="o3">23-Nov-20 00:50:00</span>
                                </td>
                                <td>
                                    6222  MT <br>
                                    <span class="o3">Coal</span> <br>
                                    <span class="o3">VDNI</span>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>
                                    BG. SINAR ANUGERAH 04 <br>
                                    <span class="o3">PT. ANUGERAH MAKMUR SEJAHTERA</span> <br>
                                    <span class="o3">24-Nov-20 08:30:00</span>
                                </td>
                                <td>
                                    6012 MT <br>
                                    <span class="o3">Coal</span> <br>
                                    <span class="o3">VDNI</span>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>
                                    BG. LL 3005 <br>
                                    <span class="o3">PT. SAFINAH SAMUDERA SHIPPING</span> <br>
                                    <span class="o3">24-Nov-20 08:30:00</span>
                                </td>
                                <td>
                                    7394 MT <br>
                                    <span class="o3">Coal</span> <br>
                                    <span class="o3">OSS</span>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>
                                    BG. DBS 21 <br>
                                    <span class="o3">PT. PELAYARAN PERINTIS ARMADA BERDJAYA</span> <br>
                                    <span class="o3">24-Nov-20 08:30:00</span>
                                </td>
                                <td>
                                    7317  MT <br>
                                    <span class="o3">Coal</span> <br>
                                    <span class="o3">VDNI</span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row mb-30">
                    <div class="pt-30"></div>
                    <div class="col-md-12">
                        <h2 class="font-size-20 section-title">Barge Lineup 10,000 - 15,000</h2>
                    </div>
                    <div class="col-12 mb-10">
                        <table class="table table-sm table-bordered font-size-12 mb-0 bg-white">
                            <tr>
                                <td>1</td>
                                <td>
                                    BG. FERY 9 <br>
                                    <span class="o3">PT. ADHIKA ARNAWAMA AGENSI</span> <br>
                                    <span class="o3">23-Nov-20 00:50:00</span>
                                </td>
                                <td>
                                    10589 MT <br>
                                    <span class="o3">Coal</span> <br>
                                    <span class="o3">VDNI</span>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>
                                    BG. GOLDEN WAY 3322 <br>
                                    <span class="o3">PT. PELAYARAN PERINTIS ARMADA BERDJAYA</span> <br>
                                    <span class="o3">24-Nov-20 08:30:00</span>
                                </td>
                                <td>
                                    10509 MT <br>
                                    <span class="o3">Coal</span> <br>
                                    <span class="o3">VDNI</span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="page-tab-target tab-my-apps">
                <div class="row mb-30">
                    <div class="col-12">
                        <h2 class="mb-20 font-size-20">Pre Arrival</h2>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3 app-col pop-onclick">
                        <div class="card dashboard-app pop-onclick" data-behaviour="div-href" data-url="page-arrivals.php">
                            <div class="card-body">
                                <i data-feather="radio" class="icon"></i>
                                PA Inbox
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3 app-col pop-onclick">
                        <div class="card dashboard-app">
                            <div class="card-body">
                                <i data-feather="file-text" class="icon"></i>
                                Create PA
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3 app-col pop-onclick pop-onclick open-tray" data-target="register-ship">
                        <div class="card dashboard-app">
                            <div class="card-body">
                                <i data-feather="package" class="icon"></i>
                                Register Ship
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3 app-col pop-onclick pop-onclick open-tray" data-target="register-tug">
                        <div class="card dashboard-app">
                            <div class="card-body">
                                <i data-feather="package" class="icon"></i>
                                Register Tug Boat
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-30">
                    <div class="col-12">
                        <h2 class="mb-20 font-size-20">Ship Monitoring</h2>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3 app-col pop-onclick">
                        <div class="card dashboard-app pop-onclick" data-behaviour="div-href" data-url="page-barge-schedule.php">
                            <div class="card-body">
                                <i data-feather="package" class="icon"></i>
                                Barge Schedule
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3 app-col pop-onclick">
                        <div class="card dashboard-app">
                            <div class="card-body">
                                <i data-feather="package" class="icon"></i>
                                Barge Lineup
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3 app-col pop-onclick">
                        <div class="card dashboard-app">
                            <div class="card-body">
                                <i data-feather="package" class="icon"></i>
                                Pier Map
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3 app-col pop-onclick">
                        <div class="card dashboard-app">
                            <div class="card-body">
                                <i data-feather="package" class="icon"></i>
                                Absensi
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-md-4 col-lg-3 app-col pop-onclick">
                        <div class="card dashboard-app">
                            <div class="card-body">
                                <i data-feather="package" class="icon"></i>
                                Discharge Progress
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-30">
                    <div class="col-12">
                        <h2 class="mb-20 font-size-20">Management</h2>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3 app-col pop-onclick">
                        <div class="card dashboard-app">
                            <div class="card-body">
                                <i data-feather="package" class="icon"></i>
                                Absensi Staff
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3 app-col pop-onclick">
                        <div class="card dashboard-app">
                            <div class="card-body">
                                <i data-feather="package" class="icon"></i>
                                Access Request Inbox
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3 app-col pop-onclick">
                        <div class="card dashboard-app">
                            <div class="card-body">
                                <i data-feather="package" class="icon"></i>
                                App Members
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="page-modals">

    </section>

    <style type="text/css">
        /*page-specific css*/
        .card-multi-row .left {
            opacity: .5;
        }
        .card-multi-row .right {
            text-align: right;
        }
        .card-multi-row .title {
            border-bottom: 1px solid #ececec;
            display: block;
            margin-bottom: 10px;
            padding-bottom: 10px;
            font-weight: 600;
            position: relative;
        }
        .discharging-pie {
            width: 100%;
            margin-top: -40px;
        }
        .card.has-progress {
            position: relative;
        }
        .bar-in-card {
            position: absolute;
            height: 100%;
            top: 0;
            left: 0;
            border-radius: .75rem;
            opacity: .3;
        }

        .card.has-progress.nickel .bar-in-card {background-color: var(--red);}

        .card.has-progress.coal .bar-in-card {background-color: var(--coal);}

        .card.has-progress.china-cargo .bar-in-card {background-color: var(--lime);}

        .card.has-progress.antrachite .bar-in-card {background-color: var(--purple);}
    </style>
@endsection
