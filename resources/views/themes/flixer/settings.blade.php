@extends('themes.flixer.layout.app')

@section('title', 'Settings')

@include('themes.flixer.layout.nav')

@section('body')
    <div class="container animated fadeIn" onclick="hideSearch();">
        <div class="row">
            <div class="col-lg-12">
                <div class="settings-container">
                    <h1>Account</h1>
                    <hr>
                    <div class="row">
                        <div class="col-lg-3 pull-left">
                            <div class="left-title">Membership and Billing</div>
                            <form action="" method="post">
                                @if($user->subscription_expiration > time())
                                    <button type="button" class="btn btn-danger btn-fill btn-block"
                                            disabled>Renew Membership
                                    </button>
                                @elseif($user->subscription_expiration < time() && $user->subscription_expiration > 0)
                                    <button type="submit" name="renew_membership"
                                            class="btn btn-danger btn-fill btn-block">Renew Membership
                                    </button>
                                @elseif($user->subscription_expiration == 0)
                                    <button type="submit" name="upgrade_membership"
                                            class="btn btn-danger btn-fill btn-block">Upgrade Membership
                                    </button>
                                @endif
                            </form>
                        </div>
                        <div class="col-lg-5 pull-left" style="padding-left:50px;">
                            <b>{{ $user->email }}</b> <br>
                            Password : ******** <br>
                            Phone : {{ $user->phone }}
                            <hr>
                            <h2>Redeem Promo code</h2>
                            <form action="{{ route('redeem_code') }}" method="post">
                                {{ csrf_field() }}
                                <div class="input-group">
                                    <input type="text" name="code"
                                           placeholder="Enter code"
                                           class="form-control input-dark">
                                    <span class="input-group-btn">
                                      <button type="submit" name="redeem"
                                              class="btn btn-default btn-fill redeem-btn">Redeem</button>
                                    </span>
                                </div>
                                @if($errors->has('code'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('code') }}
                                    </div>
                                @endif
                            </form>
                        </div>
                        <div class="col-lg-4 pull-left">
                            <a href="{{ route('change_email') }}">Change Email</a>
                            <br>
                            <a href="{{ route('edit_password') }}">Change Password</a>
                            <br>
                            <a href="{{ route('edit_phone') }}">Change Phone Number</a>
                        </div>
                    </div>
                    <hr class="space">
                    <div class="row">
                        <div class="col-lg-4 pull-left">
                            <div class="left-title">Plan Details</div>
                        </div>
                        <div class="col-lg-4 pull-left">
                           <span class="plan-name">
                               @if($user->is_subscriber == 1)
                                   {{ sprintf('Paid Membership', $settings->subscription_name) }}

                               @else
                                   Free Membership
                               @endif
                           </span>
                        </div>
                        <div class="col-lg-4 pull-left">
                            <!-- <a href="#"> Change plan </a> -->
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-4 pull-left">
                            <div class="left-title">Settings</div>
                        </div>
                        <div class="col-lg-4 pull-left">
                            <a href="{{ url('/') }}mass_logout.php">Sign out all devices</a>
                            <br>
                            <a href="{{ route('account_activity') }}">View Account Activity</a>
                            <br>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-4 pull-left">
                            <div class="left-title">My Profile</div>
                        </div>
                        <div class="col-lg-4 pull-left">
                            <div class="avatar">
                                <img src="{{ session('theme_resource_path') }}/assets/images/avatars/3.png"
                                     class="img-responsive">
                                <span class="name"> Profile Name </span>
                            </div>
                            <div class="clearfix"></div>
                            <a href="{{ url('') }}/language">Language</a>
                        </div>
                        <div class="col-lg-4 pull-left">
                            <a href="{{ route('manage_profiles') }}"><?= ucfirst(strtolower('Manage Profiles')) ?></a>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
