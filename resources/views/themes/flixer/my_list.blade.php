@extends('themes.flixer.layout.app')

@section('title', 'My List')

@include('themes.flixer.layout.nav')

@section('body')
    <div class="container animated fadeIn" v-on:click="hideSearch()">
        <div class="row">
            <div class="col-lg-12">
                <div class="my-list">
                    <h1>My List</h1>

                    @foreach($myList as $item)
                        <div class="item">
                            <a href="{{ route('view_video', [ $item->id]) }}">
                                <img src="{{
                                \App\Helpers\Constants::getUploadDirectory() }}/masonry_images/{{ $item->movie_thumb_image }}">
                                <div class="play">
                                    <i class="icon icon-play3"></i>
                                </div>
                            </a>
                            <div class="title">{{ $item->movie_name }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection