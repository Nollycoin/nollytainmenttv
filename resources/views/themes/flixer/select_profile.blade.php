@extends('themes.flixer.layout.app')

@section('title', 'Settings')

@include('themes.flixer.layout.nav')

@section('body')
    <div class="content animated fadeIn" onclick="hideSearch();">
        <div class="profile-selection vertical-center">
            <h1>Who is watching</h1>
            @foreach($profiles as $profile)
                <div class="profile">
                    <a href="?set_profile=true&profile_id=profile_id&profile_name=profile_name&kid=is_kid">
                        <div class="avatar">
                            <img src="{{ session('theme_resource_path') }}/assets/images/avatars/{{ $profile->profile_avatar }}.png">
                        </div>
                        <p class="name">{{ $profile->profile_name }}</p>
                    </a>
                </div>
            @endforeach
            <div class="clearfix"></div>
            <a href="{{ route('manage_profiles') }}" class="btn btn-neutral btn-fill btn-lg">
                Manage Profiles
            </a>
        </div>
    </div>
@endsection

