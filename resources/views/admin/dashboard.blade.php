@extends('admin.layouts.app')

@section('title', 'Dashboard')


@section('navbar-brand')
    <a class="navbar-brand" href="#">Dashboard</a>
@endsection

@section('body')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-warning text-center">
                                        <i class="ti-user"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p>Users</p>
                                        {{ $statistics->users }}
                                    </div>
                                </div>
                            </div>
                            <div class="footer">
                                <hr/>
                                <div class="stats">
                                    <i class="ti-reload"></i> Updated now
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-success text-center">
                                        <i class="ti-video-clapper"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p>Videos</p>
                                        {{ $statistics->episodes }}
                                    </div>
                                </div>
                            </div>
                            <div class="footer">
                                <hr/>
                                <div class="stats">
                                    <i class="ti-timer"></i> All time
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-danger text-center">
                                        <i class="ti-layout-width-default"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p>Episodes</p>
                                        23
                                    </div>
                                </div>
                            </div>
                            <div class="footer">
                                <hr/>
                                <div class="stats">
                                    <i class="ti-timer"></i> All time
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-info text-center">
                                        <i class="ti-info-alt"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p>Version</p>
                                        1.0.1
                                    </div>
                                </div>
                            </div>
                            <div class="footer">
                                <hr/>
                                <div class="stats">
                                    <i class="ti-reload"></i> Updated now
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Users Growth</h4>
                            <p class="category">Monthly performance</p>
                        </div>
                        <div class="content">
                            <div id="chartHours" class="ct-chart"></div>
                            <div class="footer">
                                <div class="chart-legend">
                                    <i class="fa fa-circle text-warning"></i> Users
                                </div>
                                <hr>
                                <div class="stats">
                                    <i class="ti-reload"></i> Updated now
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection