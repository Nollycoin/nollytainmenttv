@extends('themes.flixer.layout.app')

@section('title', 'Manage Profiles')

@include('themes.flixer.layout.nav')

@section('body')
    <div class="content animated fadeIn" v-on:click="hideSearch()">
        <div class="manage-container profile-selection">
            <h1>Manage Profiles</h1>
            @foreach($profiles as $profile)
                <div class="profile">
                    <a href="edit_profile.php?id=$profile->id">{{--TODO EDIT THIS LINE--}}
                        <div class="avatar">
                            <img src="{{ asset('themes/flixer/assets/images/avatars/').$profile->profile_avatar }}">
                        </div>
                        <p class="name">{{ $profile->profile_name }}</p>
                        <div class="edit"><i class="icon icon-pencil"></i></div>
                    </a>
                </div>
            @endforeach
            @if(count($profiles) <=3 )
                <div class="add-profile">
                    <a href="add_profile.php">
                        <i class="icon icon-plus"></i>
                    </a>
                </div>
            @endif
            <div class="clearfix"></div>
            <a href="{{ url('/select_profile.php') }}" class="btn btn-neutral btn-fill btn-lg">
                Done
            </a>
        </div>
    </div>
@endsection