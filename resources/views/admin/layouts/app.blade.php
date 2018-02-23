<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>@yield('title')</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('admin/assets/css/animate.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('admin/assets/css/theme.css') }}" rel="stylesheet"/>
    <link href="{{ asset('admin/assets/css/style.css') }}" rel="stylesheet"/>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/themify-icons.css') }}" rel="stylesheet">
</head>
<body>
<div class="wrapper">
    <div class="sidebar" data-background-color="black" data-active-color="success">
        <div class="sidebar-wrapper" style="overflow-x:hidden; width: auto">
            <div class="logo" style="margin-top: -20px;">
                <a href="#" class="simple-text">
                    <img src="{{ asset('admin/assets/images/logo.png') }}">
                </a>
            </div>

            <ul class="nav" style="margin-top: -15px;">
                <li class="@yield('_dashboard_active')">
                    <a href="{{ route('_dashboard') }}">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="@yield('_users_active')">
                    <a href="{{ route('_users') }}">
                        <i class="ti-user"></i>
                        <p>Users</p>
                    </a>
                </li>
                <li class="@yield('_categories_active')">
                    <a href="{{ route('_categories') }}">
                        <i class="ti-view-list"></i>
                        <p>Categories</p>
                    </a>
                </li>
                <li class="@yield('_videos_active')">
                    <a href="{{ route('_videos') }}">
                        <i class="ti-video-clapper"></i>
                        <p>Videos</p>
                    </a>
                </li>
                <li class="@yield('_episodes_active')">
                    <a href="{{ route('_episodes') }}">
                        <i class="ti-video-clapper"></i>
                        <p>Episodes</p>
                    </a>
                </li>
                <li class="@yield('_actors_active')">
                    <a href="{{ route('_actors') }}">
                        <i class="ti-star"></i>
                        <p>Actors</p>
                    </a>
                </li>
                <li class="@yield('_codes_active')">
                    <a href="{{ route('_codes') }}">
                        <i class="ti-ticket"></i>
                        <p>Codes</p>
                    </a>
                </li>
                <li class="@yield('_pages_active')">
                    <a href="{{ route('_pages') }}">
                        <i class="ti-file"></i>
                        <p>Pages</p>
                    </a>
                </li>
                <li class="@yield('_themes_active')">
                    <a href="{{ route('_themes') }}">
                        <i class="ti-palette"></i>
                        <p>Themes</p>
                    </a>
                </li>
                <li class="@yield('_settings_active')">
                    <a href="{{ route('_settings') }}">
                        <i class="ti-settings"></i>
                        <p>Settings</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>

                    @yield('navbar-brand')
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="{{ route('home') }}">
                                <i class="ti-arrow-left"></i>
                                <p>Back to User Area</p>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>

        @yield('body')

        <footer class="footer">
            <div class="container-fluid">
                <div class="copyright pull-left">
                    {{ env('APP_NAME') }}
                </div>
            </div>
        </footer>
    </div>
</div>
</body>
<script src="{{ asset('admin/assets/js/jquery-1.10.2.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/js/bootstrap-checkbox-radio.js') }}"></script>
<script src="{{ asset('admin/assets/js/chartist.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/bootstrap-notify.js') }}"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
<script src="{{ asset('admin/assets/js/theme.js') }}"></script>
</html>
