@extends('admin.layouts.app')

@section('title', 'Themes')

@section('navbar-brand')
    <a class="navbar-brand" href="#">
        Themes
    </a>
@endsection

@section('body')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading panel-title">Theme Settings</div>
                        <div class="panel-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label> Actors Module </label>

                                    @if($settings->supports_starring == 0)
                                        <select name="show_actors" class="form-control chosen" disabled>
                                            <option value="0"> Disabled</option>
                                        </select>
                                    @else
                                        <select name="show_actors" class="form-control chosen" required>
                                            <option value="1" {{($settings->show_actors == 1 ? 'selected' : false) }}>
                                                Enabled
                                            </option>
                                            <option value="0"
                                                    {{ ($settings->show_actors == 0 ? 'selected' : false) }}>
                                                Disabled
                                            </option>
                                        </select>
                                    @endif
                                    @if($settings->supports_starring == 0)
                                        <div class="help-block">
                                            This feature is not supported by the
                                            <b>{{ ucfirst($settings->theme) }}</b> theme
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label> Profiles Module </label>
                                    @if($settings->supports_profiles == 0)
                                        <select name="show_profiles" class="form-control chosen" disabled>
                                            <option value="0"> Disabled</option>
                                        </select>
                                    @else
                                        <select name="show_profiles" class="form-control chosen" required>
                                            <option value="1" {{ $settings->show_profiles == 1 ? 'selected' : false }}>
                                                Enabled
                                            </option>
                                            <option value="0" {{ $settings->show_profiles == 0 ? 'selected' : false }}>
                                                Disabled
                                            </option>
                                        </select>
                                    @endif
                                    @if($settings->show_profiles == 0)
                                        <div class="help-block">
                                            This feature is not supported by the
                                            <b>{{ ucfirst($settings->theme) }}</b> theme
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label> Kids Mode </label>
                                    @if($settings->supports_profiles == 0)
                                        <select name="kid_profiles" class="form-control chosen" disabled>
                                            <option value="0"> Disabled</option>
                                        </select>
                                    @else
                                        <select name="kid_profiles" class="form-control chosen" required>
                                            <option value="1" {{ $settings->kid_profiles == 1 ? 'selected' : false }}>
                                                Enabled
                                            </option>
                                            <option value="0" {{ $settings->kid_profiles == 0 ? 'selected' : false }}>
                                                Disabled
                                            </option>
                                        </select>
                                    @endif

                                    @if($settings->supports_profiles == 0)
                                        <div class="help-block">
                                            This feature is not supported by the
                                            <b>{{ ucfirst($settings->theme) }}</b> theme
                                        </div>
                                    @endif
                                </div>
                                <button type="submit" name="save" class="btn btn-success btn-fill btn-wd">Save
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @if(!empty($themes))
                @foreach($themes as $theme)
                    @if(substr($theme, 0 , 1) != '.')
                        <div class="theme-card card">
                            <div class="poster"
                                 style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.8)),
                                         url('{{ \App\Helpers\Constants::getUploadDirectory() }}/../themes/{{ $theme }}/theme.jpg');
                                         background-image: -moz-linear-gradient(top, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.8)),
                                         url('{{ \App\Helpers\Constants::getUploadDirectory() }}/../themes/{{ $theme }}/theme.jpg');
                                         background-image: -o-linear-gradient(top, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.8)),
                                         url('{{ \App\Helpers\Constants::getUploadDirectory() }}/../themes/{{ $theme }}/theme.jpg');
                                         background-image: -ms-linear-gradient(top, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.8)),
                                         url('{{ \App\Helpers\Constants::getUploadDirectory() }}/../themes/{{ $theme }}/theme.jpg');
                                         background-image: -webkit-linear-gradient(top, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.8)),
                                         url('{{ \App\Helpers\Constants::getUploadDirectory() }}/../themes/{{ $theme }}/theme.jpg');">
                            </div>
                            @if ($settings->theme == $theme)
                                <div class="action"><a href="#"
                                                       class="btn btn-default btn-lg btn-fill disabled">Active</a>
                                </div>
                            @else
                                <div class="action"><a href="activate_theme.php?theme={{ $theme }}"
                                                       class="btn btn-success btn-lg btn-fill">Activate</a></div>
                            @endif
                            <div class="title">{{ ucfirst($theme) }}</div>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
    </div>
@endsection