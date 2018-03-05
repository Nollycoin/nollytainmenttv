@extends('themes.flixer.layout.app')

@section('title', ucwords($genre->genre_name))

@include('themes.flixer.layout.nav')

@section('body')
    <div class="container animated fadeIn" v-on:click="hideSearch()">
        <div class="row">
            <div class="col-lg-12">
                <div class="my-list">
                    <h1>{{ $genre->genre_name }}</h1>
                    <div class="chosen-filter">
                        <select id="filter" class="form-control chosen" onchange="changeFilter()">
                            <option value="newest" {{ (request('filter')== 'newest') ? 'selected' : '' }}>
                                Newest
                            </option>
                            <option value="oldest" {{ (request('filter')== 'oldest') ? 'selected' : '' }}>
                                Oldest
                            </option>
                            <option value="random" {{ (request('filter')== 'random') ? 'selected' : '' }}>
                                Random
                            </option>
                        </select>
                    </div>
                    <div class="clearfix"></div>
                    @foreach($genreMovies as $movie)
                        <div class="item">
                            <a href="{{ route('view_video', ['id' => $movie->id]) }}">
                                <img src="{{ \App\Helpers\Constants::getUploadDirectory().'/masonry_images/'.$movie->movie_thumb_image }}">
                                <div class="play">
                                    <i class="icon icon-play3"></i>
                                </div>
                            </a>
                            <div class="title">{{ $movie->movie_name }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection