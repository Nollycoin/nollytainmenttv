@extends('themes.flixer.layout.app')

@section('title', 'Search Results')

@include('themes.flixer.layout.nav')

@section('body')
    <div class="container animated fadeIn" v-on:click="hideSearch()">
        <div class="row">
            <div class="col-lg-12">

                @if(!empty($movies))
                    <div class="my-list">
                        @foreach($movies as $movie)
                            <div class="item">
                                <a href="{{ route('view_video', ['id' => $movie->id]) }}">
                                    <img src="
                                        {{
                                        \App\Helpers\Constants::getUploadDirectory() }}/masonry_images/{{ $movie->movie_thumb_image }}">
                                    <div class="play">
                                        <i class="icon icon-play3"></i>
                                    </div>
                                </a>
                                <div class="title"> {{ $movie->movie_name }}</div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center"><b>No Results match {{ $query }}</b></div>
                @endif
            </div>
        </div>
    </div>
@endsection