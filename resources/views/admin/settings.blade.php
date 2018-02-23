@extends('admin.layouts.app')

@section('title', 'Settings')

@section('navbar-brand')
    <a class="navbar-brand" href="#">Settings</a>
@endsection

@section('body')
    <div class="content">
        <div class="container-fluid">
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif
            @if(Session::has('success'))
                <div class="alert alert-info text-center">{{ Session::get('success') }}</div>
            @endif
            <form action="{{ route('_save_settings') }}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading panel-title">General</div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label> Website Name </label>
                                    <input type="text" name="website_name" class="form-control border-input"
                                           placeholder="e.g Muviko" value="{{ $settings->website_name }}" required>
                                </div>
                                <div class="form-group">
                                    <label> Website Title </label>
                                    <input type="text" name="website_title" class="form-control border-input"
                                           placeholder="e.g Muviko - Movie & Video CMS"
                                           value=" {{ $settings->website_title }}" required>
                                </div>
                                <div class="form-group">
                                    <label> Website Description </label>
                                    <input type="text" name="website_description" class="form-control border-input"
                                           placeholder="Enter a description for your website"
                                           value="{{ $settings->website_description }}" required>
                                </div>
                                <div class="form-group">
                                    <label> Website Keywords </label>
                                    <input type="text" name="website_keywords" class="form-control border-input"
                                           placeholder="Keywords separated by a comma"
                                           value="{{ $settings->website_keywords }}" required>
                                </div>
                                <div class="form-group">
                                    <label> Facebook URL </label>
                                    <input type="text" name="facebook_url" class="form-control border-input"
                                           value="{{ $settings->facebook_url }}">
                                </div>
                                <div class="form-group">
                                    <label> Twitter URL </label>
                                    <input type="text" name="twitter_url" class="form-control border-input"
                                           value="{{ $settings->twitter_url }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading panel-title">Comments</div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label> Disquis Short Name </label>
                                    <input type="text" name="disquis_short_name" class="form-control border-input"
                                           value="{{ $settings->disquis_short_name }}">
                                </div>
                                <div class="help-block"> Register your website with <b>
                                        <a href="https://disqus.com/" target="_blank">
                                            Disquis
                                        </a>
                                    </b> for free.
                                    <br> Comments are not available on all themes</b>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading panel-title">Player</div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label> JWPlayer Key </label>
                                    <input type="text" name="jwplayer_key" class="form-control border-input"
                                           value="{{ $settings->jwplayer_key }}" required>
                                </div>
                                <div class="help-block"> Register your website with <b><a href="https://jwplayer.com/"
                                                                                          target="_blank">JWPlayer</a></b>
                                    for free.</b></b>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading panel-title">Subcription</div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label> PayPal Email </label>
                                    <input type="email" name="paypal_email" class="form-control border-input"
                                           value="{{ $settings->paypal_email }}" required>
                                </div>
                                <div class="form-group">
                                    <label> Subscription Name </label>
                                    <input type="text" name="subscription_name" class="form-control border-input"
                                           placeholder="e.g Muviko" value="{{ $settings->subscription_name }}" required>
                                </div>
                                <div class="form-group">
                                    <label> Subscription Price </label>
                                    <div class="input-group">
                                        <span class="input-group-addon"> {{ $settings->subscription_currency }}</span>
                                        <input type="text" name="subscription_price" class="form-control border-input"
                                               placeholder="Enter a description for your website"
                                               value="{{ $settings->subscription_price }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label> Subscription Currency </label>
                                    <select name="subscription_currency" class="form-control chosen" required>
                                        <option value="AUD" {{ $settings->subscription_currency == 'AUD' ? 'selected' : false }}>
                                            AUD
                                        </option>
                                        <option value="BRL" {{ $settings->subscription_currency == 'BRL' ? 'selected' : false }}>
                                            BRL
                                        </option>
                                        <option value="CAD" {{ $settings->subscription_currency == 'CAD' ? 'selected' : false }}>
                                            CAD
                                        </option>
                                        <option value="CZK" {{ $settings->subscription_currency == 'CZK' ? 'selected' : false }}>
                                            CZK
                                        </option>
                                        <option value="DKK" {{ $settings->subscription_currency == 'DKK' ? 'selected' : false }}>
                                            DKK
                                        </option>
                                        <option value="EUR" {{ $settings->subscription_currency == 'EUR' ? 'selected' : false }}>
                                            EUR
                                        </option>
                                        <option value="HKD" {{ $settings->subscription_currency == 'HKD' ? 'selected' : false }}>
                                            HKD
                                        </option>
                                        <option value="HUF" {{ $settings->subscription_currency == 'HUF' ? 'selected' : false }}>
                                            HUF
                                        </option>
                                        <option value="ILS" {{ $settings->subscription_currency == 'ILS' ? 'selected' : false }}>
                                            ILS
                                        </option>
                                        <option value="JPY" {{ $settings->subscription_currency == 'JPY' ? 'selected' : false }}>
                                            JPY
                                        </option>
                                        <option value="MYR" {{ $settings->subscription_currency == 'MYR' ? 'selected' : false }}>
                                            MYR
                                        </option>
                                        <option value="MXN" {{ $settings->subscription_currency == 'MXN' ? 'selected' : false }}>
                                            MXN
                                        </option>
                                        <option value="NOK" {{ $settings->subscription_currency == 'NOK' ? 'selected' : false }}>
                                            NOK
                                        </option>
                                        <option value="NZD" {{ $settings->subscription_currency == 'NZD' ? 'selected' : false }}>
                                            NZD
                                        </option>
                                        <option value="PHP" {{ $settings->subscription_currency == 'PHP' ? 'selected' : false }}>
                                            PHP
                                        </option>
                                        <option value="PLN"> PLN</option>
                                        <option value="GBP" {{ $settings->subscription_currency == 'GBP' ? 'selected' : false }}>
                                            GBP
                                        </option>
                                        <option value="RUB" {{ $settings->subscription_currency == 'RUB' ? 'selected' : false }}>
                                            RUB
                                        </option>
                                        <option value="SGD" {{ $settings->subscription_currency == 'SGD' ? 'selected' : false }}>
                                            SGD
                                        </option>
                                        <option value="SEK" {{ $settings->subscription_currency == 'SEK' ? 'selected' : false }}>
                                            SEK
                                        </option>
                                        <option value="CHF" {{ $settings->subscription_currency == 'CHF' ? 'selected' : false }}>
                                            CHF
                                        </option>
                                        <option value="TWD"> TWD</option>
                                        <option value="THB" {{ $settings->subscription_currency == 'TWD' ? 'selected' : false }}>
                                            THB
                                        </option>
                                        <option value="USD" {{ $settings->subscription_currency == 'USD' ? 'selected' : false }}>
                                            USD
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" name="save" class="btn btn-success btn-fill btn-wd">Save</button>
            </form>
        </div>
        <div class="clearfix"></div>
    </div>
@endsection