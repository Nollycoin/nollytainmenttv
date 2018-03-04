<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="{{ app()->getLocale() }}"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'>
    <meta name="viewport" content="width=device-width"/>
    <title>@yield('title')</title>
    <link rel="shortcut icon" type="image/png" href="{{ url('/img/favicon.png') }}">

    <!-- Plugins -->
    <link href="{{ asset('themes/flixer/assets/bootstrap3/css/bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('themes/flixer/assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/flixer/assets/css/owl.transitions.css') }}">
    <link href="{{ asset('themes/flixer/assets/css/jquery.mCustomScrollbar.min.css') }}" rel="stylesheet">
    <script src="{{ asset('themes/flixer/assets/jwplayer/jwplayer.js') }}"></script>
    <link href="{{ asset('themes/flixer/assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/flixer/assets/css/chosen.min.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/flixer/assets/css/chosen-bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/flixer/assets/tel-input/css/intlTelInput.css') }}" rel="stylesheet">
    <script src="{{ asset('themes/flixer/assets/js/nprogress.js') }}"></script>
    <link href="{{ asset('themes/flixer/assets/css/nprogress.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.2.0/jquery.rateyo.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <!-- Main CSS -->
    <link href="{{ asset('themes/flixer/assets/css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/flixer/assets/css/theme.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/flixer/assets/css/style.css') }}" rel="stylesheet">
    <!--  Fonts and icons     -->
    <link href="{{ asset('themes/flixer/assets/css/icomoon.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('themes/flixer/assets/css/themify-icons.css') }}" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <script>
        var base = '{{ url('/') }}';
        var uploads_path = '{{ \App\Helpers\Constants::getUploadDirectory() }}';
        var user_id = '{{ \Illuminate\Support\Facades\Auth::id() }}';
        jwplayer.key = '9383hjehjhh3hhudhbjbsxiboie88ehbiwue83032';
        {{-- <=$muviko->settings->jwplayer_key> --}}
        NProgress.start();
    </script>
</head>
<body class="">

@yield('body')


@if(!session()->has('footer'))

@endif
{{--<footer class="footer footer-black footer-big" style="position: static;">--}}
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-9 col-md-offset-1 col-sm-9 col-xs-12">--}}
                {{--<div class="row">--}}
                    {{--<div class="col-md-3 col-sm-3 col-xs-6">--}}
                        {{--<div class="links">--}}
                            {{--<ul class="stacked-links">--}}
                                {{--<li><big>Categories</big></li>--}}
                                {{--@foreach($genres as $genre)--}}
                                    {{--<li>--}}
                                        {{--<a href="{{ route('category', ['id' => $genre->id ]) }}">--}}
                                            {{--{{ $genre->genre_name }}--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                {{--@endforeach--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-3 col-sm-3 col-xs-6">--}}
                        {{--<div class="links">--}}
                            {{--<ul class="stacked-links">--}}
                                {{--<li><big>Pages</big></li>--}}

                                {{--@foreach($pages as $page)--}}
                                    {{--<li>--}}
                                        {{--<a href="{{ route('page', ['id' => $page->id ]) ) }}">--}}
                                            {{--{{ $page->page_name }}--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                {{--@endforeach--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-3 col-sm-3 col-xs-6">--}}
                        {{--<div class="links">--}}
                            {{--<ul class="stacked-links">--}}
                                {{--<li><big>Social</big></li>--}}
                                {{--@if(!empty($settings->facebook_url))--}}
                                    {{--<li>--}}
                                        {{--<a href="{{ $settings->facebook_url }}" target="_blank">--}}
                                            {{--Facebook--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                {{--@endif--}}
                                {{--@if(!empty($settings->twitter_url))--}}
                                    {{--<li>--}}
                                        {{--<a href="{{$settings->twitter_url}}" target="_blank">--}}
                                            {{--Twitter--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                {{--@endif--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-3 col-sm-3 col-xs-6">--}}
                        {{--<div class="links">--}}
                            {{--<ul class="stacked-links">--}}
                                {{--<li>--}}
                                    {{--<h4>{{ $statistics->users }}<br>--}}
                                        {{--<small>users</small>--}}
                                    {{--</h4>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<h4>{{ $statistics->videos }}<br>--}}
                                        {{--<small>videos</small>--}}
                                    {{--</h4>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<hr>--}}
                {{--<div class="copyright">--}}
                    {{--<div class="pull-left">--}}
                        {{--© {{ date('Y').' '. $settings->website_name}}--}}
                    {{--</div>--}}
                    {{--<div class="links pull-right">--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</footer>--}}
<!--  Plugins -->
<script src="{{ asset('themes/flixer/assets/js/jquery-1.10.2.js') }}" type="text/javascript"></script>
<script src="{{ asset('themes/flixer/assets/js/jquery-ui-1.10.4.custom.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('themes/flixer/assets/bootstrap3/js/bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ asset('themes/flixer/assets/js/ct-paper-checkbox.js') }}"></script>
<script src="{{ asset('themes/flixer/assets/js/ct-paper-radio.js') }}"></script>
<script src="{{ asset('themes/flixer/assets/js/owl.carousel.js') }}"></script>
<script src="{{ asset('themes/flixer/assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('themes/flixer/assets/js/icomoon.js') }}"></script>
<script src="{{ asset('themes/flixer/assets/js/chosen.jquery.min.js') }}"></script>
<script src="{{ asset('themes/flixer/assets/tel-input/js/intlTelInput.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.2.0/jquery.rateyo.min.js"></script>
<script type="text/javascript">
    window.cookieconsent_options = {
        "message": "This website uses cookies to ensure you get the best experience while using it",
        "dismiss": "Okay",
        "learnMore": "More info",
        "link": null,
        "theme": "light-top"
    };
</script>
<script type="text/javascript"
        src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.10/cookieconsent.min.js"></script>
<!-- Main JS -->
<script src="{{ asset('themes/flixer/assets/js/app.js') }}"></script>
<script src="{{ asset('themes/flixer/assets/js/theme.js') }}"></script>

@yield('js')

</body>
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content payment-modal">
            <div class="modal-body">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <div class="panel-title">
                            Sign In
                        </div>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('login') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>
                                    <span>Email</span>
                                </label>
                                <input type="email" name="email" required class="form-control" value="admin@admin.com">
                            </div>
                            <div class="form-group">
                                <label>
                                    <span>Password</span>
                                </label>
                                <input type="password" name="password" required class="form-control" value="admin">
                            </div>
                            <button type="submit" name="login" class="btn btn-danger btn-fill pull-right">
                                Sign In
                            </button>
                            <a href="{{ route('register') }}" class="btn btn-default btn-fill pull-right"
                               style="margin-right:5px;">
                                Create Account</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</html>