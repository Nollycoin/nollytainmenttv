<nav class="navbar navbar-fixed-top navbar-ct-transparent" role="navigation-demo">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#navigation-example-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}"><img
                        src="{{ asset('themes/flixer/assets/images/logo.png') }}"></a>
        </div>
        <div class="collapse navbar-collapse" id="navigation-example-2">
            <ul class="nav navbar-nav navbar-left">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                       aria-expanded="false">Browse<b class="caret"></b> </a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="{{ route('videos') }}">Videos</a>
                        </li>
                        <li><a href="{{ route('series') }}">Series</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <form action="{{ route('search') }}" method="get"
                      class="navbar-form navbar-left"
                      style="display:none;" role="search">
                    <div class="form-group">
                        <div class="input-group search-input">
                            <span class="input-group-addon" id="basic-addon1"><i class="ti-search"></i></span>
                            <input type="text" name="q" class="form-control border-input"
                                   placeholder="Title">
                        </div>
                    </div>
                </form>
                <li id="search-toggle"><a href="#" onclick="showSearch();"> <i class="ti-search"></i> &nbsp
                        <span>Search</span> </a>
                </li>

                @if(!(\Illuminate\Support\Facades\Auth::check()))
                    <li>
                        <a href="#" class="btn btn-danger btn-fill" data-toggle="modal"
                           data-target="#login">SIGN IN</a>
                    </li>
                @else
                    <li class="dropdown">
                        <a href="#" class="profile-photo dropdown-toggle" data-toggle="dropdown"
                           aria-expanded="false">
                            <div class="profile-photo-small">
                                <img src="http://via.placeholder.com/80x80"
                                     class="img-circle img-responsive img-no-padding">
                            </div>
                        </a>
                        @if(!\App\Helpers\Constants::isKid())
                            <ul class="dropdown-menu dropdown-menu-right">

                                @if(\Illuminate\Support\Facades\Auth::check())
                                    <li>
                                        <a href="{{ route('_dashboard')  }}">Admin</a>
                                    </li>
                                    <li class="divider"></li>
                                @endif
                                <li>
                                    <a href="{{ route('my_list') }}">My List</a>
                                </li>
                                <li>
                                    <a href="{{ route('select_profile') }}">Switch Profile</a>
                                </li>
                                <li>
                                    <a href="{{ route('settings') }}">Settings</a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}">Logout</a>
                                </li>
                            </ul>
                        @endif
                    </li>
                    @if (\App\Helpers\Constants::isKid())
                        <a href="select_profile"
                           class="btn btn-danger btn-fill btn-sm exit-kids">
                            Exit Kids
                        </a>
                    @endif
                @endif
            </ul>
        </div>
    </div>
</nav>