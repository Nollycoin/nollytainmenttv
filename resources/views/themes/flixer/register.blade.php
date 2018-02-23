@extends('themes.flixer.layout.app')

@section('title', 'Register')

@include('themes.flixer.layout.nav')

@section('body')
    <div class="container animated fadeIn" onclick="hideSearch();">
        <div class="row">
            <div class="col-lg-12">
                <div class="col-md-5 centered pricing-page">
                    <div class="panel panel-danger">
                        <div class="panel-heading"><h3 class="text-center">{{  $settings->subscription_name }}</h3>
                        </div>
                        <div class="panel-body text-center">
                            <p class="lead" style="font-size:40px">
                                <strong>
                                    ${{ $settings->subscription_price }}
                                    <span>/Month</span>
                                </strong>
                            </p>
                        </div>
                        <ul class="list-group list-group-flush text-center">
                            <li class="list-group-item"><i class="icon-ok text-danger"></i> Unlimited Movies & Series</li>
                            <li class="list-group-item"><i class="icon-ok text-danger"></i> Share your account with up to 4
                                people
                            </li>
                            <li class="list-group-item"><i class="icon-ok text-danger"></i> Create a playlist with your
                                favorite movies
                            </li>
                        </ul>
                        <div class="panel-footer">
                            <a class="btn btn-danger btn-block btn-fill" data-toggle="modal"
                               data-target="#pay">Subscribe</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="pay" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content payment-modal">
                <div class="modal-body">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <div class="panel-title">
                                Sign Up
                                <div class="pull-right">
                                    <span>Secure Form</span>
                                    <img src="{{ asset('/themes/flixer/assets/images/padlock.png') }}">
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>
                                        <span>Full Name *</span>
                                    </label>
                                    <input type="text" name="full_name" required class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label>
                                        <span>Email *</span>
                                    </label>
                                    <input type="text" name="email" required class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label>
                                        <span>Password *</span>
                                    </label>
                                    <input type="password" name="password" required class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label>
                                        <span>Phone </span>
                                    </label>
                                    <input type="text" name="phone" class="form-control"/>
                                </div>
                                <button type="submit" name="continue"
                                        class="btn btn-danger btn-fill pull-right">Continue</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection